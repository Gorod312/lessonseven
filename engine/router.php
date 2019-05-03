<?php

function prepareVariables($page, $action, $id,$idComment)
{
    $params = [];
    switch ($page) {
        case 'index':
            $params["content"] = getAllshow();
            break;
        case 'singlepage':
            if ($action == "add") {
                addcomment($id);
                header("Location: /singlepage/$id");
            };
            if ($action == "delete") {
                $error = deleteComment($idComment);
                header("Location: /singlepage/$id");

            }
            $params["content"] = getSinglepage($id);
            $params["comments"] = getAllcomments($id);
            break;
        case 'cats':
        case 'dogs':
            $params["content"] = getGroupAnimals($page);;
            break;
    }
    return $params;

}

function render($page, $params = [])
{

    return renderTamplate(LAYOUTS_DIR . 'layout', [
        "content" => renderTamplate($page, $params),
        "menu" => renderTamplate("menu")
    ]);
}


//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTamplate($page, $params = [])
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