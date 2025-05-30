<?
foreach ($categories as $category) {
    $url = "counting.php";
    if (isset($_GET['year'])) {
        $year = $_GET['year'];
        $url = "counting.php?year=" . $year;
    }
    if ($category['counterCount'] != 0) {
?>
        <div class=" ">
            <a href="<?= $url ?>" style="text-decoration: none; color: inherit;" class="gotopage" data-url="<?= $url ?>" selected-data="  <?= htmlspecialchars(json_encode($category, JSON_HEX_APOS | JSON_HEX_QUOT)) ?>">
                <div class="border-1 border-gray-300 rounded-xl w-full max-w-full group shadow-lg/20 transition-transform duration-300 ease-in-out transform hover:-translate-y-1">
                    <div class="-mt-0 -my-0 mb-2 text-center border-b-1 border-gray-300">
                        <h4 class="text-2xl m-2"><?= $category['Category'] ?></h4>
                    </div>
                    <div class="text-center p-5 ">
                        <ul class="list-none'">
                            <li class=" border-gray-100 border-y-1 m-2"></li>
                            <li class="border-gray-100 border-y-1 m-2">
                                <div class="flex justify-center gap-6">
                                    <span class="">count = <?= $category['counterCount'] ?></span>
                                    <span class="col-6">total = <?= $category['counterSum'] ?></span>
                                </div>

                            </li>
                            <li class="border-gray-100 border-y-1 m-2">Average = <?= $category['counterSum'] / $category['counterCount'] ?></li>
                            <li class="border-gray-100 border-y-1 m-2">Updated :</li>
                            <li class="border-gray-100 border-y-1 m-2"><?= $category['counterlatestUpdate'] ?></li>
                            <li class="border-gray-100 border-y-1 m-2"></li>
                        </ul>
                    </div>
                </div>
            </a>
        </div>
<?
    }
}
?>