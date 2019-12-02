

<!-- Middle Section -->
<div class="about-sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="banner-title" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="700">
                    <h3>Build it, <br>
                   <b>Forget it</b> </h3>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="1000">
                <figure><img src="<?php echo base_url('public/front/images/client-02.png'); ?>" alt=""></figure>
            </div>
            <div class="col-md-4">
                <div class="banner-title" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="1200">
                    <img src="images/img04.png" alt="">
                    <h4>a Manufacturers <span>of</span>  <br>
                    Interior Building <br>
                    Products</h4>
                </div>
            </div>
        </div>
        <div class="description">
            <h2 data-aos="fade-right" data-aos-easing="ease" data-aos-delay="400">About <span>us</span></h2>
            <p data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600">The Alstone brand came into existence in 2004, when we started manufacturing Aluminium Composite Panel (ACP). This fairly new venture proved highly successful, post which we stepped foot into the interior segment with providing WPC and Silicone Sealant in the year 2011, which also marked us as the only Silicone manufacturers in India.</p>
            <p data-aos="fade-up" data-aos-easing="ease" data-aos-delay="900">The Alstone Group which was founded in the year 2004, has now grown into an enormous US$ 60 million group with diverse business interests. Alstone encompasses different area of interest inclusive of Panel & Panel Products, Chemicals Products, and Exterior Facade Products. We are driven by our constant effort to maintain Quality and Services in all our products. Our global reach expands across 10 countries and a vast network of dealers in India. The Alstone Group employs 1500 people across three manufacturing sites and 9 offices in India. </p>
            <p data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200">Our extensive range of products make Alstone Industries the Nation's leading manufacturer and exporter of interior Building Products. We have committed ourselves to uphold the highest manufacturing standards, a practice that has earned our facilities certifications inclusive of ISO 9001, ISO 14001 and GREHA certifications.</p>

        </div>
    </div>
</div>

<div class="collection">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8" data-aos="fade-up-right">
                <figure><img src="<?php echo base_url('public/front/images/meet-client.jpg'); ?>" alt=""></figure>
            </div>
            <div class="col-md-4">
                <div class="banner-title" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="700">
                    <h3  data-aos="fade-down">Business  <br>
                    <b>with Alstone</b> </h3>
                    <h5 data-aos="fade-up" data-aos-easing="ease" data-aos-delay="700">Here Teamwork Makes Our Customers Dream Work</h5>
                    <p data-aos="fade-up" data-aos-easing="ease" data-aos-delay="900">At Alstone, our mission is very clear, we strive to provide quality products to our customers that satisfy their specific needs.</p>
                    <p data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">Alstone WPC is a very versatile material with outstanding product properties, which plays its strengths especially in areas like home furniture, office cubicle,beach furniture and terrace furniture. </p>
                    <p data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000">it is suitable to use under all weather conditions. cultural respect and awareness towards using eco-friendly products comes naturally to us as a part of being on the 'MAKE IN INDIA' bandwagon.</p>
                    <p data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1100">The possibilities of making a special and sustainable product are unlimited, as there are many possible variations in the production process, Our products boost of design excellence,magnificent color choice, along with adept sustainability.</p>
                    <p data-aos="fade-up" data-aos-easing="ease" data-aos-delay="900">Therefore, we are very happy when companies or creative people approach us with new ideas. We are happy to help with the implementation.</p>
                    <p data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1100">So are you interested in starting a project with Alstone? Here is a comprehensive know-how that we are happy to provide you. Get in touch with machine manufacturers, compounders, and manufacturers of semi-finished products or finished products.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section07">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="exporhed" data-aos="zoom-in" data-aos-easing="ease">
                    <h3><strong>Explore</strong> us More</h3>
                </div>
            </div>            
        </div>
        <div class="row">
        	<div class="col-md-12">
            	<div class="expblog" data-aos="fade-up" data-aos-easing="ease">
                	<div class="owl-carousel owl-theme exlporeblog">
					<?php if(!empty($media)){   ?>
					 <?php foreach($media as $list): ?>
                    	<div class="item">
                        	<div class="expblogbox">
                            	<div class="expblogboximg"><a href="#"><img src="<?php echo base_url('images/media/'); ?><?php echo $list->media_image;?>" /></a></div>
                                <div class="expblogboxtxt">
                                	<h4>  <?php $date =  $list->date; $yrdata= strtotime($date); echo date('M d, Y', $yrdata);?> </h4>
                                    <h5><?php echo $list->media_title;?></h5>
                                    <p><?php 
									$content = $list->media_description;
									$short_des = strip_tags($content);
									@$pos=strpos($short_des, ' ', 200);
									echo substr($short_des,0,$pos );
									
								
									?> </p>
                                    <a href="<?php echo base_url('mediaDetails/fetch/'.$list->slug); ?>">See More</a>
                                </div>
                            </div>
                        </div>
					<?php endforeach; ?>
                    <?php } else {
                        echo "no records";

                    } ?>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>