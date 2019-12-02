<style>
.bgnone {
	background-color: transparent;
}
</style>
<div class="content-wrapper">
<?php if($this->session->flashdata('success_message')){ ?>
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		<strong>Success!</strong> <?php echo $this->session->flashdata('success_message'); ?>
	</div>
<?php }else if($this->session->flashdata('error_message')){ ?>
	<div class="alert alert-danger alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		<strong>Oops!</strong> <?php echo $this->session->flashdata('error_message'); ?>
	</div>
<?php } ?>
	
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Business Category
        <!--<small><?php echo lang('category_list');?></small>-->
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
	
      <div class="row">
	  
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header" >
				<ol class="breadcrumb bgnone">
					<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?php echo lang('home');?></a></li>
					<li class="active">Business Category</li>
					
					<a href="<?php echo base_url('category/addBusinessCategory');?>">
						<button type="submit" class="btn btn-primary pull-right">Add</button>
					</a>
				</ol>
				
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                
				 <th style="width:10%;"><?php echo "Image";?></th>
                  <th><?php echo lang('category');?></th>
                  <th><?php echo "Last Modified on";?></th>
             
                  <th><?php echo lang('status');?></th>
                  <th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php 
				/* $user_id = 18;
				$h = encode_id($user_id);
				echo "encode -".$h.'<br>';
				echo "sdfsdf -".decode_id($h); */
				if(($category_list['status'])== 'true'){ 
					$i=1;
					foreach($category_list['resultSet'] as $value){
						//pr($value); die;
						$image = $value->b_cate_image;
						if(!$image){
							$image = "noimage.jpg";
						}
						?>
					<tr>
						<td><img src="<?php echo base_url('images/category/'.$image);?>" style="width:100%;"></td>
						<td><a href="<?php echo base_url('category/editBusinessCategory/'.$value->business_id)?>"><?php echo $value->business_name;?></a></td>
						
						
						<td><?php echo $value->created_date;?></td>
						<td><!--<span style="background-color: rgb(0, 166, 90);color: white;font-size: 13px;">Active</span>-->
						<div class="row_status_<?php echo $value->business_id ?>">
                        <?php if ($value->is_active == 1) { ?>
                        <a title="Active"  href="javascript:void(0);" row_id="<?php echo $value->business_id ?>" status="0" class="label-success statuslabel label label-default status_active"> Active </a>
                        <?php } else { ?>
                        <a title="De-Activate"  href="javascript:void(0);" row_id="<?php echo $value->business_id ?>" status="1" class="label-danger statuslabel label label-default status_active"> De-Active </a>
                        <?php } ?>
						</div>
						
						</td>
						<td>
						<!--<a class="btn btn-success" href="<?php echo base_url('category/viewCategory/'.$value->business_id)?>" id="viewModelDetail" title="View" style="padding: 0px 4px;"><i class="fa fa-eye"></i></a> -->
						<a class="btn btn-success" href="<?php echo base_url('category/editBusinessCategory/'.$value->business_id);?>" title="Edit" style="padding: 0px 4px;" ><i class="fa fa-edit"></i></a>  
						<!--<a class="btn btn-danger"  href="<?php echo base_url('category/deleteCate/'.$value->business_id);?>" title="Delete" onclick="return confirm('Are you sure want to delete?')" style="padding: 0px 4px;" ><i class="fa fa-trash"></i></a>-->  
						</td>
					</tr>
                <?php $i++; } }?>
                </tbody>
              </table>
            </div>
			 
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper =====================-->

  <script>
  $(function () {
    $("#example1").DataTable( {
		aaSorting: [],
		pageLength: 25,
		paging: true,
		bFilter: true,
		bInfo: false,
		bSortable: true,
		bRetrieve: true,
		aoColumnDefs: [
                {"aTargets": [1], "bSortable": true},
                {"aTargets": [3], "bSortable": true},
                {"aTargets": [4], "bSortable": false}
            ]
	
	});
  });

 
  
  $(document).ready(function() {
        $(document).on('click', '.status_active', function() {
			row_id = $(this).attr('row_id');
            status = $(this).attr('status');
            if (status == '1') {
                var r = confirm("Are you sure you want to Activate");
            } else {
                var r = confirm("Are you sure you want to De-Activate");
            }
            if (r == true){
                $.ajax({
					url: '<?php echo base_url();?>category/updateStatus/',
					type: 'POST',
					datatype: 'json',
					data: {'row_id':row_id,'status':status},
					success: function(response){
						if(response){
						obj = JSON.parse(response);
						$('.row_status_'+row_id).html(obj.data);	
						}
					},
					error: function(){
					   
					}
				});
            }
        });
		
		
		
	});
	
	
  
</script>