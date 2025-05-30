<?php
$data = new get("../data/config/query.php");
$Categories = $data->getCategoryData($con)[0];
$params = $data->getCategoryData($con)[1];
$sub = $data->getCategoryData($con)[2];
?>
<? foreach ($Categories as $category) { ?>
    <div class="border border-gray-300 rounded-xl w-full group shadow-lg max-w-full p-3">
        <div class="title">
            <a href="#" class="text-xl modalButton hover:text-gray-500 font-bold" data-catId="<?= htmlspecialchars($category[$params[0]]) ?>" data-catName="<?= htmlspecialchars($category[$params[1]]) ?>" data-bs-target="#addNewModal" data-type="subcategory"> <?= $category[$params[1]] ?></a>
            <hr class="p-0 border-gray-300">
        </div>
        <div class="grid grid-cols-2 gap-2 px-1 mx-auto justify-center group mt-5 md:grid-cols-3">
            <? foreach ($sub as $subCategories) { ?>
                <? if ($subCategories['id_cat'] === $category[$params[0]]) { ?>
                    <p class="text-sm p-2 rounded-lg shadow-lg text-center">
                        <?= htmlspecialchars($subCategories['SubCategory']) ?>
                    </p>
                <? } ?>
            <? } ?>
        </div>
    </div>

<? } ?>