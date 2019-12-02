<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('news_list');?>
      </h1>
	 </section>
      
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <div class="box-header" >
			
				
				
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><?php echo lang('s_no');?></th>
				  <th><?php echo lang('news_name');?></th>
				  <th>Description</th>
                  
                </tr>
                </thead>
                <tbody>
				<?php if(!empty($news_list)){ 
					$i=1;
					foreach($news_list as $value){?>
					<tr>
						<td><?php echo $i;?></td>
						
						<td><?php echo $value['title'];?></td>
						<td><?php echo $value['description'];?></td>
						
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
  <!-- /.content-wrapper -->
  <script>
  $(document).ready(function() {

        //$("#example1").DataTable();

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



                $.post('<?php echo base_url() ?>news/ajax_getnewsstatus', {'static_page_id': static_page_id, 'status': status}, function(data) {

                    if (data) {

                        $('.static_page_status_' + static_page_id).html(data);

                    }



                });

            }

        });
		});
  

  $(function () {
    $("#example1").DataTable();
  });

</script>
