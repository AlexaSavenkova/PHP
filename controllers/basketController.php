<?php
function basketController(&$params, $action)
{
    $params['message'] = "";
    if ($action == 'addorder') {
        $name = trim($_POST['name']);
        $phone = trim($_POST['phone']);
        if (!AddOrder($name, $phone)) {
            $params['message'] = 'Что-то пошло не так, попробуйте еще раз';
            $action = 'basket';
           
        } else {
            $params['message'] = "Заказ успешно оформлен";
            $params['count'] = 0;
           
        }
        $action = 'basket';
    }

    if ($action == 'buy') {
           $id = $_GET['id'];
           addToBasket($id);
           header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    if ($action == 'delete') {
        $id = $_GET['id'];
        deleteFromBasket($id);
    
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    
    if (empty($action)) $action = 'basket';
  
    $params['summ'] = getSummBasket();
    $params['basket'] = getBasket();
    

    $templateName = $action;

    return render($templateName, $params);
}