
<div class="row">
    <div class="wrapper">
        <h4>Cập nhật hạng mục</h4>
        <div class="row">
            <div class="small-6 medium-6 large-6 columns">
                <div class="wrapper">
                    <h5>Cập nhật hạng mục</h5>
                    <?php if(validation_errors()){
                        echo validation_errors();
                    } ?>
                    <form class="data-form" action="<?php echo base_url() ?>backend/category/update/<?php echo $currcate->id ?>" method="post">
                        
                        <input type="hidden" name="cate[id]" value="<?php echo $currcate->id ?>" />
                        
                        <label>Tên: </label>
                        <input type="text" name="cate[name]" value="<?php echo $currcate->name;  ?>" placeholder="Hạng mục" />
                        <label>Hạng mục cha: </label>
                        <select name="cate[parent_id]">
                            <option value="0">Không có</option>
                            <?php foreach ($parents as $parent){ ?>
                            <option value="<?php echo $parent['id'] ?>"><?php echo $parent['name'] ?></option>
                            <?php } ?>
                        </select>
                        <label>Thứ tự</label>
                        <input type="text" name="cate[sort_order]" value="<?php echo $currcate->sort_order;  ?>" placeholder="number" />
                        
                        <?php
                        $check = "";
                        if($currcate->show_in_menu == 1){
                            $check = "checked";
                        }
                        ?>
                        
                        <label>Hiển thị lên menu <input <?php echo $check; ?> name="cate[show_in_menu]" type="checkbox"> </label>
                        <label>Tag Title</label>
                        <input name="cate[tag_title]" value="<?php echo $currcate->tag_title;  ?>" type="text" placeholder="tag title" />
                        <label>Tag Description</label>
                        <textarea name="cate[tag_description]" placeholder="Tag Description"><?php echo $currcate->tag_description ?></textarea>
                        <label>Tag Keywords</label>
                        <textarea name="cate[tag_keywords]" placeholder="Tag Keywords"><?php echo $currcate->tag_keywords ?></textarea>
                        <input type="submit" name="btn-addnew" class="button small radius" value="Cập nhật" />
                    </form>
                </div>
            </div>
            <div class="small-6 medium-6 large-6 columns">
                <div class="wrapper">
                    <h5>Danh sách hạng mục</h5>
                    <ul class="side-nav" id="drag_drop">
                        <?php foreach ($parents as $parent) { ?>
                        <li><input type="checkbox" name="cate" /> <a href="#"><?php echo $parent['name'] ?></a> </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


