<?php
namespace bms\app\model\basic;
use bms\app\common;
/**
 * Class BasicModel
 * @package bms\app\model\basic
 */
class BasicModel implements common\IObject
{
    use common\CommonTrait; // getClassName を使用するためのTrait

    private $link;
    public function __construct()
    {
//        $this->link = $link;
        $this->link = new \mysqli();
    }

    /**
     * @param string $func_name
     * @return string
     */
    public function getSql($func_name)
    {
        // クラス完全修飾名からsqlファイルのパスを取得
        $class_path = str_replace("\\", "/", $this->getClassName());
        $path = str_replace("/app/model/", "/sql/", $class_path);
        $path = substr($path, 0, -strlen("Model")); // 末尾の"Model"を削除

        // SQLファイルの中身を取得
        $sql = file_get_contents("{$path}/{$func_name}.sql");
        return $sql;
    }

    /**
     * @param string $sql
     * @return bool|\mysqli_result
     */
    public function selectAll($sql)
    {
        $result = $this->link->query($sql);
        return $result;
    }
}