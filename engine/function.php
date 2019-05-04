<?php

function getAllshow()
{
    $sql = "SELECT * FROM `ships` WHERE 1";
    $result = getAssocResult($sql);
    return $result;
}

function getGroup($id)
{
    $group = ($id === '1') ? 1 : 2;
    $sql = "SELECT * FROM `ships` WHERE `Id_nation`=$group";
    $result = getAssocResult($sql);
    return $result;
}
function getGroupCart($id)
{
    $sql = "SELECT * FROM `ships` WHERE `id` IN ($id)";
    $result = getAssocResult($sql);
    return $result;
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
//INSERT INTO MyTable ( Column1, Column2 ) VALUES
//( Value1, Value2 ), ( Value1, Value2 )

