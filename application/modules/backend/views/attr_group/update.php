
<div class="row">
    <div class="wrapper">
        <h4 class="bar-title">Nhóm thuộc tính</h4>
        <div class="row">
            <div class="small-5 medium-5 large-5 columns">
                <h6>Thêm thuộc tính mới</h6>
                
                <?php if(validation_errors()){
                    echo validation_errors();
                } ?>
                <form class="data-form" action="<?php echo base_url() ?>backend/attr_group/update/<?php echo $attrg->id ?>" method="post">
                    
                    <label>Tên thuộc tính: </label>
                    <input type="text" name="attr[name]" id="name" placeholder="Tên thuộc tính" />
                    <label>Kiểu dữ liệu</label>
                    <select name="attr[data_type]" id="type">
                        <option value="text">Text</option>
                        <option value="varchar">Varchar</option>
                        <option value="number">Kiểu Số</option>
                        <option value="date">Thời gian</option>
                    </select>
                    <label>Giá trị mặc định: </label>
                    <input name="attr[default]" id="default" type="text" placeholder="Giá trị mặc định" />

                    <label>Nhóm thuộc tính: </label>
                    <select name="attr[attr_group_id]">
                        <option value="<?php echo $attrg->id ?>"><?php echo $attrg->name ?></option>
                    </select>
                    <input type="submit" name="btn-addnew" id="btn-addnew" class="button tiny radius" value="Thêm mới" />
                </form>
            </div>
            
            <div class="small-6 medium-6 large-6 large-offset-1 columns">
                <h6>Danh sách thuộc tính <?php echo $attrg->name ?></h6>
                
                <a class="button tiny radius" href="<?= base_url().'backend/attr_group/index' ?>">Quay lại</a>
                
                <table id="data-table" class="data-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="all-check" /></th>
                            <th>Tên thuộc tính</th>
                            <th>Kiểu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php foreach ($attrs as $attr) { ?>
                    <tr class="item-row">
                            <td><input type="checkbox" class="item-check" /></td>
                            <td class="attr-name" style=""><?php echo $attr['name'] ?></td>
                            <td class="attr-type"><?php echo $attr['data_type'] ?></td>
                            <td>
                                <a href="<?php echo base_url() ?>backend/attr_group/update_attr" class="item-edit fi-pencil large" itemid="<?php echo $attr['id'] ?>" data-tooltip aria-haspopup="true" class="has-tip" title="Chỉnh sửa"></a> 
                                <a href="<?php echo base_url() ?>backend/attr_group/delete_attr" class="item-delete fi-x large" itemid="<?php echo $attr['id'] ?>" data-tooltip aria-haspopup="true" class="has-tip" title="Xóa"></a> 
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>



