<!DOCTYPE html>
<html lang="vi">
<?php $this->load->view('includes/head')?>
   <body>
      <div class="fffmb hidden">
      </div>
      <!-- Main content -->
      <?php $this->load->view('includes/header')?>
      <div class="container">
         <div class="row">
            <section class="bread_crumb py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="breadcrumb">
                            <li class="home">
                                <a href="/"><span>Trang chủ</span></a>						
                                <span> <i class="fa fa-angle-right"></i> </span>
                            </li>
                            <li><strong>404 Không tìm thấy trang</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            
         </div>
      </div>	
      <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-404 a-left margin-bottom-40">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="image f-right">
                                    <img src="//bizweb.dktcdn.net/100/390/808/themes/770284/assets/404.png?1625564501977" alt="404">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <h1 class="title-section-page">Xin lỗi, chúng tôi không tìm thấy kết quả nào phù hợp. Vui lòng gõ lại từ khóa vào ô tìm kiếm</h1>
                                <p>Bạn nên:</p>
                                <p>1) Kiểm tra lại từ khóa có thể bạn đã gõ sai.</p>
                                <p>2) Hãy dùng từ khóa ngắn hơn và đơn giản hơn.</p>
                                <p>3) Gõ lại từ khóa vào ô tìm kiếm dưới đây:</p>

                                <form action="/search" method="get" class="form-signup">					
                                    <fieldset class="form-group">
                                        <input type="text" name="query" value="" placeholder="Tìm kiếm ..." class="form-control">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    </fieldset>
                                </form>  	
                                <label>Liên hệ tổng đài Chăm sóc khách hàng <a href="tel:<?=$setting->phone_number?>"><?=$setting->phone_number?></a> để được hỗ trợ</label>
                                <p>Chỉ cần cung cấp tên sản phẩm bạn muốn tìm. Chúng tôi sẽ hỗ trợ tìm kiếm sản phẩm cho bạn</p>
                            </div>
                        </div>
                    </div>
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