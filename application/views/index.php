<!DOCTYPE html>
<html lang="vi">
   <?php $this->load->view('includes/head')?>
   <body>
      <div class="fffmb hidden">
      </div>
      <!-- Main content -->
      <?php $this->load->view('includes/header')?>
      <h1 class="hidden">Organic Mart - </h1>
      <section class="awe-section-1" id="awe-section-1">
         <div class="section_category_slider">
            <div class="container">
               <h2 class="hidden">Danh mục</h2>
               <div class="row">
                  <?php $this->load->view('includes/slider')?>  
                  <div class="col-md-3 col-md-pull-9 mt-5 hidden-xs aside-vetical-menu">
                     <aside class="blog-aside aside-item sidebar-category">
                        <div class="aside-title text-center text-xl-left">
                           <h2 class="title-head"><span>Danh mục</span></h2>
                        </div>
                        <?php $this->load->view('includes/category')?>
                     </aside>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php foreach($caProducts as $cateProduct) {?>
      <section class="awe-section-3" id="awe-section-3">
         <div class="section section-deal products-view-grid xxx">
         <div class="container">
            <div class="section-title a-center">
               <h2 ><a href="/<?=$cateProduct['category']['slug']?>"><?=$cateProduct['category']['name']?></a></h2>
               <p></p>
            </div>
            <div class="section-content">
               <div class="products products-view-grid  owl-carousel owl-theme" data-lgg-items="6" data-lg-items="6" data-md-items="5" data-sm-items="3" data-xs-items="2" data-xss-items="2" data-margin="30" data-nav="true">
                  <?php foreach($cateProduct['products'] as $product) {?>
                  <div class="product-box">
                     <div class="product-thumbnail flexbox-grid">
                        <a href="/<?=$product['slug']?>" title="<?=$product['name']?>">
                        <img src="/<?=$product['image_url']?>"  data-lazyload="/<?=$product['image_url']?>" alt="<?=$product['name']?>">
                        </a>	
                     </div>
                     <div class="product-info a-center">
                        <h3 class="product-name"><a href="/<?=$product['slug']?>" title="<?=$product['name']?>"><?=$product['name']?></a></h3>
                        <div class="price-box clearfix">
                           <div class="special-price">
                              <span class="price product-price"><?=number_format($product['price'])?>₫</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php  } ?>
                  <!-- /.products -->
                
               </div>
               <div class="read_more" > <a href="/<?=$cateProduct['category']['slug']?>">XEM THÊM</a></div>
            </div>
         </div>
      </section>
      <?php } ?>
      <!-- <div class="scroll_menu hidden-xs hidden-sm" id="myScrollspy">
         <ul class="nav nav-pills nav-stacked">
            <li >
               <a href="#awe-section-3" data-href="#awe-section-3">
               <img alt="section 3" src="//bizweb.dktcdn.net/100/390/808/themes/770284/assets/icon_section_3.png?1625564501977">
               <span class="scroll_tooltip_1" style="background-color: #49a942; color:#fff">
               RAU, CỦ, QUẢ HỮU CƠ
               </span>
               </a>
            </li>
            <li >
               <a href="#awe-section-4" data-href="#awe-section-4">
               <img alt="section 4" src="//bizweb.dktcdn.net/100/390/808/themes/770284/assets/icon_section_4.png?1625564501977">
               <span class="scroll_tooltip_1" style="background-color: #49a942; color:#fff">
               TRÁI CÂY
               </span>
               </a>
            </li>
            <li >
               <a href="#awe-section-6" data-href="#awe-section-6">
               <img alt="section 6" src="//bizweb.dktcdn.net/100/390/808/themes/770284/assets/icon_section_6.png?1625564501977">
               <span class="scroll_tooltip_1" style="background-color: #49a942; color:#fff">
               THỊT, CÁ, HẢI SẢN
               </span>
               </a>
            </li>
         </ul>
      </div> -->
      <?php $this->load->view('includes/footer')?>
      <?php $this->load->view('includes/modal')?>
      <!-- Modal Đăng nhập -->
      <div class='jas-sale-pop flex pf middle-xs'></div>
      <?php $this->load->view('includes/script')?>
   </body>
</html>