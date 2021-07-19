<?php

function catalogController($params, $action)
{
    if (empty($action)) $action = 'catalog';

    switch ($action) {
        case 'catalog':
            $params['catalog'] = getCatalog();
            break;

        case 'item':
            $id = (int)$_GET['id'];
            $params['product'] = getCatalogItem($id);
            $params['images'] = getImagesForItem($id);
            addViewsProduct($id);
            break;

    }

    $templateName = '/catalog/' . $action;
 
    return render($templateName, $params);
}