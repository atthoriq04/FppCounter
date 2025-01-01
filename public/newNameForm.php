<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../data/functions/get.php";
require_once "../data/config/connection.php";
$data = new get("../data/config/query.php");
$Categories = $data->getCategoryData($con)[0];
$SubCategories = $data->getCategoryData($con)[2];
?>
<? require "../assets/template/header.php"; ?>
<div class="container">
    <div class="row mt-5 p-4">
        <h1 class="h1 text-center">Add New Data</h1>
    </div>
    <div class="row mt-3">
        <div class="col-md-8 m-auto">
            <form action="../data/functions/crud.php" method="POST" id="uploadForm" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                        <option value="0">select Category</option>
                        <? foreach ($Categories as $category) { ?>
                            <option value="<?= $category["cat_id"] ?>"><?= $category["Category"] ?></option>
                        <? } ?>
                    </select>
                    <label for="category">Category</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="subcat" name="subCat" aria-label="Floating label select example">
                        <option value="0">sub Category</option>
                        <? foreach ($SubCategories as $category) { ?>
                            <option value="<?= $category["sub_id"] ?>"><?= $category["SubCategory"] ?></option>
                        <? } ?>
                    </select>
                    <label for="subcat">Select The Sub Category</label>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Input An Image</label>
                    <input class="form-control" type="file" name="image" id="imageInput" accept="image/*">
                </div>
                <div class="mb-3" id="cropContainer" style="display: none;">
                    <img id="imagePreview" alt="Preview" style="max-width: 100%; display: block;">
                </div>
                <button type="button" id="cropBtn" class="btn btn-secondary" style="display: none;">Crop Image</button>
                <button type="button" id="uploadBtn" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>


<script src="../data/JS/newdata.js"></script>

<? require "../assets/template/footer.php"; ?>