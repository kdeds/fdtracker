<?php
/**
 * Created by PhpStorm.
 * User: Kelly
 * Date: 5/6/2017
 * Time: 2:55 PM
 */

namespace AppBundle\Entity;


class Entry implements CrudInterface, \JsonSerializable
{
    private $id;
    private $userId;
    private $type;
    private $catId;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Entry
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     * @return Entry
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Entry
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCatId()
    {
        return $this->catId;
    }

    /**
     * @param mixed $catId
     * @return Entry
     */
    public function setCatId($catId)
    {
        $this->catId = $catId;
        return $this;
    }

    public static function _getTableName()
    {
       return 'entry';
    }

    public static function _getFields()
    {
        return array(
          'id' => 'Id',
            'userId' => 'UserId',
            'type' => 'Type',
            'catId' => 'CatId'
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
            'userId' => $this->getUserId(),
            'type' => $this->getType(),
            'catId' => $this->getCatId()
        );
    }
}