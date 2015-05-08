<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 4.5.2015 г.
 * Time: 15:14
 */
//namespace Controllers;


class HomeController extends MainController
{

    public function __construct()
    {
        parent::__construct(get_class(), '/views/home/');
    }


}