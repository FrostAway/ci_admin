<?php foreach ($attrs as $attr) { ?>

    <label><?php echo $attr['name'] ?></label>
    <?php
    switch ($attr['data_type']) {
        case 'varchar':
            ?>
            <input type="text" value="<?= $attr['default'] ?>" name="product-attrs[<?= $attr['id'] ?>][value]" />
            <?php break;
        case 'text':
            ?>
            <textarea name="product-attrs[<?= $attr['id'] ?>][value]" ><?= $attr['default'] ?></textarea>
            <?php break;
        case 'number':
            ?>
            <input type="number" value="<?= $attr['default'] ?>" name="product-attrs[<?= $attr['id'] ?>][value]" />       
            <?php break;
        case 'date':
            ?>
            <input type="date" class="has-date" value="<?= $attr['default'] ?>" name="product-attrs[<?= $attr['id'] ?>][value]" />            
            <?php
            break;
        default:
            break;
    }
    ?>
<input type="hidden" value="<?= $attr['data_type'] ?>" name="product-attrs[<?= $attr['id'] ?>][type]" />
<?php } ?>