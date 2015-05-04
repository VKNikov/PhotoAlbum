<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 3.5.2015 г.
 * Time: 18:12
 */

include_once('config/config.php');

define( 'ROOT_DIR', dirname( __FILE__ ) . '/' );
define( 'ROOT_PATH', basename( dirname( __FILE__ ) ) . '/' );

$request = $_SERVER['REQUEST_URI'];
$requestHome = '/' . ROOT_PATH;

$controller = 'main';
$action = 'index';
$params = array();



if (!empty($request)) {
    if (strpos($request, strtolower($requestHome)) === 0) {
        $request = substr($request, strlen($requestHome));
        $requestParts = explode('/', parse_url($request, PHP_URL_PATH));

        var_dump($requestParts);
        if (count($requestParts) > 1) {
            $className = ucfirst($requestParts[0]) . 'Controller';
            if (class_exists($className)) {
                list($controller, $action) = $requestParts;
            } else {
                include_once 'controllers/MainController.php';
            }

            if (isset($requestParts[2])) {
                $params = array_splice($requestParts, 2);
                var_dump($params);
            }
        } else {
            include_once 'controllers/MainController.php';
        }
    }
}

$class = '\controllers\\' . ucfirst($controller) . 'Controller';
$instance = new $class;

if (method_exists($instance, $action)) {
    call_user_func_array(array($controller_instance, $method), array($params));
}

function __autoload($className) {
    if (file_exists("controllers/$className.php")) {
        include "controllers/$className.php";
    }

    if (file_exists("models/$className.php")) {
        include "models/$className.php";
    }
}