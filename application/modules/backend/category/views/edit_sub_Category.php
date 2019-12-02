
<script>
	$(document).ready(function() {
		$("#b_category").validate({
			rules: {
				cate_name: "required",
				cate_title: "required",				
				//parent_id: "required"				
			},
			messages: {
				cate_name: "Category name required",
				cate_title: "Category title required",				
				//parent_id: "Business Category required"
			},
			
			submitHandler: function(form) {
			  form.submit();
			}
			
		});
		
	});
 
	</script>
<style>
	.bgnone {
		background-color: transparent;
	}
	.table > tbody > tr > td{padding: 8px 8px 0px;}
	.btn {
    border-radius: 0px;
    padding: 6px 24px;
}
.toggle-handle {
    border-radius: -10px !important;
    padding: 7px 24px !important;
}
.toggle-on.btn {
   border-radius: 30px !important;
    padding: 7px 24px !important;
}
.toggle-off.btn {
     border-radius: 30px !important;
    padding: 7px 24px !important;
	
}
.toggle.btn {
    border-radius: 30px !important;
    padding: 7px 24px !important;
}
.toggle.btn {
    min-width: 40px;
    min-height: 14px;
    width: 40px !important;
    height: 24px !important;
}
	</style>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?php echo lang('edit_category');?>
        <!--<small><?php echo lang('edit_category');?></small>-->
      </h1>     
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
				<ol class="breadcrumb bgnone">
					<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?php echo lang('home');?></a></li>
					<li><a href="<?php echo base_url('category');?>"><?php echo lang('category');?></a></li>
					<?php 
					foreach($bradecumb as $bvalue){ ?>
					<li class="active"><a href="<?php echo base_url('category/subCategory/'.$bvalue['cate_id']);?>"><?php echo $bvalue['cate_name'];?></a></li>
					<?php	} ?>
					<li class="active"><?php echo lang('edit_subcategory');?></li>
				</ol>
             <!-- <h3 class="box-title"><?php echo lang('category_form');?></h3>-->
            </div>
			<?php if($categoryDetail['status']=='true'){
				$value = $categoryDetail['resultSet'];
				$image1 = $value->cate_image;
					if(isset($image)){
						$image1 = "noimage.jpg";
					}
				?>
            <form method="post" name="business_category" id="b_category" action="<?php echo base_url('category/edit_sub_Category/'.$this->uri->segment(3).'/'.$value->id);?>" enctype="multipart/form-data">
					<!--<div class="form-group">
						  <label for=""><?php echo lang('country_name');?></label>
						  <select name ="country_id" class="form-control select2" style="width: 100%;">
								<option><?php echo lang('select_country');?></option>
								<?php //pr($fetchcountry); die;
									foreach($fetchcountry as $country){?>
									<option value="<?php echo $country->country_id;?>" <?php if($country->country_id == $value->country_id){echo "selected";}?>><?php echo $country->country_name;?></option>
								<?php } 
								?>
							</select>
					</div>-->
						
				
				<div class="box-body" >
					<div class="form-group">
					  <label for=""><?php echo lang('category_name');?></label>
					  <input type="text" class="form-control" id="cate_name" name="cate_name" value="<?php echo $value->cate_name;?>" placeholder="Category name">
					</div>
					
					<!--<div class="form-group">
					  <label for=""><?php echo lang('category_title');?></label>
					  <input type="text" class="form-control" id="cate_title" name="cate_title" value="<?php echo $value->cate_title; ?>" placeholder="Category title" required>
					</div>-->
				
					<!--<div class="form-group">
					  <label for="exampleInputEmail1"><?php echo lang('business_category');?></label>
						<select name ="parent_id" class="form-control select2" style="width: 100%;">
							<option value=""><?php echo lang('select_business_category');?></option>
							<option value="1"><?php echo lang('business_category');?></option>
							<?php if($category_list['status']=='true'){ 
								foreach($category_list['resultSet'] as $val){?>
								<option value="<?php echo $val->id;?>" <?php if($val->id == $value->parent_id){echo "selected";}?> ><?php echo $val->cate_name;?></option>
							<?php } }?>
						</select>
					</div>-->
					<!--<div class="form-group">
					<label><?php echo lang('description');?></label>
						<textarea id="editor1" name="cate_description" class="form-control" rows="10"><?php echo $value->cate_description ;?></textarea>
					</div>-->
					<div class="form-group">
						<label for="exampleInputFile"><?php echo lang('category_image');?></label>
						<div class="input-group" style="width:30%;">
							<input type="text" name="image" class="form-control"  readonly>
							<label class="input-group-btn">
								<span class="btn btn-default">
									Browse&hellip; <input type="file" name="image" style="display: none;" >
								</span>
							</label>
							
						</div>	
						<img src="<?php echo base_url('images/category/'.$image1);?>" style="width: 20%;padding: 17px 0 !important;"alt="image" />
					</div>	
					<div class="form-group">
					  <label for=""><?php echo lang('meta_title');?></label>
					  <input type="text" maxlength="30" class="form-control" id="meta_title" name="meta_title" placeholder="Category Meta Title" value="<?php echo $value->meta_title;?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('meta_keyword');?></label>
					  <input type="text" maxlength="50" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Category Meta Keyword" value="<?php echo $value->meta_keyword;?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('meta_description');?></label>
					  <textarea id="meta_description" class="form-control" name="meta_description" placeholder="Category Meta Description"><?php echo $value->meta_description;?></textarea>
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
								<?php $i=count($categoryDetail['resultSet2']);
								
								foreach($categoryDetail['resultSet2'] as $value){ 
									//pr($value); die;
								?>
									<tr id='addr0'>
										<td>
											<select name="country_id[]" id="country_id<?php echo $i;?>" class="form-control select2" onChange="getState(this.value,<?php echo $i;?>);">
												<option value="">Select Country</option>
												<?php
												foreach($countries as $country) {
												?>
												<option value="<?php echo $country->country_id; ?>" <?php if($value->country_id == $country->country_id){echo "selected";}?>><?php echo $country->country_name; ?></option>
												<?php
												}
												?>

											</select>
										</td>
										<td>
											<select name="language_id[]" id="state-list<?php echo $i;?>" class="form-control select2">
												<option value="">Select Language</option>
												<?php  $list = getCountryLanguage($value->country_id);
													foreach($list as $valu){ ?>
														<option value="<?php echo $valu->language_id;?>" <?php if($valu->language_id == $value->language_id){echo "selected"; }?>><?php echo $valu->language_name;?></option>
													<?php } 
												?>
											</select>
										</td>
										<td><input type="text" name ="b_cate_cname[]" class="form-control" value="<?php echo $value->b_cate_cname; ?>"></td>
										<td>
											<div class="form-group">
												<label class="input-group-btn">
													<span class="btn btn-" style="position:relative;">
														<input type="file" name="image2[]" >
														<input type="hidden" name="h_image[]" value="<?php echo $value->b_cate_cimage;?>">
													<?php if($value->b_cate_cimage){?>
														<img src="<?php echo base_url('images/category/thumb/'.$value->b_cate_cimage);?>" alt="image" style="width:14%;float: right;">
													<?php }else{?>
														<img src="<?php echo base_url('images/noimage.jpg');?>" alt="image" style="width:14%;float: right;">
													<?php }?>
													</span>
												</label>
											</div>
										</td>
										<td> 
										<?php if($value->status==1){
											$checked = "checked";
											$status = 0;
										}else{
											$checked="";
											$status = 1;
										}
										?>
										<!--<label class="checkbox-inline" onclick="fffff('<?php echo $value->id.'_'.$status;?>');">
										  <input <?php echo $checked;?> data-toggle="toggle" type="checkbox" >
										</label>-->
										<input type="hidden" id="update_status_value<?php echo $value->id ?>" name="update_status[]" value="<?php echo @$value->status;?>">
										<div class="kk<?php echo $value->id ?>">
										<?php if ($value->status == 1) { ?>
										<a title="Active"  href="javascript:void(0);" onclick="fffff('<?php echo $value->id.'_'.$status;?>');" class="label-success statuslabel label label-default status_active"> Active </a>
										<?php } else { ?>
										<a title="De-Activate"  href="javascript:void(0);"  onclick="fffff('<?php echo $value->id.'_'.$status;?>');" class="label-danger statuslabel label label-default status_active"> De-Active </a>
										<?php } ?>
										</div>
										<?php if($i==1){?>
											<img src="<?php echo base_url('public/admin/images/add.png');?>" id="add_row">
										<?php } ?>
										</td>
									</tr>
									<?php $i--;
									
									} ?>
									<tr id="add_new_row1"></tr>
								   
									
								  
									
				  
								</tbody>
							</table>
						</div>
					
					</div>
					
					<button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?php echo base_url('category/subCategory/'.$this->uri->segment(3));?>"  class="btn btn-danger">Cancel</a>
						
				
                
              </div>
			 <?php }else{}?>
            </form>
          </div>
        </div>
      </div>
    </section>

  <script type="text/javascript">
 $(document).ready(function(){
      var row_id = 1;
	  var h = '<?php echo $this->uri->segment(3);?>';
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
	removeNum--;
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

function fffff(val){
	var value = val.split('_');
	var id = value[0];
	var status = value[1];
	
	if (status == '1') {
		var r = confirm("Are you sure you want to Activate");
	} else {
		var r = confirm("Are you sure you want to De-Activate");
	}
	if (r == true){
		$.ajax({
			url: '<?php echo base_url();?>category/business_cate_lang_status/',
			type: 'POST',
			datatype: 'json',
			data: {'id':id, 'status':status},
			success: function(response){
				if(response){
					obj = JSON.parse(response);
					if(obj.status == 'true'){
						$(".kk"+id).html(obj.html);
						$("#update_status_value"+id).val(status);
						return false;
					}
				}
			},
		});
	}	
}
  </script>