<div class="section01">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-md-3">
                    <div class="product-list" data-aos="fade-right" data-aos-easing="ease" data-aos-delay="500">
                        <h3>Products</h3>
                        <div class="mainNav">
                                <ul>
                                    <?php foreach($all_products as $value) : ?>
                                        <li><a href="<?php echo base_url('front/fetchProduct/').$value->product_slug; ?>"><?php echo $value->product_title;?></a></li>
                                       
                                    <?php endforeach; ?>
                                </ul>
                                <div class="social-link">
                                    <span>Follow Us</span>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>                        
                            
                    </div>
            </div>  
        
            <div class="right-sec">

                <div class="col-md-9">
                    
                        <h2 class="title-heading" data-aos="fade-up"><b><?php echo $show_product['0']['product_tagline'];?></b>
                   
                        </h2>
               
                    <div class="row">
                        <div class="col-md-7">
                            <figure data-aos="fade-left"><img src="images/silicon01.jpg" alt=""></figure>
                        </div>
                        <?php foreach($show_product as $value) :?>
                        <div class="col-md-5 text-primary">
                            <?php echo $show_product['0']['product_description'];?> 
                        </div>
                        <?php endforeach;?>
                    </div>

                    <div class="tab-section text-primary"> 
                       <ul class="list-unstyled tab-link">
                            <li class="active" data-tab="tb-one">OVERVIEW </li>
                            <li data-tab="tb-three">Technical information</li>
                            <li data-tab="tb-four">gallery</li>
                        </ul>
                        
                        <div class="custom-tab ">  
                           
                            <div class="repeat-row active" id="tb-one">
                                 <?php echo $show_product['0']['product_overview'];?>              
                            </div>
                          
                            <div class="repeat-row" id="tb-three">
                                <?php echo $show_product['0']['product_specification'];?>              
                            </div>
                             
                            <div class="repeat-row" id="tb-four">                                       
                               <div class="tab-row" id="gallery">
                                <div class="col-md-12">
                                    <div class="tab-text add-brdr">
                                        <h2>Our Gallery</h2>
                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque sed, voluptate accusantium quidem laudantium vel repudiandae consequatur,
                                            nulla nobis in quibusdam cupiditate pariatur recusandae nemo impedit, atque fuga reiciendis eos.</p>
                                    </div>
                                </div>

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