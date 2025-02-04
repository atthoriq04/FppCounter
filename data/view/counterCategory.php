<?
foreach ($categories as $category) {
    $url = "counting.php";
    if (isset($_GET['year'])) {
        $year = $_GET['year'];
        $url = "counting.php?year=" . $year;
    }
    if ($category['counterCount'] != 0) {
?>
        <div class="col-lg-6 mt-2">
            <a href="<?= $url ?>" style="text-decoration: none; color: inherit;" class="gotopage" data-url="<?= $url ?>" selected-data="  <?= htmlspecialchars(json_encode($category, JSON_HEX_APOS | JSON_HEX_QUOT)) ?>">
                <div class="card">
                    <div class="card-header  text-center">
                        <h4><?= $category['Category'] ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"></li>
                                    <li class="list-group-item">count = <?= $category['counterCount'] ?></li>
                                    <li class="list-group-item">total = <?= $category['counterSum'] ?></li>
                                    <li class="list-group-item"></li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"></li>
                                    <li class="list-group-item">Average = <?= $category['counterSum'] / $category['counterCount'] ?></li>
                                    <li class="list-group-item">Updated : <?= $category['counterlatestUpdate'] ?></li>
                                    <li class="list-group-item"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
<?
    }
}
?>