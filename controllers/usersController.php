<?php

function usersController(&$params, $action)
{
    if (!is_admin()) die('Нет прав!');

    if (empty($action)) $action = 'users';

    $params['users'] = getUsers();

    $templateName = $action;

    return render($templateName, $params);
}