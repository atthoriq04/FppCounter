<?
class yearcat
{
    private $con;
    private $query;

    public function __construct($con, $query)
    {
        $this->con = $con;
        $this->query = $query;
    }

    public function catyearSubmit($table, $value, $column)
    {
        //checking same
        // Insert data into the database
        if ($this->query->dbInsert($this->con, $table, $value, $column)) {
            return [
                "success" => true,
                "message" => "Data uploaded successfully!",
            ];
        } else {
            return [
                "success" => false,
                "message" => "Failed to insert data into the database.",
            ];
        }
    }
}
