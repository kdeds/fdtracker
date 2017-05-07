<?php
/**
 * Created by PhpStorm.
 * User: Kelly
 * Date: 5/6/2017
 * Time: 3:19 PM
 */

namespace AppBundle\Entity;


class ShotEntry implements CrudInterface, \JsonSerializable
{
    private $entryId;
    private $units;
    private $insulin;
    private $notes;
    private $timestamp;

    /**
     * @return mixed
     */
    public function getEntryId()
    {
        return $this->entryId;
    }

    /**
     * @param mixed $entryId
     * @return ShotEntry
     */
    public function setEntryId($entryId)
    {
        $this->entryId = $entryId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @param mixed $units
     * @return ShotEntry
     */
    public function setUnits($units)
    {
        $this->units = $units;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsulin()
    {
        return $this->insulin;
    }

    /**
     * @param mixed $insulin
     * @return ShotEntry
     */
    public function setInsulin($insulin)
    {
        $this->insulin = $insulin;
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
     * @return ShotEntry
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
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
     * @return ShotEntry
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    public static function _getTableName()
    {
        return 'shot';
    }

    public static function _getFields()
    {
        return array(
            'entryId' => 'EntryId',
            'timestamp' => 'Timestamp',
            'units' => 'Units',
            'insulin' => 'Insulin',
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
            'units' => $this->getUnits(),
            'insulin' => $this->getInsulin(),
            'notes' => $this->getNotes()
        );
    }

}