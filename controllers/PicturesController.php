<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:10
 */

//namespace Controllers;


class PicturesController extends MainController{
    protected $picturesModel;

    public function __construct() {
        parent::__construct(get_class(), '/views/pictures/');
    }

    public function index() {
        $this->template = ROOT_DIR . '/views/pictures/index.php';

        include_once $this->layout;

        $this->picturesModel = new PicturesModel();
    }

    public function all() {
        $this->template = ROOT_DIR . '/views/pictures/all.php';

        include_once $this->layout;
    }

    public function add() {
        $this->template = ROOT_DIR . '/views/pictures/add.php';

        include_once $this->layout;
    }
}