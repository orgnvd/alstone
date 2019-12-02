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
        <?php echo lang('category');?>
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
					<li class="active"><?php echo lang('category');?></li>
					
					<a href="<?php echo base_url('category/addCategory');?>">
						<button type="submit" class="btn btn-primary pull-right"><?php echo lang('add_category');?></button>
					</a>
				</ol>
				
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th><?php echo "Category Name";?></th>
					<th><?php echo "Description"; ?></th>
					<th>Last Modified on</th> 
					<th><?php echo lang('status');?></th>
					<th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php 

				if(($category_list['status'])== 'true'){ 
					$i=1;
					foreach($category_list['resultSet'] as $value){
						if($value->modified_date !='0000-00-00 00:00:00'){
							$modified_on = $value->modified_date;
						}else{
							$modified_on = $value->created_date;
						}
						/* $image = $value->catImage;
						if(!$image){
							$image = "noimage.jpg";
						} */
						?>
					<tr>
					 
						<td>
							<a href="<?php echo base_url('category/editCategory/'.$value->id)?>">
								<?php echo $value->title;?>
							</a>
						</td>
						<td> <?php echo $value->description; ?> </td>
						<td><?php echo $modified_on;?></td>
					 
						<td> 
						<div class="row_status_<?php echo $value->id ?>">
                        <?php if ($value->cat_status == 1) { ?>
                        <a title="Active"  href="javascript:void(0);" row_id="<?php echo $value->id ?>" status="0" class="label-success statuslabel label label-default status_active"> Active </a>
                        <?php } else { ?>
                        <a title="De-Activate"  href="javascript:void(0);" row_id="<?php echo $value->id ?>" status="1" class="label-danger statuslabel label label-default status_active"> De-Active </a>
                        <?php } ?>
						</div>
						
						</td>
						<td>
						 
						<a class="btn btn-success" href="<?php echo base_url('category/editCategory/'.$value->id)?>" id="viewModelDetail" title="Edit Gallery" style="padding: 0px 4px;"><i class="fa fa-edit"></i></a> 
						<a class="btn btn-danger"  href="<?php echo base_url('category/deleteCate/'.$value->id);?>" title="Delete" onclick="return confirm('Are you sure want to delete?')" style="padding: 0px 4px;" ><i class="fa fa-trash"></i></a> 
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
    $("#example2").DataTable( {
		aaSorting: [],
		pageLength: 25,
		paging: true,
		bFilter: true,
		bInfo: false,
		bSortable: true,
		bRetrieve: true,
		aoColumnDefs: [
                {"aTargets": [0], "bSortable": true},
                {"aTargets": [1], "bSortable": true},
                {"aTargets": [2], "bSortable": true},
                {"aTargets": [3], "bSortable": true},
                {"aTargets": [4], "bSortable": true},
                {"aTargets": [5], "bSortable": false}
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