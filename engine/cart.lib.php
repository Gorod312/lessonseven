<?php
//добавлем в сборщик корзины товар.
function addItemCard($id)
{
    $_SESSION['quonty'] = 1 + (+($_SESSION['quonty']));
    $arr = $_SESSION['collection'];
    if (!empty($arr)) {
        foreach ($arr as $key => $value) {
            if ($key == $id) {
                $arr[$key] = ++$value;
                $_SESSION['collection'] = $arr;
                return $arr[$key];
            }
        }
    }
    $arr[$id] = 1;
    $_SESSION['collection'] = $arr;
    return $arr[$id];

}

function delItemCard($id)
{
    $_SESSION['quonty'] = ((+($_SESSION['quonty'])) - 1);
    $arr = $_SESSION['collection'];
    $arr[$id]--;
    if ($arr[$id] == 0) {
        unset($arr[$id]);
        $_SESSION['collection'] = $arr;
        return 0;
    }
    $_SESSION['collection'] = $arr;
    return $arr[$id];

}

function totalcart()
{
    $result = "";
    $session=session_id();
    $adress=$_POST['sendport'];
    $senduser=$_POST['senduser'];
    $senduser=escapeString(createConnection(),$senduser);
    $adress=escapeString(createConnection(),$adress);
    $arr = $_SESSION['collection'];
    $login=1;
    foreach ($arr as $key => $value) {
        if (empty($result)) {
            $result= "("."'".$senduser."'".","."'".$session."'".",".$key.",".$value.","."'".$adress."'".",".$login.")";
        } else {
            $temp= "("."'".$senduser."'".","."'".$session."'".",".$key.",".$value.","."'".$adress."'".",".$login.")";
            $result.= ",".$temp;
        }
    }
    $sql="INSERT INTO `cart` ( `name_user`, `session_id`, `id_ship`, `quonty`, `adress`,`id_user` ) VALUES $result";
    execQuery($sql);
    $_SESSION['collection'] = [];
    $_SESSION['quonty'] = 0;
    unset($_POST['sendport']);
    unset($_POST['senduser']);
    session_destroy();
}

function getCart()
{
    if (empty($_SESSION['collection'])) {
        return null;
    }
    $result = "";
    $arr = $_SESSION['collection'];
    foreach ($arr as $key => $value) {
        if (empty($result)) {
            $result = $key;
        } else {

            $result .= "," . $key;
        }
    }
    return getGroupCart($result);

}

function getGroupCart($id)
{
    $sql = "SELECT * FROM `ships` WHERE `id` IN ($id)";
    $result = getAssocResult($sql);
    return $result;
}