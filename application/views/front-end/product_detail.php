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
                     <li>
						<a href="/<?=$category->slug?>"><span><?=$category->name?></span></a>						
						<span> <i class="fa fa-angle-right"></i> </span>
					</li>
                     <li><strong ><span ><?=$product->name?></span></strong></li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
      
      <div class="container">

        <div class="row">
            <div class="col-lg-9 ">
                <div class="details-product">
                    <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="large-image">
                            <a href="/<?=$product->slug?>" data-rel="prettyPhoto[product-gallery]">
                                <div style="height:313px;width:313px;" class="zoomWrapper"><img id="zoom_01" src="/<?=$product->image_url?>" alt="<?=$product->slug?>" style="position: absolute;"></div>
                            </a>
                            <div class="hidden">
                                <div class="item">
                                <a href="/<?=$product->slug?>" data-image="/<?=$product->image_url?>" data-zoom-image="/<?=$product->image_url?>" data-rel="prettyPhoto[product-gallery]">
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 details-pro">
                        <h1 class="title-head"><?=$product->name?></h1>
                        <div class="reviews clearfix">
                            <div class="f-left margin-right-10">
                                <div class="sapo-product-reviews-badge sapo-product-reviews-badge-detail" data-id="18335234">
                                <div class="sapo-product-reviews-star" data-score="4.5" data-number="5" style="color: #ffbe00" title="gorgeous"><i data-alt="1" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="2" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="3" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="4" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="5" class="star-half-png" title="gorgeous"></i><input name="score" type="hidden" value="4.5" readonly=""></div>
                                <a href="javascript:;" class="sapo-product-review-scroll" style="color: #7fbb00">(Xem 2 đánh giá)</a>
                                </div>
                            </div>
                        </div>
                        <div class="status clearfix">
                            Trạng thái: <span class="inventory">
                            <i class="fa fa-check"></i> Còn hàng
                            </span>
                        </div>
                        <div class="price-box clearfix">
                            <div class="special-price"><span class="price product-price"><?=number_format($product->price)?>₫</span> </div>
                            <!-- Giá -->
                        </div>
                        <div class="product-summary product_description margin-bottom-15">
                            <div class="rte description">
                                <?=$product->description?>
                            </div>
                        </div>
                        <div class="form-product ">
                            <form enctype="multipart/form-data" id="add-to-cart-form" action="/cart/add" method="post" class="form-inline margin-bottom-10 dqdt-form">
                                <div class="box-variant clearfix ">
                                <input type="hidden" name="variantId" value="33664295">
                                </div>
                                <div class="form-group form-groupx form-detail-action clearfix ">
                                <!-- <label class="f-left">Số lượng: </label> -->
                                <!-- <div class="custom custom-btn-number">
                                    <span class="qtyminus" data-field="quantity">-</span>
                                    <input type="text" class="input-text qty" data-field="quantity" title="Só lượng" value="1" maxlength="12" id="qty" name="quantity" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onchange="if(this.value == 0)this.value=1;">
                                    <span class="qtyplus" data-field="quantity">+</span>
                                </div> -->
                                <!-- <button type="submit" class="btn btn-lg btn-primary btn-cart btn-cart2 add_to_cart btn_buy add_to_cart" title="Mua hàng"> -->
                                <!-- <span>Mua hàng   <i class="fa .fa-caret-right"></i></span> -->
                                <!-- </button> -->
                                </div>
                            </form>
                            <div class="social-sharing">
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a099baca270babc"></script>
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox_jje8"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-xs-12 col-lg-12 margin-top-15 margin-bottom-10">
                        <!-- Nav tabs -->
                        <div class="product-tab e-tabs">
                            <ul class="tabs tabs-title clearfix">
                                <li class="tab-link current" data-tab="tab-1">
                                <h3><span>Nội dung</span></h3>
                                </li>
                                <!-- <li class="tab-link" data-tab="tab-3">
                                <h3><span>Đánh giá</span></h3>
                                </li> -->
                            </ul>
                            <div class="tab-1 tab-content current">
                                <div class="rte">
                                    <?=$product->content?>
                                </div>
                            </div>
                            <div class="tab-3 tab-content">
                                <div id="sapo-product-reviews" class="sapo-product-reviews" data-id="18335234">
                                <div>
                                    <div id="sapo-product-reviews-sub">
                                        <div>
                                            <div class="sapo-product-reviews-summary">
                                            <div class="summary-filter">
                                                <div class="sapo-product-reviews-action">
                                                    <div itemscope="" itemtype="http://schema.org/Product">
                                                        <span style="display:none" itemprop="name"><?=$product->slug?></span>
                                                        <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" class="bpr-summary">
                                                        <span style="display:none" itemprop="itemReviewed"><?=$product->slug?></span>
                                                        <meta content="5" itemprop="bestRating">
                                                        <meta content="1" itemprop="worstRating">
                                                        <div class="bpr-summary-average">
                                                            <span itemprop="ratingValue">4.5</span>
                                                            <span class="max-score">/5</span>
                                                        </div>
                                                        <div data-number="5" data-score="4.5" class="sapo-product-reviews-star" id="sapo-prv-summary-star" title="gorgeous">
                                                            <i data-alt="1" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="2" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="3" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="4" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="5" class="star-half-png" title="gorgeous"></i><input name="score" type="hidden" value="4.5" readonly="">
                                                        </div>
                                                        <p>(<span itemprop="ratingCount">2</span> <span> đánh giá</span>)</p>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn-new-review" onclick="BPR.newReview(this); return false;">Gửi đánh giá của bạn</button>
                                                </div>
                                                <div class="sapo-product-reviews-filter">
                                                    <p onclick="BPR.showFilterMobile(this);"><i class="fa fa-filter" aria-hidden="true"></i><span>Bộ lọc</span></p>
                                                    <div class="list-filter">
                                                        <label>
                                                        <input type="radio" id="FilterAll" name="filter" value="all" onchange="BPR.filterReview(this); return false;" checked="" style="display: none;">
                                                        <span class="checkmark"><span>Tất cả</span></span>
                                                        </label>
                                                        <label>
                                                        <input type="radio" id="FiveScore" name="filter" data-filter="score" value="5" onchange="BPR.filterReview(this); return false;" style="display: none;">
                                                        <span class="checkmark"><span>5 Điểm</span> (<span class="count">1</span>)</span>
                                                        </label>
                                                        <label>
                                                        <input type="radio" id="FourScore" name="filter" data-filter="score" value="4" onchange="BPR.filterReview(this); return false;" style="display: none;">
                                                        <span class="checkmark"><span>4 Điểm</span> (<span class="count">1</span>)</span>
                                                        </label>
                                                        <label>
                                                        <input type="radio" id="ThreeScore" name="filter" data-filter="score" value="3" onchange="BPR.filterReview(this); return false;" style="display: none;">
                                                        <span class="checkmark"><span>3 Điểm</span> (<span class="count" data-content="three_rating">0</span>)</span>
                                                        </label>
                                                        <label>
                                                        <input type="radio" id="TwoScore" name="filter" data-filter="score" value="2" onchange="BPR.filterReview(this); return false;" style="display: none;">
                                                        <span class="checkmark"><span>2 Điểm</span> (<span class="count" data-content="two_rating">0</span>)</span>
                                                        </label>
                                                        <label>
                                                        <input type="radio" id="OneScore" name="filter" data-filter="score" value="1" onchange="BPR.filterReview(this); return false;" style="display: none;">
                                                        <span class="checkmark"><span>1 Điểm</span> (<span class="count" data-content="one_rating">0</span>)</span>
                                                        </label>
                                                        <label>
                                                        <input type="radio" id="IsImage" name="filter" value="isimage" onchange="BPR.filterReview(this); return false;" style="display: none;">
                                                        <span class="checkmark"><span>Có hình ảnh</span> (<span class="count" data-content="is_image">0</span>)</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-new-review btn-new-review-mobile" onclick="BPR.newReview(this); return false;">Gửi đánh giá của bạn</button>
                                            </div>
                                            <div id="bpr-form_18335234" class="bpr-form" style="display:none;">
                                                <div class="sapo-product-reviews-form">
                                                    <div>
                                                        <form method="post" action="https://newproductreviews.sapoapps.vn/reviews/create" id="sapo-product-reviews-frm" name="sapo-product-reviews-frm">
                                                        <input type="hidden" name="productId" id="review_product_id" value="18335234">
                                                        <div class="title-form">Đánh giá sản phẩm</div>
                                                        <div class="review-product-name"><?=$product->slug?></div>
                                                        <div class="bpr-form-rating">
                                                            <div class="form-group">
                                                                <label>Đánh giá của bạn về sản phẩm:</label>
                                                                <div id="dvRating" class="sapo-product-reviews-star"></div>
                                                            </div>
                                                            <input type="hidden" name="rating" id="review_rate" value="5">
                                                            <span class="bpr-form-message-error"></span>
                                                        </div>
                                                        <div class="bpr-form-contact no-attachment">
                                                            <div class="form-group form-group__multiple">
                                                                <div class="bpr-form-contact-name require">
                                                                    <input type="text" maxlength="100" id="review_author" name="author" value="" placeholder="Nhập họ tên của bạn">
                                                                    <span class="bpr-form-message-error"></span>
                                                                </div>
                                                                <div class="bpr-form-contact-email require" style="width: 100%;">
                                                                    <input type="text" maxlength="50" id="review_email" name="email" value="" placeholder="Nhập email của bạn">
                                                                    <span class="bpr-form-message-error"></span>
                                                                </div>
                                                                <div class="bpr-form-contact-phone hide">
                                                                    <input type="tel" maxlength="15" id="review_phone" name="phone" value="" placeholder="Nhập số điện thoại của bạn">
                                                                    <span class="bpr-form-message-error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group__textarea">
                                                                <div class="form-group">
                                                                    <div class="bpr-form-review-body">
                                                                    <textarea maxlength="1000" id="review_body" name="body" rows="5" placeholder="Nhập nội dung đánh giá của bạn về sản phẩm này"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div id="fileAttach" class="bpr-file-attach hide">
                                                                    <label class="next-label" for="inputFileAttach">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                                                                        <path d="M 4 5 C 2.895 5 2 5.895 2 7 L 2 23 C 2 24.105 2.895 25 4 25 L 14.230469 25 C 14.083469 24.356 14 23.688 14 23 C 14 22.662 14.021594 22.329 14.058594 22 L 5 22 L 5 15 L 7.2890625 12.710938 C 8.2340625 11.765937 9.7659375 11.765937 10.710938 12.710938 L 15.720703 17.720703 C 17.356703 15.469703 20.004 14 23 14 C 24.851 14 26.57 14.559578 28 15.517578 L 28 7 C 28 5.895 27.105 5 26 5 L 4 5 z M 23 8 C 24.105 8 25 8.895 25 10 C 25 11.105 24.105 12 23 12 C 21.895 12 21 11.105 21 10 C 21 8.895 21.895 8 23 8 z M 23 16 C 19.134 16 16 19.134 16 23 C 16 26.866 19.134 30 23 30 C 26.866 30 30 26.866 30 23 C 30 19.134 26.866 16 23 16 z M 23 19 C 23.552 19 24 19.447 24 20 L 24 22 L 26 22 C 26.552 22 27 22.447 27 23 C 27 23.553 26.552 24 26 24 L 24 24 L 24 26 C 24 26.553 23.552 27 23 27 C 22.448 27 22 26.553 22 26 L 22 24 L 20 24 C 19.448 24 19 23.553 19 23 C 19 22.447 19.448 22 20 22 L 22 22 L 22 20 C 22 19.447 22.448 19 23 19 z"></path>
                                                                    </svg>
                                                                    <span>Đính kèm hình ảnh (chọn tối đa 3 hình)</span>
                                                                    </label>
                                                                    <input style="color:#fff;opacity:0;cursor:pointer;" type="file" id="inputFileAttach" name="file" class="with-preview">
                                                                </div>
                                                                <div class="bpr-form-actions">
                                                                    <button type="button" onclick="BPR.submitForm(); return false;" class="bpr-button-submit"><i class="fa fa-spinner fa-pulse" aria-hidden="true"></i><span>Gửi đánh giá</span></button>
                                                                </div>
                                                            </div>
                                                            <span class="bpr-form-message-error bpr-form-message-error-body"></span>
                                                            <span class="bpr-form-message-error bpr-form-message-error-file"></span>
                                                        </div>
                                                        <div class="bpr-form-review-error">
                                                            <p class="error"></p>
                                                        </div>
                                                        <div class="bpr-form-actions">
                                                            <button type="button" onclick="BPR.submitForm(); return false;" class="bpr-button-submit"><i class="fa fa-spinner fa-pulse" aria-hidden="true"></i><span>Gửi đánh giá</span></button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div id="bpr-list" class="sapo-product-reviews-list">
                                            <div id="sapo-review-142830" class="sapo-review" itemtype="http://schema.org/Review">
                                                <div class="sapo-review-header">
                                                    <span class="sapo-review-author" itemprop="author">Sỹ Thành</span>
                                                    <div class="sapo-product-reviews-star" data-score="4" data-number="5" title="good"><i data-alt="1" class="star-on-png" title="good"></i>&nbsp;<i data-alt="2" class="star-on-png" title="good"></i>&nbsp;<i data-alt="3" class="star-on-png" title="good"></i>&nbsp;<i data-alt="4" class="star-on-png" title="good"></i>&nbsp;<i data-alt="5" class="star-off-png" title="good"></i><input name="score" type="hidden" value="4" readonly=""></div>
                                                </div>
                                                <div class="sapo-review-body"><span class="sapo-review-content-body" itemprop="description">Nướng lên là tuyệt đỉnh cú mèo luôn</span></div>
                                                <div class="sapo-review-actions" style="color: #7fbb00">
                                                    <ul>
                                                        <li class="sapo-review-reply"><a onclick="BPR.showReply(this, 142830);return false" title="Gửi trả lời" href="javascript: void(0);">Gửi trả lời</a></li>
                                                        <li class="sapo-review-useful">
                                                        <a onclick="BPR.likeComment(142830, 'comment');return false" title="Hữu ích" href="javascript: void(0);">
                                                            <svg class="icon-useful" version="1.1" viewBox="0 0 30 30" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <path d="M4,25h2l0,0c1.281,1.281,3.017,2,4.828,2H21l2-2v-4l0.5-10H14c0,0,1-3.266,1-4c0-2.251,0-5-3-5c-1,0-1,0-1,0l-0.501,3.491  L8.132,9.894C7.435,11.191,6.082,12,4.609,12H4V25z"></path>
                                                                <circle cx="23.5" cy="13.5" r="2.5"></circle>
                                                                <circle cx="22.5" cy="21.5" r="2.5"></circle>
                                                                <circle cx="23.5" cy="17.5" r="2.5"></circle>
                                                                <circle cx="21" cy="25" r="2"></circle>
                                                                <circle cx="21" cy="25" r="2"></circle>
                                                            </svg>
                                                            Hữu ích
                                                        </a>
                                                        </li>
                                                        <li class="sapo-review-reportreview">
                                                        <a onclick="BPR.reportReview(142830);return false" title="Báo cáo sai phạm" href="javascript: void(0);">
                                                            <svg class="icon-warning" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                                                                <path d="M40,40H8c-0.717,0-1.377-0.383-1.734-1.004c-0.356-0.621-0.354-1.385,0.007-2.004l16-28C22.631,8.378,23.289,8,24,8s1.369,0.378,1.728,0.992l16,28c0.361,0.619,0.363,1.383,0.007,2.004S40.716,40,40,40z"></path>
                                                                <path d="M22,34.142c0-0.269,0.047-0.515,0.143-0.746c0.094-0.228,0.229-0.426,0.403-0.592c0.171-0.168,0.382-0.299,0.624-0.393c0.244-0.092,0.518-0.141,0.824-0.141c0.306,0,0.582,0.049,0.828,0.141c0.25,0.094,0.461,0.225,0.632,0.393c0.175,0.166,0.31,0.364,0.403,0.592C25.953,33.627,26,33.873,26,34.142c0,0.27-0.047,0.516-0.143,0.74c-0.094,0.225-0.229,0.419-0.403,0.588c-0.171,0.166-0.382,0.296-0.632,0.392C24.576,35.954,24.3,36,23.994,36c-0.307,0-0.58-0.046-0.824-0.139c-0.242-0.096-0.453-0.226-0.624-0.392c-0.175-0.169-0.31-0.363-0.403-0.588C22.047,34.657,22,34.411,22,34.142 M25.48,30h-2.973l-0.421-12H25.9L25.48,30z"></path>
                                                            </svg>
                                                            Báo cáo sai phạm
                                                        </a>
                                                        </li>
                                                        <li><span class="sapo-review-time" itemprop="datePublished">15:22 12/10/2021</span></li>
                                                    </ul>
                                                </div>
                                                <div class="sapo-review-reply-form" style="display: none;"></div>
                                                <div style="display:none;" itemtype="http://schema.org/Rating" itemscope="" itemprop="reviewRating"><span itemprop="ratingValue">4</span></div>
                                            </div>
                                            <div id="sapo-review-142679" class="sapo-review" itemtype="http://schema.org/Review">
                                                <div class="sapo-review-header">
                                                    <span class="sapo-review-author" itemprop="author">Sỹ Thành</span>
                                                    <div class="sapo-product-reviews-star" data-score="5" data-number="5" title="gorgeous"><i data-alt="1" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="2" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="3" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="4" class="star-on-png" title="gorgeous"></i>&nbsp;<i data-alt="5" class="star-on-png" title="gorgeous"></i><input name="score" type="hidden" value="5" readonly=""></div>
                                                </div>
                                                <div class="sapo-review-body"><span class="sapo-review-content-body" itemprop="description">Ngon lắm á...Nấu được nhiều món lắm luôn</span></div>
                                                <div class="sapo-review-actions" style="color: #7fbb00">
                                                    <ul>
                                                        <li class="sapo-review-reply"><a onclick="BPR.showReply(this, 142679);return false" title="Gửi trả lời" href="javascript: void(0);">Gửi trả lời</a></li>
                                                        <li class="sapo-review-useful">
                                                        <a onclick="BPR.likeComment(142679, 'comment');return false" title="Hữu ích" href="javascript: void(0);">
                                                            <svg class="icon-useful" version="1.1" viewBox="0 0 30 30" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <path d="M4,25h2l0,0c1.281,1.281,3.017,2,4.828,2H21l2-2v-4l0.5-10H14c0,0,1-3.266,1-4c0-2.251,0-5-3-5c-1,0-1,0-1,0l-0.501,3.491  L8.132,9.894C7.435,11.191,6.082,12,4.609,12H4V25z"></path>
                                                                <circle cx="23.5" cy="13.5" r="2.5"></circle>
                                                                <circle cx="22.5" cy="21.5" r="2.5"></circle>
                                                                <circle cx="23.5" cy="17.5" r="2.5"></circle>
                                                                <circle cx="21" cy="25" r="2"></circle>
                                                                <circle cx="21" cy="25" r="2"></circle>
                                                            </svg>
                                                            Hữu ích
                                                        </a>
                                                        </li>
                                                        <li class="sapo-review-reportreview">
                                                        <a onclick="BPR.reportReview(142679);return false" title="Báo cáo sai phạm" href="javascript: void(0);">
                                                            <svg class="icon-warning" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                                                                <path d="M40,40H8c-0.717,0-1.377-0.383-1.734-1.004c-0.356-0.621-0.354-1.385,0.007-2.004l16-28C22.631,8.378,23.289,8,24,8s1.369,0.378,1.728,0.992l16,28c0.361,0.619,0.363,1.383,0.007,2.004S40.716,40,40,40z"></path>
                                                                <path d="M22,34.142c0-0.269,0.047-0.515,0.143-0.746c0.094-0.228,0.229-0.426,0.403-0.592c0.171-0.168,0.382-0.299,0.624-0.393c0.244-0.092,0.518-0.141,0.824-0.141c0.306,0,0.582,0.049,0.828,0.141c0.25,0.094,0.461,0.225,0.632,0.393c0.175,0.166,0.31,0.364,0.403,0.592C25.953,33.627,26,33.873,26,34.142c0,0.27-0.047,0.516-0.143,0.74c-0.094,0.225-0.229,0.419-0.403,0.588c-0.171,0.166-0.382,0.296-0.632,0.392C24.576,35.954,24.3,36,23.994,36c-0.307,0-0.58-0.046-0.824-0.139c-0.242-0.096-0.453-0.226-0.624-0.392c-0.175-0.169-0.31-0.363-0.403-0.588C22.047,34.657,22,34.411,22,34.142 M25.48,30h-2.973l-0.421-12H25.9L25.48,30z"></path>
                                                            </svg>
                                                            Báo cáo sai phạm
                                                        </a>
                                                        </li>
                                                        <li><span class="sapo-review-time" itemprop="datePublished">22:37 11/10/2021</span></li>
                                                    </ul>
                                                </div>
                                                <div class="sapo-review-reply-form" style="display: none;"></div>
                                                <div style="display:none;" itemtype="http://schema.org/Rating" itemscope="" itemprop="reviewRating"><span itemprop="ratingValue">5</span></div>
                                            </div>
                                            </div>
                                            <div id="bpr-more-reviews" style="display: none;"></div>
                                        </div>
                                    </div>
                                    <div id="bpr-review-thanks" class="bpr-success-popup jquerymodal">
                                        <div class="jquerymodal-content">
                                            <div class="jquerymodal-body">
                                            <a href="javascript:;" rel="jquerymodal:close" class="close-modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                                                    <path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"></path>
                                                </svg>
                                            </a>
                                            <div class="icon-checked">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <g>
                                                        <path d="M12,0A12,12,0,1,1,0,12,12,12,0,0,1,12,0Zm0,1A11,11,0,1,1,1,12,11,11,0,0,1,12,1Zm7,7.46L10,18,5,12.16l.76-.65,4.27,5,8.24-8.75Z" fill-rule="evenodd"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <b>Cảm ơn bạn đã đánh giá sản phẩm!</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="bpr-reply-thanks" class="bpr-success-popup jquerymodal">
                                        <div class="jquerymodal-content">
                                            <div class="jquerymodal-body">
                                            <a href="javascript:;" rel="jquerymodal:close" class="close-modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                                                    <path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"></path>
                                                </svg>
                                            </a>
                                            <div class="icon-checked">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <g>
                                                        <path d="M12,0A12,12,0,1,1,0,12,12,12,0,0,1,12,0Zm0,1A11,11,0,1,1,1,12,11,11,0,0,1,12,1Zm7,7.46L10,18,5,12.16l.76-.65,4.27,5,8.24-8.75Z" fill-rule="evenodd"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <b>Cảm ơn bạn đã trả lời đánh giá!</b>
                                            </div>
                                        </div>
                                    </div>
                                    <style>.sapo-product-reviews-summary,#sapo-product-reviews-noitem{background-color:rgba(127,187,0,0.1)}.bpr-summary-average{color:#7fbb00}.sapo-product-reviews-star{color:#ffbe00}.btn-new-review{background-color:#7fbb00;border-color:#7fbb00}#sapo-product-reviews .sapo-product-reviews-summary .sapo-product-reviews-filter input:checked ~ .checkmark{color:#7fbb00;border-color:#7fbb00}#sapo-product-reviews-frm #fileAttach svg path{fill:#7fbb00}#sapo-product-reviews-frm .bpr-button-submit{background-color:#7fbb00;border-color:#7fbb00}.sapo-review-verified, .sapo-review-actions{color:#7fbb00}.icon-verified path{fill:#7fbb00}#sapo-product-reviews .sapo-product-reviews-list .sapo-review-reply-list .sapo-review-reply-item .sapo-review-reply-author .is-admin{background-color:#7fbb00; border-color: #7fbb00}.simple-pagination li span.current, .simple-pagination li a.current{color:#7fbb00; border-color:#7fbb00;}#sapo-product-reviews .sapo-product-reviews-summary .sapo-product-reviews-filter h4, #sapo-product-reviews .sapo-product-reviews-summary .sapo-product-reviews-filter p{background-color:#7fbb00;border-color:#7fbb00;}#sapo-product-reviews .sapo-product-reviews-summary .sapo-product-reviews-filter h4.active, #sapo-product-reviews .sapo-product-reviews-summary .sapo-product-reviews-filter p.active{color:#7fbb00}#sapo-product-reviews .sapo-product-reviews-list .sapo-review-reply-list .btn-show-prev{background-color:rgba(127,187,0,0.1); color: #7fbb00}.bpr-success-popup .icon-checked svg path{fill: #7fbb00}.sapo-review-reply-form .bpr-form-actions .bpr-reply-button-submit{border-color: #7fbb00; background: #7fbb00;}</style>
                                    <style></style>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <aside class="dqdt-sidebar sidebar right left-content col-lg-3">
                <aside class="aside-item sidebar-category collection-category">
                    <div class="aside-title">
                    <h2 class="title-head margin-top-0"><span>Danh mục</span></h2>
                    </div>
                    <?php $this->load->view('includes/category')?>
                </aside>
            </aside>
            <div id="open-filters" class="open-filters hidden-lg">
                <i class="fa fa-align-right"></i>
                <span>Lọc</span>
            </div>
        </div>
        </div>
        
        <section class="section featured-product wow fadeInUp mb-4">
   <div class="container">
      <div class="section-title a-center">
         <h2><a href="/nam">Sản phẩm liên quan</a></h2>
         <p>Có phải bạn đang tìm những sản phẩm dưới đây</p>
      </div>
      <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs" data-lgg-items="4" data-lg-items='4' data-md-items='4' data-sm-items='3' data-xs-items="2" data-xss-items="2" data-nav="true">
         <?php foreach($products as $product) { ?>
         <div class="item item-carousel">
            <div class="product-box">
               <div class="product-thumbnail flexbox-grid">
                  <a href="/<?=$product['slug']?>" title="<?=$product['name']?>">
                  <img src="/<?=$product['image_url']?>"  data-lazyload="/<?=$product['image_url']?>" alt="<?=$product['name']?>">
                  </a>	
                  <div class="product-action hidden-md hidden-sm hidden-xs clearfix">
                     <form action="/cart/add" method="post" class="variants form-nut-grid margin-bottom-0" data-id="product-actions-18341496" enctype="multipart/form-data">
                        <div>
                           <input type="hidden" name="variantId" value="33711303" />
                           <button class="btn-buy btn-cart btn btn-primary   left-to add_to_cart" data-toggle="tooltip" title="Mua hàng">
                           <i class="fa fa-shopping-bag"></i>						
                           </button>
                           <a href="/<?=$product['slug']?>" data-handle="<?=$product['slug']?>" data-toggle="tooltip" title="Xem nhanh" class="btn-gray btn_view btn right-to quick-view">
                           <i class="fa fa-eye"></i></a>
                        </div>
                     </form>
                  </div>
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
         </div>
        <?php } ?>
      </div>
      <!-- /.home-owl-carousel -->
   </div>
</section>

      <?php $this->load->view('includes/footer')?>
      <?php $this->load->view('includes/modal')?>
      <!-- Modal Đăng nhập -->
      <div class='jas-sale-pop flex pf middle-xs'></div>
      <?php $this->load->view('includes/script')?>
   </body>
</html>