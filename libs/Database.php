<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 5.5.2015 г.
 * Time: 17:56
 */

namespace Libs;


class Database
{
    private static $db;

    private function __construct()
    {
        $current_db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        self::$db = $current_db;
    }

    public static function getInstance()
    {
        static $instance = null;

        if ($instance == null) {
            return new static();
        }

        return $instance;
    }

    public static function getDb()
    {
        return self::$db;
    }
}