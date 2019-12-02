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
            <form method="post" action="<?php echo base_url('banner/editBanner/'.$fetchmodule[0]['id']);?>" enctype="multipart/form-data" id="frm_subadmin">
				<?php if($fetchmodule[0]){?>
				<div class="box-body">
				<div class="form-group">
					<label for=""><?php echo lang('news_business_select');?></label>
					<input type="text" class="form-control" id="business_category_id" name="business_category_id" placeholder="Country Name" value="<?php echo $fetchmodule[0]['business_name']; ?>" readonly>
				</div>
				<div class="form-group">
					  <label for=""><?php echo lang('banner_name');?></label>
					  <input type="text" class="form-control" id="banner_name" name="banner_name" placeholder="Banner Name" value="<?php echo $fetchmodule[0]['banner_name']; ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('image_upload');?></label>
					  <input type="file" name="mainimage" id="mainimage" size="20" />
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
				<tr id='addr<?php echo $country['id']; ?>' <?php if($country['is_active'] == 0) { ?> style='background-color:#2222291a;' <?php } ?>>
                        <td><?php echo $i; ?></td>
                        <td>
						<?php echo $country['country_name']; ?>
                        </td>
                        <td>
                        <?php echo $country['language_name']; ?>
	                    </td>
						<td>
                        <?php echo $country['banner_link']; ?>
	                    </td>
						<td>
						<?php echo $country['start_date']; ?>
                        </td>
						<td>
						<?php echo $country['end_date']; ?>
                        </td>
						<td>
						<?php echo $country['sequence']; ?>
						<form id="frm2_<?php echo $country['id']; ?>" method="post" action="">
      <input type="image" src="<?php echo base_url();?>public/admin/images/Cross.png" id="deletecountry<?php echo $country['id']; ?>" onclick="ajaxdelete('<?php echo $country['id']; ?>');return false;" title="Delete Country" style="width:10%; float:right;" />
      </form>
                        </td>
                    </tr>
				<?php $i++; } }?>	
                    <tr id='addr0'>
                        <td><?php echo $i; ?></td>
                        <td>
                       <select name="country_id[]" id="country_id0" class="form-control select2" onChange="getState(this.value,0);">
						<option value="">Select Country</option>
						<?php
						foreach($countries as $country) {
						?>
						<option value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>
						<?php } ?>
						</select>
                        </td>
                        <td>
                        <select name="language_id[]" id="state-list0" class="form-control select2">
						<option value="">Select Language</option>
						</select>
                        </td>
						<td>
                         <input type="text" placeholder="Banner Link" class="form-control" id="bannerlink0" name="banner_link[]" />
                        </td>
						<td>
                         <input type="text" class="form-control datepicker" id="datefrom0" name="start_date[]" />
                        </td>
						<td>
                         <input type="text" class="form-control datepicker" id="dateend0" name="end_date[]" />
                        </td>
						<td>
                        <input type="text" name="sequence[]" placeholder="Sequence" class="form-control" onkeypress="return isNumberKey(event)" maxlength="2" />
                        </td>
                    </tr>
                    <tr id='addr<?php echo $i; ?>'></tr>
                </tbody>
            </table>
        </div>
    </div>
    <a id="add_row" class="btn btn-default pull-left">Add Row</a>
	<a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
				</div>
				
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><select id='country_id"+i+"' name='country_id[]' class='form-control select2' onChange='getState(this.value,"+i+");'><option value=''>Select Country</option><?php foreach($countries as $country) { ?><option value='<?php echo $country->country_id; ?>'><?php echo $country->country_name; ?></option><?php } ?></select></td><td><select name='language_id[]' id='state-list"+i+"' class='form-control select2'><option value=''>Select Language</option></select></td><td><input type='text' name='banner_link[]' id='bannerlink"+i+"' placeholder='Banner Link' class='form-control' /></td><td><input type='text' class='form-control datepicker' id='datefrom"+i+"' name='start_date[]' /></td><td><input type='text' class='form-control datepicker' id='dateend"+i+"' name='end_date[]' /></td><td><input type='text' name='sequence[]' id='sequence"+i+"' placeholder='Sequence' class='form-control' onkeypress='return isNumberKey(event)' maxlength='2' /></td>");
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
				//$("#addr" + deletecon).remove();
				$("#addr" + deletecon).css('background-color', '#2222291a');
			}
			});
		}
	} 
  </script>