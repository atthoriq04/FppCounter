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

<hr class="mt-5 pt-3">
<div class="container">
    <div class="row my-2">
        <h4 class="text-center"> Overall Data by Year </h4>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col my-1">
            <div class="row mt-3 px-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Year</th>
                            <th scope="col">Total</th>
                            <th scope="col">Average</th>
                            <th scope="col">Year Overview</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? require_once "../data/view/YearTable.php" ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="row my-2">
        <h4 class="text-center"> Overall Category Ranking </h4>
    </div>
</div>
<hr>
<div class="container mb-4">
    <div class="row">
        <?= rankingCategoryList($categories, $newNameList) ?>
    </div>
</div>

<hr>
<div class="container">
    <div class="row my-2">
        <h4 class="text-center">Overall Name Ranking</h4>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">
        <?= rankingNameList($newNameList, "../assets/images/", 1, "col-sm-6") ?>
    </div>
</div>

<script type="module" src="../data/JS/home.js"></script>
<? require "../assets/template/footer.php"; ?>