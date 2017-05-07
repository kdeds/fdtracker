<?php
/**
 * Created by PhpStorm.
 * User: Kelly
 * Date: 5/6/2017
 * Time: 3:13 PM
 */

namespace AppBundle\Entity;


class Insulin implements CrudInterface, \JsonSerializable
{
    private $id;
    private $name;
    private $syringeType;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Insulin
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Insulin
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSyringeType()
    {
        return $this->syringeType;
    }

    /**
     * @param mixed $syringeType
     * @return Insulin
     */
    public function setSyringeType($syringeType)
    {
        $this->syringeType = $syringeType;
        return $this;
    }

    public static function _getTableName()
    {
        return 'insulin';
    }

    public static function _getFields()
    {
        return array(
            'id' => 'Id',
            'name' => 'Name',
            'syringeType' => 'SyringeType'
        );
    }

    public static function _getPrimaryKey()
    {
        return 'id';
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'syringeType' => $this->getSyringeType()
        );
    }

}