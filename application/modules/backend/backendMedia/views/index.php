<style>
.bgnone {
	background-color: transparent;
}
#example1 td span:last-child {
    display: none;
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
      <h1><?php echo lang('product_list');?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header" >
				<ol class="breadcrumb bgnone">
					<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?php echo lang('home');?></a></li>
					<li class="active"><a href=""><?php echo lang('media');?></a></li>
					<a href="<?php echo base_url('backendMedia/add');?>">
					<button type="submit" class="btn btn-primary pull-right"><?php echo lang('add_media');?></button>
				</a>
				</ol>
				
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><?php echo lang('media_title');?></th>
                  <th><?php echo lang('slug');?></th>
                  <th><?php echo lang('status');?></th>
                  <th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php if(!empty($media_list)) : ?>
					
					<?php foreach($media_list as $key=>$value) : ?>
					<tr> 
						<td><?php echo $value['media_title'];?></td>

						<td><?php echo $value['slug'];?></td>
            <td><?php echo $value['status'];?></td>
            <td>
              <a class="btn btn-success" title="Edit" href="<?php echo base_url('backendMedia/editList/'.$value['id']); ?>" style="padding: 0px 4px;"><i class="fa fa-edit"></i></a>
              <a class="btn btn-danger"  href="<?php echo base_url('backendMedia/delete/' . $value['id']); ?>" title="Delete" style="padding: 0px 4px;" ><i class="fa fa-trash"></i></a>
            </td>
						
						
						
					</tr>
        <?php endforeach; ?>
      <?php endif; ?>
               
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
  <!-- /.content-wrapper -->
 

