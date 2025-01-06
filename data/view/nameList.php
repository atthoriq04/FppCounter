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
            <div class="col-md-6">
                <div class="card mb-3" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="<?= $colSize ?>">
                            <img src="<?= $imgLoc . $name['Image'] ?>" class="img-fluid  rounded-start text-center " styly="width:50vw" alt=" ...">
                        </div>
                        <div class="<?= $colSize ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $x . ". " . $name['Name'] . " (" . $name['Category'] . ")" ?></h5>
                                <hr>
                                <ul class="list-group">
                                    <?
                                    if ($status !== 0) {
                                        foreach ($name['yearlyTotal'] as $key => $yearly) { ?>
                                            <li class="list-group-item"><?= $key . " = " . $yearly ?></li>
                                    <? }
                                    } ?>
                                    <li class="list-group-item">Total = <?= $name['grandTotal'] ?></li>
                                </ul>
                            </div>
                        </div>
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
        <div class="col-md-6 mt-2">
            <div class="card">
                <div class="card-header  text-center">
                    <h4><?= $x . " . " . $category['Category'] ?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="text-center">overview</h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"></li>
                                <li class="list-group-item"> <?= $category['subCategoryCount'] ?> Sub Categories</li>
                                <li class="list-group-item"> <?= $category['membercount'] ?> Name Listed</li>
                                <li class="list-group-item">total = <?= $category['counterSum'] ?></li>
                                <li class="list-group-item"></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <h6 class="text-center">Total Every Year</h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"></li>
                                <? foreach ($latestYearlyTotals as $key => $yearly) { ?>
                                    <li class="list-group-item"><?= $key . " = " . $yearly ?></li>
                                <? } ?>
                                <li class="list-group-item"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <a href="" class="detailLink text-center" data-cat="<?= $category['cat_id'] ?>" data-Name="<?= htmlspecialchars(json_encode($filteredNames, JSON_HEX_APOS | JSON_HEX_QUOT)) ?>">See Name Rank</a>
                    </div>
                    <div class="row">
                        <table class="table ranks" id="rankList+<?= $category['cat_id'] ?>">

                            <tbody id="ranks+<?= $category['cat_id'] ?>">
                            </tbody>
                        </table>
                        <a href="#" style="visibility: hidden;" class="close text-center" id="close+<?= $category['cat_id'] ?>">Close</a>
                    </div>
                </div>
            </div>
        </div>
<?


        $x++;
    }
}
