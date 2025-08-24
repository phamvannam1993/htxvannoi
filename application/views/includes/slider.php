<div class="col-md-9 col-md-push-3 px-md-4 px-0 mt-md-5 mb-5">
    <div class="home-slider owl-carousel" data-lg-items='1' data-md-items='1' data-sm-items='1' data-xs-items="1" data-margin='0'  data-play="true" data-nav="true" data-loop="true">
        <?php foreach($sliders as $key => $item) {?>
        <div class="item">
            <a href="#" class="clearfix">
            <img src="/<?=$item['image_url']?>" alt="<?=$item['title']?>">
            </a>	
        </div>
        <?php } ?>
    </div>
    <!-- /.products -->
</div>