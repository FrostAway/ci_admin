<?php

foreach ($attrs as $attr){ ?>

<label><?php echo $attr['name'] ?></label>
<?php
    switch ($attr['type_data']) {
        case 'Text': ?>
<input type="text" value="<?php echo $attr['default'] ?>" name="product-attrs[<?php echo $attr['id'] ?>]" />
        <?php     break;
        case 'Number': ?>
<input type="number" value="<?php echo $attr['default'] ?>" name="product-attrs[<?php echo $attr['id'] ?>]" />
        <?php     break;
        case 'Date':  ?>
<input type="date" name="product-attrs[<?php echo $attr['id'] ?>]" />            
        <?php     break;
        default:
            break;
    }
}

?>