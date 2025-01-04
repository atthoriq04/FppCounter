<?
class memberName
{
    private $con;
    private $query;

    public function __construct($con, $query)
    {
        $this->con = $con;
        $this->query = $query;
    }

    public function memberSubmit($postData, $fileData)
    {
        // Capture name, category, and subcategory
        $theName = isset($postData['name']) ? $postData['name'] : 'No name provided';
        $category = isset($postData['category']) ? $postData['category'] : 'No category provided';
        $subCat = isset($postData['subCat']) ? $postData['subCat'] : 'No sub-category provided';
        $fileName = "default.png";

        // Handle file upload
        if (isset($fileData['image']) && $fileData['image']['error'] === UPLOAD_ERR_OK) {
            $targetDir = "../../assets/images/";
            $fileName = basename($fileData['image']['name']);
            $targetFilePath = $targetDir . $fileName;

            // Ensure the directory exists
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Validate file type
            $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                return [
                    "success" => false,
                    "message" => "Only image files (JPG, JPEG, PNG, GIF) are allowed.",
                ];
            }

            // Attempt to move uploaded file
            if (!move_uploaded_file($fileData['image']['tmp_name'], $targetFilePath)) {
                return [
                    "success" => false,
                    "message" => "Failed to move uploaded file.",
                    "tmpName" => $fileData['image']['tmp_name'],
                    "targetPath" => $targetFilePath,
                ];
            }
        }

        // Prepare data for insertion
        $receivedDatas = "'$theName','$category','$subCat','$fileName'";
        $needed = "Name , Cat , Sub , Image";

        // Insert data into the database
        if ($this->query->dbInsert($this->con, "name", $receivedDatas, $needed)) {
            return [
                "success" => true,
                "message" => "Data uploaded successfully!",
            ];
        } else {
            // If database insertion fails, delete the uploaded file
            if (file_exists("../../assets/images/$fileName")) {
                unlink("../../assets/images/$fileName");
            }
            return [
                "success" => false,
                "message" => "Failed to insert data into the database.",
            ];
        }
    }
    public function updateMember($id, $postData)
    {
        // Logic for updating a member's information
    }

    public function deleteMember($id)
    {
        // Logic for deleting a member
    }
}
