<?php

require_once '../config/config.php';

$url_array = explode("/", $_SERVER['REQUEST_URI']);

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index
$page = "";
$action = "";
$id = "";
$idItems="";
if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
    if (!$url_array[2]=="") {
        if (is_numeric($url_array[2])) {
            $id = $url_array[2];
        } else {
            $action = $url_array[2];
            if (is_numeric($url_array[3])) {
                $id = $url_array[3];
                $idItems = $url_array[4];
            }
        }
    }
}


$params = prepareVariables($page, $action, $id,$idItems);


//Вызываем рендер, и передаем в него имя шаблона и массив подстановок
echo render($page, $params);

