

<script>

	$(document).ready(function() {

		$("#b_category").validate({

			rules: {

				'country_id[]': {required: true},

				'cate_name': {required: true},

				'image': {required: true},

				'language_id[]': {required: true}

            },

			

			submitHandler: function(form) {

			  form.submit();

			}

			

		});

		

	});

	

	function getEnglish(val,id) {

		var english = $('#cate_name').val();

		var empty = "";

		if(english !=''){

			if(val == 12){ // pass englsh id static in future we need to changed.

				$('#b_cate_cname'+id).val(english);

			}else{

				$('#b_cate_cname'+id).val(empty);

			}

		}else{

			alert('Please Enter Category Name');

			return false;

		}

	}

 

	</script>





	

<style>

.bgnone {

	background-color: transparent;

}

</style>

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <?php echo lang('add_category');?>

        <!--<small><?php echo lang('add_category');?></small>-->

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

				<li ><a href="<?php echo base_url('category');?>"><?php echo lang('category');?></a></li>

				<li class="active"><?php echo lang('add_category');?></li>

			</ol>

            </div>

            <!-- /.box-header -->

            <!-- form start -->

            <form method="post" name="business_category" id="b_category" action="<?php echo base_url('category/addCategory');?>" enctype="multipart/form-data">

				<div class="box-body">

					<div class="form-group">

					  <label for=""><?php echo lang('category_name');?></label>

					  <input type="text" class="form-control" id="cate_name" name="cate_name" placeholder="Category name">

					</div>

					<div class="form-group">

					  <label for=""><?php echo lang('template');?></label>
						<select name="template" id="template" class="form-control">
						  	<option value="">Choose Template</option>
						  	<option value="black">Black</option>
							<option value="gray">Gray</option>
						</select>
					
					</div>

					<div class="form-group">

					  <label for=""><?php echo lang('description');?>*</label>

					  <textarea id="description" name="description" class="form-control ckeditor">

						</textarea>

					</div>

					<div class="form-group">

					  <label for=""><?php echo lang('meta_title');?></label>

					  <input type="text" maxlength="30" class="form-control" id="meta_title" name="meta_title" placeholder="Category Meta Title">

					</div>

					<div class="form-group">

					  <label for=""><?php echo lang('meta_keyword');?></label>

					  <input type="text" maxlength="50" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Category Meta Keyword">

					</div>

					<div class="form-group">

					  <label for=""><?php echo lang('meta_description');?></label>

					  <textarea id="meta_description" class="form-control" name="meta_description" placeholder="Category Meta Description"></textarea>

					</div>

                <button type="submit" class="btn btn-primary">Submit</button>

                <a href="<?php echo base_url('category');?>"  class="btn btn-danger">Cancel</a>

				</div>

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



 <script type="text/javascript">

 $(document).ready(function(){

      var row_id = 1;

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

  </script>