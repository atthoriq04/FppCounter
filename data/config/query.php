<?php
class query
{
    function get_data($con, $query)
    {
        $result = $con->query($query);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    function dbSelectOne($con, $tableName, $columnName, $condition)
    {
        $query = "SELECT $columnName FROM $tableName WHERE $condition";
        $res = $con->query($query)->fetch_assoc();
        return $res[$columnName];
    }
    function dbInsert($con, $tableName, $datas, $col)
    {
        $query = "INSERT INTO $tableName ($col) VALUES ($datas)";
        if ($con->query($query) === TRUE) {
            return [
                "success" => true,
                "message" => "Data inserted successfully!"
            ];
        } else {
            // Log error for debugging
            file_put_contents('error_log.txt', $con->error . PHP_EOL, FILE_APPEND);
            // Return error message as JSON
            return [
                "success" => true,
                "message" => "Data inserted unsuccessfully!"
            ];
        }
    }
    function dbUpdate($con, $tableName, $datas, $condition)
    {
        $query = "UPDATE $tableName SET $datas WHERE $condition";
        if ($con->query($query) === TRUE) {
            return [
                "success" => true,
                "message" => "Data inserted successfully!"
            ];
        } else {
            // Log error for debugging
            file_put_contents('error_log.txt', $con->error . PHP_EOL, FILE_APPEND);
            // Return error message as JSON
            return [
                "success" => true,
                "message" => "Data inserted unsuccessfully!"
            ];
        }
    }
    function dbDelete($con, $tableName, $condition)
    {
        $query = "DELETE FROM $tableName WHERE $condition";
        if (!$con->query($query) === true) {
            echo "Error: " . $query . "<br>" . $con->error;
            die;
        }
    }
}
