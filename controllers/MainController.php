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

    public function __construct($viewLocation = '/views/main/' ) {
        $this->viewLocation = $viewLocation;
        $this->layout = ROOT_DIR . '/views/elements/default.php';
        echo "Main controller opened.";
    }

    public function index() {
        $template_name = ROOT_DIR . $this->viewLocation . 'index.php';

        include_once $this->layout;
    }
}