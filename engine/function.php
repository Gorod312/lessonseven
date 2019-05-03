<?php

function addview($id){
    $sql = "SELECT * FROM `product` WHERE Id=$id";
    $result = getAssocResult($sql);
    $view=1+(+($result[0]['view']));
    $sql="UPDATE `product` SET `view`=$view WHERE `id`=$id";
    execQuery($sql);
}
function getSinglepage($id)
{
    if (isset($_GET['view'])){
        addview($id);
    }
    $sql = "SELECT * FROM `product` WHERE `id`=$id";
    $result = getAssocResult($sql);
    return $result;
}

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


function getAllcomments($id)
{
    $sql = "SELECT * FROM `comment` WHERE `id_product`=$id";
    return getAssocResult($sql);
}



function addcomment($id)
{
    $db = createConnection();
    $name = escapeString($db,$_POST['author']);
    $message = escapeString($db, $_POST['message']);
    $sql = "INSERT INTO `comment` (`id_product`, `author`, `text`) VALUES ('{$id}', '{$name}','{$message}')";
    return execQuery($sql);
}
function deleteComment($id) {
    $sql = "DELETE FROM `comment` WHERE `comment`.`id` = $id";
    return execQuery($sql);
}
