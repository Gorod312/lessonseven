<div class="gridBlock">
    <? foreach ($content as $item): ?>
    <? if ($item['id_nation']==='1'){
            $item['id_nation']="usa";
        } else{
            $item['id_nation']="ussr";
        }?>
<div class="item">
    <img src="img/ship/<?=$item['id_nation']?>/<?=$item['img']?>" alt="<?=$item['img']?>">
    <p class="nameShip"><?=$item['name']?></p>
    <p><?=$item['prev']?></p>
    <a href="#">Купить  <span class="priceShip"><?=$item['price']?></span>$</a>
</div>
    <? endforeach; ?>

</div>
