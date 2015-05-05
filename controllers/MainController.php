<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 3.5.2015 г.
 * Time: 18:13
 */

namespace Controllers;


class MainController {
    protected $viewLocation;
    protected $layout;
    protected $template;

    public function __construct($viewLocation = '/views/main/' ) {
        $this->viewLocation = $viewLocation;
        $this->layout = ROOT_DIR . '/views/elements/default.php';
    }

    public function index() {
        //$template = ROOT_DIR . $this->viewLocation . 'index.php';
        $this->template = ROOT_DIR . '/views/main/index.php';

        include_once $this->layout;
    }
}