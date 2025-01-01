<?php
// Enable error reporting for debugging
require_once("../config/query.php");
require_once("../config/connection.php");
$query = new query;

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize an array to store the received data

    // Capture the name, category, and subcategory values
    $theName = isset($_POST['name']) ? $_POST['name'] : 'No name provided';
    $category = isset($_POST['category']) ? $_POST['category'] : 'No category provided';
    $subCat = isset($_POST['subCat']) ? $_POST['subCat'] : 'No sub-category provided';
    $fileName = "default.png";
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "../../assets/images/";
        $fileName = basename($_FILES['image']['name']);
        $targetFilePath = $targetDir . $fileName;

        // Ensure the directory exists
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // Create the folder with proper permissions
        }
        // Validate file type
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo json_encode([
                "success" => false,
                "message" => "Only image files (JPG, JPEG, PNG, GIF) are allowed.",
            ]);
            exit;
        }

        // Attempt to move the uploaded file
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            echo json_encode([
                "success" => false,
                "message" => "Failed to move uploaded file.",
                "tmpName" => $_FILES['image']['tmp_name'],
                "targetPath" => $targetFilePath,
            ]);
            exit; // Stop if file can't be moved
        }
    } else {
        $filename = "Default.png";
    }
    $receivedDatas = "'$theName','$category','$subCat','$fileName'";
    $needed = "Name , Cat , Sub , Image";
    if ($query->dbInsert($con, "name", $receivedDatas, $needed)) {
        // If the query is successful, return a success message
        echo json_encode([
            "success" => true,
            "message" => "Data uploaded successfully!"
        ]);
        exit;
    } else {
        // If database insertion failed, attempt to delete the uploaded image
        if ($uploadedFile && file_exists($uploadedFile)) {
            unlink($uploadedFile);
        }
        echo json_encode([
            "success" => false,
            "message" => "Failed to insert data into the database",
        ]);
    }
} else {
    // If it's not a POST request, handle the error
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}
        // Extract the uploaded file's name from the form data
