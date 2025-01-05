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
        <td> <?= $year[$params[2]] ?> </td>
        <td><a href="" class="overview">Year Overview</a></td>
    </tr>

<? $x++;
} ?>