<?php
/**
 * Created by PhpStorm.
 * User: Kelly
 * Date: 5/6/2017
 * Time: 3:20 PM
 */

namespace AppBundle\Entity;


class User implements CrudInterface, \JsonSerializable
{
    private $id;
    private $email;
    private $password;
    private $photo;
    private $name;
    private $notes;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
     * @return User
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
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
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return User
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }


    public static function _getTableName()
    {
        return 'user';
    }

    public static function _getFields()
    {
        return array(
            'id' => 'Id',
            'email' => 'Email',
            'password' => 'Password',
            'photo' => 'Photo',
            'name' => 'Name',
            'notes' => 'Notes'
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
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'photo' => $this->getPhoto(),
            'name' => $this->getName(),
            'notes' => $this->getNotes()
        );
    }
}