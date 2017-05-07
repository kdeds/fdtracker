<?php
/**
 * Created by PhpStorm.
 * User: Kelly
 * Date: 5/6/2017
 * Time: 3:02 PM
 */

namespace AppBundle\Entity;


class EntryType implements CrudInterface,\JsonSerializable
{
    private $id;
    private $name;
    private $access;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return EntryType
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
     * @return EntryType
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * @param mixed $access
     * @return EntryType
     */
    public function setAccess($access)
    {
        $this->access = $access;
        return $this;
    }


    public static function _getTableName()
    {
        return 'entrytype';
    }

    public static function _getFields()
    {
        return array(
            'id' => 'Id',
            'name' => 'Name',
            'access' => 'Access'
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
            'access' => $this->getAccess()
        );
    }
}