<!-- Footer Inner -->

<div class="footeriner">
	<div class="fotertop">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                   
                    <div class="fotlogo" data-aos="zoom-in" data-aos-delay="800"><a href="<?php echo base_url('home');?>"><img src="<?php echo base_url('public/front/images/black-logo.png');?>" /></a></div>
                    <h4>Connect with Us</h4>
                    <div class="fotsub" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="400">
                    	<?php $attributes = array('id' => 'newsletter', 'name' => 'newsletter'); 
						echo form_open_multipart('home/newsletter', $attributes); ?>
                            <input type="email" name="email" placeholder="Enter your E-mail" />
                            <input type="text" name="phone" placeholder="Enter Your Number" />
                            <button><i class="fa fa-long-arrow-right"></i></button>
                        </form>
                    </div>
                  
                    <div class="fotlink" data-aos="fade-down" data-aos-easing="ease" data-aos-delay="1200">
                    	<h4>Useful links</h4>
                        <ul>
                        	<li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
                            <li><a href="<?php echo base_url('cmspages/faq'); ?>">FAQ</a></li>
                            <li><a href="<?php echo base_url('cmspages/terms'); ?>">T&C </a></li>
                            <li><a href="<?php echo base_url('product/wood-polymer-composite-sheet');?>">WPC Wood Polymer Composite</a></li>
                            <li><a href="<?php echo base_url('product/silicone');?>"> Silicon</a></li>
                            <!-- <li><a href="#">Blog</a></li> -->
                            <li><a href="<?php echo base_url('cmspages/privacy');?>">Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="foterbot">
    	<div class="container-fluid">
        	<div class="row">
            	<div class="col-md-4">
                	<div class="fotbotfolow">
                        Follow Us <a href="https://m.facebook.com/AlstoneHybrid/" target="_blank"><i class="fa fa-facebook"></i></a> 
                        <a href="https://mobile.twitter.com/deepanker2292?lang=en" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://m.facebook.com/AlstoneHybrid/" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="https://in.linkedin.com/in/alstonegroup" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="https://www.youtube.com/channel/UCYPrfoTcL1WQMBPj2_Go3Qw" target="_blank"><i class="fa fa-youtube-play"></i></a>                            
                    </div>
                </div>
                <div class="col-md-8">
				 <span>Made in India</span>
                	<div class="fotrigtlink">
                    	<a href="<?php echo base_url('cmspages/sitemap'); ?>">Sitemap</a> / <a href="<?php echo base_url('cmspages/privacy');?>">Privacy Policy</a> / <a href="<?php echo base_url('cmspages/terms'); ?>">Terms & Conditions</a> © 2019 ALSTONE - All Rights Reserved
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <script src="<?php echo base_url();?>public/admin/js/jquery.validate.js"></script>
 <script type="text/javascript">
    /* Only Letter Only Script */
	$.validator.addMethod("lettersonly", function(value, element) {
	return this.optional(element) || /^[a-zA-Z][a-zA-Z .,'-]*$/.test(value);
	}, "Letters only please");
	
	/* No Space allow Script */
	$.validator.addMethod("noSpace", function(value, element) { 
	 return  value.trim() != ""; 
	}, "Space are not allowed");
	
	/* File Upload Extension Script */
	$.validator.addMethod("extension", function(value, element, param) {
	param = typeof param === "string" ? param.replace(/,/g, "|") : "png|jpe?g|gif";
	return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
	}, $.validator.format("Please enter a value with a valid extension."));
	
  $(document).ready(function() {
	  $("#contactus").validate({
			ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
			rules: {
			   'txtName': {required: true,lettersonly: true,},
			   'txtstate': {required: true},
			   'txtPhone': {
				   		required: true, 
						minlength:9,
						maxlength:10,
						number: true
			   },
			   'txtEmail': {
				    required: true,
					email: true,
			   },
			   'txtMessage': {required: true},
			},
			  submitHandler: function(form) {
			  form.submit();
			}
		});
		
	$("#newsletter").validate({
			ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
			rules: {
			   'email': {
				    required: true,
					remote: {
						url: "<?php echo base_url();?>home/check_email_exists",
					}
			   },
			   'phone': {
						required: true, 
						minlength:9,
						maxlength:10,
						number: true
			   },
			},
			  submitHandler: function(form) {
			  form.submit();
			}
		});

    $("#career").validate({
        ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
                rules: {
                    'name': { 
						required: true ,
						lettersonly: true,
					 },
                    'user_phone': { 
						required: true, 
						minlength:9,
						maxlength:10,
						number: true
					},
                    'job_title': { required: true},
                    'dob': { required: true},
                    'state': { required: true},
                    'radio': { required: true},
                    'file1': { required: true},
                    'txtMessage': { required: true},
                    'user_email': {
						required: true,
						email: true,
					},
                    'phone': {required: true}
                },
	});
});
  </script>
 
<div id="fadeandscale" class="vidopop" style="display:none;">
    <div class="fadeandscale_close vidopopclse">X</div>
    <div class="vidopopfrme"><iframe width="100%" height="300px" src="https://www.youtube.com/embed/_3qejpNEh2E" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
</div>

<style>
#fadeandscale {
    -webkit-transform: scale(0.8);
       -moz-transform: scale(0.8);
        -ms-transform: scale(0.8);
            transform: scale(0.8);
}
.popup_visible #fadeandscale {
    -webkit-transform: scale(1);
       -moz-transform: scale(1);
        -ms-transform: scale(1);
            transform: scale(1);
}
.error{color:red !important; }
</style>


<!-- Google  Fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Mukta+Vaani:400,800&display=swap" rel="stylesheet">

<a href="#" class="scrollup">Scroll To Top</a>

<script type="text/javascript" src="<?php echo JS_PATH; ?>highlight.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>aos.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>grt-responsive-menu.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>navAccordion.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>jquery.fancybox.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>main.js"></script>


</body>
</html>
