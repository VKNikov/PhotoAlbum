<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:10
 */

namespace Controllers;


class UserController extends MainController{

    public function __construct() {
        parent::__construct('/views/user/');
    }

    public function edit() {
        $this->template = ROOT_DIR . '/views/user/edit.php';

        include_once $this->layout;
    }

    public function register() {
        $this->template = ROOT_DIR . '/views/user/register.php';

        include_once $this->layout;
    }

    public function login() {
        $this->template = ROOT_DIR . '/views/user/login.php';

        include_once $this->layout;
    }

    public function logout() {
        $this->template = ROOT_DIR . '/views/user/logout.php';

        include_once $this->layout;
    }
}