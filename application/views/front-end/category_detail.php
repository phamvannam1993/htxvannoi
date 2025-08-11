<!DOCTYPE html>
<html lang="en">
   <?php $this->load->view('includes/head')?>
   <body>
      <!-- Navigation -->
      <?php $this->load->view('includes/nav')?>
      <!-- Page Content -->
      <div class="container">
         <div class="row">
            <?php $this->load->view('includes/content_left')?>
            <div class="col-md-9">
               <?php $this->load->view('includes/slider')?>
               <script src="/scripts/bootstrap3-showmanyslideonecarousel.js"></script>
               <style>
                  .carousel-inner img {width: 100%; max-height: 250px;}
                  /* Carousel Header Styles */
                  .header-text {
                  position: absolute;
                  top: 55%;
                  left: 1.8%;
                  right: auto;
                  width: 96.66666666666666%;
                  color: #e2e2e2;
                  font-size:20px; letter-spacing:1px;
                  }
                  .header-text h2 {font-size: 35px; color:#fff; font-weight:600;}
                  .header-text h2 span {padding: 10px;color:orange;}
                  .header-text h3 span {padding: 15px;}
               </style>
               <div class="container-fluid">
                  <div class="well well-sm">
                     <strong id="tide1" class="text-success fa-lg">Rau ăn lá</strong>
                     <div class="btn-group">
                        <a href="javascript:void(0)" id="list" class="btn btn-default btn-sm btn-tab">
                        <span class="glyphicon glyphicon-th-list">
                        </span>List
                        </a>
                        <a href="avascript:void(0)" id="grid" class="btn btn-default btn-sm btn-tab">
                        <span class="glyphicon glyphicon-th"></span>Grid
                        </a>
                     </div>
                  </div>
                  <div id="products">
                  </div>
               </div>
               <input type="hidden" value="<?=$category->id?>" id="category_id">
               <script src="/assets/js/list_product.js"></script>
               <style>
                  .glyphicon {
                  margin-right: 5px;
                  }
                  .page-number.active {
                     background: #1184f0 !important; 
                     color: #ffff !important; 
                  }
                  .thumbnail {
                  margin-bottom: 20px;
                  padding: 0px;
                  -webkit-border-radius: 0px;
                  -moz-border-radius: 0px;
                  border-radius: 0px;
                  }
                  .item.list-group-item {
                  float: none;
                  width: 100%;
                  background-color: #fff;
                  margin-bottom: 10px;
                  }
                  .item.list-group-item:nth-of-type(odd):hover, .item.list-group-item:hover {
                  background: #428bca;
                  }
                  .item.list-group-item .list-group-image {
                  margin-right: 10px;
                  }
                  .item.list-group-item .thumbnail {
                  margin-bottom: 0px;
                  }
                  .item.list-group-item .caption {
                  padding: 9px 9px 0px 9px;
                  }
                  .item.list-group-item:nth-of-type(odd) {
                  background: #eeeeee;
                  }
                  .item.list-group-item:before, .item.list-group-item:after {
                  display: table;
                  content: " ";
                  }
                  .item.list-group-item img {
                  float: left;
                  }
                  .item.list-group-item:after {
                  clear: both;
                  }
                  .list-group-item-text {
                  margin: 0 0 11px;
                  }
               </style>
            </div>

         </div>
      </div>
      <!-- /.container -->
      <?php $this->load->view('includes/footer')?>
      <!-- /.container -->
   </body>
</html>