<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:09
 */

namespace models;


use Controllers\MainController;

class AlbumController extends MainController{

    public function __construct() {
        parent::__construct('/views/albums/');
    }

}