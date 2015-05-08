<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 3.5.2015 г.
 * Time: 18:13
 */
//namespace Controllers;


class MainController
{
    protected $viewLocation;
    protected $layout;
    protected $template;
    protected $isPosted = false;

    public function __construct($className = 'MainController', $viewLocation = '/views/main/')
    {
        $this->viewLocation = $viewLocation;
        $this->layout = ROOT_DIR . '/views/layouts/default.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->isPosted = true;
        }
    }

    public function index()
    {
        $this->template = ROOT_DIR . '/views/main/index.php';

        include_once $this->layout;
    }

    protected function isLoggedIn()
    {
        return isset($_SESSION['username']);
    }

    public function redirectToUrl($url)
    {
        header('Location: ' . $url);
        die;
    }

    public function redirect($controller, $action = null)
    {

    }
}