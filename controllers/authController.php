<?php
function authController(&$params, $action)
{
    if ($action == "login") {

        if (isset($_POST['send'])) {
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            if (!auth($login, $pass)) {
                Die('Не верный логин пароль');
            } else {
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    if ($action == "logout") {
        session_destroy();
        header("Location: /");

    }
}