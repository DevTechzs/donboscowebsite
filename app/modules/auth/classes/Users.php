<?php

/**
 *  Current Version: 1.0.0
 *  Created By: Angelbert,  prayagedu@techz.in
 *  Created On: 2-02-2024
 *  Modified By: Angelbert, prayagedu@techz.in
 *  Modified On: (7-01-2024) : checking all the valid function
 */

namespace app\modules\auth\classes;

use app\database\DBController;

class Users
{

    /**
     * paramenters{Username}
     *  Description:  Check if username exist
     *  Createdby : Angelbert (29/01/2024) (Copy from Prayagedu)
     *  Updates: Angelbert(7-2-2024) : Adding the strip_tag, and commenting format 
     *         
     */
    function isUsernameExists($data)
    {
        $params = array(
            array(":Username", strip_tags($data["Username"]))
        );

        $query = "SELECT UserID, Username FROM Users WHERE Username=:Username";
        $user = DBController::sendData($query, $params);
        if ($user) {
            return array("return_code" => true, "return_data" =>  $user);
        }
        return array("return_code" => false, "return_data" => "User does not exists!");
    }

    /**
     * paramenters{EmailID,ContactNo}
     *  Description:  Check if user exist based on EmailID and ContactNo
     *  Createdby : Angelbert (29/01/2024) (Copy from Prayagedu)
     *  Updates: Angelbert(7-2-2024) : Adding the strip_tag, and commenting format 
     *         
     */
    function exists($data)
    {
        
        $params = array(
            array(":ContactNo", strip_tags($data["ContactNo"])),
            array(":Username", strip_tags($data["ContactNo"]))
        );

        $query = "SELECT Username,ContactNo,VehicleID FROM Users WHERE  ContactNo=:ContactNo OR Username=:Username;";
        $user = DBController::sendData($query, $params);

        if ($user) {
            return array("return_code" => true, "return_data" =>  $user);
        }
        return array("return_code" => false, "return_data" => "User does not exists!");
    }



   
}
