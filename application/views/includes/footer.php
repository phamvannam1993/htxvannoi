<div class="row">
    <link rel="stylesheet" href="/assets/css/footer-distributed-with-address-and-phones.css">
    <footer class="footer-distributed">
    <div class="footer-left">
        <h3><img src="/assets/images/LOGOHTX -footer.png" width="400" /></h3>
        <p class="footer-links">
            <a href="/">Trang chủ</a>
            ·
            <a href="/Index/gioithieu">Giới thiệu</a>
            ·
            <a href="/Gopy/guigopy">Góp ý</a>
            ·
            <a href="/Index/huongdanmuahang">Hướng dẫn mua hàng</a>
        </p>
        <p class="footer-company-name">htxvannoi.com &copy; 2018</p>
    </div>
    <div class="footer-center">
        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>Xóm Đầm, Vân Nội</span> Đông Anh, Hà Nội</p>
        </div>
        <div>
            <i class="fa fa-phone"></i>
            <p><?=isset($setting['phone_number_1']) ? $setting['phone_number_1']. ' hoặc'  : ''?>  <?=isset($setting['phone_number_1']) ? $setting['phone_number_1'] : ''?></p>
        </div>
        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:<?=isset($setting['email']) ? $setting['email'] : ''?>"> <?=isset($setting['email']) ? $setting['email'] : ''?></a></p>
        </div>
    </div>
    <div class="footer-right">
        <p class="footer-company-about">
            <span>Về HTX CB-SX-TT SPNN AN TOÀN VÂN NỘI</span>
            <?=isset($setting['description']) ? $setting['description'] : ''?>
        </p>
        <div class="footer-icons">
            <a href="<?=isset($setting['facebook_link']) ? $setting['facebook_link'] : ''?>" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="<?=isset($setting['google_link']) ? $setting['google_link'] : ''?>" target="_blank"><i class="fa fa-google"></i></a>
        </div>
    </div>
    </footer>
</div>