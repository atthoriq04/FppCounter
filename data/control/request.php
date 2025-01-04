<?php
require_once("../functions/get.php");
require_once "../config/connection.php";

// Assuming 'get' class requires a connection parameter or the path to the query file.
$dataObj = new get($con); // Ensure correct instantiation of the 'get' class

// Get the raw POST data
$data = json_decode(file_get_contents("php://input"), true);

// Check if the ID exists
if (isset($data['id'])) {
    $id = $data['id'];

    // Fetch logs based on the ID using the getLogs method
    // $logs = $dataObj->getLogs($con, $id);  // Assuming getLogs method doesn't need the connection parameter again

    // Return the logs as JSON
    echo json_encode($id);
} else {
    echo json_encode(['error' => true, 'message' => $data['id']]);
}
