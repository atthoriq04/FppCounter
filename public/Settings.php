<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../data/functions/get.php";
require_once "../data/config/connection.php"; ?>
<? require "../assets/template/header.php"; ?>

<div class="container">
    <div class="row mt-3">
        <h1 class="h1">Configuration
        </h1>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6 my-1">
                <div class="row">
                    <h2 class="h3">Years</h2>
                </div>
                <div class="row mt-3 px-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Year</th>
                                <th scope="col">Total</th>
                                <th scope="col">Average</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? require_once "../data/view/YearTable.php" ?>
                        </tbody>
                    </table>
                    <a href="#"
                        class="btn btn-primary btn-sm p-2"
                        data-bs-toggle="modal"
                        data-bs-target="#addNewModal"
                        data-type="year">Add New Year</a>
                </div>
            </div>
            <div class="col-lg-6 my-1">
                <div class="row">
                    <h2 class="h3">Category</h2>
                </div>
                <div class="row mt-3 px-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Category</th>
                                <th scope="col">Sub Categories</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? require "../data/view/catTable.php" ?>
                        </tbody>
                    </table>
                    <a href="#"
                        class="btn btn-primary btn-sm p-2"
                        data-bs-toggle="modal"
                        data-bs-target="#addNewModal"
                        data-type="category">Add New Category</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <h3 class="text-center h2 py-2">Name List</h3>
        </div>
        <div class="row mt-3 px-3">
            <a href="newNameForm.php" class="btn btn-primary btn-sm p-2">Add Data</a>
            <? require_once "../data/view/nametable.php" ?>

        </div>

    </div>


    <!-- Model 1 -->
    <? require_once("../data/view/addYearCatModal.php") ?>
    <!-- modal2 -->
    <? require_once("../data/view/subcategoryModal.php") ?>
    <!-- modal 3 -->
    <? require_once("../data/view/editNameModal.php") ?>

    <script type="module" src="../data/JS/settingsPage.js"></script>
    <? require "../assets/template/footer.php"; ?>