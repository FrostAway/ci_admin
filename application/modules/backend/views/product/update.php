

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
                <select name="product[attr_group]">
                    <?php foreach ($parents as $parent){ ?>
                    <?php 
                    $select = '';
                    if($parent['id'] == $product->attr_group) $select = 'selected';
                    ?>
                    <option <?php echo $select; ?> value="<?php echo $parent['id'] ?>"><?php echo $parent['name'] ?></option>
                    <?php } ?>
                </select>
                
                <label>Hình ảnh: <input id="btn-upload" url="<?php echo base_url() ?>backend/product/upload_image" type="file" name="image"/> </label>
                <div class="wrapper">
                    <div class="row">
                    <ul class="inline-list list-image">
                        <?php if($pr_image != null){
                        foreach ($pr_image as $image){ ?>
                        <li class="item-image">
                            <a class="th" href="">
                                <img src="<?php echo $image['value'] ?>"/>
                            </a>
                            <a href="<?php echo base_url() ?>backend/product/delete_image" relaid="<?php echo $image['id'] ?>" pid="<?php echo $product->id ?>" class="del-image fi-x large"></a>
                            <div class="product-image">
                                <input type="hidden" name="product-image[]" value="<?php echo $image['value'] ?>" />
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
            
                <h5>Thêm thuộc tính phụ</h5>
                <label>Thêm thuộc tính:
                    <select name="form_type" id="select-form-type" url="<?php echo base_url() ?>backend/product/addform">
                        <option value="select">Chọn nhóm thuộc tính</option>
                        <?php foreach ($attr_groups as $attrg){ ?>
                        <?php
                        $select = '';
                        if($product->attr_group == $attrg['id']){
                            $select = 'selected';
                        }
                        ?>
                        <option <?php echo $select; ?> value="<?php echo $attrg['id'] ?>"><?php echo $attrg['name'] ?></option>
                        <?php } ?>
                    </select></label>

                <div id="form-type-append">
                    <?php if(isset($product_attrs)) foreach ($product_attrs as $attr){ ?>
                    <label><?php echo $attr['name'] ?></label>
                    <input type="<?php echo 'text' ?>" name="product-attrs[<?php echo $attr['id'] ?>]" value="<?php echo $attr['value'] ?>" />
                    <?php } ?>
                </div>
                
           
            <pre>
            
            </pre>
        </div>
    </div>
    </form>
</div>
