<?php
$data = new get("../data/config/query.php");
$names = $data->getNames($con);
$categories = $data->getCategoryData($con)[0];

?>

<? foreach ($categories as $category) {
    $x = 1; ?>

    <tr>
        <td colspan="5" class="text-center"> <?= $category["Category"] ?></td>
    </tr>
    <? foreach ($names as $name) {
        if ($name["Cat"] === $category['cat_id']) {
    ?>
            <tr>
                <td class="text-center"> <?= $x ?></td>
                <td class="text-center"><img src="../assets/images/<?= $name["Image"] ?>" class="img-fluid" alt="..." width="200" height="200"></td>
                <td class="text-center"> <?= $name["Name"] ?></td>
                <td class="text-center"> <?= $name["SubCategory"] ?></td>
                <td class="text-center"> 0</td>
            </tr>
    <?

            $x++;
        }
    } ?>
<? $x = 0;
} ?>