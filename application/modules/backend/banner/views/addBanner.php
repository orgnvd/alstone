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
<?php if($this->session->flashdata('error_image')){ ?>
	<div class="alert alert-danger alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
		<strong>Oops!</strong> <?php echo $this->session->flashdata('error_image'); ?>
	</div>
<?php } ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('add_banner');?>
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
        <li class="active"><?php echo lang('add_banner');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?= validation_errors(); ?>
            <?php $attributes = array('id' => 'frm_subadmin', 'name'=>'frm_subadmin');
			echo form_open_multipart('banner/addBanner', $attributes); ?>
				<div class="box-body">
					<div class="form-group">
					  <label for=""><?php echo lang('banner_name');?>*</label>
					  <input type="text" class="form-control" id="banner_name" name="banner_name" placeholder="Banner Name" value="<?php echo set_value('banner_name'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('banner_image');?>*</label>
					  <input name="mainimage" type="file" id="mainimage" />
					  <span class="imagesize">(Image size should be 1920 x 574)</span>
					  <?php echo form_error('mainimage');?>
					</div>
					<div class="row clearfix">
        
    </div>
    <a id="add_row" class="btn btn-default pull-left">Add Row</a>
	<a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
	
					</div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
				<a href="<?php echo base_url('banner');?>" class="btn btn-danger">Cancel</a>
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
 <script type="text/javascript">
 $(document).ready(function(){
      var i=1;
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
				'business_category_id': {required: true},
				'banner_name': {required: true},
				'mainimage': {required: true},
				'country_id[]': {required: true},
				'language_id[]': {required: true},
				'banner_link[]': {required: true},
				'start_date[]': {required: true},
				'end_date[]': {required: true}
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
	var i = 1;
	$("#add_row").click(function(){
    $('#datefrom'+i).datepicker({ 
		todayBtn:  1,
        autoclose: true,
		format: 'yyyy-mm-dd',
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#dateend'+i).datepicker('setStartDate', minDate);
    });
    $('#dateend'+i).datepicker({ 
		todayBtn:  1,
        autoclose: true,
		format: 'yyyy-mm-dd',
    }).on('changeDate', function (selected) {
            var maxDate = new Date(selected.date.valueOf());
            $('#datefrom'+i).datepicker('setEndDate', maxDate);
        });
	i++;
	});
	//$('#datefrom0').datepicker({ format: 'yyyy-mm-dd' });
    //$('#dateend0').datepicker({ format: 'yyyy-mm-dd' });
	$("#datefrom0").datepicker({
        todayBtn:  1,
        autoclose: true,
		format: 'yyyy-mm-dd',
    }).on('changeDate', function (selected) {
        var minDate1 = new Date(selected.date.valueOf());
        $('#dateend0').datepicker('setStartDate', minDate1);
    });

    $("#dateend0").datepicker({
        todayBtn:  1,
        autoclose: true,
		format: 'yyyy-mm-dd',
    }).on('changeDate', function (selected) {
            var maxDate1 = new Date(selected.date.valueOf());
            $('#datefrom0').datepicker('setEndDate', maxDate1);
        });
	$("#delete_row").click(function(){
         if(i>1){
         $("#datefrom"+(i-1)).datepicker();
         $("#dateend"+(i-1)).datepicker();
         i--;
         }
     });
	});
  </script>