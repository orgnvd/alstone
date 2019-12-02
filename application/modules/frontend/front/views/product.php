<div class="section01">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 leftnav">
					<span class="product-btn">Products</span>
					<div class="pro-nav"></div>
                    <div class="product-list" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="500">
                        <span class="close-btn"><i class="fa fa-times"></i></span>
                        <h3>Products</h3>
                        <div class="mainNav">
								<ul>
                                    <li><a href="#">WPC Doors and Window Frames</a></li>
									<?php foreach ($categories as $category) { ?>
									<?php //  pr($category);// if($category['products']){ echo "list" ; } ?>
											<?php if($category->title=='Empty'){  ?>
											 <?php foreach ($category->subs as $sub)  { ?>
											 <li><a href="<?php echo base_url('product/').$sub->product_slug; ?>"><?php echo $sub->product_title; ?> </a></li> 
											 <?php } ?>
											<?php }else{ ?>
											<li><a href="#"><?php echo $category->title; ?> </a>
											<?php if(!empty($category->subs)) { ?>
													<ul>
													<?php foreach ($category->subs as $sub)  { ?>
													 <li><a href="<?php echo base_url('product/').$sub->product_slug; ?>"><?php echo $sub->product_title; ?> </a></li>
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
            
            <div class="right-sec">
                <div class="col-md-9">
                     
                    <h2 class="title-heading" data-aos="fade-up"><?php echo $show_product['0']['product_tagline']; ?></h2>
                     
                    <div class="row">
                        <div class="col-md-7">
                            <figure><img src="<?php echo PRODUCT_IMG_PATH; ?><?php echo $show_product['0']['product_image']; ?>" alt=""></figure>
                        </div>
                        <div class="col-md-5 text-primary">
                            <div class="wood-polymer add-brdr">
                                <h4 data-aos="fade-down"><?php echo $show_product['0']['product_title']; ?></h4>
                                <p data-aos="fade-up" data-aos-easing="ease" data-aos-delay="500"><?php echo $show_product['0']['product_description']; ?></p>
                                <p data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
                                    </p>
                                <p data-aos="fade-up" data-aos-easing="ease" data-aos-delay="1000"> 
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-section text-primary"> 
                       <ul class="list-unstyled tab-link">
							<?php if(!empty($show_product['0']['product_overview'])){ ?>
								<li class="active" data-tab="tb-one">OVERVIEW </li>
							<?php } ?>
                            <?php if(!empty($show_product['0']['product_production'])){ ?>
                                <li data-tab="tb-two">Production method </li>
                            <?php } ?>
							<?php if(!empty($show_product['0']['product_gallery'])){ ?>
								<li data-tab="tb-three">Technical information</li>
							<?php } ?>
							<?php if(!empty($show_product['0']['product_gallery'])){ ?>
								<li data-tab="tb-four">gallery</li>
							<?php } ?>
                        </ul>
                        
                        <div class="custom-tab ">  
                            <div class="repeat-row active" id="tb-one">
                                <?php echo $show_product['0']['product_overview']; ?>
                            </div>
                           
                            <div class="repeat-row" id="tb-two">
                               <?php echo $show_product['0']['product_production']; ?>
                            </div>

                            <div class="repeat-row" id="tb-three">
                                <?php echo $show_product['0']['product_specification']; ?>             
                            </div>
                            <div class="repeat-row" id="tb-four">                                       
                               <div class="tab-row" id="gallery">
                                <!--
								<div class="col-md-12">
                                    <div class="tab-text add-brdr">
                                        <h2>Our Gallery</h2>
                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque sed, voluptate accusantium quidem laudantium vel repudiandae consequatur,
                                            nulla nobis in quibusdam cupiditate pariatur recusandae nemo impedit, atque fuga reiciendis eos.</p>
                                    </div>
                                </div> 
								-->

                                <div class="gallery-section">
                                   <ul class="clearfix list-unstyled">
                                        <?php $images = $show_product['0']['product_gallery']; 
                                            //1,2,3
                                        $img =explode(',', $images);
                                        ?>
                                        <?php foreach($img as $values):?>
                                        <li>
                                            <figure>
                                                <a data-fancybox="gallery" href="<?php echo PRODUCT_IMG_PATH.'gallery/'.$values; ?>">
                                                     
                                                    <img src="<?php echo PRODUCT_IMG_PATH.'gallery/'.$values; ?>" alt="thumb-nail">
                                                    <div class="overlay"><i class="fa fa-search-plus"></i></div>
                                                
                                                </a>
                                            </figure>
                                        </li>
                                    <?php endforeach; ?>
                                      
                                    </ul>
                                </div>                                  
                            </div>   
                            </div>
                        </div>  
                    </div>               
                </div>
            </div>
            
        </div>
    </div>
</div>