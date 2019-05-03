<?php

function prepareVariables($page, $action, $id)
{
    $params = [];
    switch ($page) {
        case 'index':
            $params["content"] = getAllshow();
            break;
        case 'group':
            $params["content"]=getGroup($id);
            break;
        case 'cart':
            $params["content"]=getGroup($id);
            break;
    }
    return $params;

}

function render($page, $params = [])
{

    return renderTemplate(LAYOUTS_DIR . 'layout', [
        "content" => renderTemplate($page, $params),
        "menu" => renderTemplate("menu")
    ]);
}


//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTemplate($page, $params = [])
{
    ob_start();


    if (!is_null($params)) {
        extract($params);
    }


    $fileName = VIEW_DIR . $page . '.php';

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Страницы не существует, 404");
    }


    return ob_get_clean();
}