<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 7.5.2015 г.
 * Time: 17:45
 */
//namespace Models;


class UserModel extends MainModel
{

    public function __construct($args = array())
    {
        parent::__construct(array('entity' => 'users'));
    }

    public function login($username, $password)
    {
        $result = $this->find(array('columns' => 'id, username, password',
            'where' => "username = " . "'" .$username . "'"));

        if (!empty($result)) {
            if (password_verify($password, $result[0]['password'])) {
                $_SESSION['username'] = $result[0]['username'];
                $_SESSION['user_id'] = $result[0]['id'];
                return true;
            }

            return false;
        }

        return false;
    }

    public function register($username, $email, $password)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);

        $result = $this->find(array('entity' => 'users', 'where' => "username = " . "'" .$username . "'", 'limit' => ''));
        if (empty($result)) {
            $this->add(array('username' => $username, 'email' => $email, 'password' => $password));

            return true;
        }

       return false;
    }
}