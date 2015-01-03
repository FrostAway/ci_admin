
<h2> View All Product </h2>
<ul>
<?php foreach ($products as $product){ ?>
    <li>
        <a href="#" class="th"><img src="<?= $product['thumbnail'] ?>" width="120" /></a>
        <a href="#">Add to cart</a>        
        <a href="#"><h5><?= $product['name'] ?></h5></a>
    </li>
<?php } ?>
</ul>