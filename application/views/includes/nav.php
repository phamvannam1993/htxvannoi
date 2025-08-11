<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" >
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" style="color:#ffffff;" href="/">Trang chủ</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <?php foreach($categories as $item) { if($item['type'] == 2) { ?>
            <li>
                <a href="/danh-muc/<?=$item['slug']?>"><?=$item['name']?></a>
            </li>
            <?php } } ?>
            </li>
            <li>
                <a href="/register">Đăng ký</a>
            </li>
            <li>
                <a href="/login">Đăng nhập</a>
            </li>
        </ul>
        <style>
            /* OR*/
            .nav.navbar-nav li a {
                font-family: Arial;
                color: #FFFFFF;
                font: 500;
            }
            .nav.navbar-nav li a:hover {
                color: #000000;
                font: 500;
            }
            .navbar {
                background-color: #ff0000;
                border-color: #ff6a00;
            }
            .nav.navbar-nav .dropdown .dropdown-menu li a {
                font-family: Arial;
                color: #000000;
                font: 500;
            }
            .nav.navbar-nav .dropdown .dropdown-menu li a:hover {
                background-color:aquamarine;
            }
        </style>
    </div>
    <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>