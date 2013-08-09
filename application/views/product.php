                <style>
                .product-detail {
						position: relative;
						padding: 20px 0 0 0;
						overflow: hidden;
				}
				
				.product-detail .img-preview {
						float: left;
						display: inline;
						width: 350px;
				}
				
				.product-detail img {
						float: left;
						display: inline;
						border: 5px solid #f4f4f4;
						width: 350px;
						clear: both;
						margin-bottom: 10px;
				}
				
				.product-detail .p-desc {
						float: right;
						display: inline;
						width: 310px;
						font-size: 1em;
				}
				
				.product-detail .p-desc p {
						margin-bottom: 1.3em;
						overflow: hidden;
						color: #666;
				}
				
				.product-detail .p-desc p.p-price {
						color: #E32E5A;
						font-weight: bold;
				}
				
				.product-detail .p-desc h5 {
						font-size: 0.85em;
						color: #666;
						border-bottom: 1px solid #bbb;
						padding-bottom:5px;
						margin-bottom:0
				}
				.product-detail .p-desc p span {
						line-height: 1.6;
						font-size: 0.8em !important;
						padding-top: 5px;
				}
				
				.product-detail .p-desc p #item_qty {
						width: 60px;
						padding: 3px 5px;
						margin-left: 5px;
				}
				
				.btn-submit-cart{
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
						margin: 10px 1px 1px 65px;
						-moz-border-radius: 15px;
						-webkit-border-radius: 15px;
						border-radius: 15px;
						font-size: 13px;
						border: none;
						width:172px !important;
						height:30px
				}
                
                </style>


<h2><?php echo $product['name'] ?></h2>
<form method="post" action="<?php echo site_url('cart') ?>">
                   <div class="product-detail">
                   		<div class="img-preview">
							
							<?php foreach ($product_images as $image) { ?>

                            <img src="<?php echo base_url() ?>assets/images/product/preview/<?php echo $image['img_name']; ?>" alt="Image Preview" />
							
							<?php } ?>

                        </div>    
                   		<div class="p-desc">

                        	<p style="margin-top:0"><strong>Model:</strong> <?php echo $product['code'] ?></p>
                            <p class="p-price"><?php echo number_format($product['price']) ?> บาท</p>
                            <h5>รายละเอียด:</h5>
                            <p><span><?php echo nl2br($product['description']) ?></span></p>
                            <p style="font-size:0.9em"><strong>จำนวน:</strong> 
                            <select name="item_qty" id="item_qty">
                            	<option value="1" selected="selected">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            </p>
                            <p>
                            <input type="hidden" id="item-id" name="item_id" value="<?php echo $product['id'] ?>">
                            <input type="hidden" id="item-name" name="item_name" value="<?php echo $product['name'] ?>">
                            <input type="hidden" id="item-price" name="item_price" value="<?php echo $product['price'] ?>">
                            <input type="hidden" id="add-button" name="action" value="add">
                            <input type="hidden" id="add-button" name="add-button" value="add-button">
                            <input type="submit" name="submit-cart" class="btn-submit-cart" alt="Add To Cart" value="สั่งซื้อสินค้า"></p>
                        </div>
                   </div>
</form>