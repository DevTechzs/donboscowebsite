<?php
ob_start();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
//error_reporting(E_ALL);
ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '../app/data/session'));

//ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/www/app.techz.in/app/data/session'));
//session_id(md5(getenv('HTTP_CLIENT_IP') ?: getenv('HTTP_X_FORWARDED_FOR') ?: getenv('HTTP_X_FORWARDED') ?: getenv('HTTP_FORWARDED_FOR') ?: getenv('HTTP_FORWARDED') ?: getenv('REMOTE_ADDR')));
session_start();
header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Origin:  https://vta.techz.in:443');

header("Accept: text/html; charset=UTF-8");
header("Content-type: text/html; charset=UTF-8");
header('Cache-Control: max-age=86400');
header('HTTP/2 200 Success');
header("Status: 200");
header("Server: MAC_OS_X");
header("Developer: Iewduh Techz Private Limited");
date_default_timezone_set('Asia/Kolkata');

// set to the user defined error handler
$old_error_handler = set_error_handler("myErrorHandler");

if (isset($_SERVER["HTTP_COOKIE"])) {
    header("HTTP_COOKIE: " . $_SERVER["HTTP_COOKIE"]);
}
if (isset($_SERVER["Cookie"])) {
    header("Cookie: " . $_SERVER["Cookie"]);
}

if (isset($_SESSION["UserType"]) && $_SESSION["UserType"] == 1) {
    define("VIEWPATH", "../app/views/admin");
} elseif (isset($_SESSION["UserType"]) && $_SESSION["UserType"] == 4) {
    define("VIEWPATH", "../app/views/admission");
} elseif (isset($_SESSION["UserType"]) && $_SESSION["UserType"] == 2) {
    define("VIEWPATH", "../app/views/staff");
} else {
    define("VIEWPATH", "../app/views");
}

$data = json_decode(file_get_contents("php://input"), true);
parse_str($_SERVER["QUERY_STRING"], $query_array);



use app\misc\MSC;
use app\database\DBController;
use app\modules\student\StudentController;

if (!isset($data["JSON"])) {
    $data["JSON"] = "";
}
if (!isset($data["Page_key"])) {
    $data["Page_key"] = "";
}
// echo getcwd();
require_once("vendor/autoload.php");

// DBController::logs(json_encode($_SERVER));

// IPLogger::logIP($data);

if (isset($data["Module"]) && isset($data["Page_key"]) && isset($data["JSON"])) {

    header('HTTP/1.1 200 Success');
    header("Status: 200");

    $result = array("return_code" => false);


    if (isset($data["Module"])) {
        switch ($data["Module"]) {


            case "Student":
                $result = (new StudentController())->Route($data);
                break;

            default:
                $result = array("return_code" => false, "return_data" => array("Module key not found"));
                session_destroy();
                header('HTTP/1.1 401  Unauthorized Access');
                header("Status: 401 ");
                break;
        }

        $result['Module'] = $data["Module"];
        $result['Page_key'] = $data["Page_key"];
    } else {

        switch ($data["Module"]) {



            default:
                //$result = (new ProductsController())->Route($data);
                $result = array("return_code" => false, "return_data" => array("Key not found"));

                // $result = (new AuthenticationController)->Route($data);
                break;
        }

        $result['Module'] = $data["Module"];
        $result['Page_key'] = $data["Page_key"];
    }

    DBController::CloseDB();
    echo json_encode($result);
    exit();
} else if (isset($query_array['path'])) {
    publicRequests($query_array);
} else {

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

        header("Content-type: */*;");
        header('HTTP/1.1 404 Not Found'); //This may be put inside 404.php instead
        echo json_encode(array("ERROR" => 404));
    } else {
        header("Content-type: text/html;");
        header('Location: login');
        echo "<script>window.location.href = '/login'</script>";
        exit;
    }
} //Do not do any more work in this script.

function publicRequests($query_array)
{
    switch ($query_array["path"]) {
        case "home":
            require_once("pages/home.php");
            break;
            // case "learningmanagementsystem":
            //     require_once("pages/learningmanagementsystem.php");
            //     break;
        case "aboutus":
            require_once("pages/aboutus.php");
            break;

        case "salesian":
            require_once("pages/salesian.php");
            break;

        case "achievements":
            require_once("pages/achievements.php");
            break;


        case "faculty":
            require_once("pages/faculty.php");
            break;

        case "activities":
            require_once("pages/activities.php");
            break;


        case "socialprogram":
            require_once("pages/socialprogram.php");
            break;


        case "admission":
            require_once("pages/admission.php");
            break;

        case "result":
            require_once("pages/result.php");
            break;

        case "gallery-image":
            require_once("pages/gallery-image.php");
            break;

        case "gallery-video":
            require_once("pages/gallery-video.php");
            break;

        case "contact":
            require_once("pages/contactus.php");
            break;

        case "sitemap.xml":
            require_once("pages/sitemap.php");
            break;

        case "thank-you":
            require_once("pages/thankyou.php");
            exit();

        case "robots":
            require_once("pages/robots.txt");
            break;


            //END OF BLOGS

        default:
            //check if their is any array 
            if (strpos($query_array["path"], "-") > 0) {
                $arr = explode("-", $query_array["path"]);
                switch ($arr[0]) {

                    case "schoolerp":
                        if (!empty($arr[2])) {
                            $_SESSION["city"] =  $arr[2];
                        } else {
                            $_SESSION["city"] = "Shillong";
                        }
                        if (!empty($arr[1])) {
                            $_SESSION["state"] =  $arr[1];
                        } else {
                            $_SESSION["state"] = "Meghalaya";
                        }

                        require_once("pages/schoolerp.php");
                        break;
                    case "careerapply":
                        if (!empty($arr[1])) {
                            $_SESSION["CareerID"] = $arr[1];
                            require_once("pages/careerapply.php");
                        } else {
                            include '404.php';
                        }

                        break;

                    default:
                        // DBController::logs( "Invalid Page request :: " . $query_array["path"]);
                        header("Content-type: */*;");
                        header('HTTP/1.1 404 '); //This may be put inside 404.php instead
                        $_GET['e'] = 404; //Set the variable for the error code (you cannot have a
                        // querystring in an include directive).
                        include '404.php';
                }
            } else {
                // DBController::logs( "Invalid Page request :: " . $query_array["path"]);
                header("Content-type: */*;");
                header('HTTP/1.1 404 '); //This may be put inside 404.php instead
                $_GET['e'] = 404; //Set the variable for the error code (you cannot have a
                // querystring in an include directive).
                include '404.php';
            }
    }
}

function load($path)
{
    try {
        if (!@include_once($path)) // @ - to suppress warnings, 
            // you can also use error_reporting function for the same purpose which may be a better option
            throw new Exception($path . ' does not exist');
        // or 
        if (!file_exists($path))
            throw new Exception($path . ' does not exist');
        else
            require_once($path);
    } catch (Exception $e) {
        echo "Message : " . $e->getMessage();
        echo "Code : " . $e->getCode();
        include '404.php';
    }
}

// error handler function
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting, so let it fall
        // through to the standard PHP error handler
        return false;
    }

    // $errstr may need to be escaped:
    $errstr = htmlspecialchars($errstr);

    $errormessage = "";

    switch ($errno) {
        case E_USER_ERROR:
            $errormessage .= "<b>My ERROR</b> [$errno] $errstr\n";
            $errormessage .=  "  Fatal error on line $errline in file $errfile\n";
            $errormessage .=  "Aborting...<br />\n";
            DBController::logs($errormessage);
            exit(1);

        case E_USER_WARNING:
            $errormessage .=  "<b>My WARNING</b> [$errno] $errstr<br />\n";
            $errormessage .=  "  Fatal error on line $errline in file $errfile\n";
            $errormessage .=  "Aborting...<br />\n";
            break;

        case E_USER_NOTICE:
            $errormessage .=  "<b>My NOTICE</b> [$errno] $errstr<br />\n";
            $errormessage .=  "  Fatal error on line $errline in file $errfile\n";
            $errormessage .=  "Aborting...<br />\n";
            break;
        case E_ERROR:
            $errormessage .=  "<b>File missing</b> [$errno] $errstr<br />\n";
            $errormessage .=  "  Fatal error on line $errline in file $errfile\n";
            $errormessage .=  "Aborting...<br />\n";
            break;

        default:
            $errormessage .=  "Unknown error type: [$errno] $errstr<br />\n";
            $errormessage .=  "  Fatal error on line $errline in file $errfile\n";
            $errormessage .=  "Aborting...<br />\n";

            DBController::logs($errormessage);
            exit(1);
            break;
    }

    DBController::logs($errormessage);
    /* Don't execute PHP internal error handler */
    return true;
}
