<?
function sendCounter($category, $counter, $members)
{
    $tokeep = ["cat_id", "Category", "membercount", "counterCount", "counterSum", "counterlatestUpdate", "yearlyTotal"];
    $addData = [];
    $years = range(2023, date("Y"));

    foreach ($members as $member) {
        $id_Cat = $member["Cat"];  // Store the category ID
        if (!isset($addData['membercount'][$id_Cat])) {
            $addData['membercount'][$id_Cat] = 0;
        }
        $addData['membercount'][$id_Cat]++;
    }
    foreach ($counter as $count) {
        $id_Cat = $count["Cat"];  // Store the category ID
        if (!isset($addData['counterCount'][$id_Cat])) {
            $addData['counterCount'][$id_Cat] = 0;
        }
        $addData['counterCount'][$id_Cat]++;
        // Counter count: Increment for each occurrence of the category
        // Counter sum: Accumulate the count for each category
        if (isset($addData['counterSum'][$id_Cat])) {
            $addData['counterSum'][$id_Cat] += $count["count"];
        } else {
            $addData['counterSum'][$id_Cat] = $count["count"];
        }

        // Date: Keep the latest date for each category
        if (!isset($addData['dates'][$id_Cat]) || strtotime($count['Last_Update']) > strtotime($addData['dates'][$id_Cat])) {
            $addData['dates'][$id_Cat] = $count['Last_Update'];
        }

        // Yearly totals: Initialize the yearly totals for each category
        if (!isset($addData['yearlyTotal'][$id_Cat])) {
            $addData['yearlyTotal'][$id_Cat] = array_fill_keys($years, 0);
        }

        // Update the specific year if data exists
        if (isset($count["Year_id"], $count["count"])) {
            $addData['yearlyTotal'][$id_Cat][$count["Year_id"]] += $count["count"];
        }
    }

    // Now we map over the categories
    $result = array_map(function ($item) use ($addData, $tokeep) {
        // Add count to the item based on "id"
        $item["counterCount"] = $addData['counterCount'][$item['cat_id']] ?? 0;
        $item["counterSum"] = $addData['counterSum'][$item['cat_id']] ?? 0;
        $item["membercount"] = $addData['membercount'][$item["cat_id"]] ?? 0;
        $item["counterlatestUpdate"] = $addData['dates'][$item['cat_id']] ?? 0;
        $item["yearlyTotal"] = $addData['yearlyTotal'][$item["cat_id"]] ?? 0;

        // Keep the original keys along with the additional fields
        return $item;
    }, $category);
    // echo '<pre>';
    // print_r($result);
    // echo '</pre>';
    return $result;
}

function getNames($name, $counter, $year)
{
    $years = range(2023, date("Y"));
    $tokeep = ["cat_id", "Category", "counterCount", "counterSum", "counterlatestUpdate"];
    $addData = [];
    foreach ($counter as $count) {
        $idName = $count["id_name"];
        // if (!isset($addData['counterCount'][$idName])) {
        //     $addData['counterCount'][$idName] = 0;
        // }
        // $addData['counterCount'][$idName]++;
        if (isset($addData['grandTotal'][$count["id_name"]])) {
            $addData['grandTotal'][$count["id_name"]] += $count["count"];
        } else {
            $addData['grandTotal'][$count["id_name"]] = $count["count"];
        }


        // if (isset($addData['yearlyTotal'][$count["id_name"]][$count["Year_id"]])) {
        //     $addData['yearlyTotal'][$count["id_name"]][$count["Year_id"]] += $count["count"];
        // } else {
        //     $addData['yearlyTotal'][$count["id_name"]][$count["Year_id"]] = $count["count"];
        // }
        if (!isset($addData['yearlyTotal'][$count["id_name"]])) {
            $addData['yearlyTotal'][$count["id_name"]] = array_fill_keys($years, 0);
        }

        // Update the specific year if data exists
        if (isset($count["Year_id"], $count["count"])) {
            $addData['yearlyTotal'][$count["id_name"]][$count["Year_id"]] += $count["count"];
        }
        // if (!isset($addData['yearlyTotal'][$count["id_name"]])) {
        //     $addData['yearlyTotal'][$count["id_name"]] = array_fill(2023, 3, 0); // Months 1-12 initialized to 0
        // }
        // // Update the count for the given month
        // $addData['counterSum'][$count["id_name"]][$count["Year_id"]] += $count["count"];

        // if (!isset($addData['dates'][$count['Cat']]) || strtotime($count['Last_Update']) > strtotime($addData['dates'][$count['Cat']])) {
        //     $addData['dates'][$count['Cat']] = $count['Last_Update'];
        // }
    }
    $result = array_map(function ($item) use ($addData) {
        // Add count to the item based on "id"
        $item["grandTotal"] =  $addData['grandTotal'][$item['id']] ?? 0;
        $item["yearlyTotal"] =  $addData['yearlyTotal'][$item['id']] ?? 0;
        // $item["counterlatestUpdate"] = $addData['dates'][$item['cat_id']] ?? 0;
        // Filter the item to keep only specified keys
        return $item;
    }, $name);
    // usort($result, function ($a, $b) {
    //     return $b['grandTotal'] <=> $a['grandTotal']; // Ascending order
    // });

    return $result;
}
