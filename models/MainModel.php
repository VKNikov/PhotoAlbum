<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 5.5.2015 г.
 * Time: 16:53
 */

//namespace Models;


class MainModel {
    protected $entity;
    protected $limit;
    protected $db;

    public function __construct($args = array()) {
        $args = array('limit' => 10 );
        if (!isset($args['entity'])) {
            die('Entity model not defined.');
        }

        $this->entity = $args['entity'];
        $this->limit = $args['limit'];

        $dbEntity = \Libs\Database::getInstance();
        $this->db = $dbEntity->getDb();

    }

    public function find($args = array()) {
        $default = array(
            'limit' => $this->limit,
            'entity' => $this->entity,
            'where' => '',
            'columns' => '*'
        );

        $args = array_merge($default, $args);

        $query = "SELECT {$args['columns']} FROM {$args['entity']}";

        if (!empty($args['where'])) {
            $query . "WHERE {$args['where']}";
        }

        if (!empty($args['limit'])) {
            $query . "LIMIT {$args['limit']}";
        }

        $dbResult = $this->db->query($query);
        $results = $this->retrieveData($dbResult);

        return $results;
    }

    protected function retrieveData($dbResult) {
        $results = array();
        if (!empty($dbResult) && $dbResult->num_rows > 0) {
            while ($row = $dbResult->fetch_assoc()) {
                $results[] = $row;
            }
        }

        return $results;
    }
}