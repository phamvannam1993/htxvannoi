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
               <script src='/assets/js/bootstrap3-showmanyslideonecarousel.js'></script>
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
               <div class="container-fluid">
                  <?php foreach($cateProducts as $cateProduct) {?>
                  <div class="row">
                     <div class="row">
                        <div class="col-md-9">
                           <h3><a href="/danh-muc/<?=$cateProduct['category']['slug']?>" class="fa fa-link"><?=$cateProduct['category']['name']?></a></h3>
                        </div>
                        <!-- Controls -->
                     </div>
                     <div id="carousel-example" class="carousel carousel-showmanymoveone slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                           <?php foreach($cateProduct['products'] as $key => $product) { ?>
                           <div class="item <?= $key == 0 ? 'active' : ''?>" >
                              <div class="col-xs-12 col-sm-6 col-md-3">
                                 <div class="col-item">
                                    <div class="info">
                                       <div class="row">
                                          <div class="price col-md-12">
                                             <h5><?=$product['name']?></h5>
                                             <h5 class="price-text-color"><?=number_format($product['price'])?></h5>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="photo" >
                                       <a href="chitietsp/id=bapcai01">
                                          <img src="/<?=$product['image_url']?>" class="img-fluid" alt="a"/></a>
                                    </div>
                                    <div class="info">
                                       <div class="separator clear-left">
                                          <p class="btn-add">
                                             <i class="fa fa-shopping-cart" ></i>
                                             <!-- <a href="#myModal" data-toggle="modal" onclick="getproducID(&#39;bapcai01&#39;)">Mua</a> -->
                                          </p>
                                          <p class="btn-details">
                                             <i class="fa fa-list"></i><a href="/san-pham/<?=$product['slug']?>">Chi tiết</a>
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
                  <?php } ?>
               </div>
               <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">
                     <!-- Modal content-->
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title">Số lượng đặt hàng</h4>
                        </div>
                        <form role="form" id="ModalFormsoluong">
                           <div class="modal-body">
                              <p>Số lượng</p>
                              <div class="form-group">
                                 <div><input type="text" id="soluong" name="soluong" class="form-control" value="1" required /></div>
                              </div>
                              <p>Đơn vị tính Kg(kilogam)</p>
                              <div class="form-group">
                                 <input type="hidden" id="idmacay" />
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="submit" class="btn btn-lg btn-success btn-block">Đặt hàng</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <script src='/assets/js/bootstrap3-showmanyslideonecarousel.js'></script>
               <script>
                  function getproducID(ID) {
                      //$paneTargetmodal = $('#myModal');
                      //$paneTargetmodal.find("#idmacay").value="1111";
                      //$paneTarget1.find('#idmacay').text = "324#";
                      var i = $("#soluong").val();
                      $("#idmacay").val(ID);
                      //window.location.href("~/Shopping/addproducttocart?productId=");
                  }
                  
                  function getdataurl() {
                      var macay = $("#idmacay").val();
                      var soluong = $("#soluong").val();
                      window.location.href = "/shopping/addproducttocart?productId=" + macay + "&soluong=" + soluong;
                  }
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
                              $paneContainer.height($rowwidth * 0.7);
                              $paneContainer.width($rowwidth * 0.7);
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
                      if ($rowwidth > 780) {
                          $paneTarget.find('.img-fluid').each(function () {
                              containerWidth = $(this).width();
                              //$('#txt1').text(containerWidth + "fdfd" + $rowwidth);
                              $paneContainer.height(containerWidth);
                  
                  
                          });
                      }
                      else {
                          if ($rowwidth < 750) {
                              $paneContainer.height($rowwidth * 0.7);
                              $paneContainer.width($rowwidth * 0.7);
                              //$('#txt1').text(containerWidth + "fdfd" + $rowwidth);
                          }
                          else {
                              $paneContainer.height(($rowwidth - 50) / 2);
                              //$('#txt1').text(containerWidth + "fdfd" + $rowwidth);
                  
                          }
                  
                      }
                  });
                  
                  (function () {
                      // setup your carousels as you normally would using JS
                      // or via data attributes according to the documentation
                      $('#carousel-example').carousel({ interval: 2500 });
                      $('#carousel-example1').carousel({ interval: 3500 });
                      $('#carousel-example2').carousel({ interval: 4500 });
                  }());
                  // validate soluong
                  $(function () {
                      $('#ModalFormsoluong').validate({
                          errorClass: 'help-block', // You can change the animation class for a different entrance animation - check animations page
                          errorElement: 'div',
                          errorPlacement: function (error, e) {
                              e.parents('.form-group > div').append(error);
                          },
                          highlight: function (e) {
                  
                              $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                              $(e).closest('.help-block').remove();
                          },
                          success: function (e) {
                              e.closest('.form-group').removeClass('has-success has-error');
                              e.closest('.help-block').remove();
                          },
                          rules: {
                              soluong:
                                  {
                                      required: true,
                                      maxlength: 4,
                                      number:true
                                  }
                          },
                          messages: {
                              soluong:
                                  {
                                      required: "Không được để trống",
                                      maxlength: "Nhiều nhất 4 số",
                                      number: 'Số lượng không đúng'
                                  }
                          },
                          submitHandler: function (form) {
                              //code in here
                              getdataurl();
                          }
                      });
                  });
               </script>
               <style>
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
               <style>
                  .carousel-control {
                  width: 15px;
                  background-color: none;
                  }
                  .glyphicon.glyphicon-chevron-right {
                  color: red;
                  }
                  .glyphicon.glyphicon-chevron-left {
                  color: red;
                  }
                  .right next {
                  }
                  .left next {
                  }
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