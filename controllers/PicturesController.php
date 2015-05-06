<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:10
 */

namespace Controllers;


class PictureController extends MainController{

    public function __construct() {
        parent::__construct('/views/pictures/');
    }

    public function index() {
        $this->template = ROOT_DIR . '/views/pictures/index.php';

        include_once $this->layout;
    }

    public function create() {
        $this->template = ROOT_DIR . '/views/pictures/create.php';

        include_once $this->layout;
    }
}