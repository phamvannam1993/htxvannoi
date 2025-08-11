<div class="row carousel-holder">
    <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php foreach($sliders as $key => $item) {?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?=$key?>" class="<?=$key == 0 ? 'active' : ''?>"></li>
                <?php } ?>
            </ol>
            <div class="carousel-inner">
            <?php foreach($sliders as $key => $item) {?>
                <div class="item <?=$key == 0 ? 'active' : ''?>">
                    <img class="slide-image" style="min-height:250px;" src="/<?=$item['image_url']?>" alt="<?=$item['title']?>">
                    <div class="header-text text-left hidden-xs">
                        <div class="main_title ">
                            <h2 style="color:red;"><?=$item['title']?></h2>
                            <p style="color:#ff6a00;"><?=$item['description']?></p>
                        </div>
                    </div>
                    <!-- /header-text -->
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>