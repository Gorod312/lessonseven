<?php

function getPageAdmin(){
    if ($_SESSION['status'] == 'admin') {
        if (empty($_SESSION['id'])) {
            return;
        }
    } else {
        return;
    }
    $sql = "SELECT cart.id, cart.name_user, cart.quonty, cart.adress, cart.status, cart.data_order, ships.name, user.login FROM `cart`,`ships`,`user` WHERE  cart.id_ship=ships.id AND cart.id_user=user.id";
    $result=getAssocResult($sql);
    return $result;
}

function changeOrder($id){
    if (isset($_POST['changeOrder'])){
        $orderstatus=$_POST['orderstatus'];
    }
    $sql="UPDATE `cart` SET `status`='$orderstatus' WHERE id=$id";
    execQuery($sql);
    return;
}
function deleteOrder($id){

    $sql="DELETE FROM `cart` WHERE `id`=$id";
    execQuery($sql);
    return;
}
