<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../data/functions/get.php";
require_once "../data/config/connection.php"; ?>
<? require "../assets/template/header.php"; ?>
<?php
$data = new get("../data/config/query.php");
$name = $data->getNames($con);
?>

<div class="row" style="background-color:grey">
    <h1 class="text-center">conter</h1>
</div>
<div class="row mt-2">
    <a href="" type="button" id="newCounterButton" class="text-center btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#counterModal" data-namelist='<?= htmlspecialchars(json_encode($name, JSON_HEX_APOS | JSON_HEX_QUOT)) ?>'>add new counter</a>
</div>


<script type="module" src="../data/JS/counter.js"></script>
<? require_once "../data/view/newCounterModal.php" ?>
<? require "../assets/template/footer.php"; ?>