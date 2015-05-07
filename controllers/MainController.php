<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 3.5.2015 г.
 * Time: 18:13
 */

//namespace Controllers;


class MainController {
    protected $viewLocation;
    protected $layout;
    protected $template;

    public function __construct($className = 'MainController', $viewLocation = '/views/main/' ) {
        $this->viewLocation = $viewLocation;
        $this->layout = ROOT_DIR . '/views/layouts/default.php';
    }

    public function index() {
        $this->template = ROOT_DIR . '/views/main/index.php';

        include_once $this->layout;
    }
}