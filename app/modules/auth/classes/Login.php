<?php
   
    /**  Current Version: 1.0.0
     *  Createdby : Angelbert (01/02/2024)
     *  Created On:
     *  Modified By: 
     *  Modified On:
    */
namespace app\modules\auth\classes;
use \app\database\DBController;

class Login
{
     /**
     * parameters{Username,Password,FCMToken}
     *  Description: request for login
     *  Createdby : 
     *  Updates:
     *    07-02-2024 (Angelbert):  Adding the commenting format   
     * 
     */
    function requestLogin($data)
    {
 
        $params = array(
            array(":Username", strip_tags($data["Username"])),
            array(":Password", hash("sha256", substr($data["Username"], 0, 1) . strip_tags($data["Password"])))
        );
        
        $query = "SELECT * FROM Users WHERE Username = :Username AND Password = :Password";

        $res = DBController::sendData($query, $params);

        if ($res && $res['UserID']) {

            $sessionkey = substr(md5(mt_rand()), 0, 32);

            $sessionkeyexpirydatetime = new \DateTime();
            $sessionkeyexpirydatetime->modify('next month');

            $params = array(
                array(":userid", $res['UserID']),
                array(":sessionkey", $sessionkey),
                array(":sessionkeyexpirydatetime", $sessionkeyexpirydatetime->format('Y-m-d H:i:s')),
                array(":ipaddress", $_SERVER['REMOTE_ADDR']),
                array(":isSuccessfull", 1),
                array(":isActive", 1)
            );

            $query = "INSERT INTO LoginDetails(UserID, SessionKey, SessionExpiryDateTime, IPAddress, isSuccessfull, isActive) 
                VALUES (:userid,:sessionkey,:sessionkeyexpirydatetime,:ipaddress,:isSuccessfull,:isActive)";
            if (DBController::ExecuteSQL($query, $params)) { 
                // $_SESSION['StaffID'] = $res['StaffID'];
                $_SESSION['UserID'] = $res['UserID'];
                $_SESSION['SessionKey'] = $sessionkey;
                $_SESSION['Username'] = $data['Username'];
                $_SESSION['UserType'] = $res['UserType'];

                if ($_SESSION['UserType']==1) {
                    $nextpage="dashboard";
                }else if($_SESSION['UserType']==2){
                    $nextpage="home";
                }else if($_SESSION['UserType']==3){
                    $nextpage="user";
                }

                if (isset($data['FCMToken'])){
                    $params = array(
                        array(":FCMToken", strip_tags($data['FCMToken'])),
                        array(":UserID", $res['UserID'])
                    );
                    $query = "UPDATE Users SET FCMToken=:FCMToken WHERE UserID=:UserID";
                    DBController::ExecuteSQL($query, $params);
                }

                return array("return_code" => true, "return_data" => array( "Name" => $res['Name'],"Username" => $data['Username'],"SessionKey" => $sessionkey, "SessionExpiryDate" => $sessionkeyexpirydatetime->format('Y-m-d H:i:s'),"UserType"=>$res['UserType'], "nextPage" => $nextpage));
            }
        }
        return array("return_code" => false, "return_data" =>  "Username or Password does not match");
    }

    function requestAppLogin($data)
    {
       
         //check for logins attempt
        $OTPID = -1;
        if(isset($data["OTP"])){

           // if( isset($_SESSION["Login_OTP"])  && ($_SESSION["Login_OTP"] == $data["OTP"]) ){
                //compare from the database that this OTP belongs to the specific users
                //OTP 
                //get the OTP and USER ID 
                $params1 = array(
                    array(":OTP", $data["OTP"]) 
                 );
                $query1 = "SELECT * FROM Users_OTP WHERE OTP = :OTP and Validity >= curdate()  and isUsed=0  LIMIT 1 ";  
                $otpinfo = DBController::sendData($query1, $params1);

                if(!$otpinfo){
                    DBController::logs("Not available in OTP Table");
                    return array("return_code" => false, "return_data" =>  "Not a valid OTP");

                }
                if($data["OTP"] != $otpinfo["OTP"]){
                    DBController::logs("Not Matching from the table Value ".$otpinfo["OTP"]); 
                  return array("return_code" => false, "return_data" =>  "Not a valid OTP");

                } 
               $OTPID = $otpinfo["OtpID"];   
                $params = array(
                    array(":UserID", $otpinfo["UserID"]) 
                 ); // AND UserType<>1
                $query = "SELECT * FROM Users WHERE UserID = :UserID  AND IFNULL(isActive,0) =1 AND UserType<>1  LIMIT 1"; 
            // }
            // else{
            //     return array("return_code" => false, "return_data" =>  "Not a valid OTP"); 
            // }
        }
        else
        { 
            if(!isset($data["Password"]) || !isset($data["Username"]))
                 return array("return_code" => false, "return_data" =>  "Some parameters are missing");

            $res = (new Users())->isUsernameExists(["Username" => $data["Username"]]);
            if (!$res['return_code'])
                return array("return_code" => false, "return_data" =>  "Invalid Credentials.");
    
            $params = array(
                array(":Username", $data["Username"]),
                array(":Password", hash("sha256", substr($data["Username"], 0, 1) . $data["Password"]))
            ); 
            $query = "SELECT * FROM Users WHERE UserType<>1 AND (Username = :Username OR ContactNo= :Username)  AND Password = :Password AND IFNULL(isActive,0) =1 LIMIT 1;";
        }
    
        $res = DBController::sendData($query, $params);
        if ($res && $res['UserID']) {

            //if muptlipe login is allowed or not (only for the app) // and the request is from Web or App
           //angelbert Riahtam  

            if($res['isMultipleAppLogin']==0) //not allow (APP)
                {
                    //check from  which devide request come
                    $userAgent = $_SERVER['HTTP_USER_AGENT'];
                    if (preg_match('/(android|iphone|ipad|opera mini|webos|blackberry|mobile)/i', $userAgent)) 
                    {
                        //mobile
                        //check if already have entry from phone
                        $param=array(
                            array(":UserID",$res['UserID'])
                        );
                        //count all the active login for that person and from App 
                        $query="SELECT COUNT(*) as TotalActive FROM `LoginDetails` where UserID=:UserID  and  `isActive`=1 and DeviceInformation REGEXP '(android|iphone|ipad|opera mini|webos|blackberry|mobile)/i';";
                        $TotalActiveDevice=DBController::sendData($query,$param);
                        if($TotalActiveDevice['TotalActive']>=1)
                        {
                            return array("return_code" => false, "return_data" =>  "Error!! You are Already Login in another device. Please logout from all device or Please contact school."); 
                        }
                    }
                } 
        


            $sessionkey = substr(md5(mt_rand()), 0, 32); 
            $sessionkeyexpirydatetime = new \DateTime();
             $sessionkeyexpirydatetime->modify('+1 year'); //TO CHECK  TO DO Never add like this 

         
          //end of checking 
          $currentYear = date("Y");
            $params = array(
                array(":userid", $res['UserID']),
                array(":sessionkey", $sessionkey),
                array(":sessionkeyexpirydatetime", $sessionkeyexpirydatetime->format('Y-m-d H:i:s')),
                array(":ipaddress", $_SERVER['REMOTE_ADDR']),
                array(":isSuccessfull", 1),
                array(":isActive", 1),
                array(":SessionID", $currentYear),
                array(":DeviceInformation", isset($_SERVER["HTTP_USER_AGENT"])?$_SERVER["HTTP_USER_AGENT"]:json_encode(array()))

            );

            $query = "INSERT INTO LoginDetails(UserID, SessionKey, SessionExpiryDateTime, IPAddress, isSuccessfull, isActive,SessionID,DeviceInformation) 
                VALUES (:userid,:sessionkey,:sessionkeyexpirydatetime,:ipaddress,:isSuccessfull,:isActive,:SessionID,:DeviceInformation)";

            $logindetailsid=DBController::ExecuteSQLID($query, $params);

            if ($logindetailsid) {
                $profilephoto="";
                $_SESSION['UserID'] = $res['UserID'];
                $_SESSION['SessionKey'] = $sessionkey;
                $_SESSION['Username'] = $data['Username'];
                $_SESSION['PersonName'] = $res['Name'];
                $_SESSION['UserType'] = $res['UserType']; 
                $_SESSION['VehicleID'] = $res['VehicleID']; 

                if (isset($data['FCMToken'])) {
                    $params = array(
                        array(":FCMToken", $data['FCMToken']),
                        array(":UserID", $res['UserID'])
                    );

                    $query = "UPDATE Users SET FCMToken=:FCMToken WHERE UserID=:UserID";

                    DBController::ExecuteSQL($query, $params);
                } 
                //aaded by Dev for extracting isDriverAvailable for first Time login 
                $query="SELECT vc.isDriverAvailable FROM Vehicles_Contacted vc  INNER JOIN  Users u ON u.VehicleID = vc.VehicleID";
                $isDriverAvailable=DBController::sendData($query);
               return array("return_code" => true, "return_data" => array("Name" => $res['Name'], "Username" => $data['Username'], "SessionKey" => $sessionkey, "SessionExpiryDate" => $sessionkeyexpirydatetime->format('Y-m-d H:i:s'), "UserType" => $res['UserType'],   "UserID"=> $res['UserID']."","LoginDetailsID"=> $logindetailsid, "ContactNo"=> $res['ContactNo'],"isDriverAvailable"=> $isDriverAvailable['isDriverAvailable']));
            }
        }
        (new Session())->setLoginAttempt();
        return array("return_code" => false, "return_data" =>  "Invalid Credentials");
    }

}
