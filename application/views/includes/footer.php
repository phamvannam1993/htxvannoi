<footer class="footer">
    <div class="content">
        <div class="site-footer">
            <div class="footer-inner padding-top-35 pb-lg-5">
                <div class="container">
                    <div class="row">
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="footer-widget">
                            <h3 class="hastog"><span><?=$setting['company_info']?></span></h3>
                            <ul class="list-menu list-showroom">
                                <li style="padding-left: 0;">
                                <p></p>
                                </li>
                                <li class="clearfix">
                                <i class="block_icon fa fa-map-marker"></i> 
                                <p>
                                <?=$setting['address']?>
                                </p>
                                </li>
                                <li class="clearfix">
                                <i class="block_icon fa fa-phone"></i>
                                <a href="tel:<?=$setting['phone_number']?>"><?=$setting['phone_number']?></a>
                                <p>Thứ 2 - Chủ nhật: 9:00 - 18:00</p>
                                </li>
                                <li class="clearfix"><i class="block_icon fa fa-envelope"></i>
                                <a title="<?=$setting['email']?>" href="mailto:<?=$setting['email']?>"><?=$setting['email']?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="footer-widget">
                            <h3 class="hastog"><span>Danh mục sản phẩm</span></h3>
                            <ul class="list-menu list-blogs">
                                <?php foreach($categories as $category) { ?>
                                    <li><a title="<?=$category['name']?>" href="/<?=$category['slug']?>"><?=$category['name']?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="footer-widget">
                            <h3 class="hastog"><span>Hỗ trợ Khách hàng</span></h3>
                            <ul class="list-menu list-blogs">
                                <li><a title="Câu hỏi thường gặp" href="/cau-hoi-thuong-gap">Câu hỏi thường gặp</a></li>
                                <li><a title="Khách hàng thân thiết" href="/khach-hang-than-thiet">Khách hàng thân thiết</a></li>
                                <li><a title="Chính sách đổi trả hàng" href="/chinh-sach-doi-tra-hang">Chính sách đổi trả hàng</a></li>
                                <li><a title="Chính sách giao hàng" href="/chinh-sach-giao-hang">Chính sách giao hàng</a></li>
                                <li><a title="Chính sách cho cộng tác viên" href="/chinh-sach-cho-cong-tac-vien">Chính sách cho cộng tác viên</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <div class="footer-widget active">
                            <h3 class="margin-bottom-20 hastog"><span>Về <?=$setting['company']?></span></h3>
                            <ul class="list-menu list-blogs">
                                <li><a title="Giới thiệu" href="/gioi-thieu">Giới thiệu</a></li>
                                <li><a title="Tầm nhìn và Sứ mệnh" href="/tam-nhin-va-su-menh">Tầm nhìn và Sứ mệnh</a></li>
                            </ul>
                            <div class="list-menu">
                                <div class="footerText">
                                <div class="fb-page" data-href="<?=$setting['fb_link']?>"  data-height="230" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                    <div class="fb-xfbml-parse-ignore">
                                        <blockquote cite="<?=$setting['fb_link']?>">
                                            <a href="<?=$setting['fb_link']?>">Facebook</a>
                                        </blockquote>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="copyright clearfix">
                <div class="container">
                    <div class="inner clearfix">
                    <div class="row">
                        <div class="col-md-6 text-center text-lg-left">
                            <span>© Bản quyền thuộc về <b><?=$setting['company']?></b> <b class="fixline">|</b></span>
                        </div>
                        <div class="col-md-6 text-center text-lg-right hidden-xs">
                            <ul class="list-menu-footer">
                                <li><a title="Tìm kiếm" href="/search">Tìm kiếm</a></li>
                                <li><a title="Giới thiệu" href="/gioi-thieu">Giới thiệu</a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="back-to-top">
                    <i class="fa  fa-angle-up"></i>
                    </div>
                    <a href="tel:<?=$setting['phone_number']?>" class="suntory-alo-phone bottom-left  suntory-alo-green " id="suntory-alo-phoneIcon">
                    <div class="suntory-alo-ph-img-circle"><i class="fa fa-phone"></i></div>
                    </a>
                </div>
            </div>
        </div>
        </div>
    </footer>