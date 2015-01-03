

<div class="row">
    <div class="wrapper">
        <h4>Thêm mới sản phẩm</h4>
    </div>
</div>

<div class=" row wrapper">
    <!--<form class="data-form" id="data-form" action="<?php // echo base_url()  ?>backend/product/addnew" method="post" enctype="multipart/form-data">-->
    <?php echo form_open_multipart(base_url() . 'backend/product/addnew', array('id' => 'data-form', 'class' => 'data-form')) ?>
    <div class="row">
        <div class="small-12 medium-6 large-6 columns">
            <h5>Thêm mới sản phẩm</h5>
            <?php
            if (validation_errors()) {
                echo validation_errors();
            }
            ?>

            <label>Tên sản phẩm: </label>
            <input type="text" name="product[name]" placeholder="Tên sản phẩm"/>
            <label>Model: </label>
            <input type="text" name="product[model]" placeholder="Model"/>
            <label>Giá sản phẩm: </label>
            <input name="product[price]" type="text" placeholder="Giá sản phẩm"/>
            <label>Giá khuyễn mãi: </label>
            <input name="product[discount]" type="text" placeholder="Giá khuyễn mãi"/>
            <label>Số lượng: </label>
            <input name="product[quantity]" type="number">
            <label>Hạng mục</label>
            <select name="product[category_id]">
                <?php foreach ($parents as $parent) { ?>
                    <option value="<?php echo $parent['id'] ?>"><?php echo $parent['name'] ?></option>
                <?php } ?>
            </select>

            <label>Thumbnail: 
            <input type="button" name="" onclick="openKcFinder('product[thumbnail]')" value="Select File" />
            <span id="product-thumbnail">
                <a class="th"><img src="<?= base_url() ?>asset/images/default-product.jpg" width="100" /></a>
            </span>
            </label>
            <input type="hidden" value="" name="product[thumbnail]" id="thumbnail" placeholder="image url" />
            
            <script>
              
                function openKcFinder(output) {
                    var path = document.getElementsByName(output);
                    var pathimage = path[0];
                    window.KCFinder = {
                        callBack: function (url) {
                            window.KCFinder = null;
                            pathimage.value = url;
                            $("#product-thumbnail img").attr("src", url);
                        }
                    };
                    window.open('<?= base_url() ?>asset/plugin/kcfinder/browse.php?type=images&dir=images/public',
                            'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                            'directories=0, resizable=1, scrollbars=0, width=800, height=600'
                            );
                }
                ;
            </script>

            <label>Hình ảnh: 
                <input id="btn-upload" url="<?php echo base_url() ?>" type="button" value="Chọn hình ảnh phụ" name="image"/> </label>

            <div class="wrapper">
                <div class="row">
                    <ul class="inline-list list-image">
                        <li class="item-image" href="<?= base_url() ?>backend/product/delete_image">
                            
                        </li>
                    </ul>
                </div>
            </div>


            <label>Mô tả: </label>
            <textarea id="desc-editor" name="product[description]" placeholder="Mô tả sản phẩm"></textarea>
            <script>
                CKEDITOR.replace("desc-editor");
            </script>
            <input type="submit" name="btn-addnew" class="button small radius" value="Thêm mới" />


        </div>
        <div class="small-12 medium-6 large-6 columns">

            <h5>Thêm thuộc tính phụ</h5>
            <label>Thêm thuộc tính:
                <select name="form_type" id="select-form-type" url="<?php echo base_url() ?>backend/product/addform">
                    <option value="select">Chọn nhóm thuộc tính</option>
<?php foreach ($attr_groups as $attrg) { ?>
                        <option value="<?php echo $attrg['id'] ?>"><?php echo $attrg['name'] ?></option>
<?php } ?>
                </select></label>

            <div id="form-type-append">

            </div>
        </div>
    </div>
</form>
</div>
