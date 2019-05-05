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
