<?php
$data = new get("../data/config/query.php");
$years = $data->getYearData($con)[1];
$params = $data->getYearData($con)[0];
?>

<? $x = 1;
foreach ($years as $year) { ?>
    <tr>
        <th scope="row"><?= $x ?></th>
        <td> <?= $year[$params[0]] ?> </td>
        <td> <?= $year[$params[1]] ?> </td>
        <?php if ($year[$params[0]] !== date("Y")) {
        ?>
            <td> <?= number_format($year[$params[2]], 2)  ?> </td>

        <?php } else {
            date_default_timezone_set('Asia/Bangkok');
            $dayOfYear = date('z') + 1;
            $average = $year[$params[1]] / $dayOfYear;
        ?>
            <td> <?= number_format($average, 2)  ?> </td>
        <?php } ?>
        <td><a href="archive.php?year=<?= $year[$params[0]] ?>" class="overview">Year Overview</a></td>
    </tr>

<? $x++;
} ?>