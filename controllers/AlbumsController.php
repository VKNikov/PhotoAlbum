<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:09
 */

namespace Controllers;


class AlbumController extends MainController{

    public function __construct() {
        parent::__construct('/views/albums/');
    }

    public function create() {
        $this->template = ROOT_DIR . '/views/albums/create.php';

        include_once $this->layout;
    }
}