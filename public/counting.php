<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../data/functions/get.php";
require_once "../data/config/connection.php";
require "../assets/template/header.php";
require "../data/config/pulldata.php";
$data = new get("../data/config/query.php");
$name = $data->getNames($con);

// echo '<pre>';
// print_r($category);
// echo '</pre>';
?>

<div class="row mt-5 pt-3" style="background-color:grey" id="Data-Sender">
    <h1 class="text-center" id="header">conter</h1>
</div>
<div class="row mt-5 mx-auto" id="grid">

</div>
</div>


<? require_once "../data/view/logsModal.php" ?>
<script type="module" src="../data/JS/counting.js"></script>
<? require "../assets/template/footer.php"; ?>