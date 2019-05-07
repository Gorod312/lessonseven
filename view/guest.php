<? if ($_SESSION['status']=='false'){
    echo "<div class=\"emptyblock\">
<h2>Каждый мошеннии рано или поздно будет пойман</h2>
<img src='/img/header/nocart.gif' alt='nocart'>
</div>";
    $_SESSION['status']='user';
    return;
}
if (empty($content)) {

    echo "<div class=\"emptyblock\">
<h2>Уважаемый {$_SESSION['user']}. вы еще пока заказов не делали</h2>
<img src='/img/header/nocart.gif' alt='nocart'>
</div>";
    return;
}

?>
<h2 class="cartuser">Ваши заказы <?= $_SESSION['user'] ?></h2>
<? foreach ($content as $item): ?>

    <? if ($item['id_nation'] === '1') {
        $item['imgDir'] = "usa";
    } else {
        $item['imgDir'] = "ussr";
    } ?>

    <div class="cartblockGrid">
        <div>
            <img src="/img/ship/<?= $item['imgDir'] ?>/<?= $item['img'] ?>" alt="img">
        </div>
        <div class="textCart">
            <h2 class="nameShip md_margin">Номер заказа-<?= $item['id'] ?></h2>
            <p class="nameShip md_margin">Имя получателя-<?= $item['name_user'] ?></p>
            <p class="nameShip md_margin">Адрес получателя-<?= $item['adress'] ?></p>
            <p class="nameShip md_margin">Наименование- <?= $item['name'] ?></p>
        </div>
        <div class="pricecart">
            <h2 class="nameShip md_margin"> Дата заказа и цена</h2>
            <p class="nameShip"><?= $item['data_order'] ?></p>
            <p class="nameShip"><?= $item['price'] ?></p>
        </div>
        <div class="add_delete">
            <h2 class="nameShip md_margin"> Статус заказа </h2>
            <p class="nameShip"><?= $item['status'] ?>

            </p>
        </div>
        <div class="Total">
            <h2 class="nameShip md_margin"> Количество</h2>
            <p class="nameShip"><?= $item['quonty'] ?>-шт</p>
        </div>

    </div>
    <hr>
<? endforeach; ?>

