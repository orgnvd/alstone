<style>
.bgnone {
	background-color: transparent;
}
.category_text{ color: #3c8dbc; font-size: 18px;  font-weight: bold; padding:6px 0px;}
.category_text1{ color: #000; font-size: 18px; padding: 6px 0px;}
.category_img{ width: 100%; border: #eaeaea 1px solid;  border-radius: 10px;}
.category_box{padding-left: 0px; margin-bottom: 10px;}
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
            <div class="box-header" style="border-bottom: #ececec 1px solid;" >
				<ol class="breadcrumb bgnone">
					<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?php echo lang('home');?></a></li>
					<li><a href="<?php echo base_url('category');?>"><?php echo lang('category');?></a></li>
					<?php if($viewCategory['status']== true){
						$breadcumb = $viewCategory['categoryDetail']['breadcumb'];
						foreach($breadcumb as $bvalue){ ?>
							<li class="active"><a href="<?php echo base_url('category/subCategory/'.$bvalue['cate_id']);?>"><?php echo $bvalue['cate_name'];?></a></li>
					<?php	}
					}?>
					
					
					<a href="<?php echo base_url('category');?>">
						<button type="submit" class="btn btn-primary pull-right"><?php echo lang('category');?></button>
					</a>
				</ol>
				
            </div>
            <!-- /.box-header -->
			<?php 
				
			if($viewCategory['status']== true){
			$categorDetail = $viewCategory['categoryDetail']['category_view'];
			?>
            <div class="box-body">
			<div class="col-md-12">
				<div class="col-md-4 category_box">
					<img src="<?php echo base_url('images/category/'.$categorDetail->cate_image);?>" alt="category image" class="category_img" />
				</div>
				<div class="col-md-6">
					<div class="col-md-12">
						<div class="col-md-6 category_text">Category Name:</div>
						<div class="col-md-6 category_text1"><?php echo $categorDetail->cate_name;?></div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6 category_text">Parent Category Name:</div>
						<div class="col-md-6 category_text1"><?php echo $categorDetail->parent_id;?></div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6 category_text">Category Status:</div>
						<div class="col-md-6 category_text1"><?php echo $categorDetail->is_active;?></div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6 category_text">Created Date:</div>
						<div class="col-md-6 category_text1"><?php echo $categorDetail->created_date;?></div>
					</div>
					<div class="col-md-12">
						<div class="col-md-6 category_text">Create By:</div>
						<div class="col-md-6 category_text1"><?php echo "Super Admin";?></div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
			<div class="form-group category_text">
				<label><?php echo lang('description');?></label>
				<textarea id="editor1" name="cate_description" readonly class="form-control" rows="5" style="background:none; border: #eaeaea 1px solid;" ><?php echo $categorDetail->cate_description;?></textarea>
			</div>

			</div>
              
            </div>
			<?php } ?>
			 
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
    $("#example1").DataTable();
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