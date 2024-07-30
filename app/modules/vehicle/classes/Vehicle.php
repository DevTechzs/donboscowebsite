<?php

/**  Current Version: 1.0.0
 *  Createdby : Dev (12/07/2024)
 *  Created On:
 *  Modified By: 
 *  Modified On:
 */

namespace app\modules\vehicle\classes;

use app\modules\documents\classes\Documents;
use \app\database\DBController;
use \app\database\Helper;
use app\modules\auth\classes\Signup;

class Vehicle
{

    function getVehicleType()
    {
        $query = "SELECT * FROM  `Vehicles_Type`";
        $res = DBController::getDataSet($query);
        if ($res) {
            return array("return_code" => true, "return_data" =>  $res);
        }
        return array("return_code" => false, "return_data" => "No Vehicle Type found");
    }

    function getVehicleManufacturer()
    {
        $query = "SELECT * FROM  `Vehicles_Made`";
        $res = DBController::getDataSet($query);
        if ($res) {
            return array("return_code" => true, "return_data" =>  $res);
        }
        return array("return_code" => false, "return_data" => "No Vehicle Manufacturer found");
    }

    function getVehicleModel()
    {

        $query = "SELECT * FROM  `Vehicles_Model`";
        $res = DBController::getDataSet($query);
        if ($res) {
            return array("return_code" => true, "return_data" =>  $res);
        }
    }
    function getLocation()
    {
        $query = "SELECT * FROM  `Location`";
        $res = DBController::getDataSet($query);
        if ($res) {
            return array("return_code" => true, "return_data" =>  $res);
        }
        return array("return_code" => false, "return_data" => "No Location found");
    }
    function addVehicle($data)
    {
        $requiredFields = [
            'VehicleRegistrationNo',
            'VehicleTypeID',
            'VehicleMadeID',
            'CurrentOwnerName',
            'OwnerContactNo',
            'DriverName',
            'DriverContactNo',
            'DriverLicenceNo',
            'LocationIDs'
        ];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                return array(
                    "return_code" => false,
                    "return_data" => "Mandatory field '$field' is not supplied"
                );
            }
        }
        if (!isset($data['VehicleModelID']) || isset($data['VehicleModel'])) {
            $VehicleModel = $data['VehicleModel'];
            $VehicleModelID = -1;
        } else if (isset($data['VehicleModelID'])) {
            $VehicleModelID = $data['VehicleModelID'];
            $VehicleModel = -1;
        }

        //check if the mandotory values are supplied or not 
        $locationIDs = implode(',', $data["LocationIDs"]);

        //check Vahicle Existence
        $query = "SELECT COUNT(*) as count 
    FROM (
        SELECT VehicleRegistrationNo, CurrentOwnerName 
        FROM Vehicles_Registration 
        WHERE VehicleRegistrationNo = :VehicleRegistrationNo AND CurrentOwnerName = :CurrentOwnerName
        UNION ALL
        SELECT VehicleRegistrationNo, CurrentOwnerName 
        FROM Vehicles_Info 
        WHERE VehicleRegistrationNo = :VehicleRegistrationNo AND CurrentOwnerName = :CurrentOwnerName
    ) as combined";
        $checkparams = array(
            array(":VehicleRegistrationNo", isset($data["VehicleRegistrationNo"]) ? strip_tags(str_replace(' ', '', $data["VehicleRegistrationNo"])) : ''), //remove white spaces
            array(":CurrentOwnerName", isset($data["CurrentOwnerName"]) ? strip_tags($data["CurrentOwnerName"]) : ''),
        );
        $vehicle = DBController::sendData($query, $checkparams);
        if ($vehicle['count'] > 0) {
            return array("return_code" => false, "return_data" => "Vehicle Already Exists");
        }


        //check 

        //params
        $params = array(
            array(":VehicleRegistrationNo", isset($data["VehicleRegistrationNo"]) ? strip_tags(str_replace(' ', '', $data["VehicleRegistrationNo"])) : ''), //remove white spaces
            array(":VehicleTypeID", $data["VehicleTypeID"]),
            array(":VehicleMadeID", $data["VehicleMadeID"]),
            array(":VehicleModelID", $VehicleModelID),
            array(":VehicleModel",  $VehicleModel),
            array(":CurrentOwnerName", isset($data["CurrentOwnerName"]) ? strip_tags($data["CurrentOwnerName"]) : ''),
            array(":OwnerContactNo", $data["OwnerContactNo"]),
            array(":DriverName", $data["DriverName"]),
            array(":DriverContactNo", $data["DriverContactNo"]),
            array(":DriverLicenceNo", $data["DriverLicenceNo"]),
            array(":LocationIDs", strip_tags($locationIDs)),
            array(":isOwnerTheDriver", $data['isOwnerTheDriver'])
        );

        $query = "INSERT INTO `Vehicles_Registration`(`VehicleRegistrationNo`, `VehicleTypeID`, `VehicleMadeID`, `VehicleModelID`,`VehicleModel`, `CurrentOwnerName`, `OwnerContactNo`, `isOwnerTheDriver`, `DriverName`, `DriverContactNo`, `DriverLicenceNo`, `LocationIDs`) 
              VALUES (:VehicleRegistrationNo, :VehicleTypeID, :VehicleMadeID, :VehicleModelID,:VehicleModel, :CurrentOwnerName, :OwnerContactNo, :isOwnerTheDriver,:DriverName, :DriverContactNo, :DriverLicenceNo, :LocationIDs)";
        $res = DBController::ExecuteSQLID($query, $params);
        if ($res) {
            $extractVehicleID = "SELECT VehicleID FROM Vehicles_Registration ORDER BY CreatedDateTime DESC LIMIT 1";
            $extractLatestIDResult = DBController::sendData($extractVehicleID);
            if (is_array($extractLatestIDResult) && isset($extractLatestIDResult['VehicleID'])) {
                $VehicleID = intval($extractLatestIDResult['VehicleID']);
            }

            $documentHandlingResult = false;

            if (!empty($data['RegistrationCertificateFile'])) {
                $documentHandlingResult = $this->RegistrationFile($data, $VehicleID);
            }

            if ($documentHandlingResult && !empty($data['DriverLicencePath'])) {
                $documentHandlingResult = $this->DriverLicenceFile($data, $VehicleID);
            }

            if ($documentHandlingResult) {
                return array("return_code" => true, "return_data" => "Vehicle  Successfully Registered. You will receive the login details once approved.");
            } else {
                return array("return_code" => false, "return_data" => "Vehicle  Successfully Registered but Documents not uploaded.");
            }
        } else {
            return array("return_code" => false, "return_data" => "Vehicle registration failed");
        }
    }


    function RegistrationFile($data, $VehicleID)
    {
        // Handle documents
        if (!file_exists("../app/data/rc/")) {
            mkdir("../app/data/rc/", 0777, TRUE);
        }
        ini_set('memory_limit', '-1');
        $documentsIDs = '';
        $files = $data['RegistrationCertificateFile'];
        $f1 = array();
        array_push($f1, $files);
        foreach ($f1 as $file) {
            $parts = explode(',',  $file["registrationCertificate"], 2);
            if (count($parts) === 2) {
                $header = $parts[0];
                $data = $parts[1];
                $header_parts = explode(';', $header);
                $mime_type = $header_parts[0];
                $ext = explode('/', $mime_type)[1];
                $filearray = array(
                    'ext' => $ext,
                    'file' => $data
                );
                // Now you can use $filearray as needed
            } else {
                // Handle the case where explode didn't return expected parts
                echo "Invalid data format: " . $file["filedata"];
            }
            // $urlFileData=$path;
            // new Documents = new Documents();
            $path = (new Documents())::storeDocuments("DOCUMENT", $filearray);
            // DBController::logs("Reached Documents");
            $ext = pathinfo($file['filename'], PATHINFO_EXTENSION);
            $filedata = file_get_contents($file['registrationCertificate']);
            do {
                $newfilename = "n_" . Helper::generate_string(10) . "." . $ext;
            } while (file_exists("../app/data/rc/" . $newfilename));

            $fp = fopen("../app/data/rc/" . $newfilename, "w+");
            if (fwrite($fp, ($filedata))) {
                $q2 = "INSERT INTO `Documents` (`DocumentPath`, `DocumentTitle`, `DocumentAccess`, `DocumentDisplayName`) VALUES (:DocumentPath, :DocumentTitle, :DocumentAccess, :DocumentDisplayName);";
                $p2 = [
                    [":DocumentPath", $newfilename],
                    [":DocumentTitle", $file['filename']],
                    [":DocumentAccess", "111"],
                    [":DocumentDisplayName", "RegistrationCertificate"],
                ];
                $r2 = DBController::ExecuteSQLID($q2, $p2);
                $documentsIDs = $r2 . ',' . $documentsIDs;
                if ($documentsIDs) {
                    // Update LeaveDocumentIDs in Administration_Letter
                    $param2 = array(
                        array(":RegistrationCertificatePath", $newfilename),
                        array(":VehicleID", $VehicleID)
                    );

                    $query2 = "UPDATE `Vehicles_Registration` SET `RegistrationCertificatePath`=:RegistrationCertificatePath WHERE `VehicleID`=:VehicleID";
                    $updateDoc = DBController::ExecuteSQL($query2, $param2);
                    if ($updateDoc) {
                        return array("return_code" => true, "return_data" => "Success");
                    } else {
                        return array("return_code" => false, "return_data" => "Not Saving");
                    }
                }
            } else {
                return array("return_code" => false, "return_data" => "File not saved !!");
            }
            fclose($fp);
        }
    }

    function DriverLicenceFile($data, $VehicleID)
    {
        // Handle documents
        if (!file_exists("../app/data/driverlicence/")) {
            mkdir("../app/data/driverlicence/", 0777, TRUE);
        }
        ini_set('memory_limit', '-1');
        $documentsIDs = '';
        $files = $data['DriverLicencePath'];
        $f1 = array();
        array_push($f1, $files);
        foreach ($f1 as $file) {
            $parts = explode(',',  $file["driver_licence_path"], 2);
            if (count($parts) === 2) {
                $header = $parts[0];
                $data = $parts[1];
                $header_parts = explode(';', $header);
                $mime_type = $header_parts[0];
                $ext = explode('/', $mime_type)[1];
                $filearray = array(
                    'ext' => $ext,
                    'file' => $data
                );
                // Now you can use $filearray as needed
            } else {
                // Handle the case where explode didn't return expected parts
                echo "Invalid data format: " . $file["filedata"];
            }
            // $urlFileData=$path;
            // new Documents = new Documents();
            $path = (new Documents())::storeDocuments("DOCUMENT", $filearray);
            // DBController::logs("Reached Documents");
            $ext = pathinfo($file['filename'], PATHINFO_EXTENSION);
            $filedata = file_get_contents($file['driver_licence_path']);

            do {
                $newfilename = "n_" . Helper::generate_string(10) . "." . $ext;
            } while (file_exists("../app/data/driverlicence/" . $newfilename));

            $fp = fopen("../app/data/driverlicence/" . $newfilename, "w+");
            if (fwrite($fp, ($filedata))) {
                $q2 = "INSERT INTO `Documents` (`DocumentPath`, `DocumentTitle`, `DocumentAccess`, `DocumentDisplayName`) VALUES (:DocumentPath, :DocumentTitle, :DocumentAccess, :DocumentDisplayName);";
                $p2 = [
                    [":DocumentPath", $newfilename],
                    [":DocumentTitle", $file['filename']],
                    [":DocumentAccess", "111"],
                    [":DocumentDisplayName", "DriverLicencePath"],
                ];
                $r2 = DBController::ExecuteSQLID($q2, $p2);
                $documentsIDs = $r2 . ',' . $documentsIDs;
                if ($documentsIDs) {
                    // Update LeaveDocumentIDs in Administration_Letter
                    $param2 = array(
                        array(":DriverLicencePath", $newfilename),
                        array(":VehicleID", $VehicleID)
                    );

                    $query2 = "UPDATE `Vehicles_Registration` SET `DriverLicencePath`=:DriverLicencePath WHERE `VehicleID`=:VehicleID";
                    $updateDoc = DBController::ExecuteSQL($query2, $param2);
                    if ($updateDoc) {
                        return array("return_code" => true, "return_data" => "OK");
                    } else {
                        return array("return_code" => false, "return_data" => "failed");
                    }
                }
            } else {
                return array("return_code" => false, "return_data" => "File not saved !!");
            }
            fclose($fp);
        }
    }


    function getRequestedForRegisterVehicle()
    {
        $query = "
SELECT 
    vr.VehicleID,
    vr.VehicleRegistrationNo,
    vr.CurrentOwnerName,
    vr.OwnerContactNo,
    vr.isOwnerTheDriver,
    vr.DriverName,
    vr.DriverLicenceNo,
    vr.isApproved,
    vr.isRejected,
    vr.Remarks,
    vt.VehicleTypeName,
    vm.VehicleManufactureBy,
    vr.DriverContactNo,
    vr.LocationIDs,
    vr.VehicleTypeID,
    vr.VehicleMadeID,
    vr.VehicleModelID,
    vr.RegistrationCertificatePath,
    vr.isOwnerTheDriver,
    vr.DriverContactNo,
    vr.DriverLicencePath,
    GROUP_CONCAT(l.LocationName SEPARATOR ', ') AS Locations
FROM 
    Vehicles_Registration vr
INNER JOIN 
    Vehicles_Type vt ON vt.VehicleTypeID = vr.VehicleTypeID
INNER JOIN 
    Vehicles_Made vm ON vm.VehicleMadeID = vr.VehicleMadeID
INNER JOIN 
    Location l ON FIND_IN_SET(l.LocationID, vr.LocationIDs)
    WHERE vr.isApproved IS NULL AND vr.isRejected IS NULL
GROUP BY 
    vr.VehicleRegistrationNo,
    vr.CurrentOwnerName,
    vr.OwnerContactNo,
    vr.isOwnerTheDriver,
    vr.DriverName,
    vr.DriverLicenceNo,
    vr.isApproved,
    vr.isRejected,
    vr.Remarks,
    vt.VehicleTypeName,
    vm.VehicleManufactureBy;
 ";
        $result = DBController::getDataSet($query);
        return array("return_code" => true, "return_data" =>  $result);
    }

    function approvedVehicleRegistration($data)
    {
        $param = array(
            array(":VehicleID", isset($data["VehicleID"]) ? (int)strip_tags($data["VehicleID"]) : 0),
            array(":VehicleRegistrationNo", isset($data["VehicleRegistrationNo"]) ? strip_tags($data["VehicleRegistrationNo"]) : ''),
            array(":Remarks", isset($data["Remarks"]) ? strip_tags($data["Remarks"]) : ''),
        );
        $locationIDsArray = isset($data["LocationIDs"]) ? explode(',', strip_tags($data["LocationIDs"])) : array();
        $locationIDs = implode(',', $locationIDsArray);  // If needed to be converted back to a string

        $params = array(
            array(":VehicleRegistrationNo", isset($data["VehicleRegistrationNo"]) ? strip_tags($data["VehicleRegistrationNo"]) : ''),
            array(":VehicleTypeID", isset($data["VehicleTypeID"]) ? (int)strip_tags($data["VehicleTypeID"]) : 0),
            array(":VehicleMadeID", isset($data["VehicleMadeID"]) ? (int)strip_tags($data["VehicleMadeID"]) : 0),
            array(":VehicleModelID", isset($data["VehicleModelID"]) ? (int)strip_tags($data["VehicleModelID"]) : 0),
            array(":CurrentOwnerName", isset($data["CurrentOwnerName"]) ? strip_tags($data["CurrentOwnerName"]) : ''),
            array(":RegistrationCertificatePath", isset($data["RegistrationCertificatePath"]) ? strip_tags($data["RegistrationCertificatePath"]) : ''),
            array(":OwnerContactNo", isset($data["OwnerContactNo"]) ? strip_tags($data["OwnerContactNo"]) : ''),
            array(":isOwnerTheDriver", isset($data["isOwnerTheDriver"]) ? (int)strip_tags($data["isOwnerTheDriver"]) : 0),
            array(":DriverName", isset($data["DriverName"]) ? strip_tags($data["DriverName"]) : ''),
            array(":DriverContactNo", isset($data["DriverContactNo"]) ? strip_tags($data["DriverContactNo"]) : ''),
            array(":DriverLicenceNo", isset($data["DriverLicenceNo"]) ? strip_tags($data["DriverLicenceNo"]) : ''),
            array(":DriverLicencePath", isset($data["DriverLicencePath"]) ? strip_tags($data["DriverLicencePath"]) : ''),
            array(":LocationIDs", $locationIDs),  // Passing as string if needed
        );
        $query = "UPDATE Vehicles_Registration SET isApproved = 1, Remarks=:Remarks WHERE VehicleID=:VehicleID  AND  VehicleRegistrationNo=:VehicleRegistrationNo";
        $result = DBController::ExecuteSQL($query, $param);
        if ($result) {
            $checkparsms = array(
                array(":VehicleRegistrationNo", isset($data["VehicleRegistrationNo"]) ? strip_tags($data["VehicleRegistrationNo"]) : ''),
                array(":OwnerContactNo", isset($data["OwnerContactNo"]) ? strip_tags($data["OwnerContactNo"]) : ''),
            );
            $checkVehicleInfoExists = "SELECT COUNT(*)  as count FROM Vehicles_Info WHERE VehicleRegistrationNo=:VehicleRegistrationNo AND  OwnerContactNo=:OwnerContactNo;";
            $checkVehicleInfo = DBController::sendData($checkVehicleInfoExists, $checkparsms);

            if ($checkVehicleInfo['count'] > 0) {
                return array("return_code" => false, "return_data" => "Vehicle registration already approved ");
            }
            $query = "INSERT INTO `Vehicles_Info`(`VehicleRegistrationNo`, `VehicleTypeID`, `VehicleMadeID`, `VehicleModelID`, `CurrentOwnerName`, `OwnerContactNo`,`RegistrationCertificatePath`, `isOwnerTheDriver`, `DriverName`, `DriverContactNo`, `DriverLicenceNo`,`DriverLicencePath`, `LocationIDs`) 
            VALUES (:VehicleRegistrationNo, :VehicleTypeID, :VehicleMadeID, :VehicleModelID, :CurrentOwnerName, :OwnerContactNo,:RegistrationCertificatePath, :isOwnerTheDriver, :DriverName, :DriverContactNo, :DriverLicenceNo, :DriverLicencePath, :LocationIDs)";
            // Execute the query using DBController::ExecuteSQL method (assumed to exist)
            $resultInsert = DBController::ExecuteSQL($query, $params);
            if ($resultInsert) {
                $user = array(
                    "Username" => $data["OwnerContactNo"],
                    "Name" => $data["CurrentOwnerName"],
                    "ContactNo" => $data["OwnerContactNo"],
                    "UserType" => 2,
                    "ValidateUsernameOnly" =>  True
                );
                $userdata = (new Signup())->request($user);
                $isCreated = false;
                $giveup = 0;
                if ($userdata["return_code"] == false) {
                    while ($isCreated == false) {
                        $user["Username"] = $data["ContactNo"] . rand(0, 100);
                        $userdata = (new Signup())->request($user);
                        if ($userdata["return_code"] == true) {
                            $isCreated = true;
                        }
                        $giveup += 1;
                        if ($giveup == 20) break;
                    }
                }

                return array("return_code" => true, "return_data" => "Vehicle Registration approved successfully");
            } else {
                return array("return_code" => false, "return_data" => "Failed to insert vehicle registration data");
            }
        }
        return array("return_code" => true, "return_data" => "Cannot Approve registration");
    }

    //get the list of vehicles based on the Location LocationID
    // params : Locationname AND   LocationID

    function getVehiclesByLocationID($data)
    {

        $params = array(
            array(":LocationID", isset($data["LocationID"]) ? (int)strip_tags($data["LocationID"]) : 0)
        );

        $query = "SELECT  vi.VehicleID,vi.DriverName,vc.isDriverAvailable,VehicleRegistrationNo,  vi.VehicleRegistrationNo,Vehicles_Type.VehicleTypeName,Vehicles_Model.VehicleModelName,
                l.LocationName
            FROM 
                Vehicles_Info vi
                INNER JOIN Vehicles_Type on Vehicles_Type.VehicleTypeID = vi.VehicleTypeID
                INNER JOIN Vehicles_Model on Vehicles_Model.VehicleModelID = vi.VehicleModelID
                INNER JOIN Vehicles_Contacted vc  on vc.VehicleID = vi.VehicleID          
            INNER JOIN 
                Location l ON FIND_IN_SET(:LocationID, vi.LocationIDs)
            WHERE l.LocationID=:LocationID AND   IFNULL(vi.isRemoved,0) = 0  GROUP BY vi.VehicleID";

        $result = DBController::getDataSet($query, $params);
        if ($result) {
            return array("return_code" => true, "return_data" => $result);
        }
        return array("return_code" => false, "return_data" => "No vehicle found in this location");
    }

    function getActiveVehicleByLocationID($data)
    {
        $params = array(
            array(":LocationID", isset($data["LocationID"]) ? (int)strip_tags($data["LocationID"]) : 0)
        );
        $query = " SELECT  vi.VehicleID,   vi.DriverName,VehicleRegistrationNo,  vi.VehicleRegistrationNo,Vehicles_Type.VehicleTypeName,Vehicles_Model.VehicleModelName,
                l.LocationName
            FROM 
                Vehicles_Info vi
                INNER JOIN Vehicles_Type on Vehicles_Type.VehicleTypeID = vi.VehicleTypeID
                INNER JOIN Vehicles_Model on Vehicles_Model.VehicleModelID = vi.VehicleModelID
            INNER JOIN 
                Location l ON vi.ActiveLocationID = l.LocationID   
            WHERE  vi.ActiveLocationID =:LocationID AND IFNULL(vi.isRemoved,0) = 0 ";  // AND vi.ActiveLocationID = :LocationID 

        $result = DBController::getDataSet($query, $params);
        if ($result) {
            return array("return_code" => true, "return_data" => $result);
        }
        return array("return_code" => false, "return_data" => "No vehicle found in this location");
    }

    //contactNo and Name of the person is required
    function getVehicleContactNo($data)
    {

        if (!isset($data["ContactNo"]) || !isset($data["ContactName"])) {
            return array("return_code" => false, "return_data" => "Personal details is not supplied");
        }
        $params = array(
            array(":ContactNo",  strip_tags($data["ContactNo"])), //persons contact number who is requesting for contactNo
            array(":ContactName",  strip_tags($data["ContactName"])), //persons contact Name who is requesting ffor ContactNumber
            array(":VehicleID",  strip_tags($data["VehicleID"])), //Vehicle 
            array(":LocationID",  strip_tags($data["LocationID"])), //Vehicle

        );

        $query = " INSERT INTO Vehicles_Contacted(VehicleID,ContactNo,ContactedBy,LocationID) VALUES (:VehicleID, :ContactNo,:VehicleID,:LocationID )";  // AND vi.ActiveLocationID = :LocationID 
        $result = DBController::ExecuteSQL($query, $params);
        if ($result) {
            //get the contact numner of the vehicle
            $params = array(
                array(":VehicleID",  strip_tags($data["VehicleID"])),
            );
            $query = "SELECT DriverContactNo FROM vehicles_info where VehicleID =:VehicleID ;";
            $result = DBController::sendData($query, $params);
            if ($result) {
                //add to some table for notification for the user                 
                return array("return_code" => true, "return_data" => $result["DriverContactNo"]);
            }
            return array("return_code" => false, "return_data" => "Couldnot find the contact number");
        }
        return array("return_code" => false, "return_data" => "No vehicle found in this location");
    }

    function rejectedVehicleRequest($data)
    {
        if (!isset($data['VehicleID'])) {
            return array("return_code" => false, "return_data" => "Vehicle ID Not Found");  // Assuming VehicleID is a required field. Adjust as needed.  // Assuming VehicleID is a required field. Adjust as needed.  // Assuming VehicleID is a required field. Adjust as needed.  // Assuming VehicleID is a required field. Adjust as needed.  // Assuming VehicleID is a required field. Adjust as needed.  // Assuming VehicleID is a required field. Adjust as needed.  // Assuming VehicleID is a required field. Adjust as needed.  // Assuming VehicleID is a required field. Adjust as needed.  // Assuming VehicleID is a required field. Adjust as needed.  // Assuming VehicleID is a required field. Adjust as needed.  // Assuming VehicleID is a required field. Adjust as needed.  // Assuming VehicleID is a required field. Adjust as
        } else if (!isset($data['VehicleRegistrationNo'])) {
            return array("return_code" => false, "return_data" => "Vehicle Registration No Not Found");  // Assuming VehicleRegistrationNo is a required field. Adjust as needed.  // Assuming VehicleRegistrationNo is a required field. Adjust as needed.  // Assuming VehicleRegistrationNo is a required field. Adjust as needed.  // Assuming VehicleRegistrationNo is a required field. Adjust as needed.  // Assuming VehicleRegistrationNo is a required field. Adjust as needed.  // Assuming VehicleRegistrationNo is a required field. Adjust as needed.  // Assuming VehicleRegistrationNo is a required field. Adjust as needed.  // Assuming VehicleRegistrationNo is a required field. Adjust as needed.  // Assuming VehicleRegistrationNo is a required field. Adjust as needed.  // Assuming VehicleRegistrationNo is a required field. Adjust as needed.  // Assuming VehicleRegistrationNo is a required field. Adjust as needed.
        } else {
            $params = array(
                array(":VehicleID", ($data["VehicleID"])),
                array(":VehicleRegistrationNo", $data["VehicleRegistrationNo"]),
                array(":Remarks", isset($data["Remarks"]) ? strip_tags($data["Remarks"]) : ''), // Assuming Remarks is a string in the input data. Adjust as needed.  // Assuming Remarks is a string in the input data. Adjust as needed.  // Assuming Remarks is a string in the input data. Adjust as needed.  // Assuming Remarks is a string in the input data. Adjust as needed.  // Assuming Remarks is a string in the input data. Adjust as needed.  // Assuming Remarks is a string in the input data. Adjust as needed.  // Assuming Remarks is a string in
                array(":ActionTakenbyID", $_SESSION["UserID"]),
            );
            $query = "UPDATE Vehicles_Registration SET isRejected = 1,isApproved=NULL,Remarks=:Remarks,ActionTakenbyID=:ActionTakenbyID WHERE VehicleID=:VehicleID AND VehicleRegistrationNo=:VehicleRegistrationNo;";
            $result = DBController::ExecuteSQL($query, $params);
            if ($result) {
                return array("return_code" => true, "return_data" => "Vehicle registration rejected successfully");
            }
            return array("return_code" => false, "return_data" => "Failed to reject vehicle registration");
        }
    }

    function getContactedCustomersDetail()
    {
        $params = array(
            array(":VehicleID",  $_SESSION["VehicleID"])
        );

        $query = "SELECT VehicleContactID,LocationName, ContactedBy, ContactNo FROM vehicles_contacted vc
	            INNER JOIN Location ON  Location.LocationID= vc.LocationID
            where Date(ContactedDateTime)= current_date() and  vc.VehicleID = :VehicleID AND IFNULL(vc.isRemoved,0) =0 ";
        $result = DBController::getDataSet($query, $params);
        if ($result) {
            return array("return_code" => true, "return_data" => $result);
        }
        return array("return_code" => false, "return_data" => []);
    }

    function updateContactedVehicle($data)
    {
        $params = array(
            array(":VehicleContactID", $data["VehicleID"])
        );

        $query = "UPDATE vehicles_contacted SET isDriverContacted =b'1', DriverContactedDateTime = CURRENT_TIMESTAMP 
            where VehicleContactID= :VehicleContactID ";
        $result = DBController::getDataSet($query, $params);
        if ($result) {
            return array("return_code" => true, "return_data" => "Updated Contact Information");
        }
        return array("return_code" => false, "return_data" => "Unable to update the contact Information");
    }

    function removeContactedVehicle($data)
    {
        $params = array(
            array(":VehicleContactID", $data["VehicleContactID"])
        );

        $query = "UPDATE Vehicles_Contacted SET isRemoved =b'1', RemovedDateTime = CURRENT_TIMESTAMP 
            where VehicleContactID=:VehicleContactID ";
        $result = DBController::ExecuteSQL($query, $params);
        if ($result) {
            return array("return_code" => true, "return_data" => "Successfully Removed from the List");
        }
        return array("return_code" => false, "return_data" => []);
    }
    function getVehicleInfo()
    {
        $query = "SELECT 
    vi.VehicleID,
    vi.VehicleRegistrationNo,
    vi.CurrentOwnerName,
    vi.OwnerContactNo,
    vi.isOwnerTheDriver,
    vi.DriverName,
    vi.DriverLicenceNo,
    vt.VehicleTypeName,
    vm.VehicleManufactureBy,
    vi.DriverContactNo,
    vi.LocationIDs,
    vi.VehicleTypeID,
    vi.VehicleMadeID,
    vi.VehicleModelID,
    vi.RegistrationCertificatePath,
    vi.isOwnerTheDriver,
    vi.DriverContactNo,
    vi.DriverLicencePath,
    GROUP_CONCAT(l.LocationName SEPARATOR ', ') AS Locations
FROM 
    Vehicles_Info vi
INNER JOIN 
    Vehicles_Type vt ON vt.VehicleTypeID = vi.VehicleTypeID
INNER JOIN 
    Vehicles_Made vm ON vm.VehicleMadeID = vi.VehicleMadeID
INNER JOIN 
    Location l ON FIND_IN_SET(l.LocationID, vi.LocationIDs)
GROUP BY 
    vi.VehicleRegistrationNo,
    vi.CurrentOwnerName,
    vi.OwnerContactNo,
    vi.isOwnerTheDriver,
    vi.DriverName,
    vi.DriverLicenceNo,
    vt.VehicleTypeName,
    vm.VehicleManufactureBy
";
        $res = DBController::getDataSet($query);
        if ($res) {
            return array("return_code" => true, "return_data" => $res);
        } else {
            return array("return_code" => false, "return_data" => "No vehicle info found");
        }
    }

    function  getAllUsers()
    {
        $query = "SELECT Name,UserID, UserName,ContactNo,CreatedDateTime,isActive FROM Users WHERE UserType=2";
        $res = DBController::getDataSet($query);
        if ($res) {
            return array("return_code" => true, "return_data" => $res);
        } else {
            return array("return_code" => false, "return_data" => "No active users found");
        }
    }

    function changeActiveStatus($data)
    {
        if (!isset($_SESSION['UserType']) && $_SESSION['UserType'] != 1) {
            return array("return_code" => false, "return_data" => "Access Denied.Please contact Admin if you think it is a mistake");
        }

        $params = array(
            array(":UserID", strip_tags($data["UserID"])),
            array(":status", $data["status"])
        );
        $query = "UPDATE `Users` SET `isActive`=:status WHERE `UserID`=:UserID";
        $res = DBController::ExecuteSQL($query, $params);
        if ($res) {
            return array("return_code" => true, "return_data" => "Status updated");
        } else {
            return array("return_code" => false, "return_data" => "Failed to update status");
        }
    }

    function onUserResetPassword($data)
    {
        //check only admin can reset
        if (!isset($_SESSION['UserType']) && $_SESSION['UserType'] != 1) {
            return array("return_code" => false, "return_data" => "Access Denied.Please contact Admin");
        }
        $pwd = rand(100000, 999999);
        $password = hash("sha256", substr($data["u"], 0, 1) . $pwd);
        $params = array(
            array(":UserID", strip_tags($data["id"])),
            array(":Password", $password),
            array(":Username", strip_tags($data['u']))
        );

        $query = "UPDATE `Users` SET  `Password`=:Password  WHERE `UserID`=:UserID and `Username`=:Username";
        $res = DBController::ExecuteSQL($query, $params);
        if ($res) {
            DBController::logs("New Pasword is - " . $pwd);

            return array("return_code" => true, "return_data" => "New Pasword is - " . $pwd);
        } else {
            return array("return_code" => false, "return_data" => " Could not generate New password.Please check and try again.");
        }
    }

    function getContactedCustomerByDate($data)
    {
        $params = array(
            array(":ContactedDateTime", $data["ContactedDateTime"])
        );
        $query = "SELECT vc.ContactNo,vc.ContactedBy,vc.isDriverContacted,vc.DriverContactedDateTime,vi.VehicleRegistrationNo,vi.DriverName,vi.CurrentOwnerName,vm.VehicleManufactureBy  from Vehicles_Contacted vc 
	            inner join Vehicles_Info vi  on vi.VehicleID  = vc.VehicleID
	            inner join Vehicles_Made vm on vm.VehicleMadeID  = vi.VehicleMadeID 
	            where DATE(vc.ContactedDateTime) =:ContactedDateTime";
        $res = DBController::getDataSet($query, $params);
        if ($res) {
            return array("return_code" => true, "return_data" => $res);
        } else {
            return array("return_code" => false, "return_data" => "No contacted customer found on this date");
        }
    }

    function changeDriverAvailableStatus($data)
    {
        $params = array(
            array(":VehicleID",  $_SESSION["VehicleID"]),
            array(":Status",  $data["Status"]),
        );

        $query = "UPDATE Vehicles_Contacted SET isDriverAvailable=:Status
            WHERE  VehicleID=:VehicleID AND  Date(ContactedDateTime)= current_date();";
        $result = DBController::ExecuteSQL($query, $params);
        if ($result) {
            return array("return_code" => true, "return_data" => "Updated The Status");
        }
        return array("return_code" => false, "return_data" => []);
    }

    
}
