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
<div class="container mx-auto px-5 md:px-20 lg:px-50 xl:px-80">
    <div class=" flex flex-col justify-center items-center   min-h-screen">
        <div class=" border-1 border-gray-300 rounded-xl w-full max-w-full group shadow-lg/20 ">
            <div class=" mt-10">
                <h1
                    id="sender"
                    data-sub="<?= htmlspecialchars(json_encode($SubCategories, JSON_HEX_APOS | JSON_HEX_QUOT)) ?>"
                    class="text-2xl md:text-3xl font-semibold text-center text-gray-800">
                    Add New Data
                </h1>
            </div>
            <div class="w-full">
                <form action="../data/functions/crud.php" method="POST" id="uploadForm" enctype="multipart/form-data" class="space-y-6 px-5 mt-3 pb-3">
                    <!-- Name Input -->
                    <div class="relative w-full mb-6">
                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder=" "
                            class="peer h-12 w-full border-b-2 border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-600" />
                        <label
                            for="name"
                            class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-3 peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                            Name
                        </label>
                    </div>

                    <!-- Category Select -->
                    <div class="relative">
                        <select
                            id="category"
                            name="category"
                            class="peer w-full border-b-2 border-gray-300 bg-transparent text-gray-900 focus:outline-none focus:border-blue-600 h-12 appearance-none">
                            <option value="0" selected disabled hidden></option>
                            <?php foreach ($Categories as $category) { ?>
                                <option value="<?= $category["cat_id"] ?>"><?= $category["Category"] ?></option>
                            <?php } ?>
                        </select>
                        <label
                            for="category"
                            class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-focus:-top-3.5 peer-focus:text-sm peer-focus:text-gray-600 peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400">
                            Category
                        </label>
                    </div>

                    <div class="relative">
                        <select
                            id="subcat"
                            name="subCat"
                            class="peer w-full border-b-2 border-gray-300 bg-transparent text-gray-900 focus:outline-none focus:border-blue-600 h-12 appearance-none">
                            <option value="0">Select Category to Select Sub Category</option>
                        </select>
                        <label
                            for="subcat"
                            class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-focus:-top-3.5 peer-focus:text-sm peer-focus:text-gray-600 peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400">
                            Select The Sub Category
                        </label>
                    </div>


                    <!-- Image Input -->
                    <div class="space-y-2">
                        <label for="imageInput" class="block text-sm font-medium text-gray-700">Input An Image</label>
                        <input
                            type="file"
                            name="image"
                            id="imageInput"
                            accept="image/*"
                            class="w-full border border-gray-300 rounded-md px-3 py-2" />
                    </div>

                    <!-- Crop preview container -->
                    <div id="cropContainer" class="hidden">
                        <img id="imagePreview" alt="Preview" class="rounded-md border max-w-full mx-auto" />
                    </div>

                    <!-- Crop and Upload Buttons -->
                    <div class="flex items-center gap-4">
                        <button type="button" id="cropBtn" class="hidden px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">Crop Image</button>
                        <button type="button" id="uploadBtn" name="addNewName" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="module" src="../data/JS/newdata.js"></script>

<? require "../assets/template/footer.php"; ?>

<form action="../data/functions/crud.php" method="POST" id="uploadForm" enctype="multipart/form-data">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="editName" id="editName">
        <label for="editName">Name</label>
    </div>
    <div class="form-floating mb-3">
        <select class="form-select" id="Category" name="Category" aria-label="Floating label select example">
            <option value="0" id="editCategory">select Catesgory</option>

        </select>
        <label for="Category">Category</label>
    </div>
    <div class="form-floating mb-3">
        <select class="form-select" id="editSubcat" name="editSubcat" aria-label="Floating label select example">
            <option value="0">sub Category</option>

        </select>
        <label for="editSubcat">Select The Sub Category</label>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Input An Image</label>
        <input class="form-control" type="file" name="image" id="imageInput" accept="image/*">
    </div>
    <div class="mb-3" id="cropContainer" style="display: none;">
        <img id="imagePreview" alt="Preview" class="img-thumbnail" style="max-width: 100%; display: block;">
    </div>
    <button type="button" id="cropBtn" class="btn btn-secondary" style="display: none;">Crop Image</button>
</form>