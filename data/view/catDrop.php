<?php
$data = new get("../data/config/query.php");
$Categories = $data->getCategoryData($con)[0];
?>
<? foreach ($Categories as $category) { ?>
    <li><a class="dropdown-item" href="#"><?= $category["Category"] ?></a></li>
<? } ?>