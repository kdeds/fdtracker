<?php
/**
 * Created by PhpStorm.
 * User: Kelly
 * Date: 5/6/2017
 * Time: 3:18 PM
 */

namespace AppBundle\Entity;


class Meter implements CrudInterface, \JsonSerializable
{
    private $id;
    private $manufacturer;
    private $model;
    private $calibratedFor;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Meter
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param mixed $manufacturer
     * @return Meter
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     * @return Meter
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalibratedFor()
    {
        return $this->calibratedFor;
    }

    /**
     * @param mixed $calibratedFor
     * @return Meter
     */
    public function setCalibratedFor($calibratedFor)
    {
        $this->calibratedFor = $calibratedFor;
        return $this;
    }


    public static function _getTableName()
    {
        return 'meter';
    }

    public static function _getFields()
    {
        return array(
            'id' => 'Id',
            'manufacturer' => 'Manufacturer',
            'model' => 'Model',
            'calibratedFor' => 'CalibratedFor'
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
            'manufacturer' => $this->getManufacturer(),
            'model' => $this->getModel(),
            'calibratedFor' => $this->getCalibratedFor()
        );
    }
}