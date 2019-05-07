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
<h2>Уважаемый {$_SESSION['user']}. на данный момент заказов нет</h2>
<img src='/img/header/nocart.gif' alt='nocart'>
</div>";
    return;
}

?>
<h2 class="cartuser">Ваши заказы <?= $_SESSION['user'] ?></h2>
<? foreach ($content as $item): ?>
    <div class="cartblockGrid">
        <div>
            <h2 class="nameShip md_margin">Номер-<?= $item['id'] ?></h2>
            <p>Дата-<?= $item['data_order'] ?></p>
            <p>Login-<?= $item['login'] ?></p>
        </div>
        <div class="textCart">
            <h2 class="nameShip md_margin">Данные заказа</h2>
            <p>Имя получателя-<?= $item['name_user'] ?></p>
            <p>Адрес получателя-<?= $item['adress'] ?></p>
            <p>Наименование корабля- <?= $item['name'] ?></p>
            <p>Количество - <?= $item['quonty'] ?></p>
        </div>
        <div class="pricecart">
            <h2 class="nameShip md_margin"> Статус</h2>
            <? if ($item['status'] == null) {
                $item['status'] = "в сборке";
            }
            ?>
            <p class="nameShip"><?= $item['status'] ?></p>
        </div>
        <div class="add_delete">
            <h2 class="nameShip md_margin"> Изменить статус </h2>
            <form action="/admin/changeOrder/<?= $item['id'] ?>" method="POST">
                <select class="inputform" name="orderstatus">
                    <option value="собран">Собран</option>
                    <option value="в дороге">В пути</option>
                    <option value="доставлен">Доставлен</option>
                </select>
                <input class="totalbtn" type="submit" value="Изменить статус" name="changeOrder">
            </form>
        </div>
        <div class="Total">
            <a href="/admin/deleteOrder/<?= $item['id'] ?>" class="totalbtn">Удалить заказ</a>
        </div>
    </div>

<div class="marginDiv"><hr class="hr"></div>
<? endforeach; ?>


