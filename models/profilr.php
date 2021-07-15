<?php 

function addUser ($login, $pass) 
{
    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (login, pass,role) VALUES ('{$login}', '{$pass_hash}', 0)";
    if (executeQuery($sql)) {
        auth($login, $pass);
        return true;
    } 
    return false;
}

function checkLogin ($login){
    $user = getAssocResult("SELECT login FROM users WHERE login = '{$login}'")[0]['login'];
    return $user != $login;
}

function checkPass($pass, $pass_repeat) {
    if (($pass != $pass_repeat) || (trim($pass) == ''))  {
        return false;
    }
    return true;
}
