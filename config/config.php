<?php

define("ROOT", dirname(__DIR__));
define("IMG_BIG", "/img/big/");
define("IMG_SMALL", "/img/small/");
define('TEMPLATES_DIR', ROOT . '/templates/');
define('LAYOUTS_DIR', 'layouts/');

// db config
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'shop');

include ROOT . "/engine/db.php";
include ROOT . "/engine/core.php";

autoload("controllers");
autoload("models");