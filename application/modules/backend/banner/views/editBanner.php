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

function getCheckCountryExist(val,id) {
	var countryid = $("#country_id"+id).val();
	var bannerid = $("#banner_id").val();
	$.ajax({
	type: "POST",
	url: "<?php echo base_url();?>banner/checkcountryidexistt",
	//data:'country_id='+val,
	data:'language_id='+ val + '&country_id='+ countryid + '&bannerid='+ bannerid,
	success: function(data){
		//alert(data);
		if(data == '1')
		{
		$("#checkcountryidexist"+id).show();
		} else {
		$("#checkcountryidexist"+id).hide();	
		}
	}
	});
}

</script>
<div class="content-wrapper">
<?php if($this->session->flashdata('error_image')){ ?>
	<div class="alert alert-danger alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
		<strong>Oops!</strong> <?php echo $this->session->flashdata('error_image'); ?>
	</div>
<?php } ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('update_banner');?>
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
        <li ><a href="<?php echo base_url('banner');?>"><?php echo lang('banner');?></a></li>
        <li class="active"><?php echo lang('update_banner');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?= validation_errors(); ?>
            <form method="post" action="<?php echo base_url('banner/editBanner/'.$fetchmodule[0]['id']);?>" enctype="multipart/form-data" id="frm_subadmin">
				<?php if($fetchmodule[0]){?>
				<div class="box-body">
				<div class="form-group">
					<label for=""><?php echo lang('news_business_select');?></label>
					<input type="text" class="form-control" id="business_category_id" name="business_category_id" placeholder="Country Name" value="<?php echo $fetchmodule[0]['cate_name']; ?>" readonly>
				</div>
				<div class="form-group">
					  <label for=""><?php echo lang('banner_name');?></label>
					  <input type="text" class="form-control" id="banner_name" name="banner_name" placeholder="Banner Name" value="<?php echo $fetchmodule[0]['banner_name']; ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('image_upload');?></label>
					  <input type="file" name="mainimage" id="mainimage" size="20" />
					  <span class="imagesize">(Image size should be 1920 x 574)</span>
					  <input type="hidden" name="old_banner_image" id="old_banner_image" value="<?php echo $fetchmodule[0]['banner_image'];?>" />
					  <img src="<?php echo base_url();?>/images/banner/<?php echo $fetchmodule[0]['banner_image'];?>" width="200px" />
					  
					  <input type="hidden" id="business_category_id" name="business_category_id" value="<?php echo $fetchmodule[0]['business_category_id']; ?>">
					</div>
					<div class="row clearfix">
        <div class="col-md-12 column">
            <table class="table table-bordered table-hover" id="tab_logic">
                <thead>
                    <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Country</th>
                    <th class="text-center">Language</th>
					<th class="text-center">Banner Link</th>
                    <th class="text-center">Start Date</th>
                    <th class="text-center">End Date</th>
                    <th class="text-center">Sequence</th>
                    </tr>
                </thead>
                <tbody>
				<?php
				$i = 1;
				//pr($fetchmodule[0]['country']);
				if(!empty($fetchmodule[0]['country'])){
					
						foreach($fetchmodule[0]['country'] as $country) {
						?>
				<tr id='addr<?php echo $i; ?>'>
                        <td><?php echo $i; ?></td>
                        <td>
                       <select name="country_id[]" id="country_id<?php echo $i; ?>" class="form-control select2" onChange="getState(this.value,<?php echo $i; ?>);">
						<option value="">Select Country</option>
						<?php
						foreach($countries as $country1) {
						?>
						<option value="<?php echo $country1->country_id; ?>" <?php if($country1->country_id == $country['country_id'] ) { echo "selected"; } ?> ><?php echo $country1->country_name; ?></option>
						<?php } ?>
						</select>
                        </td>
                        <td>
                        <select name="language_id[]" id="state-list<?php echo $i; ?>" class="form-control select2">
						<option value="">Select Language</option>
						<?php  $list = getCountryLanguage($country['country_id']);
						//pr($list); exit;
							foreach($list as $valu){ ?>
								<option value="<?php echo $valu->language_id;?>" <?php if($valu->language_id == $country['language_id']){echo "selected"; }?>><?php echo $valu->language_name;?></option>
							<?php } 
						?>
						</select>
                        </td>
						<td>
                         <input type="text" placeholder="Banner Link" class="form-control" id="bannerlink<?php echo $i; ?>" name="banner_link[]" value="<?php echo $country['banner_link']; ?>" />
                        </td>
						<td>
                         <input type="text" class="form-control datepicker" id="datefrom<?php echo $i; ?>" name="start_date[]" value="<?php echo $country['start_date']; ?>" />
                        </td>
						<td>
                         <input type="text" class="form-control datepicker" id="dateend<?php echo $i; ?>" name="end_date[]" value="<?php echo $country['end_date']; ?>" />
                        </td>
						<td>
                        <input type="text" id="sequence<?php echo $i; ?>" name="sequence[]" placeholder="Sequence" class="form-control" onkeypress="return isNumberKey(event)" maxlength="2" value="<?php echo $country['sequence']; ?>" />
					<?php if($country['is_active'] == '1') { ?>
					<a href="javascript:void(0);" id="deletecountry<?php echo $country['id']; ?>" onclick="ajaxdelete('<?php echo $country['id']; ?>');return false;" data-original-title="Deactivate" data-toggle="tooltip" style="float: right; width: 14px;"><i class="glyphicon glyphicon-ok-circle"></i></a>
					
					<a href="javascript:void(0);" style="display:none;" id="activatecountry<?php echo $country['id']; ?>" onclick="ajaxactivate('<?php echo $country['id']; ?>');return false;" data-original-title="Activate" data-toggle="tooltip" style="float: right; width: 14px;"><i class="glyphicon glyphicon-remove-circle"></i></a>
					<?php } else { ?>
					<a href="javascript:void(0);" id="activatecountry<?php echo $country['id']; ?>" onclick="ajaxactivate('<?php echo $country['id']; ?>');return false;" data-original-title="Activate" data-toggle="tooltip" style="float: right; width: 14px;"><i class="glyphicon glyphicon-remove-circle"></i></a>
					
					<a href="javascript:void(0);" style="display:none;" id="deletecountry<?php echo $country['id']; ?>" onclick="ajaxdelete('<?php echo $country['id']; ?>');return false;" data-original-title="Deactivate" data-toggle="tooltip" style="float: right; width: 14px;"><i class="glyphicon glyphicon-ok-circle"></i></a>
					<?php } ?>
					<input type="hidden" id="is_active<?php echo $country['id']; ?>" name="is_active[]" value="<?php echo $country['is_active']; ?>" />
                        </td>
                    </tr>
				<?php $i++; } }?>	
                    
                    <tr id='addr<?php echo $i; ?>'></tr>
                </tbody>
            </table>
        </div>
    </div>
    <a id="add_row" class="btn btn-default pull-left">Add Row</a>
	<a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
				</div>
			<input type="hidden" id="banner_id" name="banner_id" value="<?php echo $fetchmodule[0]['id']; ?>" />	
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo base_url('banner');?>" class="btn btn-danger">Cancel</a>
              </div>
			  <?php }else{
					echo $fetchmodule['message'];
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
  <script type="text/javascript">
 $(document).ready(function(){
      var i=<?php echo $i; ?>;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i) +"</td><td><select id='country_id"+i+"' name='country_id[]' class='form-control select2' onChange='getState(this.value,"+i+");'><option value=''>Select Country</option><?php foreach($countries as $country) { ?><option value='<?php echo $country->country_id; ?>'><?php echo $country->country_name; ?></option><?php } ?></select></td><td><select name='language_id[]' id='state-list"+i+"' class='form-control select2' onChange='getCheckCountryExist(this.value,"+i+");'><option value=''>Select Language</option></select><div style='display:none;' id='checkcountryidexist"+i+"'>Select another country and language</div></td><td><input type='text' name='banner_link[]' id='bannerlink"+i+"' placeholder='Banner Link' class='form-control' /></td><td><input type='text' class='form-control datepicker' id='datefrom"+i+"' name='start_date[]' /></td><td><input type='text' class='form-control datepicker' id='dateend"+i+"' name='end_date[]' /></td><td><input type='text' name='sequence[]' id='sequence"+i+"' placeholder='Sequence' class='form-control' onkeypress='return isNumberKey(event)' maxlength='2' /><input type='hidden' id='is_active"+i+"' name='is_active[]' value='1' /></td>");
	  $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
         if(i>1){
         $("#addr"+(i-1)).html('');
         i--;
         }
     });
});
</script>
<script>
	function isNumberKey(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
	return false;

	return true;
	}
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
            rules: {
			   business_category_id: "required",
			   banner_name: {
				   required : true,
				   noSpace : true,
				   lettersonly : true
			   },
               banner_link: {
				   required : true,
				   noSpace : true
			   },
               mainimage: {
      				extension: true
    			}
            },
            messages: {
				business_category_id: "Business Category is required",
				banner_name: "Banner Name is required",
                banner_link: "Banner Link is required",
                mainimage: {
                 extension:"Please upload correct Extension"
				},
            },
	submitHandler: function(form) {
			  form.submit();
			}
			
		});
	});
 </script>
 <script src="<?php echo base_url() . "public/admin/css/datepicker/bootstrap-datepicker.js" ?>"></script>
<link rel="stylesheet" href="<?php echo base_url() . "public/admin/css/datepicker/datepicker3.css" ?>">
  <script>
  
  $(function() {
	var i = <?php echo $i; ?>;
	$("#add_row").click(function(){
    $('#datefrom'+i).datepicker({ format: 'yyyy-mm-dd' });
    $('#dateend'+i).datepicker({ format: 'yyyy-mm-dd' });
	i++;
	});
	$('#datefrom0').datepicker({ format: 'yyyy-mm-dd' });
    $('#dateend0').datepicker({ format: 'yyyy-mm-dd' });
	$("#delete_row").click(function(){
         if(i>1){
         $("#datefrom"+(i-1)).datepicker();
         $("#dateend"+(i-1)).datepicker();
         i--;
         }
     });
	});
	
	function ajaxdelete(deletecon){
	var ok = confirm("Are you sure to Deactivate this entry?")
	if (ok)
		{
			$.ajax({
			url: "<?php echo base_url(); ?>" + "banner/deletecountrybanner",
			data:{'delete': deletecon},
			type: "POST",
			success: function(data) 
			{
				is_active = 0;
				document.getElementById("is_active"+ deletecon).value = is_active;
				$("#deletecountry" + deletecon).remove();
				$("#activatecountry" + deletecon).show();
			}
			});
		}
	}

	function ajaxactivate(activecon){
	var ok = confirm("Are you sure to Activate this entry?")
	if (ok)
		{
			$.ajax({
			url: "<?php echo base_url(); ?>" + "banner/activecountrybanner",
			data:{'delete': activecon},
			type: "POST",
			success: function(data) 
			{
				is_active = 1;
				document.getElementById("is_active"+ activecon).value = is_active;
				$("#deletecountry" + activecon).show();
				$("#activatecountry" + activecon).remove();
			}
			});
		}
	}
  </script>