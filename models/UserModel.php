<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 7.5.2015 г.
 * Time: 17:45
 */

//namespace Models;


class UserModel extends MainModel {
    
    public function __construct($args = array()) {
        parent::__construct(array('entity' => 'users'));
    }
}