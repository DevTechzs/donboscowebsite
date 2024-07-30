<?php

/**  Current Version: 1.0.0
 *  Createdby : Dev (12/07/2024)
 *  Created On:
 *  Modified By: 
 *  Modified On:
 */

namespace app\modules\student\classes;

use \app\database\DBController;
use \app\database\Helper;


class Student
{

    public function getTodayBirthdayList()
    {
        $url = "https://dbhssmit.prayagedu.com/api/getBirthdayList.php";

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url); // URL to fetch
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Return the transfer as a string
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Timeout after 30 seconds

        // Execute cURL session and fetch response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            return array("return_code" => false, "return_data" => "cURL error: " . $error_msg);
        }

        // Close cURL session
        curl_close($ch);

        // Decode the JSON response
        $res = json_decode($response, true);

        // Return the result
        return array("return_code" => true, "return_data" => $res);
    }
}
