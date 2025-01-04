<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../data/functions/get.php";
require_once "../data/config/connection.php";
require "../assets/template/header.php";
require "../data/config/pulldata.php";
$data = new get("../data/config/query.php");
$name = $data->getNames($con);
$latCounter = $data->getLatestCounter($con);
$categories = sendCounter($data->getCategoryData($con)[0], $latCounter);
// echo '<pre>';
// print_r($category);
// echo '</pre>';
?>

<div class="row" style="background-color:grey" id="Data-Sender" data-latCounter="<?= htmlspecialchars(json_encode($latCounter, JSON_HEX_APOS | JSON_HEX_QUOT)) ?>">
    <h1 class="text-center" id="header">conter</h1>
</div>
<div class="row mt-5 mx-3" id="grid">

</div>
</div>


<script type="module" src="../data/JS/counting.js"></script>
<? require "../assets/template/footer.php"; ?>