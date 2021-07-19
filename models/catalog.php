<?php
function getCatalog()
{
    // отсортирован по числу просмотров
    return getAssocResult("SELECT * FROM `products` ORDER BY views DESC");
}
function getCatalogItem($id)
{
    return getAssocResult("SELECT * FROM `products` WHERE id = {$id}")[0];
}

function getImagesForItem($id)
{
    return getAssocResult("SELECT image FROM products_images WHERE product_id = {$id}");
}

function addViewsProduct($id)
{
    $id = (int)$id;
    executeQuery("UPDATE `products` SET views = views + 1 WHERE id={$id}");
}
