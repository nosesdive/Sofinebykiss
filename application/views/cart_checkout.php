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



.inner-form{ color: #888; padding:0 20px; }
.inner-form h3{ margin-bottom: 5px; color: #333 }
.inner-form p{ font-size: 0.8em; color: #8a9299}
.inner-form ul{ list-style:none; margin-bottom: 20px;}
.inner-form li {
	line-height: 35px;
	padding: 5px 0;
	position: relative;
	width: 570px;
}

.inner-form label {
	color: #8a9299;
	float: left;
	text-align: right;
	margin-right: 10px;
	margin-top: 7px;
	width: 170px;
}

input[type=text], .textarea{
	border: 4px solid #cfcfcf;
	font-size: 13px;
	height: 38px;
	width: 250px;
	padding-left: 7px;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

.textarea{ height: 100px !important }

.btn-submit-cart {
	padding: 5px 13px;
	cursor: pointer;
	-webkit-transition-duration: .6s;
	-moz-transition-duration: .6s;
	-o-transition-duration: .6s;
	transition-duration: .6s;
	-webkit-transition-property: visibility;
	-moz-transition-property: visibility;
	-o-transition-property: visibility;
	transition-property: visibility;
	-webkit-transition-property: opacity;
	-moz-transition-property: opacity;
	-o-transition-property: opacity;
	transition-property: opacity;
	background-color: #dd0017;
	background: -moz-linear-gradient(100% 100% 90deg,#b50025,#f40017);
	background: -webkit-gradient(linear,0% 0,0% 100%,from(#f40017),to(#b50025));
	background-image: -o-linear-gradient(#b50025,#f40017);
	color: #fff;
	margin: 10px 1px 1px 220px;
	-moz-border-radius: 15px;
	-webkit-border-radius: 15px;
	border-radius: 15px;
	font-size: 13px;
	border: none;
	width: 122px !important;
	height: 30px;
}

.error {
	padding: 5px 4px;
	margin: 20px 0px 10px;
	border: solid 1px #FBD3C6;
	background: #FDE4E1;
	color: #CB4721;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	text-align: center;
}

.required{ color: #dd0017 }

</style>
<h2>รายละเอียดการสั่งซื้อ</h2>

<?php   
	// Display error list
	if(validation_errors())
		echo '<div class="error">กรุณากรอกข้อมูลให้ถูกต้องและครบถ้วนด้วยครับ</div>'; 

?>

	<table cellspacing="1" id="tb-cart">
		<colgroup>
            <col width="420">
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
        	</tr>
        </thead>
        <tbody>
				
				<?php foreach ($this->cart->contents() as $items): ?>

	        	<tr id="<?php echo $items['rowid'] ?>" class="item">
	        		<form action="<?php echo site_url('cart') ?>" method="post">
		        		<td class="item">
		        			<img src="<?php echo base_url() ?>assets/images/product/thumb/product_<?php echo $items['id'] ?>.jpg" width="49" alt="<?php echo $items['name'] ?>" />
							<span><?php echo $items['name'] ?></span>
		        		</td>
		        		<td><?php echo $this->cart->format_number($items['price']) ?></td>
		        		<td>
		        			<?php echo $items['qty'] ?>
		        		</td>
		        		<td><?php echo $this->cart->format_number($items['subtotal']); ?></td>
		        		</form>
	        	</tr>

	        <?php endforeach; ?>
        </tbody>
	</table>
	<div class="price_and_term">
		<p class="ship">
			<strong><span>ค่าจัดส่ง</span> : 50.00 บาท</strong>
		</p>
		<p class="tt_price">
			<strong><span>รวมทั้งสิ้น</span> : <?php echo $this->cart->format_number($this->cart->total()+ 50 ) ?> บาท</strong>
		</p>
	</div>

	<form action="" method="post">
		
		<div class="inner-form">
			<h3>ข้อมูลการสั่งซื้อ</h3>
			<p class="checkout-desc">กรอกรายละเอียดในการจัดส่งให้ครบถ้วนเมื่อสั่งสินค้าเรียบร้อยแล้ว หลังจากที่เราตรวจสอบสินค้าแล้วจะติดต่อกลับไปโดยเร็วที่สุด</p>
			<ul>
				<li>
					<label for="detail">รายละเอียดการสั่งซื้อ : </label>
					<textarea class="textarea" rows="5" id="detail" name="detail"><?php echo (isset($_POST['detail'])) ? $_POST['detail'] : '' ?></textarea>
				</li>
				<li>
					<label for="email">อีเมล : <span class="required">*</span></label>
					<input id="email" type="text" name="email" value="<?php echo set_value('email'); ?>" />
				</li>
				<li>
					<label for="fullname">ชื่อ-นามสกุล : <span class="required">*</span></label>
					<input id="fullname" type="text" name="fullname" value="<?php echo set_value('fullname'); ?>" />
				</li>
				<li>
					<label for="address">ที่อยู่ : <span class="required">*</span></label>
					<input id="address" type="text" name="address" value="<?php echo set_value('address'); ?>" />
				</li>
				<li>
					<label for="city">จังหวัด : <span class="required">*</span></label>
					<input id="city" type="text" name="city" value="<?php echo set_value('city'); ?>" />
				</li>
				<li>
					<label for="zip">รหัสไปรษณีย์ : <span class="required">*</span></label>
					<input id="zip" type="text" name="zip" value="<?php echo set_value('zip'); ?>" />
				</li>
				<li>
					<label for="tel">เบอร์โทรศัพท์ : <span class="required">*</span></label>
					<input id="tel" type="text" name="tel" value="<?php echo set_value('tel'); ?>" />
				</li>
			</ul>

			<div class="submit"><input type="submit" name="submit-cart" class="btn-submit-cart" value="สั่งซื้อ"></div>

		</div>

	</form>