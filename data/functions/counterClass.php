<?
class counterClass
{
    private $con;
    private $query;

    private $timezone;
    public function __construct($con, $query)
    {
        $this->con = $con;
        $this->query = $query; // GMT+7 timezone
        $this->timezone = new DateTimeZone('Asia/Bangkok');
    }

    function addNewCounter($year, $name)
    {
        $date = new DateTime('now', $this->timezone);
        $datetime = $date->format('d F Y, h.i A');
        $log = 1;
        $value = "'$year','$name','1','03 January 2025, 07.30','03 January 2025, 23.00','$log'";
        // $query = "INSERT INTO counter (Year_id,id_name,count,First_Update,Last_Update,Logs) VALUES ($value)";
        // return [
        //     "success" => true,
        //     "message" => $query,
        // ];
        if ($this->query->dbInsert($this->con, 'counter', $value, "Year_id,id_name,count,First_Update,Last_Update,Logs")) {
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
    function archiveUpload($year, $name, $count)
    {
        $date = new DateTime('now', $this->timezone);
        $datetime = $date->format('d F Y, h.i A');
        $log = 0;
        $value = "'$year','$name','$count','01 January 2024, 07.30','31 December 2024, 23.00','$log'";
        // $query = "INSERT INTO counter (Year_id,id_name,count,First_Update,Last_Update,Logs) VALUES ($value)";
        // return [
        //     "success" => true,
        //     "message" => $query,
        // ];
        if ($this->query->dbInsert($this->con, 'counter', $value, "Year_id,id_name,count,First_Update,Last_Update,Logs")) {
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
