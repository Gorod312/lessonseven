<?php
if ($_SESSION['logflag'] == 'wrong') {
    echo "<div class=\"emptyblock\">
    <h2>Пользователь с емаил {$_SESSION['mail']}  уже зарегистрирован</h2>
    <h3>Попробуйте другой логин и емаил</h3>
</div>";
    unset($_SESSION['mail']);
    unset ($_SESSION['user']);
    return;
} elseif ($_SESSION['logflag'] == 'error') {
    echo "<div class=\"emptyblock\">
    <h2>Неверное имя пользователя или пароль</h2>
    <h3>Попробуйте другой логин и емаил</h3>
</div>";
    unset ($_SESSION['user']);
    return;
} else {
    echo "
    <div class=\"emptyblock\">
    <h2>Добро пожаловать {$_SESSION['user']}, удачного плаванья</h2>
    <img src=\"/img/header/orig.gif\" alt=\"orig\">
</div>";
    $_SESSION['logflag']="logok";
}

?>

