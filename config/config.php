<?php

//подключаем переменные
define('SITE_DIR',__DIR__.'/../');
define('PUBLIC_DIR',SITE_DIR.'public/');
define('IMG_DIR','img/');
define('ENGINE_DIR',SITE_DIR.'engine/');
define('VIEW_DIR','../view/');
define('LAYOUTS_DIR',VIEW_DIR.'layout/');


//указания на данные базы
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ship');

//подключаем файлы баз и функций
require_once ENGINE_DIR.'db.php';
require_once ENGINE_DIR.'function.php';
require_once ENGINE_DIR.'router.php';

