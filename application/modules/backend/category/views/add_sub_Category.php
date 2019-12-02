
<script>
	$(document).ready(function() {
		$("#b_category").validate({
			rules: {
				'country_id[]': {required: true},
				'cate_name': {required: true},
				'image': {required: true},
				'language_id[]': {required: true}
            },
			submitHandler: function(form) {
			  form.submit();
			}
			
		});
		
	});
	
	function getEnglish(val,id) {
		var english = $('#cate_name').val();
		var empty = "";
		if(english !=''){
			if(val == 12){ // pass englsh id static in future we need to changed.
				$('#b_cate_cname'+id).val(english);
			}else{
				$('#b_cate_cname'+id).val(empty);
			}
		}else{
			alert('Please Enter Category Name');
			return false;
		}
	}
 
	</script>
	
<style>
.bgnone {
	background-color: transparent;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('add_category');?>
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
				<li><a href="<?php echo base_url('category');?>"><?php echo lang('category');?></a></li>
				<?php 
				foreach($bradecumb as $bvalue){ ?>
							<li class=""><a href="<?php echo base_url('category/subCategory/'.$bvalue['cate_id']);?>"><?php echo $bvalue['cate_name'];?></a></li>
					<?php	} ?>
				<li class="active"><?php echo lang('add_category');?></li>
			 </ol>
              <!--<h3 class="box-title"><?php echo lang('category_form');?></h3>-->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" name="business_category" id="b_category" action="<?php echo base_url('category/add_sub_Category/'.$this->uri->segment(3));?>" enctype="multipart/form-data">
				<div class="box-body">
					<!--<div class="form-group">
					  <label for=""><?php echo lang('country_name');?></label>
					  <select name ="country_id" class="form-control select2" style="width: 100%;">

							<option><?php echo lang('select_country');?></option>
							<?php //pr($fetchcountry); die;
							if(!empty($fetchcountry)){ 
								foreach($fetchcountry as $value){?>
								<option value="<?php echo $value->country_id;?>"><?php echo $value->country_name;?></option>
							<?php } }
							?>
						</select>
					</div>-->
					
					<div class="form-group">
					  <label for=""><?php echo lang('category_name');?></label>
					  <input type="text" class="form-control" id="cate_name" name="cate_name" placeholder="Category name">
					</div>
					
					<!--<div class="form-group">
					  <label for=""><?php echo lang('category_title');?></label>
					  <input type="text" class="form-control" id="cate_title" name="cate_title" placeholder="Category title" required>
					</div>-->
				
					<!--<div class="form-group">
					  <label for="exampleInputEmail1"><?php echo lang('business_category');?></label>
						<select name ="parent_id" class="form-control select2" style="width: 100%;">
							<option value=""><?php echo lang('select_business_category');?></option>
							<option value="1"><?php echo lang('business_category');?></option>
							<?php //pr($category_list); die;
							if($category_list['status']=='true'){ 
								foreach($category_list['resultSet'] as $value){?>
								<option value="<?php echo $value->id;?>"><?php echo $value->cate_name;?></option>
							<?php } }?>
						</select>
					</div>-->
					
					<!--<div class="form-group">
					  <label for="exampleInputPassword1">Password</label>
					  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					</div>-->
					<!--<div class="form-group">
						<label><?php echo lang('description');?></label>
						<textarea id="editor1" name="cate_description" class="form-control" rows="10"></textarea>
					</div>-->
					<!--<div class="form-group">
					  <label for="exampleInputFile"><?php echo lang('category_image');?></label>
					  <input type="file" name="image" size="20">
					</div>-->
					
					<div class="form-group">
						<label for="exampleInputFile"><?php echo lang('category_image');?></label>
						<div class="input-group" style="width:30%;">
							<input type="text" name="image" class="form-control"  readonly>
							<label class="input-group-btn">
								<span class="btn btn-default">
									Browse&hellip; <input type="file" name="image1" style="display: none;" >
								</span>
							</label>
							
						</div>	
						<div class="clearfix"></div>
							<label id="image-error" class="error" for="image"> </label>
								<div class="clearfix"></div>
						<?php echo form_error('image');?>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('meta_title');?></label>
					  <input type="text" maxlength="30" class="form-control" id="meta_title" name="meta_title" placeholder="Category Meta Title">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('meta_keyword');?></label>
					  <input type="text" maxlength="50" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Category Meta Keyword">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('meta_description');?></label>
					  <textarea id="meta_description" class="form-control" name="meta_description" placeholder="Category Meta Description"></textarea>
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
											<select name="language_id[]" id="state-list0" class="form-control select2" onChange="getEnglish(this.value,0);">
												<option value="">Select Language</option>
											</select>
										</td>
										<td><input type="text" name ="b_cate_cname[]" class="form-control" value="" id="b_cate_cname0" ></td>
										<td>
											<!--<div class="form-group">
												<div class="input-group" >
													<input type="text" name="image3" class="form-control"  readonly >
													<label class="input-group-btn">
														<span class="btn btn-default">
															Browse&hellip; <input type="file" name="image3" style="display: none;" >
														</span>
													</label>
												</div>	
												<?php echo form_error('image');?>
											</div>-->
											<div class="form-group">
												<label class="input-group-btn">
													<span class="btn btn-default">
														<input type="file" name="image2[]" >
													</span>
												</label>
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
                <a href="<?php echo base_url('category/subCategory/'.$this->uri->segment(3));?>"  class="btn btn-danger">Cancel</a>
				</div>
              <!-- /.box-body -->


                
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
	removeNum--
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
              //if( log ) alert(log);
          }

      });
  });
  
});
  </script>
  