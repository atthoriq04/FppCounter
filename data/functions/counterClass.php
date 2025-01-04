<?
class counterClass
{
    private $con;
    private $query;

    private $timezone;
    private $datetime;
    public function __construct($con, $query)
    {
        $this->con = $con;
        $this->query = $query; // GMT+7 timezone
        $this->timezone = new DateTimeZone('Asia/Bangkok');
        $date = new DateTime('now', $this->timezone);
        $this->datetime = $date->format('d F Y, h.i A');
    }

    function addNewCounter($year, $name)
    {
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
    function createLog($id, $number, $log)
    {
        $date = $this->datetime;
        if ($log > 0) {
            $value = "'$id','$number','$date'";
            return  $this->query->dbInsert($this->con, "logs", $value, "id_counter,count,createTime");
        }
        return;
    }
    function updateyear($action)
    {
        $year = date("Y");
        if ($action === "+") {
            return $this->query->dbUpdate($this->con, "year", "Total = Total + 1", "Year = $year");
        }
        return $this->query->dbUpdate($this->con, "year", "Total = Total - 1", "Year = $year");
    }
    function counterUpdate($id, $number, $log, $action)
    {
        $datetime = $this->datetime;
        $condition = "countId = '$id'";
        $data = "count = '$number' , Last_Update = '$datetime'";

        // $query = "UPDATE counter SET $data WHERE $condition";
        // return [
        //     "success" => false,
        //     "message" => $this->sayHello(),
        // ];
        if ($this->query->dbUpdate($this->con, "counter", $data, $condition)) {
            $logs = $this->createLog($id, $number, $log);
            $year = $this->updateyear($action);
            return [
                "success" => true,
                "message" => "Data uploaded successfully!",
                "logResult" => $logs,
                "yearUpdateResult" => $year,
            ];
        } else {
            return [
                "success" => false,
                "message" => "Failed to insert data into the database.",
            ];
        }
    }
}
