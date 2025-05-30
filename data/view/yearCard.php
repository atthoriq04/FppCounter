<?php
$data = new get("../data/config/query.php");
$years = $data->getYearData($con)[1];
$params = $data->getYearData($con)[0];
?>

<? $x = 1;
foreach ($years as $year) { ?>

    <div class="border border-gray-300 rounded-xl w-full group shadow-lg max-w-full text-center">
        <div class="head  px-3">
            <h1 class="text-lg font-bold mb-2"> <?= $year[$params[0]] ?></h1>
        </div>
        <hr class="border-gray-300">
        <div class="body  px-3">
            <p class="text-sm px-4 py-2 border-b border-gray-300">Total : <?= $year[$params[1]] ?></p>
            <?php if ($year[$params[0]] !== date("Y")) { ?>
                <p class=" text-sm px-4 py-2 ">Average : <?= number_format($year[$params[2]], 2) ?></p>
            <?php } else {
                date_default_timezone_set('Asia/Bangkok');
                $dayOfYear = date('z') + 1;
                $average = $year[$params[1]] / $dayOfYear;
            ?>
                <p class=" text-sm px-4 py-2">Average : <?= number_format($average, 2) ?></p>
            <?php } ?>
        </div>
        <div class="head">
            <div class=" -my-1 pb-3">
                <hr class="border-gray-300">
                <a href="archive.php?year=<?= $year[$params[0]] ?>" class="text-sm text-blue-700 hover:text-blue-950 hover:underline"> Year Overview</a>
            </div>
        </div>
    </div>
    </a>

<? $x++;
} ?>