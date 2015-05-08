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
    protected $isPost = false;
    protected $user;

    public function __construct($className = 'MainController', $viewLocation = '/views/main/')
    {
        $this->viewLocation = $viewLocation;
        $this->layout = ROOT_DIR . '/views/layouts/default.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->isPost = true;
        }

        $authorization = \libs\Authorization::get_instance();
        $this->user = $authorization->getUser();
    }

    public function index()
    {
        $this->template = ROOT_DIR . '/views/main/index.php';

        include_once $this->layout;
    }

    public function redirectToUrl($url)
    {
        header('Location: ' . $url);
        die;
    }

    public function redirect($controller, $action = null, $params = null)
    {
        $url = '/' . urlencode($controller);
        if (!is_null($action)) {
            $url .= '/' . urlencode($action);
        }

        if (!is_null($params)) {
            $params = array_map($params, 'urlencode');
            $url .= implode('/', $params);
        }

        $this->redirect($url);
    }
}