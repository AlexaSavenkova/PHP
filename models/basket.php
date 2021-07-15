<?php
function deleteFromBasket($id) {
       // удаляет товар целиком, в не зависимости от количесва 
    $id = (int)$id;
    $session = session_id();
    $basketSession = getAssocResult("SELECT `session_id` FROM `basket` WHERE `id`={$id}")[0]['session_id'];
    if ($session == $basketSession) {
     return executeQuery("DELETE FROM basket WHERE basket.id = {$id}");
    }

}

function getSummBasket() {
    $session = session_id();
    return getAssocResult("SELECT  SUM(products.price * basket.quantity) summ FROM basket,products WHERE basket.product_id=products.id AND session_id = '{$session}'")[0]['summ'];
}

function getBasket() {
    $session = session_id();
    return getAssocResult("SELECT basket.id basket_id, image, products.id product_id, name, price, quantity FROM basket JOIN products ON basket.product_id=products.id AND session_id = '{$session}'");
}

function addToBasket($id) {
    // добавляет товар или увеличивает количество
    $id = (int)$id;
    $session = session_id();
    $isInBasket = getAssocResult("SELECT product_id FROM basket WHERE product_id = {$id} AND session_id = '{$session}'")[0]['product_id'];
    if (is_null($isInBasket)){
         executeQuery("INSERT INTO `basket`(`product_id`, `session_id`,`quantity`) VALUES ({$id},'{$session}', 1)");
    } else {
        executeQuery("UPDATE basket SET quantity = quantity+1 WHERE product_id = {$id} AND session_id = '{$session}'");
    }
   
}

function getBasketCount() {
       // считает кол-во наименовайний 
    $session = session_id();
    return getAssocResult("SELECT COUNT(id) as count FROM `basket` WHERE `session_id`='{$session}'")[0]['count'];;
}