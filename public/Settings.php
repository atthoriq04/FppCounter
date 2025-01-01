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
            <div class="col-md-6 my-1">
                <div class="row">
                    <h2 class"h3">Years</h2>
                </div>
                <div class="row mt-3 px-3">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Year</th>
                                <th scope="col">Total</th>
                                <th scope="col">Avarage</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? require_once "../data/view/YearTable.php" ?>
                        </tbody>
                    </table>
                    <a href="" class="btn btn-primary btn-sm p-2">add new Data</a>
                </div>
            </div>
            <div class="col-md-6 my-1">
                <div class="row">
                    <h2 class"h3">Category</h2>
                </div>
                <div class="row mt-3 px-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Category</th>
                                <th scope="col">Sub Categories</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? require "../data/view/catTable.php" ?>
                        </tbody>
                    </table>
                    <a href="" class="btn btn-primary btn-sm p-2">add new Data</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <h3 class="text-center h2 py-2">Name List</h3>
        </div>
        <div class="row">
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                    Dropdown link
                </a>
                <ul class="dropdown-menu">
                    <?= require_once "../data/view/catDrop.php" ?>
                </ul>
            </div>
        </div>
        <div class="row mt-3 px-3">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Sub Category</th>
                        <th scope="col">Grand Total From 2023</th>
                        <th scope="col">Link</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <a href="newNameForm.php" class="btn btn-primary btn-sm p-2">Add Data</a>
        </div>
    </div>

    <? require "../assets/template/footer.php"; ?>