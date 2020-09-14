<?php

use App\Route;

session_start();

require_once './autoload.php';

use App\Router;
use App\Controllers\LoginController;

$router = new Router();
$loginController = new LoginController();

$router->get('', function () {
    if (isset($_SESSION['token'])) {
        echo 'Token do usuário: '. $_SESSION['token'];
    } else {
        echo 'Home page';
    }
});

$router->get('login', function () use ($loginController) {
    if ($_POST) {
        $loginController->authenticateUser();
    } else {
        $loginController->loginView();
    }
});

$router->error(function () {
    echo 'Page not found';
});
