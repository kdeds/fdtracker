<?php

namespace AppBundle\Services;

use Monolog\Logger;
use \PDO;
use \PDOException;

/**
 * Class DatabaseService
 * This class is used to perform database operations.
 *
 * @package AppBundle\Services
 */
class DatabaseService {
    private $db;

    /**
     * Create a PDO object with the given connection info.
     *
     * @param string $host DB host
     * @param string $username DB user
     * @param string $password DB password
     * @param string $database DB name
     * @return PDO
     */
    public static function createDbConnection($host, $username, $password, $database) {
        try{
            $db = new PDO('mysql:host=' . $host. ';dbname=' . $database . ';charset=utf8', $username, $password);
        } catch(PDOException $e) {
            throw $e;
        }

        return $db;
    }

    /**
     * Create a new DatabaseService object with the given connection info.
     * @param string $host DB host
     * @param string $username DB user
     * @param string $password DB password
     * @param string $database DB name
     * @param Logger $logger Logger
     */
    public function __construct($host, $username, $password, $database, Logger $logger) {
        $this->logger = $logger;
        try{
            $this->db = self::createDbConnection($host, $username, $password, $database);
        } catch(PDOException $e) {
            $this->logger->error($e->getMessage());
        }
    }

    /**
     * Select rows from a table.
     *
     * @param string $table Table name
     * @param string $fields List of fields to return
     * @param string $condition Condition string with optional placeholders
     * @param array $placeholders Array of placeholder values
     *
     * @return array Array of database row objects
     */
    public function select($table, $fields = '*', $condition = '', $placeholders = array()) {
        if(is_array($fields)) {
            $fields = implode(',', $fields);
        }
        $queryString = 'SELECT ' . $fields . ' FROM ' . $table;
        if(strpos($condition, "ORDER BY") == 1) {
            $queryString .= $condition;
        } else if($condition !== '') {
            $queryString .= ' WHERE ' . $condition;
        }
        return $this->query($queryString, $placeholders);
    }

    /**
     * Delete rows from a table.
     *
     * @param string $table Table name
     * @param string $condition Condition string with optional placeholders. If you actually want to delete everything, pass "DELETE ALL ROWS"
     * @param array $placeholders Array of placeholder values
     *
     * @return array Array of database row objects
     */
    public function delete($table, $condition, $placeholders = array()) {
        $queryString = 'DELETE FROM ' . $table;
        if($condition !== 'DELETE ALL ROWS') {
            $queryString .= ' WHERE ' . $condition;
        }
        return $this->query($queryString, $placeholders);
    }

    /**
     * Perform a generic query on the database. This is also used internally for other types of queries.
     *
     * @param string $queryString Query to run.
     * @return array|string Array of database row objects or last insert id.
     */
    public function query($queryString, $placeholders = array(), $insert = false) {
        $query = $this->db->prepare($queryString);
        $query->execute($placeholders);

        if($insert) {
            return $this->db->lastInsertId();
        } else {
            $results = array();
            while($row = $query->fetchObject()) {
                $results[] = $row;
            };
            return $results;
        }

    }

    /**
     * Insert a row into the database.
     *
     * @param string $table Table name
     * @param array $fields Array of field names
     * @param array $data Array of field values
     * @return array Array of resulting database object rows
     */
    public function insert($table, $fields, $data) {
        $queryString = 'INSERT INTO ' . $table . '(' . implode(',',$fields) . ') VALUES ('. implode(',', array_keys($data)) .')';
        return $this->query($queryString, $data, true);
    }

    public function update($table, $fields, $condition, $placeholders) {
        $queryString = 'UPDATE ' . $table . ' SET ';
        $kvPairs = array();
        foreach($fields as $field) {
            $kvPairs[] = $field . '=' . ':' . $field;
        }
        $queryString .= implode(',', $kvPairs);
        $queryString .= ' WHERE ' . $condition;
        return $this->query($queryString, $placeholders);
    }

    public function getLastError() {
        return $this->db->errorInfo();
    }

}