<?php


namespace App\Controllers;


use App\Models\User;


class LoginController
{   
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function loginView()
    {
        require_once './App/Views/login.php';
    }

    public function authenticateUser()
    {
        $this->user->setEmail($_POST['email']);
        $this->user->setPassword($_POST['password']);

        $this->user->login();
    }
}
