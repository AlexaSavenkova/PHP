<?php

function auth($login, $pass)
{
    $login = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($login)));
    $user = getAssocResult("SELECT * FROM users WHERE login = '{$login}'")[0];
    if (password_verify($pass, $user['pass'])) {

        $_SESSION['login'] = $login;
        $_SESSION['id'] = $user['id'];
        $_SESSION['role'] = $user['role']; // 1- админ, 0 -  обычный пользователь
        return true;
    }
    return false;
}

function is_admin()
{
    return ($_SESSION['role'] == 1) ? true : false;
}

function is_auth(){

    return isset($_SESSION['login']);
}


function get_user()
{
    return $_SESSION['login'];
}
