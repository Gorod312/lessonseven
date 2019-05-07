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

function getPageGuest()
{
    if ($_SESSION['status'] == 'guest') {
        if (empty($_SESSION['id'])) {
            $_SESSION['status']='false';
            return;
        }
    } else {
        $_SESSION['status']='false';
        return;
    }

    $id = $_SESSION['id'];
    $sql = "SELECT cart.id, cart.name_user, cart.quonty, cart.adress, cart.status, cart.data_order, ships.name, ships.price, ships.img, ships.id_nation FROM `cart`,`ships` WHERE cart.id_user=$id AND cart.id_ship=ships.id";
    $result=getAssocResult($sql);
    return $result;
}

