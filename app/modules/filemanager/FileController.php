<?php

namespace app\modules\filemanager;

use app\database\DBController;
use app\misc\AES;
// use app\misc\GenerateQR;
// use app\misc\Sodium;
// use app\misc\VideoStream; 
use app\modules\settings\classes\Session;

class FileController
{
    static function File()
    {
        $imagetypes = array("zeroindex", "jpeg", "jpg", "png", "svg", "tiff");
        $documenttypes = array("zeroindexdoc", "doc", "docx", "pdf", "html", "xls", "xlsx", "txt");

        $path = "../app/data/";
        $filetype = strtolower($_GET['type']);

        switch ($filetype) {
            case "cv":
                self::loadDocument($path . "cv/" . $_GET['name']);
                break;
            case 'image':
                $file = $path . "images/" . $_GET['name'];
                if (!isset($_GET['name']) || $_GET['name'] == null || $_GET['name'] == '') {
                    header("HTTP/1.0 404 Not Found");
                    exit;
                }
                if (file_exists($file)) {
                    header('HTTP/1.0 200 OK');
                    header('Content-Description: Image Transfer');
                    header('Content-Type: image/' . strtolower(substr(strrchr(basename($file), "."), 1)));
                    // header('Content-Disposition: attachment; filename="' . preg_replace("/\.[^.]+$/", "", basename($file)) . '"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    readfile($file);
                    exit;
                } else {
                    header("HTTP/1.0 404 Not Found");
                    exit;
                }
                break;

            case 'qr':
                $file = $path . "qr/" . $_GET['name'];
                self::loadDocument($file);
                break;

                //  case 'others': 
            case 'student':
            case 'fatherphoto':
            case 'guardianphoto':
            case 'attendancephoto':
                $file = $path . $filetype . "/" . $_GET['name'];
                FileController::loadDocument($file);
                break;

            case 'document':
                $file = $path . "documents" . "/" . $_GET['name'];
                self::loadDocument($file);
                exit;

                if (file_exists($file)) {
                    header('HTTP/1.0 200 OK');
                    header('Content-Description: Document transfer');
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    if (array_search($extension, $imagetypes) != false && array_search($extension, $imagetypes) >= 0) {
                        header('Content-Type: image/' . strtolower(substr(strrchr(basename($file), "."), 1)));
                    } else if (array_search($extension, $documenttypes) != false && array_search($extension, $documenttypes) >= 0) {
                        if ($extension == "xlsx") {
                            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                        } else if ($extension == "xls") {
                            header('Content-Type: application/vnd.ms-excel');
                        } else header('Content-Type: application/' . strtolower(substr(strrchr(basename($file), "."), 1)));
                    } else {
                        header('Content-Type: ' . mime_content_type($file));
                    }

                    // header('Content-Disposition: attachment; filename="' . preg_replace("/\.[^.]+$/", "", basename($file)) . '"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    readfile($file);
                    exit;
                } else {
                    header("HTTP/1.0 404 Not Found");
                }
                break;




            case 'letters':
                $file = $path . "letters" . "/" . $_GET['name'];
                self::loadDocument($file);
                exit;

            case 'rc':
                $file = $path . "rc" . "/" . $_GET['name'];
                self::loadDocument($file);
                exit;

            case 'driverlicence':
                $file = $path . "driverlicence" . "/" . $_GET['name'];
                self::loadDocument($file);
                exit;













                // for elearning only (Not to be confuse with 'document' as mention above)
            case 'documents':
                $file = $path . "elearning/" . $_GET['sid'] . '/' . $_GET['cid'] . '/documents/' . $_GET['name'];
                if (file_exists($file)) {
                    header('HTTP/1.0 200 OK');
                    header('Content-Type: application/' . strtolower(substr(strrchr(basename($file), "."), 1)));
                    // header('Content-Disposition: attachment; filename="' . preg_replace("/\.[^.]+$/", "", basename($file)) . '"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    readfile($file);
                    exit;
                } else {
                    header("HTTP/1.0 404 Not Found");
                }
                break;

            case 'grievance':

                $file = $path . "grievance/" . $_GET['sid'] . '/' . $_GET['name'];
                if (file_exists($file)) {
                    header('HTTP/1.0 200 OK');
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    if (array_search($extension, $imagetypes) != false && array_search($extension, $imagetypes) >= 0) {
                        header('Content-Type: image/' . strtolower(substr(strrchr(basename($file), "."), 1)));
                        // header('Content-Type: image/' .$extension);  // strtolower(substr(strrchr(basename($file), "."), 1))
                    } else if (array_search($extension, $documenttypes) != false && array_search($extension, $documenttypes) >= 0) {
                        //  header('Content-Disposition: attachment; filename="' . preg_replace("/\.[^.]+$/", "", basename($file)) . '"');
                        header('Content-Type: application/' . strtolower(substr(strrchr(basename($file), "."), 1)));
                    } else {
                        header('Content-Type: ' . mime_content_type($file));
                    }
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    readfile($file);
                    exit;
                } else {
                    header("HTTP/1.0 404 Not Found");
                }
                break;

            case 'examination':
                $file = $path . "examination/" . $_GET['name'];
                if (file_exists($file)) {
                    header('HTTP/1.0 200 OK');
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    if (array_search($extension, $imagetypes) != false && array_search($extension, $imagetypes) >= 0) {
                        header('Content-Type: image/' . strtolower(substr(strrchr(basename($file), "."), 1)));
                    } else if (array_search($extension, $documenttypes) != false && array_search($extension, $documenttypes) >= 0) {
                        header('Content-Type: application/' . strtolower(substr(strrchr(basename($file), "."), 1)));
                        //  header('Content-Disposition: attachment; filename="' . preg_replace("/\.[^.]+$/", "", basename($file)) . '"');
                    } else {
                        header('Content-Type: ' . mime_content_type($file));
                    }
                    // header('Content-Disposition: attachment; filename="' . preg_replace("/\.[^.]+$/", "", basename($file)) . '"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    readfile($file);
                    exit;
                } else {
                    header("HTTP/1.0 404 Not Found");
                }
                break;
                /* TC section starts here */
            case 'tc':
                $file = $path . "tc/" . $_GET['name'];
                if (file_exists($file)) {
                    header('HTTP/1.0 200 OK');
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    if (array_search($extension, $imagetypes) != false && array_search($extension, $imagetypes) >= 0) {
                        header('Content-Type: image/' . strtolower(substr(strrchr(basename($file), "."), 1)));
                    } else if (array_search($extension, $documenttypes) != false && array_search($extension, $documenttypes) >= 0) {
                        header('Content-Type: application/' . strtolower(substr(strrchr(basename($file), "."), 1)));
                        //  header('Content-Disposition: attachment; filename="' . preg_replace("/\.[^.]+$/", "", basename($file)) . '"');
                    } else {
                        header('Content-Type: ' . mime_content_type($file));
                    }
                    // header('Content-Disposition: attachment; filename="' . preg_replace("/\.[^.]+$/", "", basename($file)) . '"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    readfile($file);
                    exit;
                } else {
                    header("HTTP/1.0 404 Not Found");
                }
                break;
                /* TC section ends here */

                /* Gallery section starts here */
            case 'gallery':
                $file = $path . "gallery/" . $_GET['name'];
                if (file_exists($file)) {
                    header('HTTP/1.0 200 OK');
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    if (array_search($extension, $imagetypes) != false && array_search($extension, $imagetypes) >= 0) {

                        header('Content-Type: image/' . strtolower(substr(strrchr(basename($file), "."), 1)));
                    } else if (array_search($extension, $documenttypes) != false && array_search($extension, $documenttypes) >= 0) {

                        header('Content-Type: application/' . strtolower(substr(strrchr(basename($file), "."), 1)));
                        //  header('Content-Disposition: attachment; filename="' . preg_replace("/\.[^.]+$/", "", basename($file)) . '"');
                    } else {

                        header('Content-Type: ' . mime_content_type($file));
                    }
                    // header('Content-Disposition: attachment; filename="' . preg_replace("/\.[^.]+$/", "", basename($file)) . '"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));

                    readfile($file);
                    exit;
                } else {
                    header("HTTP/1.0 404 Not Found");
                }
                break;
                /* Gallery section ends here */

                /* Custom Notice section starts here */
            case 'notice':
                $file = $path . "notice/" . $_GET['name'];
                if (file_exists($file)) {
                    header('HTTP/1.0 200 OK');
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    if (array_search($extension, $imagetypes) != false && array_search($extension, $imagetypes) >= 0) {
                        header('Content-Type: image/' . strtolower(substr(strrchr(basename($file), "."), 1)));
                    } else if (array_search($extension, $documenttypes) != false && array_search($extension, $documenttypes) >= 0) {
                        header('Content-Type: application/' . strtolower(substr(strrchr(basename($file), "."), 1)));
                        //  header('Content-Disposition: attachment; filename="' . preg_replace("/\.[^.]+$/", "", basename($file)) . '"');
                    } else {
                        header('Content-Type: ' . mime_content_type($file));
                    }
                    // header('Content-Disposition: attachment; filename="' . preg_replace("/\.[^.]+$/", "", basename($file)) . '"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    readfile($file);
                    exit;
                } else {
                    header("HTTP/1.0 404 Not Found");
                }
                break;
                /* Custom Notice section ends here */
            case 'log':
                $file = "../log.txt";
                if (file_exists($file)) {
                    header('HTTP/1.0 200 OK');
                    header('Content-Type: text/plain');
                    // header('Content-Disposition: attachment; filename="' . preg_replace("/\.[^.]+$/", "", basename($file)) . '"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    readfile($file);
                    exit;
                } else {
                    header("HTTP/1.0 404 Not Found");
                }
                break;
            default:
                // session_destroy();
                include '404.php';
                header('HTTP/1.1 401  Unauthorized Access');
                header("Status: 401 ");
                break;
        }
    }

    static function loadDocument($file)
    {

        $imagetypes = array("zeroindex", "jpeg", "jpg", "png", "svg", "tiff");
        $documenttypes = array("zeroindexdoc", "doc", "docx", "pdf", "html", "xls", "xlsx", "txt");

        $path = "../app/data/";
        if (file_exists($file)) {
            header('HTTP/1.0 200 OK');
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            if (array_search($extension, $imagetypes) != false && array_search($extension, $imagetypes) >= 0) {
                header('Content-Type: image/' . strtolower(substr(strrchr(basename($file), "."), 1)));
            } else if (array_search($extension, $documenttypes) != false && array_search($extension, $documenttypes) >= 0) {
                if ($extension == "xlsx") {
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                } else if ($extension == "xls") {
                    header('Content-Type: application/vnd.ms-excel');
                } else header('Content-Type: application/' . strtolower(substr(strrchr(basename($file), "."), 1)));
            } else {
                header('Content-Type: ' . mime_content_type($file));
            }
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }
}
