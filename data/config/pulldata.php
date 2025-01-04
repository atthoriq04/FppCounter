<?
function sendCounter($category, $counter)
{
    $tokeep = ["cat_id", "Category", "counterCount", "counterSum", "counterlatestUpdate"];
    $addData = [];
    foreach ($counter as $count) {
        $id_Cat = $count["Cat"];
        if (!isset($addData['counterCount'][$id_Cat])) {
            $addData['counterCount'][$id_Cat] = 0;
        }
        $addData['counterCount'][$id_Cat]++;
        if (isset($addData['counterSum'][$count["Cat"]])) {
            $addData['counterSum'][$count["Cat"]] += $count["count"];
        } else {
            $addData['counterSum'][$count["Cat"]] = $count["count"];
        }
        if (!isset($addData['dates'][$count['Cat']]) || strtotime($count['Last_Update']) > strtotime($addData['dates'][$count['Cat']])) {
            $addData['dates'][$count['Cat']] = $count['Last_Update'];
        }
    }
    $result = array_map(function ($item) use ($addData, $tokeep) {
        // Add count to the item based on "id"
        $item["counterCount"] =  $addData['counterCount'][$item['cat_id']] ?? 0;
        $item["counterSum"] =  $addData['counterSum'][$item['cat_id']] ?? 0;
        $item["counterlatestUpdate"] = $addData['dates'][$item['cat_id']] ?? 0;
        // Filter the item to keep only specified keys
        return array_intersect_key($item, array_flip($tokeep));
    }, $category);
    // echo '<pre>';
    // print_r($result);
    // echo '</pre>';
    return $result;
}
