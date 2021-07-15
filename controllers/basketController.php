<?php
function basketController(&$params, $action)
{
  
    if ($action == 'buy') {
           $id = $_GET['id'];
           addToBasket($id);
           header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    if ($action == 'delete') {
        $id = $_GET['id'];
        deleteFromBasket($id);
        // die('enter to basket/delete/');
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
    
    if (empty($action)) $action = 'basket';
  
    $params['summ'] = getSummBasket();
    $params['basket'] = getBasket();
    

    $templateName = $action;

    return render($templateName, $params);
}