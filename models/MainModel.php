<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 5.5.2015 г.
 * Time: 16:53
 */
//namespace Models;


class MainModel
{
    protected $entity;
    protected $limit;
    protected $db;
    protected $args;

    public function __construct($args = array())
    {
        $this->entity = $args['entity'];
        if (!isset($args['limit'])) {
            $this->limit = 10;
        } else {
            $this->limit = $args['limit'];
        }

        if (!isset($this->entity)) {
            die('Entity model not defined.');
        }

        $dbEntity = \Libs\Database::getInstance();
        $this->db = $dbEntity->getDb();
        $this->db->set_charset('utf8');

    }

    public function get($id)
    {
        return $this->find(array('where' => 'id = ' . $id));
    }

    public function getByName($name)
    {
        return $this->find(array('where' => "name = '" . $name) . "'");
    }

    public function getAll()
    {
        return $this->find(array('limit' => ''));
    }

    public function getWithLimit($limit = 10) {
        return $this->find(array('limit' => $limit));
    }

    public function getAlbumsByUser($userId) {
        return $this->find(array('where' => 'user_id = ' . $userId, 'columns' => 'id, name', 'entity' => 'albums'));
    }

    public function update($element)
    {

    }

    public function add($element)
    {
        $keys = array_keys($element);
        $values = array();

        foreach ($element as $key => $value) {
            $values[] = "'" . $this->db->real_escape_string($value) . "'";
        }

        $keys = implode(',', $keys);
        $values = implode(',', $values);

        $query = "INSERT INTO {$this->entity} ($keys) VALUES($values)";

        $this->db->query($query);

        return $this->db->affected_rows;
    }

    public function find($args = array())
    {
        $default = array(
            'limit' => $this->limit,
            'entity' => $this->entity,
            'where' => '',
            'columns' => '*'
        );

        $args = array_merge($default, $args);
        extract( $args );

        $query = "SELECT {$args['columns']} FROM {$args['entity']}";

        if (!empty($where)) {
            $query .= " WHERE $where";
        }

        if (!empty($limit)) {
            $query .= " LIMIT $limit";
        }

        $dbResult = $this->db->query($query);
        $results = $this->retrieveData($dbResult);

        return $results;
    }

    protected function retrieveData($dbResult)
    {
        $results = array();
        if (!empty($dbResult) && $dbResult->num_rows > 0) {
            while ($row = $dbResult->fetch_assoc()) {
                $results[] = $row;
            }
        }

        return $results;
    }
}