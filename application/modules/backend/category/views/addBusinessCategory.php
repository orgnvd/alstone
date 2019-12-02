
<script>
	/* $(document).ready(function() {
		$("#b_category").validate({
			rules: {
				cate_name: "required",
				cate_title: "required",				
				parent_id: "required"				
			},
			messages: {
				cate_name: "Category name required",
				cate_title: "Category title required",				
				parent_id: "Business Category required"
			},
			
			submitHandler: function(form) {
			  form.submit();
			}
			
		});
		
	}); */
 
	</script>

	
<style>
.bgnone {
	background-color: transparent;
}
</style>
<?php 
$input_div_open = '<div class="form-group col-md-4 ">';
$input_div_close = '</div>';
$required = ' <abbr class="required"><i class="fa fa-asterisk"></i></abbr>';
$action = 'banner/process';
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Add Business Category
        <?php //echo lang('add_category');?>
        <!--<small><?php echo lang('add_category');?></small>-->
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
				<li ><a href="<?php echo base_url('category/bclist');?>">Business Category</a></li>
				<li class="active"><?php echo lang('add_category');?></li>
			 </ol>
              <!--<h3 class="box-title"><?php echo lang('category_form');?></h3>-->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" name="business_category" id="b_category" action="<?php echo base_url('category/process');?>" enctype="multipart/form-data">
				<div class="box-body">
					
					
					
					<div class="form-group">
					  <label for=""><?php echo lang('category_name');?></label>
					  <input type="text" class="form-control" id="b_cate_name" name="b_cate_name" placeholder="Category name" value="">
					  <?php echo form_error('b_cate_name');?>
					</div>
					<!--<div class="form-group">
					  <label for="exampleInputFile"><?php echo lang('category_image');?></label>
					  <input type="file" name="image" size="20">
					</div>-->
					
					<div class="form-group">
						<label for="exampleInputFile"><?php echo lang('category_image');?></label>
						<div class="input-group" style="width:30%;">
							<input type="text" name="image" class="form-control"  readonly>
							<label class="input-group-btn">
								<span class="btn btn-primary">
									Browse&hellip; <input type="file" name="image" style="display: none;" >
								</span>
							</label>
							
						</div>	
						<?php echo form_error('image');?>
					</div>
					<div class="row clearfix">
        <div class="col-md-12 column">
            <table class="table table-bordered table-hover" id="table_id">
                <thead>
                    <tr>
                   
                    <th class="text-center">Country</th>
                    <th class="text-center">Language</th>
                    <th class="text-center">Category Name</th>
                    <th class="text-center">Category Name</th>
                    <th class="text-center">Add</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id='addr0'>
                        <td>
							<select name="country_id[]" id="country_id0" class="form-control select2" onChange="getState(this.value,0);">
								<option value="">Select Country</option>
								<?php
								foreach($countries as $country) {
								?>
								<option value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>
								<?php
								}
								?>

							</select>
                        </td>
                        <td>
							<select name="language_id[]" id="state-list0" class="form-control select2">
								<option value="">Select Language</option>
							</select>
                        </td>
						<td><input type="text" name ="b_cate_cname[]" class="form-control" value="b_cate_cname"></td>
						<td>
							<div class="form-group">
								<div class="input-group" >
									<input type="text" name="image3" class="form-control"  readonly >
									<label class="input-group-btn">
										<span class="btn btn-default">
											Browse&hellip; <input type="file" name="image3" style="display: none;" >
										</span>
									</label>
								</div>	
								<?php echo form_error('image');?>
							</div>
						</td>
						<td>
							<img src="<?php echo base_url('public/admin/images/add.png');?>" id="add_row">
						</td>
                    </tr>
                    <tr id="add_new_row1"></tr>
                   
                    
                  
                    
  
                </tbody>
            </table>
        </div>
    </div>
					
					
				
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?php echo base_url('category');?>"  class="btn btn-danger">Cancel</a>
				</div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
	 <script type="text/javascript">
 $(document).ready(function(){
      var row_id = 1;
     $("#add_row").click(function(){
		$.ajax({
			url: '<?php echo base_url();?>category/ajax_createGrid/',
			type: 'POST',
			datatype: 'json',
			data: {'row_id':row_id},
			success: function(response){
				if(response){
					obj = JSON.parse(response);
					$('#add_new_row'+row_id).append(obj.html);
					row_id++;
					$('#table_id').append('<tr id="add_new_row'+row_id+'"></tr>');
				}
			},
		}); 
	});
	
	 
	
});   

function removeRow(removeNum) {
jQuery('#add_new_row'+removeNum).remove();
}
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

  <script>
  $(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});
  </script>
  