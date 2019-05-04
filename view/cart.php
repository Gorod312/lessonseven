<?if (empty($content)) {

    echo "<div class=\"emptyblock\">
<h2>Ваша корзина пуста и бессмысленна</h2>
<img src='/img/header/cart.png' alt='cart'>
</div>";
    return;
}

$arr = $_SESSION['collection'];
$total = 0; ?>

<? foreach ($content as $item): ?>

    <? if ($item['id_nation'] === '1') {
        $item['imgDir'] = "usa";
    } else {
        $item['imgDir'] = "ussr";
    } ?>

    <div class="cartblockGrid">
        <div>
            <img src="/img/ship/<?= $item['imgDir'] ?>/<?= $item['img'] ?>" alt="<?= $item['name'] ?>">
        </div>
        <div class="textCart">
            <h2 class="nameShip md_margin"><?= $item['name'] ?></h2>
            <p><?= $item['prev'] ?></p>
        </div>
        <div class="pricecart">
            <h2 class="nameShip md_margin"> Price</h2>
            <p class="nameShip"><span id="price"> <?= $arr[$item['id']] ?></span> шт X <span
                        class="quonty"> <?= $item['price'] ?></span> $</p>
        </div>
        <div class="add_delete">
            <h2 class="nameShip md_margin"> Add & Del </h2>
            <p class="nameShip">
                <a href="/cart/addItem/1/<?= $item['id'] ?>"><i class="fas fa-plus-square "></i></a> &
                <a href="/cart/delItem/1/<?= $item['id'] ?>"><i class="far fa-minus-square "></i></a>
            </p>
        </div>
        <div class="Total">
            <h2 class="nameShip md_margin"> Total</h2>
            <p class="nameShip"><span class="itemTotal"> <?= ($arr[$item['id']]) * $item['price'] ?></span> $</p>
        </div>

    </div>
    <? $total += (($arr[$item['id']]) * $item['price']) ?>

    <hr>
<? endforeach; ?>
<div class="totalblock">
    <p class="nameShip"> Total......<span class="quonty"> <?= $total ?></span> $</p>
    <a class="totalbtn" href="/send/total"> Отлично! покупаю </a>
</div>


