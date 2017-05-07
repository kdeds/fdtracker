<?php
/**
 * Created by PhpStorm.
 * User: Kelly
 * Date: 5/6/2017
 * Time: 3:14 PM
 */

namespace AppBundle\Entity;


class KetoneEntry implements CrudInterface, \JsonSerializable
{
    private $entryId;
    private $timestamp;
    private $readingType;
    private $level;
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
     * @return KetoneEntry
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
     * @return KetoneEntry
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReadingType()
    {
        return $this->readingType;
    }

    /**
     * @param mixed $readingType
     * @return KetoneEntry
     */
    public function setReadingType($readingType)
    {
        $this->readingType = $readingType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     * @return KetoneEntry
     */
    public function setLevel($level)
    {
        $this->level = $level;
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
     * @return KetoneEntry
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }


    public static function _getTableName()
    {
        return 'ketone';
    }

    public static function _getFields()
    {
        return array(
            'entryId' => 'EntryId',
            'timestamp' => 'Timestamp',
            'readingType' => 'ReadingType',
            'level' => 'Level',
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
            'readingType' => $this->getReadingType(),
            'level' => $this->getLevel(),
            'notes' => $this->getNotes()
        );
    }

}