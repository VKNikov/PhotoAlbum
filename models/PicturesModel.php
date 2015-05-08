<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 7.5.2015 г.
 * Time: 16:28
 */
//namespace Models;


class PicturesModel extends MainModel
{

    public function __construct($args = array())
    {
        parent::__construct(array('entity' => 'pictures'));
    }

}