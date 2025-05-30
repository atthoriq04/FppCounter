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
    <div class="my-8">
        <hr class="">
        <h5 class=" text-center text-2xl my-2"><?= $category['Category'] ?> </h5>
        <hr>
    </div>
    <div class="mx-auto grid gap-4 mt-3 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 ">
        <? foreach ($newNameList as $name) {
            if ($name["Cat"] === $category['cat_id']) {

        ?>
                <div class="border border-gray-300 rounded-xl w-full group shadow-lg max-w-full">
                    <a
                        class="edit block  hover:bg-gray-100 transition-colors duration-200 shadow-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#editNameModal"
                        data-name="<?= htmlspecialchars(json_encode($name, JSON_HEX_APOS | JSON_HEX_QUOT)) ?>"
                        data-sub="<?= htmlspecialchars(json_encode($data->getCategoryData($con)[2], JSON_HEX_APOS | JSON_HEX_QUOT)) ?>">
                        <div class="text-center py-4 px-2">
                            <h5 class="md:text-xl font-semibold text-gray-800 text-center">
                                <?= $name['Name'] ?>
                            </h5>
                            <h5 class=" text-sm md:text-lg font-semibold text-gray-800 text-center">
                                <?= $name['Category'] ?>( <?= $name['SubCategory'] ?>)
                            </h5>

                        </div>
                    </a>
                    <div class="h-[1px] w-full bg-gray-300 mt-2"></div>
                    <div class="">
                        <!-- Image Section -->
                        <div>

                            <img src="../assets/images/<?= $name['Image'] ?>"
                                id="image+<?= $name['id'] ?>"
                                class="w-full h-auto object-cover"
                                alt="<?= $name['Name'] ?> ">

                        </div>

                        <div class="h-[1px] w-full bg-gray-300 mb-2"></div>
                        <!-- Text Content -->
                        <div class="flex justify-center items-center">
                            <div class="card-body">
                                <ul class="list-group text-center space-y-2">
                                    <li class="text-lg font-medium"> 💦<?= $name['grandTotal'] ?></li>
                                </ul>
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