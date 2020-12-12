<?php
namespace bms\app\model\report;
use bms\app\model\basic;
/**
 * Class Ec5minSumModel
 * @package bms\app\model\report
 */
class Ec5minSumModel extends basic\BasicModel
{
    /**
     * @param array $params
     * @return bool|\mysqli_result
     */
    public function selectPeakValuePer1h($params=[])
    {
        $sql = $this->getSql(__FUNCTION__);
        // 追加条件
        $and="";
        if($params){
            $and = sprintf(" AND %s = %s", $params["col"], $params["val"]);
        }
        $sql = str_replace("@and", $and, $sql);

        return $this->selectAll($sql);
    }
}