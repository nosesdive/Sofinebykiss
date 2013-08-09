<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->
    <head>
        <meta name="robots" content="index,follow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico"/>
        <title><?php echo $pageTitle ?></title>
        <meta name="description" content="<?php echo $pageDesc ?>">
        <meta name="keywords" content="เครื่องสำอาง, เครื่องสำอางเกาหลี, เครื่องสำอางนำเข้า, etude, skinfood, pro you, dr.young" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.1/css/bootstrap.min.css" rel="stylesheet">
        <?php echo $_styles ?>
        <?php echo css_asset('normalize.css')  ?>
        <?php echo css_asset('main.css')  ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <?php echo $_scripts ?>
        <?php echo js_asset('vendor/modernizr-2.6.2.min.js')  ?>
        <?php echo js_asset('jquery.slides.min.js')  ?>
        <script>
            $(function(){
              $("#slides").slidesjs({
                width: 715,
                height: 250,
                play: {
                  active: true,
                  auto: true,
                  interval: 8000,
                  swap: true
                }
              });

              // Show total paid
              $('.cart-link').tooltip();

            });
        </script>
        
    </head>
    <body>
    
        
    	<!-- Top Header -->    
    <div id="nav-container">
        <div class="nav-padding">
            <header id="navigation">
                  <hgroup>
                        <h1><a href="<?php echo base_url() ?>"><span>Sofinebykiss</span></a></h1>
                  </hgroup>
                  
                  <div class="ajax-search">
                    <div class="ajax-search-relative">
                        <form id="cse-search-box" action="http://google.com/cse">
                          <input type="text" name="q" id="productSearch" value="" placeholder="ค้นหาสินค้า">
                          <input type="hidden" name="cx" value="010941737557042564214:khsdyvfy9me" />
                          <input type="hidden" name="ie" value="UTF-8" />
                        </form>
                    </div>
                  </div>
                  <ul id="cart">
                        <li class="cart">
                          <a href="<?php echo site_url('cart') ?>" class="cart-link" data-toggle="tooltip" data-placement="left" title="" data-original-title="<?php echo (count($this->cart->contents()) == 0) ? 0 : $this->cart->format_number($this->cart->total()) ?> บาท">
                              ตะกร้าสินค้า (<?php echo count($this->cart->contents()) ?>)
                          </a>
                        </li>
                 </ul>
            </header>  
       </div>                    
    </div>  
            
            
   <!-- Top Header /-->   
     
   <div id="wrapper">
        
             <nav>
                <ul id="menu-main">
                    <li class="active">
                        <a href="<?php echo base_url() ?>" style="border-top-left-radius: 2px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 2px;" class="homelink">หน้าหลัก</a>
                    </li>
                    <li class="n-how-to-pay" title="วิธีชำระเงิน"><a href="<?php echo site_url('payment') ?>"><span>วิธีชำระเงิน</span></a></li>
                    <li class="n-tranfer" title="แจ้งชำระเงิน"><a href="<?php echo site_url('tranfer') ?>"><span>แจ้งชำระเงิน</span></a></li>                                   
                    <li class="n-contact" title="ติดต่อเรา"><a href="<?php echo site_url('contact') ?>"><span>ติดต่อเรา</span></a></li>
                    <li class="n-search" title="ค้นหาสินค้า"><a href="<?php echo site_url('search') ?>"><span>ค้นหาสินค้า</span></a></li>
                </ul>
             </nav>
            
            

            <div id="content">
            
              <div style="width:715px; height:250px; position:relative; padding:17px 0 12px 0; margin-left:10px; float:left">
              
                  <div id="slides">
                    <a href="http://www.sofinebykiss.com/product/CS16074-stylenanda-3-concept-eyes-lip-color-406-milk-tangerine"><img src="<?php echo base_url() ?>assets/images/slide/3.jpg" /></a>
                    <a href="http://sofinebykiss.com/product/CS28032-dr-absolute-%E0%B8%84%E0%B8%AD%E0%B8%A5%E0%B8%A5%E0%B8%B2%E0%B9%80%E0%B8%88%E0%B8%99"><img src="<?php echo base_url() ?>assets/images/slide/1.png" /></a>
                    <img src="<?php echo base_url() ?>assets/images/slide/2.png" />
                  </div>
              
              </div>
              
              <div style="width:222px; height:250px; position:relative; padding:0; margin-left:10px; margin-top:17px; float:left">
                <img src="<?php echo base_url() ?>assets/images/tag-contact.png">
              </div>
            
                <div id="sidebar" style="clear:both">
                    
                   <div class="brands">
                        <h2>Brands</h2>
                         <ul>
                            <li><a href="<?php echo site_url('brand/all') ?>">ทุกแบรนด์</a></li>
                            <li><a href="<?php echo site_url('brand/baviphat') ?>">Baviphat</a></li>
                            <li><a href="<?php echo site_url('brand/beauty-credit') ?>">Beauty credit</a></li>
                            <li><a href="<?php echo site_url('brand/bergamo') ?>">Bergamo</a></li>
                            <li><a href="<?php echo site_url('brand/dr-mj') ?>">DR.MJ</a></li>
                            <li><a href="<?php echo site_url('brand/dr-young') ?>">DR.YOUNG</a></li>
                            <li><a href="<?php echo site_url('brand/etude') ?>">Etude House</a></li>
                            <li><a href="<?php echo site_url('brand/holika-holika') ?>">Holika Holika</a></li>
                            <li><a href="<?php echo site_url('brand/innisfree') ?>">Innisfree</a></li>
                            <li><a href="<?php echo site_url('brand/it-skin') ?>">It's Skin</a></li>
                            <li><a href="<?php echo site_url('brand/joa') ?>">JOA Cream Pack</a></li>
                            <li><a href="<?php echo site_url('brand/laneige') ?>">Laneige</a></li>
                            <li><a href="<?php echo site_url('brand/lotree') ?>">Lotree</a></li>
                            <li><a href="<?php echo site_url('brand/missha') ?>">Missha</a></li>
                            <li><a href="<?php echo site_url('brand/nature-republic') ?>">Nature Republic</a></li> 
                            <li><a href="<?php echo site_url('brand/opi') ?>">OPI</a></span></li>
                            <li><a href="<?php echo site_url('brand/pro-you') ?>">Pro You</a></li>
                            <li><a href="<?php echo site_url('brand/rojukiss') ?>">Rojukiss</a></li>
                            <li><a href="<?php echo site_url('brand/skinfood') ?>">Skinfood</a></li>
                            <li><a href="<?php echo site_url('brand/the-face-shop') ?>">The Face Shop</a></li>
                            <li><a href="<?php echo site_url('brand/tonymoly') ?>">tonymoly</a></li>
                            <li><a href="<?php echo site_url('brand/welcos') ?>">Welcos</a></li>
                            <li><a href="<?php echo site_url('brand/other') ?>">อื่นๆ</a></li>
                       </ul>
                   </div>
                   
                   <div class="fb-likebox">
                          <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FSofineByKiss%2F203020343052719&amp;width=234&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23ffffff&amp;header=false&amp;stream=false&amp;height=392" scrolling="no" frameborder="0" style="border:none; width:234px; height:392px; background-color:#FFF" allowTransparency="true"></iframe> 
                   </div> 

                </div> <!-- Sidebar /-->
                
                <div id="content-main">
                
                     <?php echo $ci_content ?>

                </div>
    </div>
            
            
            
</div> <!-- end wrapper -->   

<footer id="footer">
    <div class="footer-wrapper">
            <p class="tm">
            <a href="http://www.sofinebykiss.com">หน้าหลัก</a> 
            | <a href="<?php echo site_url('payment') ?>">วิธีชำระเงิน</a> 
            | <a href="<?php echo site_url('tranfer') ?>">แจ้งชำระเงิน</a>
            | <a href="<?php echo site_url('contact') ?>">ติดต่อเรา</a>
            | <a href="<?php echo site_url('search') ?>">ค้นหาสินค้า</a>
            </p>
            <p class="copyright">© 2010 sofinebykiss™. All rights reserved.</p>
    </div>        
</footer> 
      
      
      

        <script type="text/javascript">

          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-1227334-4']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();

        </script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.2/bootstrap.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <?php echo js_asset('main.js')  ?>
    	
    </body>
</html>
