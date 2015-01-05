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
        <title><?php  ?></title>
        <link rel="stylesheet" href="<?php echo base_url() ?>asset/foundation/css/foundation.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>asset/foundation/css/foundation-icons.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/main.css" />
        
        <script src="<?php echo base_url() ?>asset/foundation/js/vendor/jquery.js"></script>
        <script src="<?php echo base_url() ?>asset/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>asset/foundation/js/vendor/modernizr.js"></script>
        <script src="<?php echo base_url() ?>asset/plugin/ckeditor/ckeditor.js"></script>
        
        

    </head>
    <body>
        <script>
            $(document).ready(function(){
               $("input[type=date]").datepicker(); 
            });
        </script>
        <p>Date: <input type="date"></p>
        <p>Date: <input type="date"></p>
        
        
        
        <script src="<?php echo base_url() ?>asset/foundation/js/foundation.min.js"></script>
        <script src="<?php echo base_url() ?>asset/js/custom.js"></script>
        <script src="<?php echo base_url() ?>asset/js/formajax.js"></script>
        
         <script>
            $(document).foundation();
        </script>
    </body>
</html>
