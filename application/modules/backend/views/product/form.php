<?php

foreach ($attrs as $attr){ ?>

<label><?php echo $attr['name'] ?></label>
<?php ?>
<input type="text" value="<?= $attr['default'] ?>" name="product-attrs[<?= $attr['id'] ?>]" />


<?php  } ?>