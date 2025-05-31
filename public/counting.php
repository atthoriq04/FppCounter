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

<div class="mt-15"></div>
<div class=" flex flex-row  mt-4 pt-3 px-7" id="Data-Sender">
    <a
        href="counter.php"
        class="flex items-center gap-2 text-xl  hover:text-gray-900 transition">
        <!-- Left arrow icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </a>

    <h1 class=" text-xl text-center px-2 my-5" id="header">conter</h1>
</div>
<div class="grid gap-2 grid-cols-2 md:grid-cols-4 lg:grid-cols-6 mx-auto px-5 md:px-10" id="grid">

</div>
</div>


<? require_once "../data/view/logsModal.php" ?>
<script type="module" src="../data/JS/counting.js"></script>
<? require "../assets/template/footer.php"; ?>