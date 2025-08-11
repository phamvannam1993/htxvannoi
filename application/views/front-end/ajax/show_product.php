<div id="products" class="row list-group">             
<?php foreach($datas as $item) { ?>
<div class="item col-xs-4 col-lg-4 grid-group-item">
    <div class="thumbnail">
        <img class="image" src="/<?=$item['image_url']?>" style="width: 271.167px; height: 271.167px;">
        <div class="caption-full">
            <h4 class="group inner list-group-item-heading"><?=$item['name']?></h4>
            <div class="caption">
                <p class="group inner list-group-item-text"> </p>
                    <p><?=$item['description']?><br></p>
                <p>
                <br>
                </p>
                <p></p>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6">
                <p class="lead"><?=number_format($item['price'])?></p>
                </div>
                <div class="col-xs-12 col-md-6">
                    <a class="btn btn-success" href="/san-pham/<?=$item['slug']?> ">Chi tiết sp</a>
                </div>
            </div>
        </div>
    </div>
 </div>
 <?php } ?>
 </div>
 <?php if($pagesToShow) {?>
 <div id="paged" style="text-align:center;">
    <ul class="pagination">
        <li class="previous">
            <a href="javascript:void(0)" class="page-number" <?= ($page == 1) ? 'disabled' : '' ?> data-page="1"><i class="fa fa-fast-backward"></i>&nbsp;First</a>
        </li>
        <li>
        <?php foreach ($pagesToShow as $p): ?>
            <?php if ($p === '...'): ?>
                <a href="javascript:void(0)">...</a>
            <?php else: ?>
                <a class="page-number  <?= ($p == $page) ? 'active' : '' ?>" href="javascript:void(0)" data-page="<?= $p ?>"><?= $p ?></a>
            <?php endif; ?>
        <?php endforeach; ?>
        </li>
        <li class="next"><a href="javascript:void(0)" class="page-number" data-page="<?=$totalPage?>">Last &nbsp;<i class="fa fa-fast-forward"></i></a></li>
    </ul>
</div>
<?php } ?>
