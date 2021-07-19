<?php

function adminController(&$params, $action)
{
    if (!is_admin()) Die('Нет прав!');

    if (empty($action)) $action = 'admin';

    switch ($action) {
        case 'admin':
            $params['orders'] = getOrders();
            break;
        case 'detail':
            $params['basket'] = getOrderDetail($_GET['id']);
            break;
    }

    $templateName = $action;

    return render($templateName, $params);
}