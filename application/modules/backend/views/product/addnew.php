

<div class="row">
    <div class="wrapper">
        <h4>Thêm mới sản phẩm</h4>
    </div>
</div>

<div class=" row wrapper">
    <form class="data-form" id="data-form" action="<?php echo base_url() ?>backend/product/addnew" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="small-12 medium-6 large-6 columns">
            <h5>Thêm mới sản phẩm</h5>
            <?php if(validation_errors()){
                echo validation_errors();
            } ?>
            
                <label>Tên sản phẩm: </label>
                <input type="text" name="product[name]" placeholder="Tên sản phẩm"/>
                <label>Giá sản phẩm: </label>
                <input name="product[price]" type="text" placeholder="Giá sản phẩm"/>
                <label>Giá khuyễn mãi: </label>
                <input name="product[discount]" type="text" placeholder="Giá khuyễn mãi"/>
                <label>Số lượng: </label>
                <input name="product[quantity]" type="number">
                <label>Hạng mục</label>
                <select name="product[attr_group]">
                    <?php foreach ($parents as $parent){ ?>
                    <option value="<?php echo $parent['id'] ?>"><?php echo $parent['name'] ?></option>
                    <?php } ?>
                </select>
               
                <label>Hình ảnh: <input id="btn-upload" url="<?php echo base_url() ?>backend/product/upload_image" type="file" name="image"/> </label>
                
                <div class="wrapper">
                <div class="row">
                    <ul class="inline-list list-image">
                        <li class="item-image">
                            <a class="th" href="">
                                <img src="<?php echo base_url() ?>asset/images/default-product.jpg"/>
                            </a>
                            <a href="<?php echo base_url() ?>backend/product/delete_image" class="del-image fi-x large"></a>
                            <div class="product-image"></div>
                        </li>
                    </ul>
                </div>
                </div>


                <label>Mô tả: </label>
                <textarea name="product[description]" placeholder="Mô tả sản phẩm"></textarea>
                <input type="submit" name="btn-addnew" class="button small radius" value="Thêm mới" />
            

        </div>
        <div class="small-12 medium-6 large-6 columns">
            
                <h5>Thêm thuộc tính phụ</h5>
                <label>Thêm thuộc tính:
                    <select name="form_type" id="select-form-type" url="<?php echo base_url() ?>backend/product/addform">
                        <option value="select">Chọn nhóm thuộc tính</option>
                        <?php foreach ($attr_groups as $attrg){ ?>
                        <option value="<?php echo $attrg['id'] ?>"><?php echo $attrg['name'] ?></option>
                        <?php } ?>
                    </select></label>

                <div id="form-type-append">

                </div>
        </div>
    </div>
        </form>
</div>
