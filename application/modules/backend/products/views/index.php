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
    <a href="#" class="close" data-dismiss="alert" aria-label="close"><span class="closebtn">&times;</span> </a>
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
					<li class="active"><a href=""><?php echo lang('product_list');?></a></li>
					<a href="<?php echo base_url('products/add');?>">
					<button type="submit" class="btn btn-primary pull-right"><?php echo lang('add_product');?></button>
				</a>
				</ol>
				
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><?php echo lang('title_name');?></th>
                  <th><?php echo lang('slug');?></th>
                  <th><?php echo lang('status');?></th>
                  <th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php if(!empty($product_list)) : ?>
					<?php foreach($product_list as $key=>$value) : ?>
					<tr> 
					<td><?php echo $value['product_title'];?></td>
					<td><?php echo $value['product_slug'];?></td>
					 
					<td>
						<div class="static_page_status_<?php echo $value['id'] ?>">
                        <?php if ($value['product_status'] == '1') { ?>
                        <a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $value['id'] ?>" static_pagestatus="0"  class="label-success statuslabel label label-default status_active"> Active </a>
                        <?php } else { ?>
                        <a title="De-activate"  href="javascript:void(0);" static_pageid="<?php echo $value['id'] ?>" static_pagestatus="1"  class="label-danger statuslabel label label-default status_active"> De-active </a>
                        <?php } ?>
						</div>
					</td>
					<td>
					  <a class="btn btn-success" title="Edit" href="<?php echo base_url('products/edit/'. $value['id']); ?>" style="padding: 0px 4px;"><i class="fa fa-edit"></i></a>
					  <a class="btn btn-danger"  href="<?php echo base_url('products/delete/' . $value['id']); ?>" title="Delete" style="padding: 0px 4px;" ><i class="fa fa-trash"></i></a>
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
 
 
  <script>

  $(document).ready(function() {
     $("#example1").DataTable();
        $(document).on('click', '.status_active', function() {
			static_page_id = $(this).attr('static_pageid');
            status = $(this).attr('static_pagestatus');
            if (status == '1') {
                status = '1';
                var r = confirm("Are you sure you want to De-activate");
            } else {
                var r = confirm("Are you sure you want to Activate");
            }
            if (r == true) {
                $.post('<?php echo base_url() ?>products/ajax_getcmsstatus', {'static_page_id': static_page_id, 'status': status}, function(data) {
                    if (data) {
                        $('.static_page_status_' + static_page_id).html(data);
                    }
            });
			}
        });
});
	
  $(function () {
   $("#example1").DataTable( {
		aaSorting: [],
		pageLength: 25,
		paging: true,
		bFilter: true,
		bInfo: false,
		bSortable: false,
		bRetrieve: true,

		aoColumnDefs: [

                {"aTargets": [0], "bSortable": true},

                {"aTargets": [1], "bSortable": true},

                {"aTargets": [2], "bSortable": false},

                {"aTargets": [3], "bSortable": false},

                {"aTargets": [4], "bSortable": false},

                {"aTargets": [5], "bSortable": false}

            ]

	

	});

  });

  

  $(document).ready(function() {

        $(document).on('click', '.status_active', function() {
			row_id = $(this).attr('row_id');
            status = $(this).attr('status');
			//alert(row_id);
            if (status == '1') {
                var r = confirm("Are you sure you want to Activate");
            } else {
                var r = confirm("Are you sure you want to De-Activate");
            }
            if (r == true){
                $.ajax({
					url: '<?php echo base_url();?>products/updateStatus/',
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

