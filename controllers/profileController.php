<?php
function profileController($params, $action) {
    if ($action == "signup") {

        if (isset($_POST['send'])) {
            $login = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_POST['login'])));
            $pass = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_POST['pass'])));
            $pass_repeat = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($_POST['pass_repeat'])));

            if (!checkLogin($login)) {
                $params['message'] = 'Пользователь с таким логином уже существует.';
            } elseif(!checkPass($pass, $pass_repeat)) {
                $params['message'] = 'Пароль не совпадает или пустой';
            } else {
                $params['message'] = '';
                if (addUser($login, $pass)){
                    header("Location:" . $_SERVER['HTTP_REFERER']);
                } else 
                {
                    $params['message'] = 'Что-то пошло не так, попробуйте еще раз';
                } 
            }
        }
    }

    $params['name'] = $params['user'];

    $templateName = 'profile';

    return render($templateName, $params);
}