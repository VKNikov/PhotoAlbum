<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 8.5.2015 г.
 * Time: 9:22
 */

namespace Libs;


class Authorization
{
    private static $isLoggedIn = false;
    private static $isAdmin = false;
    private static $user = array();

    public function __construct()
    {
        session_set_cookie_params(1800, "/");
        session_start();

        if (!empty($_SESSION['username'])) {
            self::$isLoggedIn = true;

            self::$user = array(
                'id' => $_SESSION['user_id'],
                'username' => $_SESSION['username']
            );

            if (!empty($_SESSION['isAdmin'])) {
                self::$isAdmin = true;
            }
        }
    }

    public static function get_instance()
    {
        static $instance = null;

        if( null === $instance ) {
            $instance = new static();
        }

        return $instance;
    }

    public function isLoggedIn() {
        return self::$isLoggedIn;
    }

    public function isAdmin() {
        return self::$isAdmin;
    }

    public function getUser() {
        return self::$user;
    }

}