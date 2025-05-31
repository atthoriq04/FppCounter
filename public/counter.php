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
<div class="mt-15"></div>
<div class=" p-4" id="Data-Sender" data-latCounter="<?= htmlspecialchars(json_encode($latCounter, JSON_HEX_APOS | JSON_HEX_QUOT)) ?>" data-isArchive="false">
    <h1 class="text-center text-3xl "><?= date('Y') ?> Counter</h1>
</div>
<div class="text-center p-5 md:mx-10 lg:mx-15 xl:mx-50">
    <div class="mx-auto grid gap-6 mt-3 md:grid-cols-2 lg:grid-cols-3 " id="categoryShower">
        <? require_once "../data/view/counterCategory.php" ?>
    </div>
</div>
<button
    type="button"
    id="newCounterButton"
    class="fixed bottom-8 right-8 w-14 h-14 md:w-16 md:h-16 flex items-center justify-center 
         bg-blue-500 rounded-full text-white shadow-md 
         transition duration-500 hover:bg-blue-800"
    data-bs-toggle="modal"
    data-bs-target="#counterModal"
    data-namelist='<?= htmlspecialchars(json_encode($name, JSON_HEX_APOS | JSON_HEX_QUOT)) ?>'>

    <!-- Heroicons Plus Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke-width="2" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
    </svg>
</button>


<script type="module" src="../data/JS/counter.js"></script>
<? require_once "../data/view/newCounterModal.php" ?>

<? require "../assets/template/footer.php"; ?>