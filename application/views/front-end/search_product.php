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
                     <li><strong ><span > Kết quả tìm kiếm với từ khóa <?=$query?></span></strong></li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
  
      <section class="signup search-main">
         <div class="container">
            <div class="row">
               <div class="col-xs-12">
                  <h2><a href="#" class="title-box">Nhập từ khóa tìm kiếm </a></h2>
               </div>
               <div class="col-xs-12">
                  <form action="/search" method="get" class="form-signup">
                     <fieldset class="form-group">
                        <input type="text" name="query" value="<?=$query?>" placeholder="Tìm kiếm ..." class="form-control" style="width:300px; float:left;     line-height: 2.1;">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                     </fieldset>
                  </form>
               </div>
               <div class="col-xs-12">
                  <h2 class="title-head"><?=$total > 0 ? 'Có '.$total : 'Không có '?> kết quả tìm kiếm phù hợp</h2>
               </div>
               <div class="col-xs-12">
                  <div class="products-view-grid products">
                     <div class="row row-gutter-14">
                        <?php foreach($datas as $data) {?>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                           <div class="product-box">
                              <div class="product-thumbnail flexbox-grid">
                                 <a href="/<?=$data['slug']?>" title="<?=$data['name']?>">
                                 <img src="/<?=$data['image_url']?>" data-lazyload="/<?=$data['image_url']?>" alt="<?=$data['name']?>">
                                 </a>	
                                 <div class="product-action hidden-md hidden-sm hidden-xs clearfix">
                                    <form action="/cart/add" method="post" class="variants form-nut-grid margin-bottom-0" data-id="product-actions-30045709" enctype="multipart/form-data">
                                       <div>
                                          <input type="hidden" name="variantId" value="83875953">
                                          <button class="btn-buy btn-cart btn btn-primary   left-to add_to_cart" data-toggle="tooltip" title="Mua hàng">
                                          <i class="fa fa-shopping-bag"></i>						
                                          </button>
                                          <a href="/<?=$data['slug']?>" data-handle="<?=$data['slug']?>" data-toggle="tooltip" title="Xem nhanh" class="btn-gray btn_view btn right-to quick-view">
                                          <i class="fa fa-eye"></i></a>
                                       </div>
                                    </form>
                                 </div>
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
                  </div>
               </div>
               <?php if(!empty($datas)) {?>
                  <div class="col-xs-12 text-center">
                     <nav>
                        <ul class="pagination clearfix">
                           <li class="page-item text hidden-xs" <?= ($page == 1) ? 'disabled' : '' ?>><a class="page-link" href="<?= $previousPageUrl ?? '#' ?>"><i class="fa fa-angle-left"></i></a></li>        
                              <!-- Pages -->
                           <?php foreach ($pagesToShow as $p): ?>
                                 <?php if ($p === '...'): ?>
                                    <li class="page-item">...</li>
                                 <?php else: ?>
                                    <li class="page-item <?= ($p == $page) ? 'active' : '' ?>"><a class="page-link" href="<?= pageUrlProduct($p, $query) ?>"><?= $p ?></a></li>
                                 <?php endif; ?>
                           <?php endforeach; ?>
                           <li class="page-item hidden-xs text" <?= ($page == 1) ? 'disabled' : '' ?>><a class="page-link" href="<?= $previousPageUrl ?? '#' ?>"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                     </nav>
                  </div>
                  <?php } ?>
            </div>
         </div>
      </section>

      <?php $this->load->view('includes/footer')?>
      <?php $this->load->view('includes/modal')?>
      <!-- Modal Đăng nhập -->
      <div class='jas-sale-pop flex pf middle-xs'></div>
      <?php $this->load->view('includes/script')?>
   </body>
</html>