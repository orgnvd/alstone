<style>
.bgnone {
	background-color: transparent;
}
</style>
<script>
function getState(val,id) {
	//alert(val);
	//alert(id);
	$.ajax({
	type: "POST",
	url: "<?php echo base_url();?>cms/ajax_language_list",
	data:'country_id='+val,
	success: function(data){
		$("#state-list"+id).html(data);
	}
	});
}
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('edit_gallery');?>
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
        <li ><a href="<?php echo base_url('gallery');?>"><?php echo lang('gallery');?></a></li>
        <li class="active"><?php echo lang('edit_gallery');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php // pr($fetchmodule); ?>
            <form method="post" action="<?php echo base_url('gallery/editGallery/'.$fetchmodule[0]['catID']);?>" enctype="multipart/form-data" id="frm_subadmin">
				<?php if(!empty($fetchmodule[0])){?>
				<div class="box-body">
					<div class="form-group">
					  <label for=""><?php echo 'Add Gallery Images';?></label>
					 <!-- <input name="mainimage[]" type="file" id="mainimage" multiple />-->
					</div>
					<?php
					if(!empty($fetchmodule[0]['banner']))
					{
					  foreach($fetchmodule[0]['banner'] as $banner)
					  { 
						if($banner['type'] == 1)
						{
					  ?>
					<div class="form-group">
						<img src="<?php echo base_url();?>images/gallery/<?php echo $banner['banner_image'];?>" id="deletecmbanner<?php echo $banner['id']; ?>" style="width:100px;" />
						<a href="javascript:void(0);" id="deletebanner<?php echo $banner['id']; ?>" onclick="ajaxdelete('<?php echo $banner['id']; ?>');return false;" data-original-title="Delete" data-toggle="tooltip" style="float: right; width: 14px;"><i class="glyphicon glyphicon-remove-circle"></i></a>	
					</div>
					<?php } } }?>
					<div class="form-group">
					  <label for=""><?php echo lang('media_image');?></label>
					  <input type="file" name="mainimage1[]" id="mainimage1" size="20" multiple />
					  <span class="imagesize">(Image size should be 630 x 332)</span>
					</div>
					<?php if(!empty($fetchmodule[0]['banner'])) {
					  foreach($fetchmodule[0]['banner'] as $banner) { 
						if($banner['type'] == 2) {
					 ?>
					<div class="form-group">
						<img src="<?php echo base_url();?>images/gallery/<?php echo $banner['banner_image'];?>" id="deletecmbanner<?php echo $banner['id']; ?>" style="width:100px;" />
						<a href="javascript:void(0);" id="deletebanner<?php echo $banner['id']; ?>" onclick="ajaxdelete('<?php echo $banner['id']; ?>');return false;" data-original-title="Delete" data-toggle="tooltip" style="float: right; width: 14px;"><i class="glyphicon glyphicon-remove-circle"></i></a>	
					</div>
					<?php } } }?>
					  
										
				</div>
				
              <!-- /.box-body -->

              <div class="box-footer">
                
				<input type="submit" name="submit" value="update" class="btn btn-primary"/>
				<a href="<?php echo base_url('gallery');?>" class="btn btn-danger">Cancel</a>
              </div>
			  <?php }else{
					//echo $fetchmodule['message'];
				}?>
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
  <script src="<?php echo base_url();?>public/admin/js/image-select.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>public/admin/css/image-select.css" type="text/css" />
<script type="text/javascript">
	var SyntaxHighlighter = function() { 
	var sh = {
	all: function(params)
	{}
	}; // end of sh
	return sh;
	}();
	$(function($){
       $('#example3').shImageSelect();
    });
</script> 
  <link rel="stylesheet" href="<?php echo base_url();?>public/admin/css/selectize.default.css">
  <script src="<?php echo base_url();?>public/admin/js/selectize.js"></script>
  <script src="<?php echo base_url();?>public/admin/js/index.js"></script>
  <script>
  var unique = $('#select-words-unique').selectize({
					create: true,
					createFilter: function(input) {
						input = input.toLowerCase();
						return $.grep(unique.getValue(), function(value) {
							return value.toLowerCase() === input;
						}).length == 0;
					}
				})[0].selectize;
				
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
    /* Only Letter Only Script */
	$.validator.addMethod("lettersonly", function(value, element) {
	return this.optional(element) || /^[a-zA-Z][a-zA-Z .,'-]*$/.test(value);
	}, "Letters only please");
	
	/* No Space allow Script */
	$.validator.addMethod("noSpace", function(value, element) { 
	 return  value.trim() != ""; 
	}, "Space are not allowed");
	
	/* File Upload Extension Script */
	$.validator.addMethod("extension", function(value, element, param) {
	param = typeof param === "string" ? param.replace(/,/g, "|") : "png|jpe?g|gif";
	return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
	}, $.validator.format("Please enter a value with a valid extension."));
	
  $(document).ready(function() {
  $("#frm_subadmin").validate({
		ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
		rules: {
				'business_category_id': {required: true},
			    'language_id': {required: true},
			    'country_id[]': {required: true},
			    'title_name': {required: true},
			    'mainimage': {required: true}
			},
	submitHandler: function(form) {
			  form.submit();
			}
			
		});
	});
	function ajaxdelete(deletecon){
	var ok = confirm("Are you sure to Delete this entry?")
	if (ok)
		{
			$.ajax({
			url: "<?php echo base_url(); ?>" + "gallery/deletesinglebanner",
			data:{'delete': deletecon},
			type: "POST",
			success: function(data) 
			{
				$("#deletebanner" + deletecon).remove();
				$("#deletecmbanner" + deletecon).remove();
			}
			});
		}
	}
 </script>