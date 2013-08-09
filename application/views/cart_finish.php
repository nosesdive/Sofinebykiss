<style>
.finishMsg {
	font-size: 0.8em;
	line-height: 1.6;
	padding-top: 10px;
	padding-left: 20px;
	text-align: center;
	width: 670px;
}	
.orderNO {
color: #000;
font-size: 1.4em;
}

</style>
<h2>ชำระเงิน</h2>
<div class="finishMsg">
    <p>เราได้รับการสั่งซื้อของคุณแล้วครับ </p>
    <p>รายการสั่งซื้อเลขที่ <strong class="orderNO"><?php echo $order_number ?></strong> ระบบจะส่งข้อมูลการสั่งซื้อไปที่อีเมลของคุณ</p>
    <p>คุณสามารถดูวิธีการชำระเงินได้ <a href="<?php echo site_url('payment') ?>">ที่นี่</a> ครับ</p>
    <p>หากมีข้อสงสัยหรือต้องการสอบถามข้อมูลเพิ่มเติมสามารถติดต่อเราได้ที่ 089.496.3334 หรือ อีเมล: sofinebykiss@gmail.com</p>
                        
</div>