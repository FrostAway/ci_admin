<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="<?php echo base_url() ?>asset/foundation/css/foundation.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>asset/foundation/css/foundation-icons.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/main.css" />

        <script src="<?php echo base_url() ?>asset/foundation/js/vendor/modernizr.js"></script>
        <script src="<?php echo base_url() ?>asset/plugin/ckeditor/ckeditor.js"></script>
        <script src="https://www.google.com/jsapi"></script>


    </head>
    <body>

        <div id="header">
            <div class="row">
                <div class="small-5 medium-4 large-3 columns">
                    <h4>LOGO</h4>
                </div>
                <div class="small-7 medium-8 large-9 columns">
                    <nav id="nav-top" class="right top-nav">
                        <ul class="inline-list">
                            <li><a href="#">Hướng dẫn</a></li>
                            <li><a href="#">Xem Website</a></li>
                            <li><a href="#">Đăng xuất</a> </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- End top menu -->

            <div id="main-menu" class="contain-to-grid">
                <nav class="top-bar" data-topbar>
                    <ul class="title-area">
                        <li class="name hidden-for-medium-up"><h4><a href="#">Main</a></h4></li>
                        <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
                    </ul>
                    <section class="top-bar-section">
                        <ul class="left">
                            <li><a href="#"><i class="fi-home large"></i> Tổng quan</a></li>
                            <li class="has-dropdown not-click"><a href="#"><i class="fi-widget large"></i> Thiết lập</a>
                                <ul class="dropdown">
                                    <li><a href="#">Tài khoản</a></li>
                                    <li><a href="#">Cửa hàng</a></li>
                                    <li><a href="#">Website</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown not-click"><a href="#"><i class="fi-shopping-bag large"></i> Sán phẩm</a>
                                <ul class="dropdown">
                                    <li><a href="<?= base_url().'backend/category/index' ?>">Danh mục</a></li>
                                    <li><a href="<?= base_url().'backend/product/index' ?>">Sản phẩm</a></li>
                                    <li><a href="<?= base_url().'backend/attr_group/index' ?>">Nhóm thuộc tính</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown not-click"><a href="#"><i class="fi-dollar-bill large"></i> Bán hàng</a>
                                <ul class="dropdown">
                                    <li><a href="<?= base_url().'backend/order/index' ?>">Đơn đặt hàng</a></li>
                                    <li><a href="#">Khách hàng</a></li>
                                    <li><a href="#">Điểm bán hàng</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown not-click"><a href="#"><i class="fi-book"></i> Báo cáo</a>
                                <ul class="dropdown">
                                    <li><a href="#"><i class="fi-bitcoin large"></i> Bán hàng</a></li>
                                </ul>
                            </li>
                        </ul>
                    </section>
                </nav>
            </div>
            <!-- End main menu -->
        </div>
        <!-- End header -->


        <div id="main">
            <div id="left-bar">

            </div>
            <section id="content">
                <?php $this->load->view($subview) ?>
            </section>
        </div>
        <script src="<?php echo base_url() ?>asset/foundation/js/vendor/jquery.js"></script>
        <script src="<?php echo base_url() ?>asset/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>asset/foundation/js/foundation.min.js"></script>
        <script src="<?php echo base_url() ?>asset/js/custom.js"></script>
        <script src="<?php echo base_url() ?>asset/js/formajax.js"></script>
        <script>
            $(document).foundation();
        </script>
        <div id="footer">

        </div>
    </body>
</html>



