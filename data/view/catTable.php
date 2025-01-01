<?php
$data = new get("../data/config/query.php");
$Categories = $data->getCategoryData($con)[0];
$params = $data->getCategoryData($con)[1];
?>
<? foreach ($Categories as $category) { ?>
    <tr>
        <? foreach ($params as $index => $param) { ?>
            <? if ($index  === array_key_last($params)) { ?> <td><a href=""><?= $category[$param] ?></a></td> <? } else { ?>
                <td><?= $category[$param] ?></td> <? } ?>
        <? } ?>
    </tr>
<? } ?>