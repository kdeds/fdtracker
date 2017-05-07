<?php
/**
 * Created by PhpStorm.
 * User: Kelly
 * Date: 5/6/2017
 * Time: 3:07 PM
 */

namespace AppBundle\Entity;


class Cat implements CrudInterface, \JsonSerializable
{
    private $id;
    private $name;
    private $birthdate;
    private $dxdate;
    private $notes;
    private $photo;
    private $remission;
    private $userId;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Cat
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
     * @return Cat
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     * @return Cat
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDxdate()
    {
        return $this->dxdate;
    }

    /**
     * @param mixed $dxdate
     * @return Cat
     */
    public function setDxdate($dxdate)
    {
        $this->dxdate = $dxdate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     * @return Cat
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     * @return Cat
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInRemission()
    {
        return $this->remission;
    }

    /**
     * @param mixed $remission
     * @return Cat
     */
    public function setInRemission($remission)
    {
        $this->remission = $remission;
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
     * @return Cat
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /* CRUD */
    public static function _getTableName()
    {
       return 'cat';
    }

    public static function _getFields()
    {
       return array(
           'id' => 'Id',
           'name' => 'Name',
           'birthdate' => 'Birthdate',
           'dxdate' => 'Dxdate',
           'notes' => 'Notes',
           'photo' => 'Photo',
           'remission' => 'InRemission',
           'userId' => 'UserId'
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
            'birthdate' => $this->getBirthdate(),
            'dxdate' => $this->getDxdate(),
            'notes' => $this->getNotes(),
            'photo' => $this->getPhoto(),
            'remission' => $this->getInRemission(),
            'userId' => $this->getUserId()
        );
    }
}