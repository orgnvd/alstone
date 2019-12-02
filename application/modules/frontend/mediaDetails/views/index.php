<div class="section08 add-bg-clr">
    <div class="container-fluid">
        <?php foreach($media_Details as $row) :?>
        <div class="row" >
            <div class="col-md-12">
               <div class="blog-news">
                <figure><img src="<?php echo base_url('images/media/');?><?php echo $row['media_image']; ?>" alt=""></figure>
                <div class="media-title" data-aos="fade-left" data-aos-delay="400">
                    <h3><?php echo $row['media_title']; ?></h3>
                   
                </div>
               
             
               </div>
            </div>  
            <div class="col-md-6">
                <figure data-aos="fade-left"><img src="images/media-left.jpg" alt=""></figure>
            </div>
            <div class="col-md-12">
                <div class="media-con" data-aos="fade-right">
                    <?php echo $row['media_description']; ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="pagination">
                    <?php if(!empty($media_next)){ ?>
                     <a href="<?php echo base_url('mediaDetails/fetch/'.$media_next->slug); ?>" class="prev-btn"><span>Prev</span>Emerge Glass - An Alstone Group Venture</a>
                     <?php } ?>
                    
                    <?php if(!empty($media_previous)){ ?><a href="<?php echo base_url('mediaDetails/fetch/'.$media_previous->slug); ?>" class="next-btn">Build Tech Exhibition-Patiala<span>Next</span></a>
                    <?php } 
                    ?>
                </div>
            </div>
           
        </div>
    <?php endforeach ;?>
    </div>
</div>
