<div class="gridBlock">
    <? foreach ($content as $item): ?>
        <? if ($item['id_nation']==='1'){
            $item['imgDir']="usa";
        } else{
            $item['imgDir']="ussr";
        }?>
        <div class="item">
            <img src="/img/ship/<?=$item['imgDir']?>/<?=$item['img']?>" alt="<?=$item['img']?>">
            <p class="nameShip"><?=$item['name']?></p>
            <p><?=$item['prev']?></p>
            <a href="/group/addItem/<?=$item['id_nation']?>/<?=$item['id']?>">Купить <span class="priceShip"><?=$item['price']?></span>$</a>
        </div>
    <? endforeach; ?>

</div>