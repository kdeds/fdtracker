<?php
/**
 * Created by PhpStorm.
 * User: Kelly
 * Date: 5/6/2017
 * Time: 3:05 PM
 */

namespace AppBundle\Entity;


class GlucoseEntry implements CrudInterface, \JsonSerializable
{
    private $entryId;
    private $timestamp;
    private $value;
    private $meter;
    private $notes;

    /**
     * @return mixed
     */
    public function getEntryId()
    {
        return $this->entryId;
    }

    /**
     * @param mixed $entryId
     * @return GlucoseEntry
     */
    public function setEntryId($entryId)
    {
        $this->entryId = $entryId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     * @return GlucoseEntry
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return GlucoseEntry
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMeter()
    {
        return $this->meter;
    }

    /**
     * @param mixed $meter
     * @return GlucoseEntry
     */
    public function setMeter($meter)
    {
        $this->meter = $meter;
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
     * @return GlucoseEntry
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    public static function _getTableName()
    {
        return 'glucose';
    }

    public static function _getFields()
    {
        return array(
            'entryId' => 'EntryId',
            'timestamp' => 'Timestamp',
            'value' => 'Value',
            'meter' => 'Meter',
            'notes' => 'Notes'
        );
    }

    public static function _getPrimaryKey()
    {
        return 'entryId';
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
            'entryId' => $this->getEntryId(),
            'timestamp' => $this->getTimestamp(),
            'value' => $this->getValue(),
            'meter' => $this->getMeter(),
            'notes' => $this->getNotes()
        );
    }
}