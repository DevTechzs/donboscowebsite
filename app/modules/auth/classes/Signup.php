<?php

/**  Current Version: 1.0.0
 *  Createdby : Angelbert (01/02/2024)
 *  Created On:
 *  Modified By: 
 *  Modified On:
 */

namespace app\modules\auth\classes;

use app\database\DBController;
use app\misc\SMS;

class Signup
{
    /**
     * parameters{Username,Name,ContactNo,EmailID,StaffID(used both for Staff and Intern),UserType,ValidateUsernameOnly}
     *  Description: request for SignUp
     *  Createdby : Angelbert (01/02/2024)
     *  Updates:
     *    07-02-2024 (Angelbert):  Adding the commenting format   
     * 
     */
    function request($data)
    {
        //check only based on UserName
        if (isset($data["ValidateUsernameOnly"]) &&  $data["ValidateUsernameOnly"] == true) {
            $user = (new Users())->isUsernameExists($data);
            if ($user["return_code"] == true) {
                return array("return_code" => false, "return_data" => "UserExists");
            }
        } else {
            // check based on {EmailID and ContactNo}
            $user = (new Users())->exists($data);
            $user = $user['return_data'];

            if ($user) {
                if (isset($user["ContactNo"]) && ($user["ContactNo"] == $data["ContactNo"])) {
                    return array("return_code" => false, "return_data" =>  "Contact No Already Exists!!", "ExistsType" => 1);
                }
            }
        }

        $password = rand(100000, 999999);
        $isActive = false;
        if (!isset($data["UserType"])) {
            $data["UserType"] = 2;
            $isActive = true;
        }

        //assign the staff and intern id

        $params = array(
            array(":Name", strip_tags($data["Name"])),
            array(":Username",  strip_tags($data["Username"])),
            array(":Password", hash("sha256", substr($data["Username"], 0, 1) . $password)),
            array(":ContactNo", strip_tags($data["ContactNo"])),
            array(":UserType", strip_tags($data["UserType"])),
            array(":isActive", 1),
            array(":SessionID", 1),
            array(":VehicleID",strip_tags($data['VehicleID'])),
        );
        $query = "INSERT INTO `Users`(`Name`, `Username`, `Password`,`ContactNo`, `UserType`, `isActive`, `SessionID`,`VehicleID`)
        VALUES (:Name,:Username,:Password,:ContactNo,:UserType,:isActive,:SessionID,:VehicleID)";
        $array = DBController::ExecuteSQLID($query, $params);
        if ($array) {
            // DBController::logs("New user created :" . $data["Name"]);
            DBController::logs("New User Created UserName ::: " . $data["Username"] . "Password :::" . $password);
            //DISABLE
            //check if SMS is enable (USER SMS) 

            SMS::SendSms(
                "Signup",
                $data["ContactNo"],
                [
                    "personname" => $data["Name"],
                    "applicationname" => "VehiclesApp",
                    "username" =>   $data["Username"],
                    "password" =>   $password,
                    "regards" =>  "MeghMyTrip"
                ]
            );

            return array("return_code" => true, "return_data" => "User Successfully Created");
        }
    }

    function  createUser($data)
    {
        //$usernameparam =   array(":Username" => $data["Username"]);
        $user = (new Users())->isUsernameExists($data);
        $user = $user['return_data'];
        if ($user) {
            return array("return_code" => false, "return_data" => "UserExists");
        }
    }
}
