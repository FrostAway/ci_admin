
<div class="row">
    <div class="wrapper">
        <div class="row">
            <h4 class="bar-title">Quản lý Hạng mục</h4>
        </div>
        
        <div class="row nav-table">
                <div class="small-12 medium-6 large-4 columns">
                    <div class="row collapse">
                        <div class="small-12 medium-9 large-9 columns">
                            <select>
                                <option value="0">Hạng mục</option>
                                <option value="0">Hạng mục</option>
                                <option value="0">Hạng mục</option>
                            </select>
                        </div>
                    </div>
                </div>
            
                <div class="small-12 medium-3 medium-offset-3 large-2 large-offset-6 columns form-group">
                    <a href="<?php echo base_url() ?>backend/category/addnew" class="button radius tiny"><i class="fi-plus"></i> Thêm mới</a>
                </div>
            </div>
        <?php if(count($categories) > 0){ ?>
        <table class="data-table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="all-check"/></th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Thứ tự</th>
                    <th>Hiện thị Menu</th>
                    <th>Parent</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php foreach ($categories as $cate) { ?>
                <tr>
                    <td><input type="checkbox" name="attributes" class="item-check"/></td>
                    <td><?php echo $cate['id'] ?></td>
                    <td><?php echo $cate['name'] ?></td>
                    <td><?php echo $cate['sort_order'] ?></td>
                    <td>
                        <?php if($cate['show_in_menu'] == 0){ ?>
                        <input type="checkbox" name="show-in-menu" />
                        <?php } else{ ?>
                        <input type="checkbox" checked="" name="show-in-menu" />
                        <?php } ?>
                    </td>
                    <td><?php echo $cate['parent_id'] ?></td>
                    <td>
                        <a href="<?php echo base_url().'backend/category/update/'.$cate['id'] ?>" data-tooltip aria-haspopup="true" class="has-tip" title="Chỉnh sửa"><i class="fi-pencil large"></i> </a> 
                        <a href="<?php echo base_url().'backend/category/delete' ?>" class="item-delete" itemid="<?php echo $cate['id'] ?>" href="<?php echo base_url().'backend/category/delete/'.$cate['id'] ?>" data-tooltip aria-haspopup="true" class="has-tip" title="Xóa"><i class="fi-x large"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <?php }else{  ?>
        <h5>Không có dữ liệu</h5>
        <?php } ?>
    </div>
</div>
