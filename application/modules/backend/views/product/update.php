

<div class="row">
    <div class="wrapper">
        <h4>Cập nhật sản phẩm</h4>
    </div>
</div>

<div class=" row wrapper">
    <!--<form class="data-form" id="data-form" action="<?php //echo base_url() ?>backend/product/update/<?php echo $product->id ?>" method="post" enctype="multipart/form-data">-->
    <?php echo form_open_multipart(base_url().'backend/product/update/'.$product->id, array('id'=>'data-form', 'class'=>'data-form')) ?>
    <div class="row">
        <div class="small-12 medium-6 large-6 columns">
            <h5>Cập nhật sản phẩm</h5>
            <?php if(validation_errors()){
                echo validation_errors();
            } ?>
            
                <label>Tên sản phẩm: </label>
                <input type="text" name="product[name]" value="<?php echo $product->name ?>" placeholder="Tên sản phẩm"/>
                <label>Giá sản phẩm: </label>
                <input name="product[price]" value="<?php echo $product->price ?>" type="text" placeholder="Giá sản phẩm"/>
                <label>Giá khuyễn mãi: </label>
                <input name="product[discount]" value="<?php echo $product->discount ?>" type="text" placeholder="Giá khuyễn mãi"/>
                <label>Số lượng: </label>
                <input name="product[quantity]" value="<?php echo $product->quantity ?>" type="number">
                <label>Hạng mục</label>
                <select name="product[category_id]">
                    <?php foreach ($parents as $parent){ ?>
                    <?php 
                    $select = '';
                    if($parent['id'] == $product->attr_group) $select = 'selected';
                    ?>
                    <option <?php echo $select; ?> value="<?php echo $parent['id'] ?>"><?php echo $parent['name'] ?></option>
                    <?php } ?>
                </select>
                
            <label>Thumbnail: 
            <input type="button" name="" onclick="openKcFinder('product[thumbnail]')" value="Select File" /></label>
            <span id="product-thumbnail">
                <a class="th"><img src="<?= $product->thumbnail ?>" width="100" /></a>
            </span>
            <input type="hidden" value="<?= $product->thumbnail ?>" name="product[thumbnail]" id="thumbnail" placeholder="image url" />
            
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
                
                <label>Hình ảnh: <input id="btn-upload" url="<?php echo base_url() ?>backend/product/upload_image" type="file" name="image"/> </label>
                <div class="wrapper">
                    <div class="row">
                    <ul class="inline-list list-image">
                        <div id="del-image-url" url="<?= base_url() ?>backend/product/delete_image"></div>
                        <?php if($product_images != null){
                        foreach ($product_images as $image){ ?>
                        <li class="item-image">
                            <a class="th" href="">
                                <img src="<?php echo $image['path'] ?>"/>
                            </a>
                            <a href="<?php echo base_url() ?>backend/product/delete_image" relaid="<?php echo $image['id'] ?>" pid="<?php echo $product->id ?>" class="del-image fi-x large"></a>
                            <div class="product-image">
                                <input type="hidden" name="product-image[]" value="<?php echo $image['path'] ?>" />
                            </div>
                        </li>
                        <?php } } ?>
                    </ul>
                    </div>
                </div>

                <label>Mô tả: </label>
                <textarea id="desc-editor" name="product[description]" placeholder="Mô tả sản phẩm"><?php echo $product->description ?></textarea>
				<script>
                    CKEDITOR.replace("desc-editor");
                </script>
                <input type="submit" name="btn-addnew" class="button small radius" value="Lưu lại" />
            

        </div>
        <div class="small-12 medium-6 large-6 columns">
            
                <h5>Thuộc tính phụ</h5>
                

                <div id="form-type-append">
                    <?php if(isset($product_attrs)) foreach ($product_attrs as $attr){ ?>
                    <label><?php echo $attr['attr_name'] ?></label>
                    <input type="<?php echo 'text' ?>" name="product-attrs[<?= $attr['attr_id'] ?>]" value="<?php echo $attr['value'] ?>" />
                    <?php } ?>
                </div>
                
           
            <pre>
            
            </pre>
        </div>
    </div>
    <?= form_close(); ?>
</div>
