<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title><?php wp_title()?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/design.baochi/app/css/app.bundle.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&amp;subset=vietnamese" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body>

    <header>
        <div class="container ">
            <div class="menu-top-fix">
                <form class="navbar-form navbar-left" action="http://benhtimmachvietnam.com" id="searchform" method="get">
                    <div class="input-group">
                        <input id="s" name="s" class="form-control input-sm" placeholder="Tìm kiếm..." type="text">
                        <span class="input-group-btn">
                      <button class="btn btn-default btn-sm" type="submit" id="searchsubmit"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                    </div>
                </form>

                <ul class="nav nav-pills">
                    <li><a href="#" title="#">24h QUA</a></li>
                    <li><a href="#" title="#">BÁO MỚI</a></li>
                    <li><a href="#" title="#">TIN TỨC HÀNG NGÀY</a></li>
                </ul>

                <div class=" contact">
                    <ul class="nav nav-pills ">
                        <li>
                            <a href="#" title="#">Giới thiệu</a>
                        </li>
                        <li>
                            <a href="#" title="#">Quảng cáo</a>
                        </li>
                        <li>
                            <a href="#" title="#">Liên hệ</a>
                        </li>
                    </ul>
                    <div class="btn account">
                        <a href="#" title="#">
                            account
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default navbar-static-top menu">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">Trang chủ</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <?php 
                        wp_nav_menu(array("menu" => client_get_options('menu-main'), 'container' => '', 'container_class' => '', 'menu_class' => 'nav navbar-nav'));
                    ?> 
                    <!-- <ul class="nav navbar-nav">
                        <li><a href="#" title="#">Tin tức ung thư</a></li>
                        <li><a href="#" title="#">Bệnh ung thư</a></li>
                        <li><a href="#" title="#">Chăm sóc người ung thư</a></li>
                        <li><a href="#" title="#">Sự kiện & nhân vật</a></li>
                        <li><a href="#" title="#">Sản phẩm & dịch vụ</a></li>
                        <li><a href="#" title="#">Phòng chống ung thư</a></li>
                        <li><a href="#" title="#">Bệnh lý liên quan</a></li>
                        <li><a href="#" title="#">Giải trí</a></li>
                        <li><a href="#" title="#">video</a></li>
                    </ul> -->
                </div>
            </div>
        </nav>
    </header>