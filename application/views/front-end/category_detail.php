<!DOCTYPE html>
<html lang="vi">
<?php $this->load->view('includes/head')?>
   <body>
      <div class="fffmb hidden">
      </div>
      <!-- Main content -->
      <?php $this->load->view('includes/header')?>
      <section class="bread_crumb py-4">
         <div class="container">
            <div class="row">
               <div class="col-xs-12">
                  <ul class="breadcrumb" >
                     <li class="home">
                        <a  href="/" ><span >Trang chủ</span></a>						
                        <span> <i class="fa fa-angle-right"></i> </span>
                     </li>
                     <li><strong ><span ><?=$category->name?></span></strong></li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
      <div class="container">
         <div class="row">
            <section class="main_container collection col-lg-9 col-lg-push-3">
               <div class="box-heading hidden relative">
                  <h1 class="title-head margin-top-0"><?=$category->name?></h1>
               </div>
               <div class="category-products products">
                  <div class="sortPagiBar">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-xs-left text-sm-right">
                           <div class="bg-white clearfix">
                              <!-- <div id="sort-by">
                                 <label class="left hidden-xs">Sắp xếp: </label>
                                 <ul>
                                    <li >
                                       <span class="val">Mặc định</span>
                                       <ul class="ul_2">
                                          <li><a href="javascript:;" onclick="sortby('default')">Mặc định</a></li>
                                          <li><a href="javascript:;" onclick="sortby('alpha-asc')">A &rarr; Z</a></li>
                                          <li><a href="javascript:;" onclick="sortby('alpha-desc')">Z &rarr; A</a></li>
                                          <li><a href="javascript:;" onclick="sortby('price-asc')">Giá tăng dần</a></li>
                                          <li><a href="javascript:;" onclick="sortby('price-desc')">Giá giảm dần</a></li>
                                          <li><a href="javascript:;" onclick="sortby('created-desc')">Hàng mới nhất</a></li>
                                          <li><a href="javascript:;" onclick="sortby('created-asc')">Hàng cũ nhất</a></li>
                                       </ul>
                                    </li>
                                 </ul>
                              </div> -->
                              <!-- <div class="view-mode f-left">				
                                 <a href="javascript:;" data-view="grid" >
                                 <b class="btn button-view-mode view-mode-grid active ">
                                 <i class="fa fa-th" aria-hidden="true"></i>					
                                 </b>
                                 <span>Lưới</span>
                                 </a>
                                 <a href="javascript:;" data-view="list" onclick="switchView('list')">
                                 <b class="btn button-view-mode view-mode-list ">
                                 <i class="fa fa-th-list" aria-hidden="true"></i>
                                 </b>
                                 <span>Danh sách</span>
                                 </a>
                              </div> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <section class="products-view products-view-grid">
                     <?php if(empty($datas)) { ?>
                        <h2 class="title-head">Không có kết quả tìm kiếm phù hợp</h2>
                    <?php } ?>
                     <div class="row">
                        <?php foreach($datas as $data) {?>
                        <div class="col-xs-6 col-xss-6 col-sm-4 col-md-4 col-lg-4">
                           <div class="product-box">
                              <div class="product-thumbnail flexbox-grid">
                                 <a href="/<?=$data['slug']?>" title="<?=$data['name']?>">
                                 <img src="/<?=$data['image_url']?>7"  data-lazyload="/<?=$data['image_url']?>" alt="<?=$data['name']?>">
                                 </a>	
                              </div>
                              <div class="product-info a-center">
                                 <h3 class="product-name"><a href="/<?=$data['slug']?>" title="<?=$data['name']?>"><?=$data['name']?></a></h3>
                                 <div class="price-box clearfix">
                                    <div class="special-price">
                                       <span class="price product-price"><?=number_format($data['price'])?>₫</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php } ?>
                     </div>
                     <?php if(!empty($datas)) {?>
                     <div class="text-center">
                        <nav>
                           <ul class="pagination clearfix">
                              <li class="page-item text hidden-xs" <?= ($page == 1) ? 'disabled' : '' ?>><a class="page-link" href="<?= $previousPageUrl ?? '#' ?>"><i class="fa fa-angle-left"></i></a></li>        
                               <!-- Pages -->
                              <?php foreach ($pagesToShow as $p): ?>
                                    <?php if ($p === '...'): ?>
                                       <li class="page-item">...</li>
                                    <?php else: ?>
                                       <li class="page-item <?= ($p == $page) ? 'active' : '' ?>"><a class="page-link" href="<?= pageUrlProduct($p, "") ?>"><?= $p ?></a></li>
                                    <?php endif; ?>
                              <?php endforeach; ?>
                              <li class="page-item hidden-xs text" <?= ($page == 1) ? 'disabled' : '' ?>><a class="page-link" href="<?= $previousPageUrl ?? '#' ?>"><i class="fa fa-angle-right"></i></a></li>
                           </ul>
                        </nav>
                     </div>
                     <?php } ?>
                  </section>
               </div>
            </section>
            <?php $this->load->view('includes/aside')?>
            <div id="open-filters" class="open-filters hidden-lg">
               <i class="fa fa-align-right"></i>
               <span>Lọc</span>
            </div>
         </div>
      </div>	
      <?php $this->load->view('includes/footer')?>
      <?php $this->load->view('includes/modal')?>
      <!-- Modal Đăng nhập -->
      <div class='jas-sale-pop flex pf middle-xs'></div>
      <?php $this->load->view('includes/script')?>
   </body>
</html>