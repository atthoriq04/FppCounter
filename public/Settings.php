<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../data/functions/get.php";
require_once "../data/config/connection.php"; ?>
<? require "../assets/template/header.php"; ?>

<div class="mt-15"></div>
<div class="container mt-5 pt-3 mx-auto px-2 sm:px-3 lg:px-0">
    <div class="row mt-3 mb-25">
        <h1 class="text-4xl">Configuration
        </h1>
    </div>
    <div class=" mx-auto grid gap-3 md:grid-cols-2 px-3">
        <div class="col-lg-6 my-1">
            <div class=" bg-white px-3">
                <div class="row mb-3">
                    <h2 class="h3 text-2xl">Years</h2>
                </div>
                <table class="w-full table-auto text-left text-sm sm:text-base ">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 border-b border-gray-300">#</th>
                            <th class="px-4 py-3 border-b border-gray-300">Year</th>
                            <th class="px-4 py-3 border-b border-gray-300">Total</th>
                            <th class="px-4 py-3 border-b border-gray-300">Average</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? require_once "../data/view/YearTable.php" ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6 my-2 ">
            <div class="row mb-3">
                <h2 class="h3 text-2xl">Categories</h2>
            </div>
            <div class="grid gap-2 grid-cols-2">
                <? require "../data/view/catTable.php" ?>

            </div>
        </div>
    </div>
    <div class="row my-2 pt-10">
        <h4 class="text-2xl"> Name List </h4>
    </div>
    <? require_once "../data/view/nametable.php" ?>
</div>
<div class="fixed bottom-8 right-8 z-50">
    <div class="relative w-16 h-16">
        <!-- Slide Up Button -->
        <a href="#" id="addCat"
            class="absolute bottom-0 right-0 w-14 h-14 md:w-16 md:h-16 bg-green-500 text-white rounded-full 
             flex items-center justify-center opacity-0 invisible transition-all duration-300 ease-in-out 
             translate-y-0 z-10 modalButton" data-bs-toggle="modal" data-type="category"
            data-bs-target="#addNewModal">
            Cat
        </a>

        <!-- Slide Left Button -->
        <a href="newNameForm.php" id="btnLeft"
            class="absolute bottom-0 right-0 w-14 h-14 md:w-16 md:h-16 bg-blue-700 text-white rounded-full 
             flex items-center justify-center opacity-0 invisible transition-all duration-300 ease-in-out 
             translate-x-0 z-10 text-sm ">
            Member
        </a>

        <!-- Main Button -->
        <button id="newCounterButton"
            class="absolute bottom-0 right-0 w-14 h-14 md:w-16 md:h-16 bg-blue-500 text-white rounded-full 
             flex items-center justify-center shadow-md transition duration-500 hover:bg-blue-800 z-20">
            <!-- Plus Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
        </button>
    </div>
</div>
<!-- Model 1 -->
<? require_once("../data/view/addYearCatModal.php") ?>
<!-- modal 3 -->
<? require_once("../data/view/editNameModal.php") ?>

<script type="module" src="../data/JS/settingsPage.js"></script>

<? require "../assets/template/footer.php"; ?>