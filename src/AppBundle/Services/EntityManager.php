<?php
/**
 * Created by PhpStorm.
 * User: Kelly
 * Date: 5/6/2017
 * Time: 3:28 PM
 */

namespace AppBundle\Services;


use AppBundle\Entity\CrudInterface;
use Monolog\Logger;

class EntityManager
{
    public function __construct(DatabaseService $db, Logger $logger) {
        $this->db = $db;
        $this->logger = $logger;
    }

    public function save(CrudInterface $entity) {
        $table = $entity::_getTableName();
        $fields = $entity::_getFields();

        $data = array();
        foreach ($fields as $field => $method) {
            $data[':' . $field] = $entity->{"get" . $method}();
        }

        return $this->db->insert($table, array_keys($fields), $data);
    }

    public function load($entityId, $class) {
        $class = 'AppBundle\\Entity\\' . $class;
        $entity = new $class();
        /** @var CrudInterface $entity */
        $table = $entity::_getTableName();
        $fields = $entity::_getFields();
        $pk = $entity::_getPrimaryKey();

        $result = $this->db->select($table, array_keys($fields), $pk . '=:entityId', array(':entityId' => $entityId));

        if($result) {
            $result = array_pop($result);
            foreach($fields as $field => $method) {
                // $method is the "X" part of setX(), getX() on the target entity
                $entity->{"set" . $method}($result->{$field});
            }
            return $entity;
        } else {
            return false;
        }
    }

    public function createFromJson($json, $class) {
        $class = 'AppBundle\\Entity\\' . $class;
        $entity = new $class();
        /** @var CrudInterface $entity */
        $fields = $entity::_getFields();

        foreach($fields as $field => $method) {
            // $method is the "X" part of setX(), getX() on the target entity
            $entity->{"set" . $method}($json->{$field});
        }
        return $entity;
    }

    public function updateFromJson($entityId, $json, $class) {
        // First get the initial object
        $entity = $this->load($entityId, $class);
        /** @var CrudInterface $entity */
        $table = $entity::_getTableName();
        $fields = $entity::_getFields();
        $pk = $entity::_getPrimaryKey();

        // Now update the entity
        $data = array();
        foreach (get_object_vars($json) as $field => $value) {
            // $method is the "X" part of setX(), getX() on the target entity
            $entity->{"set" . $fields[$field]}($value);
        }

        foreach ($fields as $field => $method) {
            $data[':' . $field] = $entity->{"get" . $method}();
        }

        return $this->db->update($table, array_keys($fields), $pk . '=:entityId', array(':entityId' => $entityId) + $data);
    }

    public function delete($entityId, $class) {
        $class = 'AppBundle\\Entity\\' . $class;
        $entity = new $class();
        /** @var CrudInterface $entity */
        $table = $entity::_getTableName();
        $pk = $entity::_getPrimaryKey();

        return $this->db->delete($table, $pk . '=:entityId', array(':entityId' => $entityId));
    }
}