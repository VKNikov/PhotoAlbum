<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 7.5.2015 г.
 * Time: 16:27
 */
//namespace Models;


class AlbumsModel extends MainModel
{

    public function __construct($args = array())
    {
        parent::__construct(array('entity' => 'albums'));
    }

    public function getAlbumsWithLimit($limit = 10) {
        return $this->find(array('limit' => $limit, 'where' => 'is_public = ' . 1));
    }
}