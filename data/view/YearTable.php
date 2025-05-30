<?php
$data = new get("../data/config/query.php");
$years = $data->getYearData($con)[1];
$params = $data->getYearData($con)[0];
?>

<? $x = 1;
foreach ($years as $year) { ?>
    <tr class="hover:bg-gray-50 transition duration-150">
        <th class="px-4 py-2 border-b border-gray-300 font-medium text-gray-900" scope="row"><?= $x ?></th>
        <td class="px-4 py-2 border-b border-gray-300 "><?= $year[$params[0]] ?></td>
        <td class="px-4 py-2 border-b border-gray-300"><?= $year[$params[1]] ?></td>

        <?php if ($year[$params[0]] !== date("Y")) { ?>
            <td class="px-4 py-2 border-b border-gray-300"><?= number_format($year[$params[2]], 2) ?></td>
        <?php } else {
            date_default_timezone_set('Asia/Bangkok');
            $dayOfYear = date('z') + 1;
            $average = $year[$params[1]] / $dayOfYear;
        ?>
            <td class="px-4 py-2 border-b border-gray-300"><?= number_format($average, 2) ?></td>
        <?php } ?>
    </tr>

<? $x++;
} ?>