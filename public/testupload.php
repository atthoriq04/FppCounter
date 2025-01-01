<?php
$image = $_POST['image'];

list($type, $image) = explode(';', $image);
list(, $image) = explode(',', $image);

$image = base64_decode($image);
$image_name = time() . '.png';
file_put_contents('../../assets/' . $image_name, $image);
$target_dir = "../../assets/";
$target_file = $target_dir . basename($image);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST['image'])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

echo 'successfully uploaded';
