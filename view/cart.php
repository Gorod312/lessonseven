<? if (empty($content)) {

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

    <div class="cartblockGrid" id="<?= $item['id'] ?>">
        <div>
            <img src="/img/ship/<?= $item['imgDir'] ?>/<?= $item['img'] ?>" alt="<?= $item['name'] ?>">
        </div>
        <div class="textCart">
            <h2 class="nameShip md_margin"><?= $item['name'] ?></h2>
            <p><?= $item['prev'] ?></p>
        </div>
        <div class="pricecart">
            <h2 class="nameShip md_margin"> Price</h2>
            <p class="nameShip">
                <span data-name="<?= $item['id'] ?>"> <?= $arr[$item['id']] ?></span> шт X
                <span data-price="<?= $item['id'] ?>"> <?= $item['price'] ?></span> $
            </p>
        </div>
        <div class="add_delete">
            <h2 class="nameShip md_margin"> Add & Del </h2>
            <p class="nameShip">
                <a class="plusitem" href="/ajax/additem/" data-id="<?= $item['id'] ?>"><i
                            class="fas fa-plus-square "></i></a> &
                <a class="minusitem" href="/ajax/delitem/" data-id="<?= $item['id'] ?>"><i
                            class="far fa-minus-square "></i></a>
            </p>
        </div>
        <div class="Total">
            <h2 class="nameShip md_margin"> Total</h2>
            <p class="nameShip"><span class="itemTotal"
                                      data-quonty="<?= $item['id'] ?>"> <?= ($arr[$item['id']]) * $item['price'] ?></span>
                $</p>
        </div>

    </div>
    <? $total += (($arr[$item['id']]) * $item['price']) ?>

    <hr>
<? endforeach; ?>
<div class="totalblock">
    <p class="nameShip"> Total......<span id="totalAll"> <?= $total ?></span> $</p>
    <a class="totalbtn" href="/send/total"> Отлично! покупаю </a>
</div>
<script>
    $(document).ready(function () {
        $(".plusitem").on('click', function (e) {
            e.preventDefault();
            var $id = $(this).data("id");

            $.ajax({
                url: "/ajax/additem/" + $id,
                type: "POST",
                dataType: "json",
                data: {
                    id: $id,
                },
                error: function () {
                    alert("Что-то пошло не так...");
                },
                success: function (answer) {
                    var $id = "[data-name=" + answer.id + "]";
                    var $pricestr = "[data-price=" + answer.id + "]";
                    var $quontyitemstr = "[data-quonty=" + answer.id + "]";
                    var $price = $($pricestr).text();
                    var $totalprice = $('#totalAll').text();
                    var $total = (+$price) * (+(answer.summ));
                    $totalprice = (+$totalprice) + (+$price);

                    $($id).html(answer.summ);
                    $('#blocksumm').html(answer.quonty);
                    $($quontyitemstr).html($total);
                    $('#totalAll').html($totalprice);

                }

            })
        });
        $(".minusitem").on('click', function (e) {
            e.preventDefault();
            var $id = $(this).data("id");

            $.ajax({
                url: "/ajax/delitem/" + $id,
                type: "POST",
                dataType: "json",
                data: {
                    id: $id,
                },
                error: function () {
                    alert("Что-то пошло не так...");
                },
                success: function (answer) {
                    var $id = "[data-name=" + answer.id + "]";
                    var $pricestr = "[data-price=" + answer.id + "]";
                    var $quontyitemstr = "[data-quonty=" + answer.id + "]";
                    var $price = $($pricestr).text();
                    var $totalprice = $('#totalAll').text();
                    var $total = (+$price) * (+(answer.summ));
                    $totalprice = (+$totalprice) - (+$price);
                    var $delstr = "#" + answer.id;
                    if (answer.summ == 0) {
                        $($delstr).remove();
                        if (answer.quonty == 0) {
                            location.reload();
                        }
                    } else {
                        $($id).html(answer.summ);
                        $($quontyitemstr).html($total);
                    }
                    $('#totalAll').html($totalprice);
                    $('#blocksumm').html(answer.quonty);
                }

            })

        })

    });
</script>

