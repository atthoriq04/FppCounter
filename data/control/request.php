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
    $action = isset($_POST['act']) ? $_POST['act'] : null;


    switch ($action) {
        case 'getLog':
            $response = $counterClass->getLog($_POST['id']);
            break;
        default:
            $response = ([
                'success' => false,
                'message' => $action
            ]);
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
