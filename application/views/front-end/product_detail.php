<!doctype html>
<html lang="en-US">
   <?php $this->load->view('includes/head')?>
   <body class="home page-template page-template-template-home page-template-template-home-php page page-id-6 wp-custom-logo">
      <!-- End Google Tag Manager (noscript) -->
      <div id="page" class="site">
        <?php $this->load->view('includes/header')?>
         <!-- #masthead -->
         <main id="primary" class="site-main">
            <div class="container">
                <div class="brb">
                    <span><span><a href="/">Home</a></span> » <span class="breadcrumb_last" aria-current="page"><?=$product->name?></span></span>            
                </div>
                <div class="qh_ct">
                    <h1><?=$product->name?></h1>
                    <span class="qh_meta"><?=date('d-m-Y', strtotime($product->created_at))?></span>
                    <div class="qh_ctp">
                        <?=$product->description?>
                    </div>
                </div>
                <div class="qh_bvlq">
                    <h2>Sản phẩm khác</h2>
                    <div class="qh_product">
                        <?php foreach($products as $item) { ?>
                            <div class="product_small">
                                <a href="/<?=$item['slug']?>">
                                    <div class="image"><img width="2560" height="2560" src="/<?=$item['image_url']?>" class="attachment-full size-full wp-post-image" alt="" decoding="async" loading="lazy" sizes="(max-width: 2560px) 100vw, 2560px"> </div>
                                    <h3 class="sp_title"><?=$item['name']?></h3>
                                    <span>Xem chi tiết</span>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            </main>
         <?php $this->load->view('includes/footer')?>
         <!-- #colophon -->
      </div>
      <!-- #page -->
      <div class="mnf">
         <ul id="menu-menu-chinh" class="menu">
            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-9"><a href="/san-pham/">Sản phẩm</a></li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-8"><a href="/blogs/">Blogs</a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10"><a href="https://facebook.com/giaiphapmmodotnet">Fanpage</a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-11"><a href="https://www.facebook.com/groups/giaiphapmmonet">Cộng đồng</a></li>
         </ul>
         <div class="qh_a1">
            <ul>
               <li><a href="https://facebook.com/giaiphapmmodotnet" target="_blank">Mua qua facebook</a></li>
               <li><a href="https://user.giaiphapmmo.vn" target="_blank">Mua online</a></li>
            </ul>
         </div>
      </div>
      <div class="ovl"></div>
      <script src='/assets/js/navigation.js?ver=1.0.0' id='hungdevwp-navigation-js'></script>
      <script src='/assets/js/j.js?ver=6.2.2' id='theme-js-js'></script>
   </body>
</html>