<div class="error-popup awe-popup">
    <div class="overlay no-background"></div>
    <div class="popup-inner content">
    <div class="error-message"></div>
    </div>
</div>
<div id="popup-cart" class="hidden" role="dialog">
    <div id="popup-cart-desktop" class="clearfix">
    <div class="title-popup-cart">
        <i class="fa fa-check" aria-hidden="true"></i> Bạn đã thêm <span class="cart-popup-name" style="color: red;"></span> vào giỏ hàng
    </div>
    <div class="content-popup-cart">
        <div class="thead-popup">
            <div style="width: 54%;" class="text-left">Sản phẩm</div>
            <div style="width: 15%;" class="text-center">Đơn giá</div>
            <div style="width: 15%;" class="text-center">Số lượng</div>
            <div style="width: 15%;" class="text-center">Thành tiền</div>
        </div>
        <div class="tbody-popup">
        </div>
        <div class="tfoot-popup">
            <div class="tfoot-popup-1 clearfix">
                <div class="pull-left popup-ship">
                <div class="title-quantity-popup">
                    <a href="/cart">
                    Giỏ hàng của bạn <i>(<b class="cart-popup-count"></b> sản phẩm)</i>
                    </a>
                </div>
                </div>
                <div class="pull-right popup-total">
                <p>Thành tiền: <span class="total-price"></span></p>
                </div>
            </div>
            <div class="tfoot-popup-2 clearfix">
                <a class="button btn-proceed-checkout" title="Tiến hành đặt hàng" href="/checkout"><span>Tiến hành đặt hàng</span></a>
                <a class="button btn btn-gray btn-continue" title="Tới giỏ hàng" href="/cart"><span><span>Tới giỏ hàng</span></span></a>
            </div>
        </div>
    </div>
    <a title="Close" class="quickview-close close-window" href="javascript:;" onclick="$('#popup-cart').modal('hide');"><i class="fa  fa-times-circle"></i></a>
    </div>
</div>
    
<div id="myModal" class="modal fade" role="dialog"></div>
<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog wrap-modal-login" role="document">
    <div class="text-xs-center">
        <div id="loginx">
            <div class="row row-noGutter">
                <div class="col-sm-12">
                <div class="content a-left">
                    <h5 class="title-modal a-center">ĐĂNG NHẬP TÀI KHOẢN </h5>
                    <div class="social-login text-center margin-bottom-20 margin-top-10">
                        <style>.social-login a {
                            display: inline-block;
                            }
                        </style>
                        <script>function loginFacebook(){var a={client_id:"947410958642584",redirect_uri:"https://store.mysapo.net/account/facebook_account_callback",state:JSON.stringify({redirect_url:window.location.href}),scope:"email",response_type:"code"},b="https://www.facebook.com/v3.2/dialog/oauth"+encodeURIParams(a,!0);window.location.href=b}function loginGoogle(){var a={client_id:"997675985899-pu3vhvc2rngfcuqgh5ddgt7mpibgrasr.apps.googleusercontent.com",redirect_uri:"https://store.mysapo.net/account/google_account_callback",scope:"email profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile",access_type:"online",state:JSON.stringify({redirect_url:window.location.href}),response_type:"code"},b="https://accounts.google.com/o/oauth2/v2/auth"+encodeURIParams(a,!0);window.location.href=b}function encodeURIParams(a,b){var c=[];for(var d in a)if(a.hasOwnProperty(d)){var e=a[d];null!=e&&c.push(encodeURIComponent(d)+"="+encodeURIComponent(e))}return 0==c.length?"":(b?"?":"")+c.join("&")}</script> 
                        <a href="javascript:void(0)" class="social-login--facebook" onclick="loginFacebook()"><img width="129px" height="37px" alt="facebook-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg"></a> 
                        <a href="javascript:void(0)" class="social-login--google" onclick="loginGoogle()"><img width="129px" height="37px" alt="google-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg"></a>
                    </div>
                    <form method="post" action="/account/login" id="customer_login" accept-charset="UTF-8">
                        <input name="FormType" type="hidden" value="customer_login"/><input name="utf8" type="hidden" value="true"/>
                        <div class="form-signup" >
                        </div>
                        <div class="form-signup clearfix">
                            <fieldset class="form-group">
                            <label>Email: </label>
                            <input type="email" class="form-control form-control-lg" value="" name="email"  required>
                            </fieldset>
                            <fieldset class="form-group">
                            <label>Mật khẩu: </label>
                            <input type="password" class="form-control form-control-lg" value="" name="password"  required>
                            </fieldset>
                            <div class="a-left">
                            <p class="margin-bottom-15">Bạn quên mật khẩu? Hãy bấm <a href="#" class="btn-link-style btn-link-style-active" onclick="showRecoverPasswordForm();return false;">tại đây</a></p>
                            <!-- <a href="/account/register" class="btn-link-style">Đăng ký tài khoản mới</a> -->
                            </div>
                            <fieldset class="form-group">
                            <input class="btn btn-primary btn-full" type="submit" value="Đăng nhập" />
                            </fieldset>
                        </div>
                    </form>
                    <div class="link-popup">
                        <p>
                            Chưa có tài khoản đăng ký 
                            <a href="#" class="margin-top-20" data-dismiss="modal" data-toggle="modal" data-target="#dangky">tại đây</a>
                        </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div id="recover-password" class="form-signup" style="display: none">
            <div class="row row-noGutter">
                <div class="col-sm-12" >
                <div class="content a-center">
                    <h5 class="title-modal">Lấy lại mật khẩu</h5>
                    <p>Chúng tôi sẽ gửi thông tin lấy lại mật khẩu vào email đăng ký tài khoản của bạn</p>
                    <form method="post" action="/account/recover" id="recover_customer_password" accept-charset="UTF-8">
                        <input name="FormType" type="hidden" value="recover_customer_password"/><input name="utf8" type="hidden" value="true"/>
                        <div class="form-signup" >
                        </div>
                        <div class="form-signup clearfix">
                            <fieldset class="form-group">
                            <input type="email" class="form-control form-control-lg" value="" name="Email" required>
                            </fieldset>
                        </div>
                        <div class="action_bottom">
                            <input class="btn btn-primary btn-full" type="submit" value="Gửi" />
                            <a href="#" class="margin-top-10 btn  btn-full btn-dark btn-style-active btn-recover-cancel" onclick="hideRecoverPasswordForm();return false;">Hủy</a>
                        </div>
                    </form>
                    <div class="margin-top-10">
                        <p>Chào mừng bạn đến với <a href="/">Organic Mart</a></p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function showRecoverPasswordForm() {
            document.getElementById('recover-password').style.display = 'block';
            document.getElementById('loginx').style.display='none';
            }
            
            function hideRecoverPasswordForm() {
            document.getElementById('recover-password').style.display = 'none';
            document.getElementById('loginx').style.display = 'block';
            }
            
            if (window.location.hash == '#recover') { showRecoverPasswordForm() }
        </script>
    </div>
    <button type="button" class="btn btn-close btn-default" data-dismiss="modal"><i class="fa fa-close"></i></button>
    </div>
</div>
<!-- Modal Đăng ký-->
<div class="modal fade" id="dangky" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog wrap-modal-login" role="document">
    <div class="text-xs-center">
        <div id="login">
            <div class="row row-noGutter">
                <div class="col-sm-12">
                <div class="content a-left">
                    <h5 class="title-modal a-center">ĐĂNG KÝ TÀI KHOẢN</h5>
                    <div class="social-login text-center margin-bottom-20 margin-top-10">
                        <style>.social-login a {
                            display: inline-block;
                            }
                        </style>
                        <script>function loginFacebook(){var a={client_id:"947410958642584",redirect_uri:"https://store.mysapo.net/account/facebook_account_callback",state:JSON.stringify({redirect_url:window.location.href}),scope:"email",response_type:"code"},b="https://www.facebook.com/v3.2/dialog/oauth"+encodeURIParams(a,!0);window.location.href=b}function loginGoogle(){var a={client_id:"997675985899-pu3vhvc2rngfcuqgh5ddgt7mpibgrasr.apps.googleusercontent.com",redirect_uri:"https://store.mysapo.net/account/google_account_callback",scope:"email profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile",access_type:"online",state:JSON.stringify({redirect_url:window.location.href}),response_type:"code"},b="https://accounts.google.com/o/oauth2/v2/auth"+encodeURIParams(a,!0);window.location.href=b}function encodeURIParams(a,b){var c=[];for(var d in a)if(a.hasOwnProperty(d)){var e=a[d];null!=e&&c.push(encodeURIComponent(d)+"="+encodeURIComponent(e))}return 0==c.length?"":(b?"?":"")+c.join("&")}</script> 
                        <a href="javascript:void(0)" class="social-login--facebook" onclick="loginFacebook()"><img width="129px" height="37px" alt="facebook-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg"></a> 
                        <a href="javascript:void(0)" class="social-login--google" onclick="loginGoogle()"><img width="129px" height="37px" alt="google-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg"></a>
                    </div>
                    <form method="post" action="/account/register" id="customer_register" accept-charset="UTF-8">
                        <input name="FormType" type="hidden" value="customer_register"/><input name="utf8" type="hidden" value="true"/><input type="hidden" id="Token-429555e239ca4b51a98f9481b5a9a393" name="Token" /><script src="https://www.google.com/recaptcha/api.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK"></script><script>grecaptcha.ready(function() {grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {action: "customer_register"}).then(function(token) {document.getElementById("Token-429555e239ca4b51a98f9481b5a9a393").value = token});});</script>
                        <div class="form-signup" >
                        </div>
                        <div class="form-signup clearfix">
                            <fieldset class="form-group">
                            <label>Họ tên</label>
                            <input type="text" class="form-control form-control-lg" value="" name="firstName"  required >
                            </fieldset>
                            <fieldset class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control form-control-lg" value="" name="email"   required="">
                            </fieldset>
                            <fieldset class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control form-control-lg" value="" name="password"  required >
                            </fieldset>
                            <fieldset class="form-group">
                            <button value="Đăng ký" class="btn btn-primary btn-full">Đăng ký</button>
                            </fieldset>
                        </div>
                    </form>
                    <div class="link-popup">
                        <p>
                            Đã có tài khoản đăng nhập 
                            <a href="#" class="margin-top-20" data-dismiss="modal" data-toggle="modal" data-target="#dangnhap">tại đây</a>
                        </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-close btn-default" data-dismiss="modal"><i class="fa fa-close"></i></button>
    </div>
</div>
<!-- Add to cart -->
<div id="popupCartModal" class="modal fade" role="dialog">
</div>
<div id="quickview" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                <div class="image margin-bottom-15">
                    <a class="img-product clearfix" title="" href="javascript:;">
                    <img id="product-featured-image-quickview" class="img-responsive product-featured-image-quickview" src="/assets/js/logo.png?1625564501977" alt="quickview"  />
                    </a>
                </div>
                <div id="thumbnail_quickview">
                    <div class="thumblist"></div>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="content">
                    <h3 class="product-name"><a href="">Tên sản phẩm</a></h3>
                    <div class="status clearfix">
                        Trạng thái: <span class="inventory">
                        <i class="fa fa-check"></i> Còn hàng
                        </span>
                    </div>
                    <div class="price-box margin-bottom-20 clearfix">
                        <div class="special-price f-left">
                            <span class="price product-price">giá</span>
                        </div>
                        <div class="old-price">															 
                            <span class="price product-price-old">
                            giá sale
                            </span>
                        </div>
                    </div>
                    <div class="product-description rte"></div>
                    <a href="#" class="view-more hidden">Xem chi tiết</a>
                    <div class="clearfix"></div>
                    <div class="info-other">
                    </div>
                    <form action="/cart/add" method="post" enctype="multipart/form-data" class="margin-top-20 variants form-ajaxtocart">
                        <span class="price-product-detail hidden" style="opacity: 0;">
                        <span class=""></span>
                        </span>
                        <select name="variantId" class="hidden" style="display:none"></select>
                        <div class="clearfix"></div>
                        <div class="quantity_wanted_p">
                            <label for="quantity-detail" class="quantity-selector">Số lượng</label>
                            <input type="text" onchange="if(this.value == 0)this.value=1;" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" id="quantity-detail" name="quantity" value="1"  class="quantity-selector text-center">
                            <button type="submit" name="add" class="btn  btn-primary add_to_cart_detail ajax_addtocart">
                            <span >Mua hàng</span>
                            </button>
                        </div>
                        <div class="total-price" style="display:none">
                            <label>Tổng cộng: </label>
                            <span></span>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-close btn-default" data-dismiss="modal"><i class="fa fa-close"></i></button>
    </div>
    </div>
</div>
<div class="ajax-load">
    <span class="loading-icon">
    <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
        <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
        </rect>
        <rect x="8" y="10" width="4" height="10" fill="#333"  opacity="0.2">
            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
        </rect>
        <rect x="16" y="10" width="4" height="10" fill="#333"  opacity="0.2">
            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
        </rect>
    </svg>
    </span>
</div>
<div class="loading awe-popup">
    <div class="overlay"></div>
    <div class="loader" title="2">
    <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
        <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
        </rect>
        <rect x="8" y="10" width="4" height="10" fill="#333"  opacity="0.2">
            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
        </rect>
        <rect x="16" y="10" width="4" height="10" fill="#333"  opacity="0.2">
            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
        </rect>
    </svg>
    </div>
</div>
<div id="call_now_widget-2">
    <div class="float-icon-hotline">
    <ul>
        <li class="hotline_float_icon">
            <a id="messengerButton" href="tel:0796680669" rel="noopener nofollow">
            <i class="fa fas fa-fax animated infinite tada"></i>
            <span>Hotline: 079 668 0669</span>
            </a>
        </li>
        <li class="hotline_float_icon">
            <a id="messengerButton" href="https://zalo.me/0796680669" target="_blank" rel="noopener nofollow">
            <i class="fa fa-zalo animated infinite tada"></i>
            <span>Zalo 079 668 0669</span>
            </a>
        </li>
    </ul>
    </div>
</div>