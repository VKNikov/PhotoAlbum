<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:10
 */
//namespace Controllers;


class UserController extends MainController
{
    protected $userModel;

    public function __construct()
    {
        parent::__construct(get_class(), '/views/user/');
        $this->userModel = new UserModel();
    }

    public function edit()
    {
        $this->template = ROOT_DIR . '/views/user/edit.php';

        include_once $this->layout;
    }

    public function register()
    {
        if ($this->isPost) {
            $username = $_POST['username'];
            if (!$this->isValidStr($username))  {
                $this->addErrorMessage('Username contains invalid characters!');
                $this->redirect('user', 'register');
            }

            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPass = $_POST['confirmPass'];
            if ($password !== $confirmPass) {
                $this->addErrorMessage("Passwords mismatch. Please reenter your info.");
                $this->redirect('user', 'register');
            }

            $captcha = $_POST['captcha'];
            if ($captcha != $_SESSION['vercode']) {
                $this->addErrorMessage("Captcha code was wrong. Please try again.");
                $this->redirect('user', 'register');
            }

            if ($this->userModel->register($username, $email, $password)) {
                $this->addInfoMessage("Registration successful. You can now logon in.");
                $this->redirect('main');
            } else {
                $this->addErrorMessage("Registration failed. Please try again.");
            }
        }

        $this->template = ROOT_DIR . '/views/user/register.php';

        include_once $this->layout;
    }

    public function login()
    {
        if ($this->isPost) {
            $username = $_POST['username'];
            if (!$this->isValidStr($username))  {
                $this->addErrorMessage('Username contains invalid characters!');
                $this->redirect('user', 'login');
            }

            $password = $_POST['password'];

            if (!is_null($username) && !is_null($password)) {
                if ($this->userModel->login($username, $password)) {
                    $this->addInfoMessage('Login successful!');
                    $this->redirect('albums', 'home');
                }

                $this->addErrorMessage('Invalid username or password. Please try again.');

            } else {
                $this->addErrorMessage('Username or password cannot be empty!');
                $this->redirect('user', 'login');
            }
        }

        $this->template = ROOT_DIR . '/views/user/login.php';

        include_once $this->layout;
    }

    public function logout()
    {
        unset($_SESSION['username']);
        unset($_SESSION['user_id']);

        $this->redirect('albums', 'index');
    }

    private function isValidStr($str) {
        return !preg_match('/[^A-Za-z0-9.#\\-$]/', $str);
    }
}