<?php

namespace app\modules\vehicle;

use app\core\Controller;
use \app\database\DBController;
use app\modules\vehicle\classes\Vehicle;




class VehicleController implements Controller
{

    function Route($data)
    {
        $jsondata = $data["JSON"];
        switch ($data["Page_key"]) {
                //for user class
            case 'getVehicleType':
                $result = (new Vehicle())->getVehicleType();
                break;

            case 'getVehicleManufacturer':
                $result = (new Vehicle())->getVehicleManufacturer();
                break;

            case 'getVehicleModel':
                $result = (new Vehicle())->getVehicleModel();
                break;

            case 'getLocation':
                $result = (new Vehicle())->getLocation();
                break;

            case 'addVehicle':
                $result = (new Vehicle())->addVehicle($jsondata);
                break;
            case 'getRequestedForRegisterVehicle':
                $result = (new Vehicle())->getRequestedForRegisterVehicle();
                break;


            case 'getVehiclesByLocationID':
                $result = (new Vehicle())->getVehiclesByLocationID($jsondata);
                break;

            case 'approvedVehicleRegistration':
                $result = (new Vehicle())->approvedVehicleRegistration($jsondata);
                break;

            case 'rejectedVehicleRequest':
                $result = (new Vehicle())->rejectedVehicleRequest($jsondata);
                break;


            case 'getVehicleContactNo':
                $result = (new Vehicle())->getVehicleContactNo($jsondata);
                break;
            case 'getContactedCustomersDetail':
                $result = (new Vehicle())->getContactedCustomersDetail();
                break;
            case 'updateContactedVehicle':
                $result = (new Vehicle())->updateContactedVehicle($jsondata);
                break;
            case 'removeContactedVehicle':
                $result = (new Vehicle())->removeContactedVehicle($jsondata);
                break;

            case 'getVehicleInfo':
                $result = (new Vehicle())->getVehicleInfo();
                break;

            case 'getAllUsers':
                $result = (new Vehicle())->getAllUsers();
                break;

            case 'changeActiveStatus':
                $result = (new Vehicle())->changeActiveStatus($jsondata);
                break;
            case 'onUserResetPassword':
                $result = (new Vehicle())->onUserResetPassword($jsondata);
                break;


            case 'getContactedCustomerByDate':
                $result = (new Vehicle())->getContactedCustomerByDate($jsondata);
                break;
            case 'changeDriverAvailableStatus':
                $result = (new Vehicle())->changeDriverAvailableStatus($jsondata);
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
