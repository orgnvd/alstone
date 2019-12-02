<div class="sl">
<div id="owl-demo1" class="owl-carousel owl-theme">
	<div class="item"><img src="<?php echo IMG_PATH; ?>banner.jpg" class="mainbanner"></div>
	<div class="item"><img src="<?php echo IMG_PATH; ?>banner1.jpg" class="mainbanner"></div>
	<div class="item"><img src="<?php echo IMG_PATH; ?>banner2-b.jpg" class="mainbanner"></div>
</div>
</div>
<div class="filter">
<h1>GET <span>DUBAI VISA</span> EASIER & FASTER</h1>
<div class="outer_filter">
<div class="inner_filter">

<?php $attributes = array('id' => 'frm_subadmin', 'name'=>'frm_subadmin');
			echo form_open_multipart('visafilter/search', $attributes); ?>
<div class="filter1">
	<select name ="nationality_id" class="select2" id="select2" style="width: 100%;">
		<option value=""><?php echo "Choose your Nationality";?></option>
		<?php 
		if(!empty($fetchnatinality)){ 
			foreach($fetchnatinality as $values){?>
			<option value="<?php echo $values->country_id;?>"><?php echo $values->country_name;?></option>
		<?php }
		}
		?>
	</select>
</div>
<div class="filter1">
	<select name ="country_id" class="select2" id="select2" style="width: 100%;">
		<option value=""> I am living in </option>
		<?php 
		if(!empty($fetchcountry)){ 
			foreach($fetchcountry as $value){?>
			<option value="<?php echo $value->country_id;?>"><?php echo $value->country_name;?></option>
		<?php }
		}
		?>
	</select>
</div>

<div class="filter1"><button type="submit">Get Started</button> </div>
<div class="clr"></div>
 <?= validation_errors(); ?>
</form>
<script type="text/javascript">
	$(document).ready(function() {
 
	  $("#frm_subadmin").validate({
				rules: {
				   'country_id': {required: true},
				   'nationality_id': {required: true}
				},
				  submitHandler: function(form) {
				  form.submit();
				}
				
			});
		});
</script>
</div>
<!--end inner_filter-->
</div>
<!--end outer_filter-->
</div>
<!--end filter-->
 
</div>
<!--end banner-->
</div>
<!--end fullwidth-->



<div class="section2">
<div class="wrapper">
<div class="section2_left">
<h1>UAE Visa Processing Steps</h1>


<div class="section2_left_inner">
<!--div class="l1 lt">
<a href="javascript:;">
<div class="l1_img"><img src="<?php echo IMG_PATH; ?>1.png"/></div>
<div class="l1_title">ONLINE FORM FILLUP</div>
<div class="l1_icon"><img src="<?php echo IMG_PATH; ?>11.png"></div>
</a>
</div>
<div class="l2 lt">
<a href="javascript:;">
<div class="l1_img"><img src="<?php echo IMG_PATH; ?>2.png"/></div>
<div class="l1_title">Online Payment</div>
<div class="l1_icon"><img src="<?php echo IMG_PATH; ?>22.png"></div>
</a>
</div>
<div class="l3 lt">
<a href="javascript:;">
<div class="l1_img"><img src="<?php echo IMG_PATH; ?>3.png"/></div>
<div class="l1_title">Visa Processing</div>
<div class="l1_icon"><img src="<?php echo IMG_PATH; ?>23.png"></div>
</a>
</div>
<div class="l4 lt">
<a href="javascript:;">
<div class="l1_img"><img src="<?php echo IMG_PATH; ?>4.png"/></div>
<div class="l1_title">Fly to UAE/Dubai</div>
<div class="l1_icon"><img src="<?php echo IMG_PATH; ?>44.png"></div>
</a>
</div-->

<img src="<?php echo IMG_PATH; ?>test1.png" style=" width:100%; vertical-align:top;"/>

<div class="clr"></div>
</div>
<!--end section2_left_inner-->

<div class="section2_left_inner_bottom">
<h1>It’s a proud moment for<span> Dubai VISA.com!</span></h1>

<p>With more than 20, 000 Visa applications across the globe, we have attained a new landmark in the field of visa services.</p>
<p>Applicants seeking a Dubai/UAE visa can apply here and be a part of our excellent visa services.</p> 
<p></p>

</div>


</div>
<!--end section2_left-->

<div class="section2_right">
<h1>Why INSTA Dubai Visa?</h1>
<ul>
<li><span class="left"></span><span class="right">Issuance of more than 20,000 UAE visas </span></li>
<li><span class="left"></span><span class="right">Highest visa approval ratio</span></li>
<li><span class="left"></span><span class="right">Faster and easier visa processing</span></li>
<li><span class="left"></span><span class="right">Affordable application and processing fees</span></li>
<li><span class="left"></span><span class="right">Quick online Application Form fill up </span></li>
<li><span class="left"></span><span class="right">Easy online documents uploading</span></li>
<li><span class="left"></span><span class="right">Effortless web access and useful Visa information</span></li>
<li><span class="left"></span><span class="right">Trained UAE visa specialists and professionals </span></li>
<li><span class="left"></span><span class="right">256-bit SSL protection for the entire website</span></li>
<li><span class="left"></span><span class="right">Instant update on the entire lifecycle of visa processing</span></li>
<li><span class="left"></span><span class="right">Round the clock chat assistance </span></li>

</ul>
<div class="more"><a href="javascript:;">More</a></div>
</div>
<!--end section2_left-->
<div class="clr"></div>
</div>
<!--end wrapper-->
</div>
<!--end section2-->



<div class="section3" data-parallax='{"translateY":"10%"}'>
<div class="section3_outer">
<div class="wrapper">
<div class="section3_left">

<h1>We <span>Offer </span><br/>
Multiple Types <br/>
of UAE <span>Visa</span></h1>
</div>
<!--end section3_left-->

<div class="section3_right">

 <div class="swiper-container">
        <div class="swiper-wrapper">
				<div class="swiper-slide">
				<div class="slide_left"><span class="date">14</span><span class="day">Days Visa
	<span class="entry">Single Entry</span></span></div> 
				<div class="slide_right"><p>14 Days UAE Visa: This a short stay visa issued to the applicants seeking a trip to UAE/Dubai for corporate meetings, conferences, expeditions and transit stay. As the category suggests, this type of visa entitles an applicant or a visitor to stay in the UAE territory for maximum up to 14 days from the date of his/her entry in UAE. The validity of this single entry visa is 60 days from the date of its issuance. The requirements to avail a 14 Days UAE Visa may differ as per your nationality and country of residence.</p>
				<div class="pls"><img src="<?php echo IMG_PATH; ?>/pls.png"/></div>
				</div>
				</div>
				
				 <div class="swiper-slide">
			<div class="slide_left"><span class="date">30</span><span class="day">Days Visa
<span class="entry">Single Entry</span></span></div> 
			<div class="slide_right"><p>30 Days UAE Visa: This is another short-term and single entry UAE visa, which is applicable to the visitors who are planning a trip to UAE to meet their buddies or family. This type of visa entitles a visitor to stay in the UAE territory for maximum up to 30 days from the date of his/her entry in UAE. The validity of this single entry visa is 60 days from the date of its issuance. The requirements to avail a 30 Days UAE Visa may differ as per your nationality and country of residence.</p>
			<div class="pls"><img src="<?php echo IMG_PATH; ?>/pls.png"/></div>
			</div>
			</div>
			
			 <div class="swiper-slide">
			<div class="slide_left"><span class="date">30</span><span class="day">Days Visa
<span class="entry">Multiple Entries</span></span></div> 
			<div class="slide_right"><p>30 Days UAE Visa (Multiple Entries): Such visa category is useful for those applicants who wish to visit UAE multiple times within 30 days time. This type of visa entitles a visitor to stay in the UAE territory for maximum up to 30 days or less from the date of his/her entry in UAE. The validity of this multiple entry 30 Days UAE Visa is 60 days from the date of its issuance. The requirements to avail such Visa may differ as per your nationality and country of residence.</p>
			<div class="pls"><img src="<?php echo IMG_PATH; ?>/pls.png"/></div>
			</div>
			</div>
			
			 <div class="swiper-slide">
			<div class="slide_left"><span class="date">90</span><span class="day">Days Visa
<span class="entry">Single Entry</span></span></div> 
			<div class="slide_right"><p>90 Days UAE Visa: This is a single entry visa issued to the visitors who want to visit UAE for a long stay up to 90 days. This kind of single entry visa entitles a visitor to stay in the UAE territory for maximum up to 90 days or less from the date of his/her entry in UAE. The validity of this single entry 90 Days UAE Visa is 60 days from the date of its issuance. Once you exit the territory of UAE within 90 days, the visa gets expired. The requirements to avail such Visa may differ as per your nationality and country of residence.</p>
			<div class="pls"><img src="<?php echo IMG_PATH; ?>/pls.png"/></div>
			</div>
			</div>
			
			 <div class="swiper-slide">
			<div class="slide_left"><span class="date">90</span><span class="day">Days Visa
<span class="entry">Multiple Entries</span></span></div> 
			<div class="slide_right"><p>90 Days UAE Visa (Multiple Entries): This type of multiple entry visas allow a visitor to travel frequently between UAE and its neighbouring countries by air, sea and road within the time frame of 90 days. On availing such visa, visitors need not to apply multiple visas to travel around UAE and its neighbouring countries. They can make it happen using the same visa. A 90 Days Multiple Entry UAE Visa entitles a visitor to stay in the UAE territory for maximum up to 90 days or less from the date of his/her entry in UAE. The validity of this multiple entry 90 Days UAE Visa is 60 days from the date of its issuance. The requirements to avail such Visa may differ as per your nationality and country of residence.</p>
			<div class="pls"><img src="<?php echo IMG_PATH; ?>/pls.png"/></div>
			</div>
			</div>
			
            
           
        </div>
        <!-- Add Pagination -->
		 <div class="swiper-button-next"><img src="<?php echo IMG_PATH; ?>/up.png"/></div>
        <div class="swiper-button-prev"><img src="<?php echo IMG_PATH; ?>/down.png"/></div>
        <div class="swiper-pagination"></div>
    </div>

</div>
<!--end section3_right-->

<div class="clr"></div>
</div>
<!--end wrapper-->
</div>
<!--end section3_outer-->
</div>
<!--end section3-->


<div class="client_feedback">
<div class="wrapper">

<div class="client_feedback_inner">
<h1>Our Clients Testimonials</h1>

<div class="client_feedback_slider">
<div class="owl-carousel1 owl-theme similler_products_sider">
 <div class="item">
 <div class="client_feedback_slider_01">
 <p>A trustworthy name in the field of UAE visa service providers. I went to Dubai to meet my daughter and returned to India couple of days back. Before flying to Dubai, I was not sure whether I will get my visa processed on time or not. It was really a fuss for me thinking of long queue, expensive processing and all other formalities. But big thanks to Dubai VISA.com and all the supportive staffs for processing my UAE visa application with no hassle. It was indeed an excellent service! Now, what all I can say that travelling abroad is not that wearisome if an excellent service providers like Dubai VISA.com is there.</p>
 <div class="d_arrow"><img src="<?php echo IMG_PATH; ?>downarrow.png"/></div>
 </div>
  <div class="aut_image"></div>
  <div class="aut_name">-Ramesh Jha <span> Lecturer- Physics</span></div>
 
 
 </div>
 

</div>
</div>




</div>
<!--end client_feedback_inner-->


</div>
<!--end wrapper-->
</div>
<!--end client_feedback-->
