
<div class="section08 add-bg-clr">
    <div class="container-fluid">
        <div class="row" >
            <div class="col-md-8">
               <div class="blog-news">
                <h2>Media And <b>Events</b></h2>
                <?php if(!empty($media_list)): ?>
                 <?php foreach($media_list as $row) :?>
                <div class="row" data-aos="fade-left">
                    <div class="col-md-5">
                        <figure><img src="<?php echo base_url('images/media/'); ?><?php echo $row->media_image;?>"> </figure>
                    </div>
                    <div class="col-md-7">
                        <div class="event-row">
                            <span><?php $date =  $row->date; $yrdata= strtotime($date); echo date('M d, Y', $yrdata);?></span>
                            <h3><?php echo $row->media_title; ?></h3>
                            <p><?php 
									$content = $row->media_description;
									$short_des = strip_tags($content);
									@$pos=strpos($short_des, ' ', 200);
									echo substr($short_des,0,$pos );
									
								
									?> 
							</p>
                            <a href="<?php echo base_url('mediaDetails/fetch/'.$row->slug);?>">See More</a>
                        </div>
                 
                    </div>
                </div>
                <?php endforeach;?>

              <?php else : ?>
			  <p> no record(s). </p>
			  <?php endif; ?>
			  
               </div>
               <nav aria-label="navigation">
                    <ul class="pagination pg-blue">
                      
                        <?php echo $links; ?> 
                
                       
                    </ul>
                  </nav>
            </div> 

            <div class="col-md-4">
                <div class="category-list">
                    <h2>Categories</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url('media/listing/news'); ?>">News</a></li>
                        <li><a href="<?php echo base_url('media/listing/Events'); ?>">Events</a></li>
                        <li><a href="<?php echo base_url('media/listing/celebration'); ?>">Celebration</a></li>
                    </ul>
                    <h3>Recent Events</h3>
                </div>
                
                <?php foreach($events as $row): ?>
                <div class="recent-blog">
                    <div class="blog-img">
                        <img src="<?php echo base_url('images/media/'); ?><?php echo $row->media_image;?>">
                    </div>
                    <div class="blog-content">
                        <h4><?php echo $row->media_title; ?></h4>
                        <span><?php echo $row->date; ?></span>    
                    </div>
                </div>
            <?php endforeach; ?>
               
               
               
            </div>
        </div>
    </div>
</div>