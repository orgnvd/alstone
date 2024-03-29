 <?php 
	$session = getuserDetailFromSession();
	
	//pr($session); die;
	if($session['s_loginStatus'] == 'true'){
		$name = $session['s_first_name']." ".$session['s_last_name'];
	}else{
		$name="";
	}
	
	$accessRoleID = $session['s_user_role'];
	?>
 
 <script>
 $(document).ready(function()
{
	var url = window.location.href;
	var link = url.split('/').slice(-1);
	$('.treeview-menu li').find('a[href$="'+link+'"]').parent('li').addClass('current');
});
 $(function(){
	$('.treeview-menu').find('.current').parent().css('display','block');
 })
 </script>
 
<style>
.skin-blue .treeview-menu>li.current>a{
    color: #fff;
}
</style>
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <div class="user-panel">

      </div>
      <?php if($accessRoleID ==2){ ?> 
	  <ul class="sidebar-menu">
        <li class="">
          <a href="<?php echo base_url('dashboard');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
		 
	</ul>
	  <?php } else if($accessRoleID == 3){ ?> 
	 <ul class="sidebar-menu">
        <li class="">
          <a href="<?php echo base_url('dashboard');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
		 
	</ul>
	 
	 <?php } else{ ?>
      <ul class="sidebar-menu">
        <li class="">
          <a href="<?php echo base_url('dashboard');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

	 
        
		<li class="treeview">
          <a href="#">
            <i class="fa fa-list "></i>
            <span>Manage Pages</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></i></span>
            </span>
          </a>
          <ul class="treeview-menu">
		<li><a href="<?php echo base_url('cms');?>"><i class="fa fa-circle-o text-aqua active"></i> <?php echo "Pages";?></a></li>
		</ul>
        </li>

    <li class="treeview">
          <a href="#">
            <i class="fa fa-list "></i>
            <span>Manage Products</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></i></span>
            </span>
          </a>
          <ul class="treeview-menu">
     <li><a href="<?php echo base_url('category'); ?>"><i class="fa fa-circle-o text-aqua active"></i> <?php echo "Category";?></a></li>       
    <li><a href="<?php echo base_url('products'); ?>"><i class="fa fa-circle-o text-aqua active"></i> <?php echo "Products";?></a></li>

    </ul>
        </li>
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-list "></i>
            <span>Manage Testimonials</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></i></span>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo base_url('testimonials');?>"><i class="fa fa-circle-o text-aqua active"></i> <?php echo "Testimonials";?></a></li>
		  </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-list "></i>
            <span>Manage Media</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></i></span>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo base_url('backendMedia');?>"><i class="fa fa-circle-o text-aqua active"></i> <?php echo "Media";?></a></li>
		  </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-list "></i>
            <span>Contact Enquiries</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></i></span>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo base_url('contactforms/contact');?>"><i class="fa fa-circle-o text-aqua active"></i> <?php echo "Contact";?></a></li>
		  </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-list "></i>
            <span>Manage Newsletter</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></i></span>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?php echo base_url('newsletter');?>"><i class="fa fa-circle-o text-aqua active"></i> <?php echo "Newsletter";?></a></li>
		  </ul>
        </li>
      </ul>
	  <?php } ?>
    </section>
    <!-- /.sidebar -->
  </aside>