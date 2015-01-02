

<div class="row">
    <div class="large-12 columns">
        <div class="wrapper">
            <h4>Quản lý Sản phẩm</h4>
            <div class="row nav-table">
                <div class="small-12 medium-12 large-4 columns form-group">
                    <div class="row collapse">
                        <div class="small-10 medium-9 large-9 columns ">
                            <select>
                                <option value="0">Hạng mục</option>
                                <option value="0">Hạng mục</option>
                                <option value="0">Hạng mục</option>
                            </select>
                        </div>
                    </div>
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
            <div class="row nav-table">
                <div class="small-12 medium-12 large-4 columns">
                    <div class="row collapse">
                        <div class="small-10 medium-9 large-9 columns">
                            <select>
                                <option value="0">Hạng mục</option>
                                <option value="0">Hạng mục</option>
                                <option value="0">Hạng mục</option>
                            </select>
                        </div>
                        <div class="small-2 medium-3 large-3 columns ">
                            <a class="button radius tiny">OK</a>
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
                        <td><input type="checkbox" class="item-check" /> </td>
                        <td><?php echo $product['id'] ?></td>
                        <td><img src="<?php echo $product['image'] ?>" width="70"</td>
                        <td><?php echo $product['name'] ?></td>
                        <td><?php echo $product['price'] ?></td>
                        <td><?php echo $product['discount'] ?></td>
                        <td><?php echo $product['attr_group'] ?></td>
                        <td><?php echo $product['quantity'] ?></td>
                        <td>
                            <a href="<?php echo base_url().'backend/product/update/'.$product['id'] ?>" itemid="<?php echo $product['id'] ?>" class="item-edit-nojs fi-pencil large" data-tooltip aria-haspopup="true" class="has-tip" title="Chỉnh sửa"></a>
                            <a href="<?php echo base_url() ?>backend/product/delete" itemid="<?php echo $product['id'] ?>" class="item-delete fi-x large" data-tooltip aria-haspopup class="has-tip" title="Xóa"></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
