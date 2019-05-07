<?php

function prepareVariables($page, $action, $id)
{
    $params = [];
    $params['is_ajax'] = false;
    $params['allow'] = false;
    $allow = false;
    switch ($page) {
        case 'index':
            $params["content"] = getAllshow();
            break;
        case 'ajax':
            $params['is_ajax'] = true;
            if ($action == 'additem') {
                $params['id'] = $id;
                $params['summ'] = addItemCard($id);
                $params['quonty'] = $_SESSION['quonty'];
            }
            if ($action == 'delitem') {
                $params['summ'] = delItemCard($id);
                $params['id'] = $id;
                $params['quonty'] = $_SESSION['quonty'];
            }
            break;
        case 'group':

            $params["content"] = getGroup($id);
            break;
        case 'cart':

            $params["content"] = getCart();
            break;
        case 'send':
            if ($action === "total") {
                totalCart();
                header("Location: /$page/");
            }
            $params["content"] = 0;
            break;
        case 'reg':
            if ($action === "newuser") {
                newUser();
            }
            if ($action==="login"){
                login();
            }
            $params["content"] = 0;
            break;
    }
    return $params;

}

