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
    protected $hasVoted = false;
    protected $viewLocation;
    protected $layout;
    protected $template;
    protected $isPost = false;
    protected $authorization;

    public function __construct($className = 'MainController', $viewLocation = '/views/main/')
    {
        $this->viewLocation = $viewLocation;
        $this->layout = ROOT_DIR . '/views/layouts/default.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->isPost = true;
        }

        $this->authorization = \libs\Authorization::get_instance();
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
        $url = '/photoalbum/' . urlencode($controller);
        if (!is_null($action)) {
            $url .= '/' . urlencode($action);
        }

        if (!is_null($params)) {
            $params = array_map($params, 'urlencode');
            $url .= implode('/', $params);
        }

        $this->redirectToUrl($url);
    }

    function addMessage($msg, $type) {
        if (!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = array();
        };
        array_push($_SESSION['messages'],
            array('text' => $msg, 'type' => $type));
    }

    function addInfoMessage($msg) {
        $this->addMessage($msg, 'success');
    }

    function addErrorMessage($msg) {
        $this->addMessage($msg, 'error');
    }
}