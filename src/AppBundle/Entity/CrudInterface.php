<?php
/**
 * Created by PhpStorm.
 * User: Kelly
 * Date: 5/6/2017
 * Time: 3:43 PM
 */

namespace AppBundle\Entity;


interface CrudInterface
{
    public static function _getTableName();
    public static function _getFields();
    public static function _getPrimaryKey();
}