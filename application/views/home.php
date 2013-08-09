<h2>New Arrivals</h2>

<div class="item-list-wrapper">

<?php 

$i = 1;

foreach ($products as $product) { 

?>

<form action="<?php echo site_url('cart') ?>" class="fcart" method="post" <?php if($i%3 == 1){ ?> style="clear:both"<?php } ?>>
    
    <div class="item-list">
        <a href="<?php echo base_url() ?>product/<?php echo($product['url_slug']) ?>" title="เครื่องสำอาง - <?php echo(stripslashes($product['name'])) ?>"><img src="<?php echo base_url() ?>assets/images/product/thumb/product_<?php echo($product['id']) ?>.jpg" width="150" height="224" alt="เครื่องสำอาง - <?php echo(stripslashes($product['name'])) ?>>" class="item-img" /></a>
            <div class="holder">
                <p>
                    <span class="txt"><a href="<?php echo base_url() ?>/product/<?php echo($product['url_slug']) ?>" title="เครื่องสำอาง - <?php echo(stripslashes($product['name'])) ?>"><?php echo(stripslashes($product['name'])) ?></a></span>
                    <span class="bg"></span>
                </p>
            </div>
                                                                  
            <div class="submit-cart cufon">
                    <p class="price"><?php echo(number_format($product['price'])) ?> บาท</p>
                    <input type="hidden" id="item_id" name="item_id" value="<?php echo($product['id']) ?>" />
                    <input type="hidden" name="item_qty" value="1" />
                    <input type="hidden" id="item_name" name="item_name" value="<?php echo(stripslashes($product['name'])) ?>" />
                    <input type="hidden" id="item_price" name="item_price" value="<?php echo($product['price']) ?>" />
                    <input type="hidden" id="add-button" name="action" value="add" />
                    <input type="submit" name="submit-cart" value="สั่งซื้อ" class="btn-buy" alt="Buy" />
            </div>                    
    </div>
</form>

<?php $i++; } ?>

</div>