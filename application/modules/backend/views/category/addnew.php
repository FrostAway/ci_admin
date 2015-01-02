

<div class="row">
    <div class="wrapper">
        <h4>Thêm mới hạng mục</h4>
        <div class="row">
            <div class="small-6 medium-6 large-6 columns">
                <div class="wrapper">
                    <h5>Thêm mới hạng mục</h5>
                    <?php if(validation_errors()){
                        echo validation_errors();
                    } ?>
                    <form class="data-form" action="<?php echo base_url() ?>backend/category/addnew" method="post">
                        
                        <label>Tên: </label>
                        <input type="text" name="cate[name]" value="" placeholder="Hạng mục" />
                        <label>Hạng mục cha: </label>
                        <select name="cate[parent]">
                            <option value="0">Không có</option>
                            <?php foreach ($parents as $parent){  ?>
                            <option  value="<?php echo $parent['id'] ?>"><?php echo $parent['name'] ?></option>
                            <?php } ?>
                        </select>
                        <label>Thứ tự</label>
                        <input type="text" name="cate[sort_order]" value="" placeholder="number" />
                        
                        
                        <label>Hiển thị lên menu <input name="cate[show_in_menu]" type="checkbox"> </label>
                        <label>Mô tả: </label>
                        <textarea name="cate[description]" value="" placeholder="Mô tả hạng mục"></textarea>
                        <label>Tag Title</label>
                        <input name="cate[tag_title]" value="" type="text" placeholder="tag title" />
                        <label>Tag Description</label>
                        <textarea name="cate[tag_desc]" placeholder="Tag Description"></textarea>
                        <label>Tag Keywords</label>
                        <textarea name="cate[tag_keywords]" placeholder="Tag Keywords"></textarea>
                        
                        <input type="submit" name="btn-addnew" class="button small radius" value="Thêm mới" />
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


