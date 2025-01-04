<?php
$data = new get("../data/config/query.php");
$Categories = $data->getCategoryData($con)[0];
$params = $data->getCategoryData($con)[1];
$sub = $data->getCategoryData($con)[2];
?>
<? foreach ($Categories as $category) { ?>
    <tr>
        <td><?= $category[$params[0]] ?></td>
        <td><?= $category[$params[1]] ?></td>
        <td><a href="#"
                class="btn btn-primary position-relative p-2"
                data-bs-toggle="modal"
                data-bs-target="#categoryModal"
                data-catId="<?= htmlspecialchars($category[$params[0]]) ?>"
                data-category="<?= htmlspecialchars($category[$params[1]]) ?>"
                data-sublist='<?= htmlspecialchars(json_encode($sub, JSON_HEX_APOS | JSON_HEX_QUOT)) ?>'>
                <?= htmlspecialchars($category[$params[2]]) ?>
            </a></td>
    </tr>
<? } ?>