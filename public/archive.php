<?php
if (!isset($_GET['year'])) {
    header('location: index.php');
    die;
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../data/functions/get.php";
require_once "../data/config/connection.php";
require_once "../data/view/nameList.php";
require "../assets/template/header.php";
require "../data/config/pulldata.php";
$data = new get("../data/config/query.php");
$year = $_GET['year'];
$name = $data->getNames($con);
$counters = $data->getCounterByYear($con, $year);
$yearList = $data->getYearData($con);
$newNameList = getNames($name, $counters, $yearList[1]);
$categories = sendCounter($data->getCategoryData($con)[0], $counters, $name);
// echo '<pre>';
// print_r($categories);
// echo '</pre>';
// echo "Study " . $_GET['year'];
?>
<div class="container mt-5 pt-3">
    <div class="row mb-5 mt-2">
        <h1 class="text-center"><?= $year ?> Year Overview</h1>
    </div>
</div>

<hr>
<div class="container">
    <div class="row my-2" id="Data-Sender" data-latCounter="<?= htmlspecialchars(json_encode($counters, JSON_HEX_APOS | JSON_HEX_QUOT)) ?> " data-isArchive="true" data-year="<?= $_GET['year'] ?>">
        <h4 class="text-center"><?= $year ?> Category Ranking archive</h4>
    </div>
</div>
<hr>
<div class="container">
    <div class="row mt-3" id="categoryShower">
        <? require_once "../data/view/counterCategory.php" ?>
    </div>
</div>
<hr>
<div class="container">
    <div class="row my-2">
        <h4 class="text-center"><?= $year ?> Names Ranking</h4>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">
        <?= rankingNameList($newNameList, "../assets/images/", 0, "col-6") ?>
    </div>
</div>

<script type="module" src="../data/JS/counter.js"></script>
<? require_once "../data/view/newCounterModal.php" ?>
<? require "../assets/template/footer.php"; ?>