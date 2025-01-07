<?php
// Enable error reporting for debugging
ob_clean();
flush();
require_once("../config/query.php");
require_once("../config/connection.php");
require_once("../functions/name.php");
require_once("../functions/yearcat.php");
require_once("../functions/counterClass.php");
$query = new query;
$member = new memberName($con, $query);
$yearcat = new yearcat($con, $query);
$counterClass = new counterClass($con, $query);

error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : null;
    $attempt = isset($_POST['attempt']) ? $_POST['attempt'] : null;
    if ($action === 'member') {
        switch ($attempt) {
            case 'addNew':
                $response = $member->memberSubmit($_POST, $_FILES);
                break;
            case 'update':
                $response = $member->updateMember($_POST, $_FILES);
                break;
            default:
                $response = [
                    "success" => false,
                    "message" => "Invalid attempt specified."
                ];
        }
    } else if ($action === "yearCat") {

        switch ($attempt) {
            case "addYear":
                $response = $yearcat->catyearSubmit("year", $_POST["yearName"], "year.Year");
                break;
            case "addCat":
                $value = $_POST['catName'];
                $response = $yearcat->catyearSubmit("category", "'$value'", "category.Category");
                break;
            case "addSub":
                $subName = $_POST["subName"];
                $cat_id = $_POST["cat_id"];
                $response = $yearcat->catyearSubmit("subcategory", "'$subName','$cat_id'", "SubCategory,id_cat");
                break;
            default:
                $response = [
                    "success" => false,
                    "message" => "Invalid attempt specified."
                ];
        }
    } else if ($action === "Counter") {
        //SELECT countid,name,count FROM `counter` INNER join name ON name.id = counter.id_name WHERE Year_id =2024;
        switch ($attempt) {
            case "addNew":
                $response = $counterClass->addNewCounter($_POST['year'], $_POST['nameId'], $_POST['log']);
                break;
            case 'addArchieve':
                $response = $counterClass->archiveUpload($_POST['year'], $_POST['nameId'], $_POST['count']);
                break;
            case 'Update':
                $response = $counterClass->counterUpdate($_POST['item'], $_POST['quantity'], $_POST['log'], $_POST['act']);
                break;
            default:
                $response = [
                    "success" => false,
                    "message" => $_POST
                ];
        }
    } else {
        // Invalid action
        $response = [
            "success" => false,
            "message" => $_POST
        ];
    }

    // Always output the response as JSON
    echo json_encode($response);
} else {
    // Handle invalid request method
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}
