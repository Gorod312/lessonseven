<a class="btn" href="/" title="Главная"><img class="logomain" src="/img/flag/main.png" alt="main"></a>
<a class="btn" href="/group/1" title="USA"><img src="/img/flag/USA.png" alt="USA"></a>
<a class="btn" href="/group/2" title="USSR"><img src="/img/flag/USSR.png" alt="USSR"></a>
<a class="btn cartbtn" href="/cart" title="Магазин"><i class="fas fa-shopping-basket fa-4x mb_cart"></i><div class="blocksummItem" id="blocksumm"><?=$_SESSION['quonty']?></div></a>

<?php
if ($_SESSION['status']=="user") {
    echo "<a class=\"btn\" href=\"/login\" title=\"user\"><i class=\"fas fa-sign-in-alt fa-3x mb_cart\">Вход</i></a>";
 } elseif ($_SESSION['status']=="guest" ){
    echo "<a class=\"btn\" href=\"/guest\" title=\"LogIn\"><i class=\"fas fa-user fa-3x mb_cart\">Гость</i></a><a class=\"btn\" href=\"/index/exit/\" title=\"выход\"><i class=\"fas fa-door-open fa-2x mb_cart\"></i></a>";
 } elseif ($_SESSION['status']=="admin"){
    echo "<a class=\"btn\" href=\"/admin\" title=\"admin\"><i class=\"fas fa-baby fa-3x mb_cart\">Админ</i></a><a class=\"btn\" href=\"/index/exit/\" title=\"выход\"><i class=\"fas fa-door-open fa-2x mb_cart\"></i></a>";
}

?>


