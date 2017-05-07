<?php
/**
 * Created by PhpStorm.
 * User: Kelly
 * Date: 5/6/2017
 * Time: 3:16 PM
 */

namespace AppBundle\Entity;


class MedicationEntry implements CrudInterface, \JsonSerializable
{
    private $entryId;
    private $medication;
    private $amount;
    private $timestamp;
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
     * @return MedicationEntry
     */
    public function setEntryId($entryId)
    {
        $this->entryId = $entryId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMedication()
    {
        return $this->medication;
    }

    /**
     * @param mixed $medication
     * @return MedicationEntry
     */
    public function setMedication($medication)
    {
        $this->medication = $medication;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     * @return MedicationEntry
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
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
     * @return MedicationEntry
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
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
     * @return MedicationEntry
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }


    public static function _getTableName()
    {
        return 'medication';
    }

    public static function _getFields()
    {
        return array(
            'entryId' => 'EntryId',
            'timestamp' => 'Timestamp',
            'medication' => 'Medication',
            'amount' => 'Amount',
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
            'medication' => $this->getMedication(),
            'amount' => $this->getAmount(),
            'notes' => $this->getNotes()
        );
    }
}