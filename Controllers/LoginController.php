<?php
require_once "../Models/User.php";
require_once "../Controllers/Conexao.php";
require_once '../Controllers/Handlers/UserHandler.php';


class LoginController
{
    public static function signin()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'senha');

        if ($email && $password) {
            $user = UserHandler::verifyLogin($email, $password);

            return $user;
        }
    }

    public static function logoff()
    {
        $_SESSION['logado'] = false;
        session_unset();
        session_destroy();
    }
}

if (isset($_GET['login']) && $_GET['login']  == true) {
    $log = LoginController::signin();
    if ($log == 1) {
        $_SESSION['logado'] = true;
        header('Location: ../Views/home.php');
    } else {
        $_SESSION['logado'] = false;
        $_SESSION['flash'] = $log;
        header('Location: ../index.php');
    }
}

if(isset($_GET['logoff'])  &&$_GET['logoff'] == true){

    LoginController::logoff();
    header('Location: ../index.php');
}