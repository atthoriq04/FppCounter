<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../data/functions/get.php";
require_once "../data/config/connection.php"; ?>
<? require "../assets/template/header.php"; ?>
<?php
$data = new get("../data/config/query.php");
$year = $data->getYearData($con);
?>


<? require "../assets/template/footer.php"; ?>