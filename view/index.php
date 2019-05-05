<div class="gridBlock">
    <? foreach ($content as $item): ?>
    <? if ($item['id_nation']==='1'){
            $item['id_nation']="usa";
        } else{
            $item['id_nation']="ussr";
        }?>
<div class="item">
    <img src="/img/ship/<?=$item['id_nation']?>/<?=$item['img']?>" alt="<?=$item['img']?>">
    <p class="nameShip"><?=$item['name']?></p>
    <p><?=$item['prev']?></p>
    <a href="#" class="buybtn" data-id="<?=$item['id']?>">Купить  <span class="priceShip"><?=$item['price']?></span>$</a>
</div>

    <? endforeach; ?>

</div>
<script>
    $(document).ready(function(){
        $(".buybtn").on('click', function(e){
            e.preventDefault();
            var $id = $(this).data("id");

            $.ajax({
                url: "/ajax/additem/" + $id,
                type: "POST",
                dataType : "json",
                data:{
                    id: $id,
                },
                error: function() {alert("Что-то пошло не так...");},
                success: function(answer){
                    $('#blocksumm').html(answer.quonty);
                }

            })
        });

    });
</script>
