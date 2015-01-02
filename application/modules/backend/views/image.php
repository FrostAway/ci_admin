<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
            .wrapper{
                width: 80%; margin: auto;
            }
            ul{
                list-style: none;
            }
            ul li{
                float: left;
                border: 1px solid #000000; margin: 5px;
            }

            .item-image a img{
                width: 150px; height: 150px;
            }

        </style>
        <script src="<?php echo base_url() ?>asset/foundation/js/vendor/jquery.js"></script>
        <script>
            $(document).ready(function () {
                $("#btn-upload").change(function () {
                    var form = document.querySelector('#data-form');
                    var formData = new FormData(form);
                    $.ajax({
                        type: 'POST',
                        data: formData,
                        url: $(this).attr("url"),
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (data) {
                            var text =
                                    '<li class="item-image">' +
                                    '<a class="th" href="">' +
                                    '<img src="' + data.src + '"/>' +
                                    '</a>' +
                                    '<a href="#" class="del-image fi-x large">delete</a>' +
                                    '<div class="product-image"><input name="product[image]" type="hidden" value="' + data.src + '"/></div>'+
                                    '</li>';
                            $(".list-image").append(text);

                           
                            var path = data.path;
                            $(".del-image").click(function (e) {
                                e.preventDefault();
                                var parent = $(this).closest(".item-image");
                                var itemurl = parent.find(".product-image");
                                //var url = parent.find("img").attr("src");
                                // alert(url);
                                $.ajax({
                                    type: 'POST',
                                    data: {imglink: path},
                                    url: $(".del-image").attr("href"),
                                    success: function (res) {
                                        if (res === '1') {
                                            parent.fadeOut(300);
                                            itemurl.html("");
                                        } else {
                                            alert('not delete');
                                        }
                                    }
                                });
                            });

                        }
                    });
                });

            });
        </script>
    </head>
    <body>
        <form class="data-form" id="data-form" action="<?php echo base_url() ?>backend/product/" method="post" enctype="multipart/form-data">
            
            <label>Hình ảnh: <input id="btn-upload" url="<?php echo base_url() ?>backend/product/upload_image" type="file" name="image"/> </label>

            <div class="wrapper">
                <div class="row">
                    <ul class="inline-list list-image">
                        <li class="item-image">
                            <a class="th" href="">
                                <img src="<?php echo base_url() ?>asset/images/default-product.jpg"/>
                            </a>
                            <a href="<?php echo base_url() ?>backend/product/delete_image" class="del-image"> delete</a>
                            <div class="product-image">

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </body>
</html>
