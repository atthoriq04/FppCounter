<?
function rankingNameList($nameLists, $imgLoc, $status, $colSize)
{
    usort($nameLists, function ($a, $b) {
        return $b['grandTotal'] <=> $a['grandTotal']; // Ascending order
    });
    $x = 1;
    $rankings = array_slice($nameLists, 0, 20);
    foreach ($rankings as $name) {
        if ($name['grandTotal'] !== 0) { ?>
            <div class=" border-1 border-gray-300 rounded-xl w-full max-w-full group shadow-lg  p-2">
                <div class="flex flex-col md:flex-row ">
                    <!-- Image Section -->
                    <div class="aspect-square bg-gray-100 rounded-md overflow-hidden ">
                        <img src="<?= $imgLoc . $name['Image'] ?>" alt="..." class="w-[50vw] h-full md:w-[35vw] xl:w-[20vw]  object-cover">
                    </div>

                    <!-- Content Section -->
                    <div class="w-full p-4 md:w-2/3 ">
                        <h5 class="text-lg font-semibold text-gray-800 mb-2">
                            <?= $x . ". " . $name['Name'] . " (" . $name['Category'] . ")" ?>
                        </h5>
                        <hr class="mb-3 border-gray-300">

                        <ul class="space-y-1 text-sm text-gray-700">
                            <?php
                            if ($status !== 0) {
                                foreach ($name['yearlyTotal'] as $key => $yearly) { ?>
                                    <li><?= $key . " = " . $yearly ?></li>
                            <?php }
                            } ?>
                            <li class="font-medium">Total = <?= $name['grandTotal'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?


            $x++;
        }
    }
}

function rankingCategoryList($categories, $name)
{
    usort($categories, function ($a, $b) {
        return $b['counterSum'] <=> $a['counterSum']; // Ascending order
    });
    $filtered = array_filter($categories, function ($item) {
        return $item['counterSum'] !== 0;
    });
    $x = 1;
    usort($name, function ($a, $b) {
        return $b['grandTotal'] <=> $a['grandTotal']; // Ascending order
    });
    foreach ($filtered as $category) {
        // Slice the array to get the latest 3 entries
        $latestYearlyTotals = array_slice($category['yearlyTotal'], 0, 3, true);
        $categoryId = $category['cat_id'];
        $filteredNames = array_filter($name, function ($name) use ($categoryId) {
            return $name['Cat'] === $categoryId; // Replace 'category_id' with the actual key in $namelist
        });

        ?>

        <div class="border-1 border-gray-300 rounded-xl w-full max-w-full group shadow-lg/20 ">
            <div class="-mt-0 -my-0 mb-2 text-center border-b-1 text-2xl border-gray-300">
                <h4 class="m-2"><?= $x . " . " . $category['Category'] ?></h4>
            </div>
            <div class="">
                <div class="flex flex-row justify-between gap-2 mx-3">
                    <!-- Overview Section -->
                    <div class="w-full md:w-1/2  px-4 ">
                        <h6 class="text-center text-lg font-semibold mb-3 border-b pb-1">Overview</h6>
                        <ul class="list-none md:space-y-2">
                            <li class="text-gray-500 text-sm">&nbsp;</li>
                            <li class="text-gray-700 text-base"><?= $category['subCategoryCount'] ?> Sub Categories</li>
                            <li class="text-gray-700 text-base"><?= $category['membercount'] ?> Name Listed</li>
                            <li class="text-gray-700 text-base">Total = <?= $category['counterSum'] ?></li>
                            <li class="text-gray-500 text-sm">&nbsp;</li>
                        </ul>
                    </div>

                    <!-- Total Every Year Section -->
                    <div class="w-full md:w-1/2  px-4 ">
                        <h6 class="text-center text-lg font-semibold mb-3 border-b pb-1">Overview</h6>
                        <ul class="list-none md:space-y-2">
                            <li class="text-gray-500 text-sm">&nbsp;</li>
                            <?php foreach ($latestYearlyTotals as $key => $yearly) { ?>
                                <li class="text-gray-700 text-base"><?= $key . " = " . $yearly ?></li>
                            <?php } ?>
                            <li class="text-gray-500 text-sm">&nbsp;</li>
                        </ul>
                    </div>
                </div>
                <div class="text-center mt-6">
                    <a href="#" class="inline-block text-blue-600 hover:text-blue-800 font-medium underline detailLink"
                        data-cat="<?= $category['cat_id'] ?>"
                        data-Name="<?= htmlspecialchars(json_encode($filteredNames, JSON_HEX_APOS | JSON_HEX_QUOT)) ?>">
                        See Name Rank
                    </a>
                </div>

                <div class="row">
                    <table class="w-full text-left ranks" id="rankList+<?= $category['cat_id'] ?>">

                        <tbody id="ranks+<?= $category['cat_id'] ?>">
                        </tbody>
                    </table>
                    <div class="text-center">
                        <a href="#" style="visibility: hidden;" class=" inline-block text-blue-600 hover:text-blue-800 font-medium underline pb-3" id="close+<?= $category['cat_id'] ?>">Close</a>
                    </div>
                </div>
            </div>
        </div>
<?


        $x++;
    }
}
