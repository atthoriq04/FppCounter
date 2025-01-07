<?php
$data = new get("../data/config/query.php");
require "../data/config/pulldata.php";
$names = $data->getNames($con);
$counters = $data->getAllCounter($con);
$yearList = $data->getYearData($con);
$categories = $data->getCategoryData($con)[0];
$newNameList = getNames($names, $counters, $yearList[1]);
?>

<? foreach ($categories as $category) {
    $x = 1; ?>

    <hr class="mt-1">
    <div class="container">
        <div class="row">
            <h5 class="text-center"><?= $category['Category'] ?> </h5>
        </div>
    </div>
    <hr>
    <div class="row mt-1 mx-0">
        <? foreach ($newNameList as $name) {
            if ($name["Cat"] === $category['cat_id']) {

        ?>
                <div class="col-4 namelists ">
                    <div class="card mb-3" style="max-width: 100%;">
                        <div class="row g-0">
                            <div class="col-xl-6">
                                <img src="../assets/images/<?= $name['Image'] ?>" id="image+<?= $name['id'] ?>" class="img-fluid  rounded-start text-center " styly="width:50vw" alt=" ...">
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $name['Name'] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $name['Category'] . " " . $name['SubCategory'] ?></h6>
                                    <hr>
                                    <ul class="list-group">
                                        <li class="list-group-item"><?= $name['grandTotal'] ?> times</li>
                                        <a href="#" class="card-link mt-3 edit" data-bs-toggle="modal"
                                            data-bs-target="#editNameModal" data-name="<?= htmlspecialchars(json_encode($name, JSON_HEX_APOS | JSON_HEX_QUOT)) ?> " data-sub="<?= htmlspecialchars(json_encode($data->getCategoryData($con)[2], JSON_HEX_APOS | JSON_HEX_QUOT)) ?>">Edit Data</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <?

                $x++;
            }
        } ?>
    </div>
<? $x = 0;
} ?>