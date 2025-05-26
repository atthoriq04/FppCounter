<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../data/functions/get.php";
require_once "../data/config/connection.php";
require "../assets/template/header.php";
require "../data/config/pulldata.php";
$data = new get("../data/config/query.php");
$name = $data->getNames($con);
$latCounter = $data->getCounterByYear($con, date("Y"));
$categories = sendCounter($data->getCategoryData($con)[0], $latCounter, $name);
// echo '<pre>';
// print_r($category);
// echo '</pre>';

?>
<div class=""></div>pt-5
<div class="row mt-5" style="background-color:grey" id="Data-Sender" data-latCounter="<?= htmlspecialchars(json_encode($latCounter, JSON_HEX_APOS | JSON_HEX_QUOT)) ?>" data-isArchive="false">
    <h1 class="text-center"><?= date('Y') ?> Counter</h1>
</div>
<div class="container">
    <div class="row mt-3" id="categoryShower">
        <? require_once "../data/view/counterCategory.php" ?>
    </div>
</div>
<button href="" type="button" id="newCounterButton" class="floating-button" data-bs-toggle="modal" data-bs-target="#counterModal" data-namelist='<?= htmlspecialchars(json_encode($name, JSON_HEX_APOS | JSON_HEX_QUOT)) ?>'>+</button>



<script type="module" src="../data/JS/counter.js"></script>
<? require_once "../data/view/newCounterModal.php" ?>
<? require "../assets/template/footer.php"; ?>