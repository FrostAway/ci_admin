

<div class="row">
    <div class="large-12 columns">
        <div class="wrapper">
            <h4>Quản lý Sản phẩm</h4>
            <div class="row nav-table">
                <div class="small-12 medium-12 large-4 columns form-group">
                    <?= form_open(base_url().'backend/product/option', array('method'=>'post', 'id'=>'form-view')) ?>
                    <div class="row collapse">
                        <div class="small-10 medium-9 large-9 columns ">
                            <select name="view-type" id="view-type-id" url="<?= base_url() ?>backend/product/option">
                                <option value="0">Sắp xếp theo</option>
                                <option value="1">Tên sản phẩm</option>
                                <option value="2">Giá sản phẩm</option>
                            </select>
                        </div>
                        <div class="small-2 medium-3 large-3 columns">
                            <input type="submit" id="view-type" class="button tiny radius" value="Apply" name="btn-view-type" />
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
                <div class="small-12 medium-12 large-4 large-offset-4 columns form-group">
                    <div class="row collapse">
                        <div class="small-10 medium-9 large-9 columns">
                            <input type="text" placeholder="Search..." />
                        </div>
                        <div class="small-2 medium-3 large-3 columns">
                            <a class="button radius tiny btn-search"><i class="fi-magnifying-glass"></i></a>
                        </div>
                    </div>
                </div>
            </div>
             <?= form_open(base_url().'backend/product/option') ?>
            <div class="row nav-table">
                <div class="small-12 medium-12 large-4 columns">
                   
                    <div class="row collapse">
                        <div class="small-10 medium-9 large-9 columns">
                            <select name="product-action">
                                <option value="0">Chọn hành động</option>
                                <option value="1">Xóa</option>
                            </select>
                        </div>
                        <div class="small-2 medium-3 large-3 columns ">
                            <input type="submit" name="btn-apply" value="OK" class="button radius tiny" />
                        </div>
                    </div>
                    
                </div> 
                
                <div class="small-12 large-6 large-offset-2 columns">
                    <div class="row">
                        <div class="small-12  large-4 columns form-group">
                            <a class="button radius tiny">Nhập file Excel</a>
                        </div>
                        <div class="small-12  large-4 columns form-group">
                            <a class="button radius tiny">Xuất file Excel</a>
                        </div>
                        <div class="small-12  large-4 full columns form-group">
                            <a href="<?php echo base_url() ?>backend/product/addnew" class="button radius tiny"><i class="fi-plus"></i> Thêm mới</a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="all-check" /> </th>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Khuyễn mãi</th>
                        <th>Hạng mục</th>
                        <th>Số lượng</th>
                        <th>Tùy chọn</th>
                    </tr>
                </thead>
                <?php foreach ($products as $product) { ?>
                    <tr>
                        <td><input type="checkbox" name="product-check[<?= $product['id'] ?>]" class="item-check" /> </td>
                        <td><?php echo $product['id'] ?></td>
                        <td><img src="<?php echo $product['thumbnail'] ?>" width="70"</td>
                        <td><?php echo $product['name'] ?></td>
                        <td><?php echo $product['price'] ?></td>
                        <td><?php echo $product['discount'] ?></td>
                        <td><?php echo $product['category_name'] ?></td>
                        <td><?php echo $product['quantity'] ?></td>
                        <td>
                            <a href="<?php echo base_url().'backend/product/update/'.$product['id'] ?>" itemid="<?php echo $product['id'] ?>" class="item-edit-nojs fi-pencil large" data-tooltip aria-haspopup="true" class="has-tip" title="Chỉnh sửa"></a>
                            <a href="<?php echo base_url() ?>backend/product/delete" itemid="<?php echo $product['id'] ?>" class="item-delete fi-x large" data-tooltip aria-haspopup class="has-tip" title="Xóa"></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <?= form_close() ?>
        </div>
    </div>
</div>
