<?php
namespace bms\app\common;
/**
 * Class CommonTrait
 * @package bms\app\common
 */
trait CommonTrait
{
    public function getClassName()
    {
        return get_called_class();
    }
}