<!-- <script type="text/javascript">
    $(document).ready(function ($) {
    if ($(window).width() >= 768 ){
        SalesPop();
    }
    });
    function fisherYates ( myArray ) {
    var i = myArray.length, j, temp;
    if ( i === 0 ) return false;
    while ( --i ) {
        j = Math.floor( Math.random() * ( i + 1 ) );
        temp = myArray[i];
        myArray[i] = myArray[j]; 
        myArray[j] = temp;
    }
    }
    var collection = new Array();
    
    
    collection[0]="<a href='/gia-sach-250gr' class='jas-sale-pop-img mr__20'>"
    +									"<img src='//bizweb.dktcdn.net/thumb/small/100/390/808/products/gia-huu-co-500x500.jpg?v=1604375091947' alt='Giá sạch ủ cát 300gr'/>"
    +								"</a>"
    +								"<div class='jas-sale-pop-content'>"
    //+									"<h4 class='fs__12 fwm mg__0'>Sản phẩm</h4>"
    +									"<h3 class='mg__0 mt__5 mb__5 fs__18'>"
    +										"<a href='/gia-sach-250gr' title='Giá sạch ủ cát 300gr'>Giá sạch ủ cát 300gr</a>"
    +									"</h3>"
    +									"<span class='fs__12 jas-sale-pop-timeago'></span>"
    +								"</div>"
    +								"<span class='pe-7s-close pa fs__20'></span>";
    
    
    
    collection[1]="<a href='/tan-o-300gr' class='jas-sale-pop-img mr__20'>"
    +									"<img src='//bizweb.dktcdn.net/thumb/small/100/390/808/products/tan-o-huu-co-500x500.jpg?v=1592900978237' alt='Tần ô 300gr'/>"
    +								"</a>"
    +								"<div class='jas-sale-pop-content'>"
    //+									"<h4 class='fs__12 fwm mg__0'>Sản phẩm</h4>"
    +									"<h3 class='mg__0 mt__5 mb__5 fs__18'>"
    +										"<a href='/tan-o-300gr' title='Tần ô 300gr'>Tần ô 300gr</a>"
    +									"</h3>"
    +									"<span class='fs__12 jas-sale-pop-timeago'></span>"
    +								"</div>"
    +								"<span class='pe-7s-close pa fs__20'></span>";
    
    
    
    collection[2]="<a href='/rau-mong-toi-300gr' class='jas-sale-pop-img mr__20'>"
    +									"<img src='//bizweb.dktcdn.net/thumb/small/100/390/808/products/1-101-a84348debba24fcd95719a117b6ff32d-master.jpg?v=1592900299463' alt='Rau mồng tơi Organic 300gr'/>"
    +								"</a>"
    +								"<div class='jas-sale-pop-content'>"
    //+									"<h4 class='fs__12 fwm mg__0'>Sản phẩm</h4>"
    +									"<h3 class='mg__0 mt__5 mb__5 fs__18'>"
    +										"<a href='/rau-mong-toi-300gr' title='Rau mồng tơi Organic 300gr'>Rau mồng tơi Organic 300gr</a>"
    +									"</h3>"
    +									"<span class='fs__12 jas-sale-pop-timeago'></span>"
    +								"</div>"
    +								"<span class='pe-7s-close pa fs__20'></span>";
    
    
    
    collection[3]="<a href='/cai-ngong-500gr' class='jas-sale-pop-img mr__20'>"
    +									"<img src='//bizweb.dktcdn.net/thumb/small/100/390/808/products/cai-ngong-171-1487770270.jpg?v=1592815118587' alt='Cải ngồng Organic 300gr'/>"
    +								"</a>"
    +								"<div class='jas-sale-pop-content'>"
    //+									"<h4 class='fs__12 fwm mg__0'>Sản phẩm</h4>"
    +									"<h3 class='mg__0 mt__5 mb__5 fs__18'>"
    +										"<a href='/cai-ngong-500gr' title='Cải ngồng Organic 300gr'>Cải ngồng Organic 300gr</a>"
    +									"</h3>"
    +									"<span class='fs__12 jas-sale-pop-timeago'></span>"
    +								"</div>"
    +								"<span class='pe-7s-close pa fs__20'></span>";
    
    
    
    collection[4]="<a href='/rau-den-300gr' class='jas-sale-pop-img mr__20'>"
    +									"<img src='//bizweb.dktcdn.net/thumb/small/100/390/808/products/rauden-master.jpg?v=1593162117040' alt='Rau dền Organic 300gr'/>"
    +								"</a>"
    +								"<div class='jas-sale-pop-content'>"
    //+									"<h4 class='fs__12 fwm mg__0'>Sản phẩm</h4>"
    +									"<h3 class='mg__0 mt__5 mb__5 fs__18'>"
    +										"<a href='/rau-den-300gr' title='Rau dền Organic 300gr'>Rau dền Organic 300gr</a>"
    +									"</h3>"
    +									"<span class='fs__12 jas-sale-pop-timeago'></span>"
    +								"</div>"
    +								"<span class='pe-7s-close pa fs__20'></span>";
    
    
    
    collection[5]="<a href='/rau-thom-300gr' class='jas-sale-pop-img mr__20'>"
    +									"<img src='//bizweb.dktcdn.net/thumb/small/100/390/808/products/rau-thom-hung-que-tuoi-369-0.jpg?v=1592900735693' alt='Rau thơm Organic 100gr'/>"
    +								"</a>"
    +								"<div class='jas-sale-pop-content'>"
    //+									"<h4 class='fs__12 fwm mg__0'>Sản phẩm</h4>"
    +									"<h3 class='mg__0 mt__5 mb__5 fs__18'>"
    +										"<a href='/rau-thom-300gr' title='Rau thơm Organic 100gr'>Rau thơm Organic 100gr</a>"
    +									"</h3>"
    +									"<span class='fs__12 jas-sale-pop-timeago'></span>"
    +								"</div>"
    +								"<span class='pe-7s-close pa fs__20'></span>";
    
    
    
    collection[6]="<a href='/cai-thao-dun-500gr' class='jas-sale-pop-img mr__20'>"
    +									"<img src='//bizweb.dktcdn.net/thumb/small/100/390/808/products/qrqu2uc.jpg?v=1592899274663' alt='Cải thảo dún Organic 300gr'/>"
    +								"</a>"
    +								"<div class='jas-sale-pop-content'>"
    //+									"<h4 class='fs__12 fwm mg__0'>Sản phẩm</h4>"
    +									"<h3 class='mg__0 mt__5 mb__5 fs__18'>"
    +										"<a href='/cai-thao-dun-500gr' title='Cải thảo dún Organic 300gr'>Cải thảo dún Organic 300gr</a>"
    +									"</h3>"
    +									"<span class='fs__12 jas-sale-pop-timeago'></span>"
    +								"</div>"
    +								"<span class='pe-7s-close pa fs__20'></span>";
    
    
    
    collection[7]="<a href='/cai-xanh-500gr' class='jas-sale-pop-img mr__20'>"
    +									"<img src='//bizweb.dktcdn.net/thumb/small/100/390/808/products/417703-aadd29cc34ac4e77ad0a253a570c41fd-large.jpg?v=1592815671443' alt='Cải xanh Organic 300gr'/>"
    +								"</a>"
    +								"<div class='jas-sale-pop-content'>"
    //+									"<h4 class='fs__12 fwm mg__0'>Sản phẩm</h4>"
    +									"<h3 class='mg__0 mt__5 mb__5 fs__18'>"
    +										"<a href='/cai-xanh-500gr' title='Cải xanh Organic 300gr'>Cải xanh Organic 300gr</a>"
    +									"</h3>"
    +									"<span class='fs__12 jas-sale-pop-timeago'></span>"
    +								"</div>"
    +								"<span class='pe-7s-close pa fs__20'></span>";
    
    
    
    collection[8]="<a href='/cai-ngot-500gr' class='jas-sale-pop-img mr__20'>"
    +									"<img src='//bizweb.dktcdn.net/thumb/small/100/390/808/products/cai-ngot.jpg?v=1592815350200' alt='Cải ngọt 300gr'/>"
    +								"</a>"
    +								"<div class='jas-sale-pop-content'>"
    //+									"<h4 class='fs__12 fwm mg__0'>Sản phẩm</h4>"
    +									"<h3 class='mg__0 mt__5 mb__5 fs__18'>"
    +										"<a href='/cai-ngot-500gr' title='Cải ngọt 300gr'>Cải ngọt 300gr</a>"
    +									"</h3>"
    +									"<span class='fs__12 jas-sale-pop-timeago'></span>"
    +								"</div>"
    +								"<span class='pe-7s-close pa fs__20'></span>";
    
    
    
    collection[9]="<a href='/cai-thia-500gr' class='jas-sale-pop-img mr__20'>"
    +									"<img src='//bizweb.dktcdn.net/thumb/small/100/390/808/products/cai-thia.png?v=1592814808273' alt='Cải thìa Organic 300gr'/>"
    +								"</a>"
    +								"<div class='jas-sale-pop-content'>"
    //+									"<h4 class='fs__12 fwm mg__0'>Sản phẩm</h4>"
    +									"<h3 class='mg__0 mt__5 mb__5 fs__18'>"
    +										"<a href='/cai-thia-500gr' title='Cải thìa Organic 300gr'>Cải thìa Organic 300gr</a>"
    +									"</h3>"
    +									"<span class='fs__12 jas-sale-pop-timeago'></span>"
    +								"</div>"
    +								"<span class='pe-7s-close pa fs__20'></span>";
    
    
    
    collection[10]="<a href='/cai-kale-xoan-500gr' class='jas-sale-pop-img mr__20'>"
    +									"<img src='//bizweb.dktcdn.net/thumb/small/100/390/808/products/kale-144-1483973379.png?v=1593855434387' alt='Cải kale (Xoăn) Organic 300gr'/>"
    +								"</a>"
    +								"<div class='jas-sale-pop-content'>"
    //+									"<h4 class='fs__12 fwm mg__0'>Sản phẩm</h4>"
    +									"<h3 class='mg__0 mt__5 mb__5 fs__18'>"
    +										"<a href='/cai-kale-xoan-500gr' title='Cải kale (Xoăn) Organic 300gr'>Cải kale (Xoăn) Organic 300gr</a>"
    +									"</h3>"
    +									"<span class='fs__12 jas-sale-pop-timeago'></span>"
    +								"</div>"
    +								"<span class='pe-7s-close pa fs__20'></span>";
    
    
    
    collection[11]="<a href='/rau-ngot-organic-500g' class='jas-sale-pop-img mr__20'>"
    +									"<img src='//bizweb.dktcdn.net/thumb/small/100/390/808/products/rau-ngot.jpg?v=1592639575577' alt='Rau ngót Organic 300g'/>"
    +								"</a>"
    +								"<div class='jas-sale-pop-content'>"
    //+									"<h4 class='fs__12 fwm mg__0'>Sản phẩm</h4>"
    +									"<h3 class='mg__0 mt__5 mb__5 fs__18'>"
    +										"<a href='/rau-ngot-organic-500g' title='Rau ngót Organic 300g'>Rau ngót Organic 300g</a>"
    +									"</h3>"
    +									"<span class='fs__12 jas-sale-pop-timeago'></span>"
    +								"</div>"
    +								"<span class='pe-7s-close pa fs__20'></span>";
    
    
    
    collection[12]="<a href='/rau-muong-organic-500gr' class='jas-sale-pop-img mr__20'>"
    +									"<img src='//bizweb.dktcdn.net/thumb/small/100/390/808/products/orfarm-rau-muong-huu-co-1498320827.jpg?v=1591870997113' alt='Rau muống Organic 300gr'/>"
    +								"</a>"
    +								"<div class='jas-sale-pop-content'>"
    //+									"<h4 class='fs__12 fwm mg__0'>Sản phẩm</h4>"
    +									"<h3 class='mg__0 mt__5 mb__5 fs__18'>"
    +										"<a href='/rau-muong-organic-500gr' title='Rau muống Organic 300gr'>Rau muống Organic 300gr</a>"
    +									"</h3>"
    +									"<span class='fs__12 jas-sale-pop-timeago'></span>"
    +								"</div>"
    +								"<span class='pe-7s-close pa fs__20'></span>";
    
    
    
    collection[13]="<a href='/rau-can-tay-organic-500g' class='jas-sale-pop-img mr__20'>"
    +									"<img src='//bizweb.dktcdn.net/thumb/small/100/390/808/products/165707b495b7c2d.jpg?v=1591870722910' alt='Rau cần tây Organic 300gr'/>"
    +								"</a>"
    +								"<div class='jas-sale-pop-content'>"
    //+									"<h4 class='fs__12 fwm mg__0'>Sản phẩm</h4>"
    +									"<h3 class='mg__0 mt__5 mb__5 fs__18'>"
    +										"<a href='/rau-can-tay-organic-500g' title='Rau cần tây Organic 300gr'>Rau cần tây Organic 300gr</a>"
    +									"</h3>"
    +									"<span class='fs__12 jas-sale-pop-timeago'></span>"
    +								"</div>"
    +								"<span class='pe-7s-close pa fs__20'></span>";
    
    
    
    collection[14]="<a href='/ngon-su-su-organic-500g' class='jas-sale-pop-img mr__20'>"
    +									"<img src='//bizweb.dktcdn.net/thumb/small/100/390/808/products/74d18cc13c71e54ebe1982f79e2a061f.jpg?v=1592366346153' alt='Ngọn su su Organic 300g'/>"
    +								"</a>"
    +								"<div class='jas-sale-pop-content'>"
    //+									"<h4 class='fs__12 fwm mg__0'>Sản phẩm</h4>"
    +									"<h3 class='mg__0 mt__5 mb__5 fs__18'>"
    +										"<a href='/ngon-su-su-organic-500g' title='Ngọn su su Organic 300g'>Ngọn su su Organic 300g</a>"
    +									"</h3>"
    +									"<span class='fs__12 jas-sale-pop-timeago'></span>"
    +								"</div>"
    +								"<span class='pe-7s-close pa fs__20'></span>";
    
    
    fisherYates(collection);
    function SalesPop() {
    if ($('.jas-sale-pop').length < 0)
        return;
    setInterval(function() {
        $('.jas-sale-pop').fadeIn(function() {
            $(this).removeClass('slideUp');
        }).delay(10000).fadeIn(function() {
            var randomTime =['1 phút','2 phút','3 phút','4 phút','5 phút','6 phút','7 phút','8 phút','9 phút','10 phút','11 phút','12 phút','13 phút','14 phút','15 phút','16 phút','17 phút','18 phút','19 phút','20 phút','21 phút','22 phút','23 phút','24 phút','25 phút','26 phút','27 phút','28 phút','29 phút','30 phút','31 phút','32 phút','33 phút','34 phút','35 phút','36 phút','37 phút','38 phút','39 phút','40 phút','41 phút','42 phút','43 phút','44 phút','45 phút','46 phút','47 phút','48 phút','49 phút','50 phút','51 phút','52 phút','53 phút','54 phút','55 phút','56 phút','57 phút','58 phút','59 phút',],
            randomTimeAgo = Math.floor(Math.random() * randomTime.length),
            randomProduct = Math.floor(Math.random() * collection.length),
            randomShowP = collection[randomProduct],
            TimeAgo = randomTime[randomTimeAgo];
            $(".jas-sale-pop").html(randomShowP);
            $('.jas-sale-pop-timeago').text('Một khách hàng vừa đặt mua cách đây ' + TimeAgo);
            $(this).addClass('slideUp');
            $('.pe-7s-close').on('click', function() {
                $('.jas-sale-pop').remove();
            });
        }).delay(6000);
    }, 6000);
    }
    
</script> -->
<!-- Bizweb javascript customer -->
<!-- Bizweb javascript -->
<script src="/assets/js/option-selectors.js?1625564501977" type="text/javascript"></script>
<script src="/assets/js/api.jquery.js" type="text/javascript"></script> 
<!-- Plugin JS -->
<script src="/assets/js/appear.js?1625564501977" type="text/javascript"></script>
<script src="/assets/js/owl.carousel.min.js?1625564501977" type="text/javascript"></script>		
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/assets/js/dl_function.js?1625564501977" type="text/javascript"></script>
<script src="/assets/js/dl_api.js?1625564501977" type="text/javascript"></script>
<script src="/assets/js/rx-all-min.js?1625564501977" type="text/javascript"></script>
<!-- Quick view -->
<script src="/assets/js/quickview.js?1625564501977" type="text/javascript"></script>				
<!-- Main JS -->	
<script src="/assets/js/dl_main.js?1625564501977" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="/assets/js/search_filter.js?1625564501977" type="text/javascript"></script>
<link href="/assets/js/jquery-ui.min.css?1625564501977" rel="stylesheet" type="text/css" media="all" />
<script src="/assets/js/jquery-ui.min.js?1625564501977" type="text/javascript"></script>	
<script src="/assets/js/dl_col.js?1625564501977" type="text/javascript"></script>