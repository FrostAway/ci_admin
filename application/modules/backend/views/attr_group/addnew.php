
<div class="row">
    <div class="wrapper">
        <h4 class="bar-title">Nhóm thuộc tính</h4>
        <div class="row">
            <div class="small-5 medium-5 large-5 columns">
                <h6>Thêm Nhóm thuộc tính mới</h6>
                
                <?php if(validation_errors()){
                    echo validation_errors();
                } ?>
                <form class="data-form" action="<?php echo base_url() ?>backend/attr_group/addnew" method="post">
                    <label>Tên thuộc tính: </label>
                    <input type="text" name="attrg[name]" id="name" placeholder="Tên thuộc tính" />
                    
                    <label>Hạng mục: </label>
                    <select name="attrg[category_id]">
                        <?php foreach ($cates as $cate){ ?>
                        <option value="<?php echo $cate['id'] ?>"><?php echo $cate['name'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" name="btn-addnew" id="btn-addnew" class="button tiny radius" value="Thêm mới" />
                </form>
            </div>
            
            
        </div>
    </div>
</div>



