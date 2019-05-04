<?php
session_start();
$_SESSION ['name'] = "User";

//создаем некий сборщик в глобальном массиву
if (!isset($_SESSION['collection'])) {
    $_SESSION['collection'] = [];
    $_SESSION['quonty'] = 0;

}


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
                return;
            }
        }
    }
    $arr[$id] = 1;
    $_SESSION['collection'] = $arr;

    return;

}

function delItemCard($id)
{
    $_SESSION['quonty'] = ((+($_SESSION['quonty'])) - 1);
    $arr = $_SESSION['collection'];
    $arr[$id]--;
    if ($arr[$id] == 0) {
        unset($arr[$id]);
    }
    $_SESSION['collection'] = $arr;
    return;

}

function totalcart()
{
    $result = "";
    $name=session_id();
    $arr = $_SESSION['collection'];
    foreach ($arr as $key => $value) {
        if (empty($result)) {
            $result= "("."'".$name."'".",".$key.",".$value.")";
        } else {
            $temp= "("."'".$name."'".",".$key.",".$value.")";
          $result.= ",".$temp;
        }
    }
    $sql="INSERT INTO `cart` ( `name_user`, `id_ship`, `quonty` ) VALUES $result";
    execQuery($sql);
    $_SESSION['collection'] = [];
    $_SESSION['quonty'] = 0;
    session_destroy();
    setcookie("PHPSESSID","",time()-3600);
    $_SESSION['send']=1;
}

if (isset($_GET['exit'])) {
    unset ($_SESSION ['name']);
    unset ($_SESSION ['collection']);
    session_destroy();
    header("Location: /");
}



