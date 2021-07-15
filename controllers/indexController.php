<?php

function indexController($params, $action) {

    $params['name'] = $params['user'];

    $templateName = 'index';

    return render($templateName, $params);
}