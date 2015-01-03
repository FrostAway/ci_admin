<!DOCTYPE html>

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
                <h1>Header</h1>
            </div>
            <!-- End top menu -->

            <div id="main-menu" class="contain-to-grid">
                
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




