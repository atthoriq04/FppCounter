<?php
class get
{
    private $query;
    public function __construct($loc)
    {
        include_once $loc;
        $this->query = new query();
    }
    function getYearData($con)
    {
        $rawDatas = $this->query->get_data($con, "SELECT * FROM year");
        $tokeep = ["Year", "Total", "Average"];
        $datas = array_map(function ($item) use ($tokeep) {
            return array_intersect_key($item, array_flip($tokeep));
        }, $rawDatas);
        $returend = [$tokeep, $datas];

        return $returend;
    }

    function getCategoryData($con)
    {
        $categoryDatas = $this->query->get_data($con, "SELECT * FROM category");
        $subs = $this->query->get_data($con, "SELECT * FROM subcategory ORDER BY id_cat ASC;");
        $tokeep = ["cat_id", "Category", "subCategoryCount"];
        $subCount = [];
        foreach ($subs as $sub) {
            $id_Cat = $sub["id_cat"];
            if (!isset($subCount[$id_Cat])) {
                $subCount[$id_Cat] = 0;
            }
            $subCount[$id_Cat]++;
        }
        $result = array_map(function ($item) use ($subCount, $tokeep) {
            // Add count to the item based on "id"
            $item["subCategoryCount"] = $subCount[$item["cat_id"]] ?? 0;
            // Filter the item to keep only specified keys
            return array_intersect_key($item, array_flip($tokeep));
        }, $categoryDatas);

        $returend = [$result, $tokeep, $subs];
        return $returend;
    }

    function getNames($con)
    {
        $names = $this->query->get_data($con, "SELECT * FROM name INNER JOIN category ON name.Cat = category.cat_Id INNER JOIN subcategory ON subcategory.sub_id = name.Sub ORDER BY sub ASC,name.id ASC");
        $returend = $names;
        return $returend;
    }

    function getLatestCounter($con)
    {
        $year = date("Y");
        $conter = $this->query->get_data($con, "SELECT * FROM counter INNER JOIN name ON counter.id_name = name.id  INNER JOIN subcategory ON name.sub = sub_id WHERE counter.Year_id = '$year'");
        return $conter;
    }

    function getAllCounter($con)
    {
        $conter = $this->query->get_data($con, "SELECT * FROM counter INNER JOIN name ON counter.id_name = name.id  INNER JOIN subcategory ON name.sub = sub_id");
        return $conter;
    }

    function getLogs($con, $id)
    {
        return $this->query->get_data($con, "SELECT * FROM logs WHERE id = '$id'");
    }
}
