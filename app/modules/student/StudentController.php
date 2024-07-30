<?php

namespace app\modules\student;
use app\core\Controller;
use \app\database\DBController;
use app\modules\student\classes\Student;




class StudentController implements Controller
{

    function Route($data)
    {
        $jsondata = $data["JSON"];
        switch ($data["Page_key"]) {
                //for user class


            case 'getTodayBirthdayList':
                $result = (new Student())->getTodayBirthdayList();
                break;


            default:
                $result = array("return_code" => false, "return_data" => array("Page Key not found"));
                //   session_destroy();
                header('HTTP/1.1 401  Unauthorized Access');
                header("Status: 401 ");
                break;
        }

        return $result;
    }



    public static function Views($page)
    {
        $viewpath = "../app/modules/vehicle/views/";

        switch ($page[1]) {

            case "register":
                load($viewpath . "vehicleregistration.php");
                break;
            case "info":
                load($viewpath . "vehicleinfo.php");
                break;

            case "userlists":
                load($viewpath . "userlists.php");
                break;

            case "contactedcustomers":
                load($viewpath . "contactedcustomer.php");
                break;
                // case "changepassword":
                //     load($viewpath . "changepassword.php");
                //     break;

            default:
                include '404.php';
                header('HTTP/1.1 401  Unauthorized Access');
                header("Status: 401 ");
                break;
        }
    }
}
