<?php

$_SESSION ['name'] = "User";

//создаем некий сборщик в глобальном массиву
if (!isset($_SESSION['collection'])) {
    $_SESSION['collection'] = [];
    $_SESSION['quonty'] = 0;

}

if (isset($_GET['exit'])) {
    unset ($_SESSION ['name']);
    unset ($_SESSION ['collection']);
    session_destroy();
    header("Location: /");
}



