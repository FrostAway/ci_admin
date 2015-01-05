<div class="row">
    <div class="wrapper">
        <div class="row">
            <h4 class="bar-title">Quản lý nhóm thuộc tính</h4>
        </div>
        <?= form_open(base_url().'backend/attr_group/option', array('method'=>'post', 'id'=>'form-view')); ?>
        <div class="row nav-table">
                <div class="small-12 medium-4 large-4 columns " >
                    
                    <div class="row collapse">
                        <div class="small-10 medium-9 large-9 columns">
                            <select name="action" id="action-type">
                                
                                <option value="0">Chọn hành động</option>
                                <option value="1">Xóa</option>
                            </select>
                        </div>
                        <div class="small-2 medium-3 large-3 columns">
                            <input type="submit" name="btn-apply" value="Apply" class="button radius tiny" />
                        </div>
                    </div>
                    
                </div>
            
                <div class="small-12 medium-3 large-2 large-offset-6 columns form-group">
                    <a href="<?php echo base_url() ?>backend/attr_group/addnew" class="button radius tiny"><i class="fi-plus"></i> Thêm mới</a>
                </div>
            </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="all-check"/></th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php foreach ($attrgs as $attrg) { ?>
                <tr>
                    <td><input type="checkbox" name="item-check[<?= $attrg['id'] ?>]" class="item-check"/></td>
                    <td><?php echo $attrg['id'] ?></td>
                    <td><?php echo $attrg['name'] ?></td>
                    <td>
                        <a href="<?php echo base_url().'backend/attr_group/update/'.$attrg['id'] ?>" data-tooltip aria-haspopup="true" class="has-tip" title="Chỉnh sửa"><i class="fi-pencil large"></i> </a> 
                        <a href="<?= base_url().'backend/attr_group/delete_group'  ?>" class="item-delete" itemid="<?= $attrg['id'] ?>" data-tooltip aria-haspopup="true" class="has-tip" title="Xóa"><i class="fi-x large"></i> </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?= form_close() ?>
</div>