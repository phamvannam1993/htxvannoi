<!DOCTYPE html>
<html lang="en">
   <?php $this->load->view('includes/head')?>
   <body>
      <!-- Navigation -->
      <?php $this->load->view('includes/nav')?>
      <!-- Page Content -->
      <div class="container">
         <div class="row">
            <?php $this->load->view('includes/content_left')?>
            <div class="col-md-9">
               <?php $this->load->view('includes/slider')?>
               <script src="/assets/js/bootstrap3-showmanyslideonecarousel.js"></script>
               <style>
                  .carousel-inner img {width: 100%; max-height: 250px;}
                  /* Carousel Header Styles */
                  .header-text {
                  position: absolute;
                  top: 55%;
                  left: 1.8%;
                  right: auto;
                  width: 96.66666666666666%;
                  color: #e2e2e2;
                  font-size:20px; letter-spacing:1px;
                  }
                  .header-text h2 {font-size: 35px; color:#fff; font-weight:600;}
                  .header-text h2 span {padding: 10px;color:orange;}
                  .header-text h3 span {padding: 15px;}
               </style>

                <div class="row">
                        <div class="col-md-6">
                            <img class="slide-image" src="/<?=$product->image_url?>">
                        </div>

                        <div class="col-md-6">

                            <div class="row">
                                <div class="col-md-12">
                                    <h1> <?=$product->name?></h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 caption">
                                <?=$product->description?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <span class="monospaced">Tình trạng</span>
                                </div>
                                <div class="col-md-4 col-md-offset-1 text-center">
                                    <a class="monospaced" href="#">
                                            <p>Còn hàng</p>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="label label-danger">Hot line</span>
                                    <span class="monospaced"><?=$setting['phone_number_1'] ? $setting['phone_number_1'] .' hoặc ': ''?><?=$setting['phone_number_2']?></span>
                                </div>
                            </div>
                        <!-- end row -->
                    </div>
                    <!-- end row -->
                </div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#description" aria-controls="description" role="tab" data-toggle="tab">Mô tả</a>
                    </li>
                    <li role="presentation">
                        <a href="#features" aria-controls="features" role="tab" data-toggle="tab">Kĩ thuật trồng</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="description">
                        <?=$product->description?>
                    </div>
                    <div role="tabpanel" class="tab-pane top-10" id="features">
                        <?=$product->content?>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="label-success" style="padding-top:5px;padding-bottom:5px;padding-left:5px;color:white;">Sản phẩm liên quan</h4>
                            </div>
                            <!-- Controls -->
                        </div>
                        <div id="carousel-example" class="carousel carousel-showmanymoveone slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php foreach($products as $key => $item) {?>
                                <div class="item <?= $key==0 ? 'active' : ''?>">
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="col-item">
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price col-md-12">
                                                        <h5><?=$item['name']?></h5>
                                                        <h5 class="price-text-color"><?=number_format($item['price'])?></h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="photo">
                                                <a href="/san-pham/<?=$item['slug']?>"><img src="/<?=$item['image_url']?>" class="img-fluid" alt="a" /></a>
                                            </div>
                                            <div class="info">
                                                <div class="separator clear-left">
                                                    <p class="btn-add">
                                                        <i class="fa fa-shopping-cart"></i><a href="#">Add to cart</a>
                                                    </p>
                                                    <p class="btn-details">
                                                        <i class="fa fa-list"></i><a href="/san-pham/<?=$item['slug']?>">Chi tiết</a>
                                                    </p>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>

                        

                    </div>
                </div>
                    <script src='/assets/js/bootstrap3-showmanyslideonecarousel.js'></script>
<script>
            $(document).ready(function () {
                $paneTarget = $('.active'),
                      $paneContainer = $('.img-fluid'),
                      $rowwidth = $('.row').width(),
                //windowWidth = $(window).width(),
                      containerWidth = 0;
                //maxScroll = 0,
                //posX = 0,   // Keep track of the container position with posX
                //targetX = 0,
                //animInterval = false;   // No interval is set by default
                if ($rowwidth > 780) {
                    $paneTarget.find('.img-fluid').each(function () {
                        containerWidth = $(this).width();
                        //$('#txt1').text(containerWidth + "fdfd" + $rowwidth);
                        $paneContainer.height(containerWidth);


                    });
                }
                else {
                    if ($rowwidth < 750) {
                        $paneContainer.height($rowwidth*0.7);
                        $paneContainer.width($rowwidth*0.7);
                       // $('#txt1').text(containerWidth + "fdfd" + $rowwidth);
                    }
                    else {
                        $paneContainer.height(($rowwidth - 50) / 2);
                        //$('#txt1').text(containerWidth + "fdfd" + $rowwidth);

                    }

                }
            });
            $(window).resize(function () {
                //var EASING = 0.05,
                $paneTarget = $('.active'),
                $paneContainer = $('.img-fluid'),
                $rowwidth = $('.row').width(),
                //windowWidth = $(window).width(),
                containerWidth = 0;
                //maxScroll = 0,
                //posX = 0,   // Keep track of the container position with posX
                //targetX = 0,
                //animInterval = false;   // No interval is set by default
                if ($rowwidth>780)
                {
                        $paneTarget.find('.img-fluid').each(function () {
                        containerWidth = $(this).width();
                        //$('#txt1').text(containerWidth + "fdfd" + $rowwidth);
                        $paneContainer.height(containerWidth);


                    });
                }
                else
                {
                    if($rowwidth<750)
                    {
                        $paneContainer.height($rowwidth * 0.7);
                        $paneContainer.width($rowwidth * 0.7);
                        //$('#txt1').text(containerWidth + "fdfd" + $rowwidth);
                    }
                    else
                    {
                        $paneContainer.height(($rowwidth - 50) / 2);
                        //$('#txt1').text(containerWidth + "fdfd" + $rowwidth);

                    }

                }
            });

            (function () {
                // setup your carousels as you normally would using JS
                // or via data attributes according to the documentation
                $('#carousel-example').carousel({ interval: 3000 });
            }());

</script>
<style>
     .carousel-control{
       width:15px;
       background-color:none;
    }
     .glyphicon.glyphicon-chevron-right{
   color:burlywood;
}
        .glyphicon.glyphicon-chevron-left{
   color:burlywood;
}
    .right next{

    }
    .left next{}
    .col-item {
        border: 1px solid #c2c0c0;
        border-radius: 5px;
        background: #FFF;
    }

        .col-item .photo img {
            position: relative !important;
            width: 100% !important;
            /*height:100% !important;*/
        }

        .col-item .info {
            padding: 10px;
            border-radius: 0 0 5px 5px;
            margin-top: 1px;
        }

        .col-item:hover .info {
            background-color: rgba(215, 215, 244, 0.5);
        }

        .col-item .price {
            /*width: 50%;*/
            float: left;
            margin-top: 5px;
        }

            .col-item .price h5 {
                line-height: 20px;
                margin: 0;
            }

    .price-text-color {
        color: #00990E;
    }

    .col-item .info .rating {
        color: #003399;
    }

    .col-item .rating {
        /*width: 50%;*/
        float: left;
        font-size: 17px;
        text-align: right;
        line-height: 52px;
        margin-bottom: 10px;
        height: 52px;
    }

    .col-item .separator {
        border-top: 1px solid #FFCCCC;
    }

    .clear-left {
        clear: left;
    }

    .col-item .separator p {
        line-height: 20px;
        margin-bottom: 0;
        margin-top: 10px;
        text-align: center;
    }

        .col-item .separator p i {
            margin-right: 5px;
        }

    .col-item .btn-add {
        width: 50%;
        float: left;
    }

    .col-item .btn-add {
        border-right: 1px solid #CC9999;
    }

    .col-item .btn-details {
        width: 50%;
        float: left;
        padding-left: 10px;
    }

    .controls {
        margin-top: 20px;
    }

    [data-slide="prev"] {
        margin-right: 10px;
    }
</style>
            </div>

         </div>
      </div>
      <!-- /.container -->
      <?php $this->load->view('includes/footer')?>
      <!-- /.container -->
   </body>
</html>