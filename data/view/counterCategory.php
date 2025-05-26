<?
foreach ($categories as $category) {
    $url = "counting.php";
    if (isset($_GET['year'])) {
        $year = $_GET['year'];
        $url = "counting.php?year=" . $year;
    }
    if ($category['counterCount'] != 0) {
?>
        <div class="col-lg-4 mt-2">
            <a href="<?= $url ?>" style="text-decoration: none; color: inherit;" class="gotopage" data-url="<?= $url ?>" selected-data="  <?= htmlspecialchars(json_encode($category, JSON_HEX_APOS | JSON_HEX_QUOT)) ?>">
                <div class="card">
                    <div class="card-header  text-center">
                        <h4><?= $category['Category'] ?></h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item"></li>
                            <li class="list-group-item">
                                <div class="row">
                                    <span class="col-6">count = <?= $category['counterCount'] ?></span>
                                    <span class="col-6">total = <?= $category['counterSum'] ?></span>
                                </div>

                            </li>
                            <li class="list-group-item">Average = <?= $category['counterSum'] / $category['counterCount'] ?></li>
                            <li class="list-group-item">Updated :</li>
                            <li class="list-group-item"><?= $category['counterlatestUpdate'] ?></li>
                            <li class="list-group-item"></li>
                        </ul>
                    </div>
                </div>
            </a>
        </div>
<?
    }
}
?>