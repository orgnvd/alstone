<div class="section08 add-bg-clr">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8" data-aos="fade-right">
                <div class="custom-tav">
                    <h2>Current <b>Opening</b></h2>
                    <ul class="list-unstyled owl-carousel owl-theme nav-slider">
                        <?php $count=1; foreach($list as $row) :?>
                        <li data-nav="navlink-<?php echo $count; ?>" class="item <?php if($count=='1'): echo 'active'; endif; ?>"><?php echo $row['job_title']; ?></li>
                        
                    <?php $count++; endforeach;?>
                    </ul>
                </div>

                <div class="tab-nav">
                     <?php $count=1; foreach($list as $row) :?>
                     <div class="tab-row <?php if($count=='1'): echo 'active'; endif; ?>" id="navlink-<?php echo $count; ?>">
                        <ul class="list-unstyled">
                            <li><b>Job Code </b> <span>:<?php echo $row['job_code']; ?></span></li>
                            <li><b>Department </b> <span>: <?php if(!empty(trim($row['job_department']))) {
                                                                        echo $row['job_department']; } else{
                                                                            echo 'N/A';} ?></span></li>
                            <li><b>Opening Date </b> <span>:<?php echo $row['job_opening_date']; ?></span></li>
                            <li><b>Designation</b> <span>: <?php if(!empty(trim($row['job_designation']))) {
                                                                        echo $row['job_designation']; } else{
                                                                            echo 'N/A';} ?>
                                                                         </span></li>
                            <li><b>Experience </b> <span>:<?php echo $row['job_experience']; ?></span></li>
                            <li><b>Closing Date</b><span>:<?php echo $row['job_closing_date']; ?></span></li>
                            <li>
                                <div class="location-details">
                                   <p><b>  </b>
                                 
                                 Minimum 5 Years in building material industry 
                                    <strong>( at least 2 years in ACP industry )</strong>
                                </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                  <?php $count++; endforeach;?>
                </div>

               
            </div>

            <div class="col-md-4" data-aos="fade-left">
                <div class="row form-fill">
                    <h2>Apply <b>Now</b></h2>
                    <?php
							$post = $this->input->post();
							$value = $this->session->flashdata('contact');
							$neg =   $this->session->flashdata('neg');
							if(!empty($post_error) && empty($value)){
								$err = $post_error;
							}
						?>
						<?php if(!empty($value)): ?>
							<div class="alert success">
							  <span class="closebtn">&times;</span>  
							  <strong>Success!</strong> <?php echo $value;?>
							</div>	
						<?php endif;?> 
						<?php if(!empty($err)): ?>
							<div class="alert">
							  <span class="closebtn">&times;</span>  
							  <strong>Oops!</strong> <?php echo $err;?>
							</div>	
						<?php endif;?> 
						<?php if(!empty($neg)): ?>
							<div class="alert">
							  <span class="closebtn">&times;</span>  
							  <strong>Oops!</strong> <?php echo $neg;?>
							</div>	
						<?php endif;?> 
                    <?php  $attributes = array('id' => 'career', 'name' => 'career');
                        echo form_open_multipart('careers/contact', $attributes); ?>
                        <ul class="list-unstyled">
                           <li><label>Your Name* <input type="text" name="name"></label> </li>                    
                                <li><label>Email * <input type="email" name="user_email"></label> </li>  
                                <li><label>Mobile No. * <input type="text" name="user_phone"></label> </li>  
                                <li><label>Job Title *<input type="text" name="job_title"></label></li>                       
                                <li><label>DOB *<input type="text" name="dob"></label>  </li>                   
                                <li><label>State *<input type="text" name="state"></label> </li>  
                                <li>
                                    <span class="gender">Gender *</span>
                                    <div class="radio">
                                        <input id="radio-1" name="radio" type="radio" checked>
                                        <label for="radio-1" class="radio-label">Male</label>
                                    </div>
                                     <div class="radio">
                                        <input id="radio-2" name="radio" type="radio">
                                        <label  for="radio-2" class="radio-label">Female</label>
                                    </div>
                                </li> 
                                <li>
                                    <label><input type="file" name="file1"></label>
                                </li>
                                <li><textarea name="txtMessage"></textarea></li>
                                <input type="submit" name="btnSubmit" value="Apply Now">
                            </ul>
                     </form>
                </div>
            </div>    
        </div>
    </div>
</div>