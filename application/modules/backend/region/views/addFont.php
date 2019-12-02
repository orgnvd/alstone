<style>
.bgnone {
	background-color: transparent;
}
.form-group {
    width: 30%;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('add_font');?>
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <ol class="breadcrumb bgnone">
        <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?php echo lang('home');?></a></li>
        <li><a href="<?php echo base_url('location/fontcolor');?>"><?php echo lang('font_color');?></a></li>
        <li class="active"><?php echo lang('add_font');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?= validation_errors(); ?>
            <!--<form method="post" action="<?php echo base_url('location/addLanguage');?>" name="frm_subadmin" id="frm_subadmin" enctype="multipart/form-data">-->
			<?php $attributes = array('id' => 'frm_subadmin', 'name'=>'frm_subadmin');
			echo form_open_multipart('location/addFont', $attributes); ?>
				<div class="box-body">
					  <div class="form-group">
					  <label for=""><?php echo lang('category_name');?></label>
					  <select name="category_id" id="category_id" class="form-control select2">
						<option value="">Select a Category...</option>
						<?php
						foreach($category as $cat) {
						?>
						<option value="<?php echo $cat->id; ?>"><?php echo $cat->cate_name; ?></option>
						<?php
						}
						?>
					</select>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('heading_size');?></label>
					  <select name="heading_size" id="heading_size" class="form-control select2">
						<option value="">Select a Heading Size...</option>
						<?php for($i=30;$i<=60;$i++){?>
							<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php }?>
					   </select>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('heading_color');?></label>
					  <input type="text" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161" name="heading_color">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('content_size');?></label>
					   <select name="content_size" id="content_size" class="form-control select2">
						<option value="">Select a Content Size...</option>
						<?php for($i=10;$i<=30;$i++){?>
							<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php }?>
					   </select>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('content_color');?></label>
					  <input type="text" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161" name="content_color">
					</div>
					  <div class="form-group">
					  <label for=""><?php echo lang('country_name');?></label>
					  <select id="select-state" multiple name="country_id[]" class="demo-default">
						<option value="">Select a Country...</option>
						<?php
						foreach($countries as $country) {
						?>
						<option value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>
						<?php
						}
						?>
						
					</select>
					</div>				
					</div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
				 <a href="<?php echo base_url('location/fontcolor');?>" class="btn btn-danger">Cancel</a>
              </div>
            </form>
          </div>
          <!-- /.box -->

        

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
  
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>public/admin/css/jquery.minicolors.css">
  <script type="text/javascript" src="<?php echo base_url();?>public/admin/js/jquery.minicolors.min.js"></script>
  <script type="text/javascript">
$(function(){
  var colpick = $('.demo').each( function() {
    $(this).minicolors({
      control: $(this).attr('data-control') || 'hue',
      inline: $(this).attr('data-inline') === 'true',
      letterCase: 'lowercase',
      opacity: false,
      change: function(hex, opacity) {
        if(!hex) return;
        if(opacity) hex += ', ' + opacity;
        try {
          console.log(hex);
        } catch(e) {}
        $(this).select();
      },
      theme: 'bootstrap'
    });
  });
  
  
});
</script>
   <link rel="stylesheet" href="<?php echo base_url();?>public/admin/css/selectize.default.css">
  <script src="<?php echo base_url();?>public/admin/js/selectize.js"></script>
  <script src="<?php echo base_url();?>public/admin/js/index.js"></script>
  <script>
				var eventHandler = function(name) {
					return function() {
						console.log(name, arguments);
						$('#log').append('<div><span class="name">' + name + '</span></div>');
					};
				};
				var $select = $('#select-state').selectize({
					plugins: ['remove_button'],
					create          : true,
					onChange        : eventHandler('onChange'),
					onItemAdd       : eventHandler('onItemAdd'),
					onItemRemove    : eventHandler('onItemRemove'),
					onOptionAdd     : eventHandler('onOptionAdd'),
					onOptionRemove  : eventHandler('onOptionRemove'),
					onDropdownOpen  : eventHandler('onDropdownOpen'),
					onDropdownClose : eventHandler('onDropdownClose'),
					onFocus         : eventHandler('onFocus'),
					onBlur          : eventHandler('onBlur'),
					onInitialize    : eventHandler('onInitialize'),
				});
	</script>
 <script type="text/javascript">
  $(document).ready(function() {
  $("#frm_subadmin").validate({
            rules: {
               category_id: "required",
               heading_size: "required",
               heading_color: "required",
               content_size: "required",
               content_color: "required"
            },
            messages: {
                category_id: "Category is required",
                heading_size: "Heading Size is required",
                heading_color: "Heading Color is required",
                content_size: "Content Size is required",
                content_color: "Content Color is required",
            },
	submitHandler: function(form) {
			  form.submit();
			}
			
		});
	});
	  
  </script>