
<!-- Changes -->
<!-- Middle Section -->
<div class="section01">
	<div class="container-fluid">  
    	<div class="row splash">
        	<div class="col-md-6">
            	<div class="section01left">
                	<div class="section01leftimg right" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="800"><img src="<?php echo IMG_PATH; ?>inrleft.png" /></div>
                    <div class="section01lefttxt" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="1200">
                    	<h3><strong>Knock <span>& </span>Know </strong>what ALSTONE touch can do.</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            	<div class="section01right">
                	<div class="serrigtmenu" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="1600">
                    	<?php if(isset($about_content)){ echo $about_content->cmsShortDesc; ?>
                        <a href="<?php echo base_url('about'); ?>">Read More</a>
						<?php } ?>
                    </div>
                    <div class="serrigtmenu2" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="2000">
                    	<h3>Products</h3>
                        <div class="mainNav">
                                <!--<ul>
									<?php if(!empty($all_products)) { ?>
                                    <?php foreach($all_products as $value) : ?>
                                        <li><a href="<?php echo base_url('front/fetchProduct/').$value->product_slug; ?>"><?php echo $value->product_title;?></a></li>
                                       
                                    <?php endforeach; ?>
									<?php } ?>
                                </ul>-->
								<ul>
                                    <li><a href="#">WPC Doors and Window Frames</a></li>
									<?php foreach ($categories as $category) { ?>
										<?php if($category->title=='Empty' || $category->title=='No Parent'){  ?>
										<?php foreach ($category->subs as $sub)  { ?>
											<li><a href="<?php echo base_url('product/').$sub->product_slug; ?>"><?php echo $sub->product_title; ?> </a></li> 
										<?php } ?>
										<?php } else{ ?>
											<li><a href="#"><?php echo $category->title; ?> </a>
												<?php if(!empty($category->subs)) { ?>
													<ul>
													<?php foreach ($category->subs as $sub)  { ?>
													  <a href="<?php echo base_url('product/').$sub->product_slug; ?>"><?php echo $sub->product_title; ?> </a></li>
													<?php } ?>	
													</ul>
												<?php } ?>
											</li>
										<?php } ?>
									<?php } ?>
								</ul>
                                <div class="social-link">
                                    <span>Follow Us</span>
                                    <a href="https://m.facebook.com/AlstoneHybrid/" target="_blank"><i class="fa fa-facebook"></i></a> 
									<a href="https://mobile.twitter.com/deepanker2292?lang=en" target="_blank"><i class="fa fa-twitter"></i></a>
									<a href="https://m.facebook.com/AlstoneHybrid/" target="_blank"><i class="fa fa-instagram"></i></a>
									<a href="https://in.linkedin.com/in/alstonegroup" target="_blank"><i class="fa fa-linkedin"></i></a>
									<a href="https://www.youtube.com/channel/UCYPrfoTcL1WQMBPj2_Go3Qw" target="_blank"><i class="fa fa-youtube-play"></i></a> 
                                </div>
                        </div>                      

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section02">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12" data-aos="zoom-in"><img src="<?php echo IMG_PATH; ?>alstone.png" /></div>
        </div>
    </div>
</div>

<div class="section03">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-md-5">
            	<div class="section3left">
                	<?php if(isset($home_content)){ 
							echo $home_content->cmsShortDesc; ?>
					<?php } ?>
                </div>
            </div>
            <div class="col-md-7">
            	<div class="section3rigt" data-aos="fade-up-left">
					<?php if(isset($home_content)){ ?>
						<img src="<?php echo base_url().'images/cms/'.$home_content->cmsBanner; ?>" /> 
					<?php } ?>
				</div>
            </div>
        </div>
    </div>
</div>

<div class="section04">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="proleft">
                    <h3 data-aos="zoom-in" data-aos-easing="ease">Our <strong>Products</strong></h3>
                    <h4 data-aos="zoom-in" data-aos-easing="ease">Lets see  <strong>what we have for you</strong></h4>    
                    <ul class="tabs">
                        <li class="tab-link current" data-tab="tab-1" data-aos="fade-up" data-aos-easing="ease">
                            <div class="protab">
                                <div class="protabtxt"><p><strong>WPC</strong>Wood Polymer Composite</p></div>
                                <div class="protabimg"><img src="<?php echo IMG_PATH; ?>protab01.jpg" /><i class="fa fa-angle-right"></i></div>
                            </div>
                        </li>
                        <li class="tab-link" data-tab="tab-2" data-aos="fade-up" data-aos-easing="ease">
                            <div class="protab">
                                <div class="protabtxt"><p><strong>Silicone</strong>General Purpose Silicon </p></div>
                                <div class="protabimg"><img src="<?php echo IMG_PATH; ?>protab02.jpg" /><i class="fa fa-angle-right"></i></div>
                            </div>
                        </li>
                    </ul>       
                </div>
                <div class="proright">
                    <div id="tab-1" class="tab-content current">
                        <div class="procarosal">
                            <?php if(!empty($wpcList)){ ?>
                                <div class="owl-carousel owl-theme productslider">
                                    <?php foreach($wpcList as $value) :?>
                                    <div class="item" data-aos="zoom-in" data-aos-easing="ease" data-aos-delay="400">
                                        <div class="product01">
                                            <a href="#">
                                                <img src="<?php echo base_url('images/products/');?><?php echo $value->product_banner; ?>">
                                                <p>WPC   <strong><?php echo $value->product_title;?></strong></p>
                                            </a>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php } else{
                                    echo "no records"; 
                                } ?>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-content">
                         <div class="procarosal">
                             <?php if(!empty($silicone)){ ?>
                            <div class="owl-carousel owl-theme productslider">
                                <?php foreach($silicone as $value) : ?>
                                <div class="item">
                                    <div class="product01" data-aos="zoom-in" data-aos-easing="ease" data-aos-delay="400">
                                        <a href="#">
                                            <img src="<?php echo base_url('images/products/'); ?><?php echo $value->product_banner;?>">
                                            <p>GENERAL <strong><?php echo $value->product_title;?></strong></p>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach ;?>
                            </div>
                            <?php } else {
                                echo "no records";
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section05">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="lagenyhed" data-aos="zoom-in" data-aos-easing="ease">
                	<h3>Our <strong>Legacy</strong></h3>
                    <!--<ul>
                    	<li id="tabing-1" class="tabing">New Works</li>
                        <li id="tabing-2" class="tabing">Old Works</li>
                    </ul>
                    <a href="#">Read More</a>-->
                </div>
            </div>
        </div>
        
        <div class="lagypromn">        
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme lagencycaro">
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="100"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>client-logo01.jpg" /><p>CPWD</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="200"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>client-logo02.jpg" /><p>PWD</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="300"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>client-logo03.jpg" /><p>INDIAN GOVERNMENT RAILWAYS</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="400"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>client-logo04.jpg" /><p>HSCC</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="500"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>client-logo05.jpg" /><p>DMRC</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="600"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>client-logo06.jpg" /><p>MP POLICE HOUSING</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="700"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>GJ-POLICE-HOUSING.jpg" /><p>GJ POLICE HOUSING</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>TATA.jpg" /><p>TATA</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="900"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>GODREJ.jpg" /><p>GODREJ</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>SHAPOORJI-PALLONJI.jpg" /><p>SHAPOORJI PALLONJI</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1100"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>NBCC.jpg" /><p>NBCC</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>AIRPORT-AUTHORITY-OF-INDIA.jpg" /><p>AIRPORT AUTHORITY OF INDIA</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>GAIL.jpg" /><p>GAIL</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1400"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>IOCL.jpg" /><p>IOCL</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1500"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>PUNJAB-POLICE.jpg" /><p>PUNJAB POLICE</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1100"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>DELHI-POLICE.jpg" /><p>DELHI POLICE</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1200"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>MAJOR-BUILDERS.jpg" /><p>MAJOR BUILDERS</p></a></div></div>
                        
                        <div class="item" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1300"><div class="lagnypro"><a href="#"><img src="<?php echo IMG_PATH; ?>SBI.jpg" /><p>SBI</p></a></div></div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
    </div>
</div>


<div class="section06">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="testimin">
                	<h3 data-aos="zoom-in" data-aos-easing="ease">What <strong>People Think</strong></h3>
                    
                   
                    <?php if(!empty($testimonial_list)){ ?>
                    <div class="owl-carousel owl-theme testimonal">
                        <?php foreach($testimonial_list as $value): ?>

                          <div class="item">
                            <div class="testibox">
                                <div class="testiboximg"><img src="<?php echo base_url('images/testimonials/'); ?><?php echo $value->user_image;?>"></div>

                                <div class="testiboxtxt">
                                    <p><?php echo $value->description; ?> </p>
                                    <h4> <strong> <?php echo $value->name; ?></strong></h4>
                                    <h5> <?php echo $value->designation; ?></h5>
                                </div>
                            </div>
                        </div>

                       
                    <?php endforeach; ?>
                    </div>
                    <?php } else {
                        echo "no records";

                    } ?>
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

