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
                <header class="page-header">
                    <h1 class="page-title">Blogs</h1>
                </header>
                <div class="qh_post">
                    <?php foreach($datas as $data) { ?>
                    <div class="post_small">
                        <a href="/<?=$data['slug']?>">
                        <div class="image"><img width="2560" height="1707" src="/<?=$data['image_url']?>" class="attachment-full size-full wp-post-image" alt="" decoding="async"  sizes="(max-width: 2560px) 100vw, 2560px"> </div>
                        <h3 class="post_title"><?=$data['title']?></h3>
                        <div class="is-divider"></div>
                        <p><?=$data['des_short']?></p>
                        <span><?=date('d-m-Y', strtotime($data['created_at']))?></span>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <div class="pgn">
                    <?php if($page > 1) { ?>
                        <a class="prev page-numbers" href="<?= $previousPageUrl ?? '#' ?>">&gt;</a>
                    <?php } ?>
                    <?php foreach ($pagesToShow as $p): ?>
                        <?php if ($p === '...'): ?>
                            <span aria-current="page" class="page-numbers">...</span>
                        <?php else: ?>
                            <?php if($p == $page) { ?>
                                <span class="page-numbers current"><?= $p ?></span>
                            <?php  } else { ?>
                                <a class="page-numbers <?= ($p == $page) ? 'current' : '' ?>" href="<?= pageUrl($p) ?>"><?= $p ?></a>
                             <?php } ?>
                          
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if($page < $totalPage) { ?>
                        <a class="next page-numbers <?= ($page == $totalPage) ? '' : '' ?>" href="<?= $nextPageUrl ?? '#' ?>">&gt;</a>
                    <?php } ?>
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