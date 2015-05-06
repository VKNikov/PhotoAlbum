<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:10
 */

namespace models;


use Controllers\MainController;

class PictureController extends MainController{

    public function __construct() {
        parent::__construct('/views/pictures/');
    }

    public function index() {

    }
}