<style>
#tb-cart{ border-collapse: separate; font-family: arial; font-size: 12px; margin-top:20px; border:5px solid #f4f4f4 }
#tb-cart th{ 
	background-color: #f6abb0;
	color: #FFF;
	font-size: 100%;
	height: 32px;
	line-height: 22px;
	padding: 5px 0;
	text-align: center;
}

#tb-cart th.it-name{ padding: 5px 15px; text-align: left }

#tb-cart td{
	background-color: #F3F3F3;
	color: #5B5B5B;
	padding: 15px 0 10px;
	text-align: center;
	vertical-align: top;
}

#tb-cart td a{ color: #0096af }

#tb-cart td.item img{
	float: left;
	display: inline;
	margin-left: 15px;
	border: 3px solid #ebebeb;
	width: 49px
}

#tb-cart td.item span{
	display: block;
	float: left;
	text-align: left;
	padding: 5px 0 0 16px;
	width: 180px;
}

#tb-cart td .qty{ width:20px }

.price_and_term p.ship{ text-align: right; margin: 0 }
.price_and_term p.ship strong{ 
	border-top: 3px solid #fff;
	border-bottom: 1px dashed #FFF;
	display: block;
	padding: 10px;
	font-weight: normal;
	background: none repeat scroll 0% 0% rgb(232, 232, 232);
	color: rgb(91, 91, 91);
	font-size: 13px;
}
.price_and_term p.ship strong span, .price_and_term p.tt_price strong span{ padding-right: 10px;}

.price_and_term p.tt_price{
	border-bottom: 1px solid #E7E7E7;
	border-top: 1px solid #E7E7E7;
	text-align: right;
	margin-top: 0;
}

.price_and_term p.tt_price strong {
	border-bottom: 5px solid #fff;
	display: block;
	padding: 10px;
	background: none repeat scroll 0% 0% rgb(232, 232, 232);
	color: rgb(91, 91, 91);
	font-size: 14px;
}

.cart-buttons {
	padding: 40px 0 20px 45px;
	background: url(<?php echo base_url() ?>/assets/images/sep.png) no-repeat center 42px;
}

.cart-buttons a{ text-decoration: none; }

.btn-continue{
	background-color: rgb(221, 221, 221);
	color: #333;
	font-family: Arial;
	font-size: 18px;
	font-weight: 700;
	text-transform: uppercase;
	cursor: pointer;
	text-align: center;
	padding: 12px 40px;
	margin: 0 60px 0 0;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}

.btn-checkout{
	background-color: #f6abb0;
	color: #fff;
	font-family: Arial;
	font-size: 18px;
	font-weight: 700;
	text-transform: uppercase;
	cursor: pointer;
	text-align: center;
	text-shadow: 0 1px #a5446b;
	padding: 12px 20px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}

.btn-update{
	font-size: 11px;
	padding: 3px 5px;
	background-color: #F7F7F7;
	border: 1px solid #cfcfcf;
	color: #333;
}

a.btn-checkout:hover { color: #FFF }
a.btn-continue:hover { color: #333 }

</style>

<h2>ตะกร้าสินค้า</h2>

	<table cellspacing="1" id="tb-cart">
		<colgroup>
            <col width="360">
            <col width="110">
            <col width="80">
            <col width="80">
            <col width="70">
        </colgroup>
        <thead>
        	<tr>
        		<th class="it-name">ITEM</th>
        		<th>PRICE</th>
        		<th>QUANTITY</th>
        		<th>TOTAL</th>
        		<th></th>
        	</tr>
        </thead>
        <tbody>
        	<?php if($this->cart->contents()){ // Cart not empty ?>
				
				<?php foreach ($this->cart->contents() as $items): ?>

	        	<tr id="<?php echo $items['rowid'] ?>" class="item">
	        		<form action="<?php echo site_url('cart') ?>" method="post">
		        		<td class="item">
		        			<img src="<?php echo base_url() ?>assets/images/product/thumb/product_<?php echo $items['id'] ?>.jpg" width="49" alt="<?php echo $items['name'] ?>" />
							<span><?php echo $items['name'] ?></span>
		        		</td>
		        		<td><?php echo $this->cart->format_number($items['price']) ?></td>
		        		<td>
		        			<input class="qty" type="text" value="<?php echo $items['qty'] ?>" name="item_qty" id="item-id-<?php echo $items['id'] ?>" size="2" maxlength="2" />
		        			<input type="hidden" name="item_id" value="<?php echo $items['id'] ?>" />
		        			<input type="hidden" name="action" value="update" />
		        			<input type="hidden" name="item_row_id" value="<?php echo $items['rowid'] ?>" />
		        			<input class="btn-update" type="submit" name="update_qty_<?php echo $items['id'] ?>" value="Update" />
		        		</td>
		        		<td><?php echo $this->cart->format_number($items['subtotal']); ?></td>
		        		<td><a href="<?php echo site_url('cart?action=delete&item_row_id='.$items['rowid']) ?>" class="jcart-remove"><span>ลบสินค้า</span></a></td>
		        		</form>
	        	</tr>

	        <?php endforeach; ?>

        	<?php }else{ ?>
					
					<tr>
						<td colspan="5" align="center"><p>ไม่มีสินค้าในตระกร้า</p></td>
					</tr>

        	<?php } ?>
        </tbody>
	</table>
	<?php if($this->cart->contents()){ // Cart not empty ?>
	<div class="price_and_term">
		<p class="ship">
			<strong><span>ค่าจัดส่ง</span> : 50.00 บาท</strong>
		</p>
		<p class="tt_price">
			<strong><span>รวมทั้งสิ้น</span> : <?php echo $this->cart->format_number($this->cart->total()+ 50 ) ?> บาท</strong>
		</p>
	</div>
	
	<div class="cart-buttons">
		<a href="<?php echo base_url() ?>" class="btn-continue">Continue Shopping</a>
		<a href="<?php echo site_url('cart/checkout') ?>" class="btn-checkout">Proceed to Checkout</a>
	</div>

	<?php } ?>
