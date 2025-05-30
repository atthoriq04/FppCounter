<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../data/functions/get.php";
require_once "../data/config/connection.php";
require_once "../data/view/nameList.php";
require "../assets/template/header.php";
require "../data/config/pulldata.php";
$data = new get("../data/config/query.php");
$name = $data->getNames($con);
$counters = $data->getAllCounter($con);
$yearList = $data->getYearData($con);
$newNameList = getNames($name, $counters, $yearList[1]);
$categories = sendCounter($data->getCategoryData($con)[0], $counters, $name);
// echo '<pre>';
// print_r($newNameList);
// echo '</pre>';
?>

<div class="mt-15"></div>
<hr class="mt-20">

<div class="row my-2 text-center">
    <h4 class="text-3xl"> Overall Data by Year </h4>
</div>

<hr>
<div class="row my-5 text-2xl">
    <div class=" mx-auto grid gap-6 mt-3 px-5 grid-cols-2 md:grid-cols-3 md:px-10 lg:pd-30 xl:px-45">
        <? require_once "../data/view/yearCard.php" ?>
    </div>
</div>
<hr>
<div class="row my-2 text-center">
    <h4 class="text-3xl"> Overall Category Ranking </h4>
</div>
<hr>
<div class="container min-w-full mx-auto my-5 lg:my-10 px-5 md:px-10 lg:pd-30 xl:px-45 ">
    <div class="mx-auto grid gap-4 mt-3 md:grid-cols-2 lg:grid-cols-3 " id="categoryShower">
        <?= rankingCategoryList($categories, $newNameList) ?>
    </div>
</div>

<hr>
<div class="row my-2 text-center ">
    <h4 class="text-3xl"> Overall Ranking </h4>
</div>
<hr>
<div class="grid gap-4 mt-3 grid-cols-2 sm:grid-cols-1 xl:grid-cols-3 justify-center w-full my-5 mx-auto lg:my-10 px-5 md:px-10 lg:pd-30 xl:px-45  ">
    <?= rankingNameList($newNameList, "../assets/images/", 1, "col-sm-6") ?>
</div>

<script type="module" src="../data/JS/home.js"></script>
<? require "../assets/template/footer.php"; ?>