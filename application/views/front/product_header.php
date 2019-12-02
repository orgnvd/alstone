<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>Altone</title>

<link rel="icon" href="<?php echo IMG_PATH; ?>fav.png" type="image/x-icon"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Owl Stylesheets -->
<link rel="stylesheet" href="<?php echo CSS_PATH; ?>owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo CSS_PATH; ?>owl.theme.default.min.css">

<!-- main Stylesheets -->
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>animation.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>aos.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>jquery.mCustomScrollbar.css">
<link rel="stylesheet" href="<?php echo CSS_PATH; ?>jquery.fancybox.min.css" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>style.css">

<!-- main Javascript -->
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>jquery.popupoverlay.js"></script>

<style>
#fadeandscale {-webkit-transform: scale(0.8); -moz-transform: scale(0.8); -ms-transform: scale(0.8); transform: scale(0.8);}
.popup_visible #fadeandscale {-webkit-transform: scale(1); -moz-transform: scale(1); -ms-transform: scale(1); transform: scale(1);}
</style>

</head>

<body>

<?php 
$parent_id = $show_product[0]['parent_id'];
$uri = $this->uri->segment(2); 
$page_template = $template->template;  
if($page_template == 'gray' || $uri=='silicone'){
	echo '<div class="site-gray">';
	$logo = 'black-logo.png';
} else{
    echo '<div class="main-section">';
	$logo = 'white-logo.png';
}
?>
  
<!-- Header Inner -->
<div class="headerinr" id="myHeader">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="logoinr" data-aos="fade-right"><a href="<?php echo base_url('home'); ?>"><img src="<?php echo IMG_PATH.$logo; ?>" /></a></div>
            </div>
            <div class="col-md-9">
                <div class="logoinrcal" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="400">
                    <div class="grt-menu-right <?php if($page_template == 'gray' || $uri=='silicone'){ }else{ ?>primary-header <?php } ?>">
                        <nav>
                            <button class="grt-mobile-button"><span class="line1"></span><span class="line2"></span><span class="line3"></span></button>
                            <ul class="grt-menu">
                                <li <?php echo (($this->router->class =='home' && $this->router->method =='index') ? 'class="active"' :''); ?>><a href="<?php echo base_url('home'); ?>">Home</a></li>
                                <li <?php echo (($this->router->class =='about' && $this->router->method =='index') ? 'class="active"' :''); ?>><a href="<?php echo base_url('about'); ?>">About us</a></li>
                                <li><a href="<?php echo base_url('product');?>">Products</a></li>
                                <li><a href="<?php echo base_url('media/listing/news'); ?>">Media and events </a></li>
                                <li><a href="<?php echo base_url('careers'); ?>">Careers </a></li>
                                <!-- <li><a href="#">Certificates </a></li>
                                <li><a href="#">Credentials </a></li> -->           
                            </ul>
                        </nav>
                        <div class="menurightbtn"><a href="<?php echo base_url('contact'); ?>">Contact Us</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>