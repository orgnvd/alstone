<script>

	$(document).ready(function() {

		$("#b_category").validate({

			rules: {

				cate_name: "required",

				cate_title: "required",				

				//parent_id: "required"				

			},

			messages: {

				cate_name: "Category name required",

				cate_title: "Category title required",				

				//parent_id: "Business Category required"

			},

			submitHandler: function(form) {

			  form.submit();

			}

		});

		

	});

 

	</script>



	<style>

	.bgnone {

		background-color: transparent;

	}

	.table > tbody > tr > td{padding: 8px 8px 0px;}

	.btn {

    border-radius: 0px;

    padding: 6px 24px;

}

.toggle-handle {

    border-radius: -10px !important;

    padding: 7px 24px !important;

}

.toggle-on.btn {

   border-radius: 30px !important;

    padding: 7px 24px !important;

}

.toggle-off.btn {

     border-radius: 30px !important;

    padding: 7px 24px !important;

	

}

.toggle.btn {

    border-radius: 30px !important;

    padding: 7px 24px !important;

}

.toggle.btn {

    min-width: 40px;

    min-height: 14px;

    width: 40px !important;

    height: 24px !important;

}

	</style>

<div class="content-wrapper">

    <section class="content-header">

      <h1>

        <?php echo lang('edit_category');?>

        <!--<small><?php echo lang('edit_category');?></small>-->

      </h1>     

    </section>

    <section class="content">

      <div class="row">

        <div class="col-md-12">

          <div class="box box-primary">

            <div class="box-header with-border">

				<ol class="breadcrumb bgnone">

					<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <?php echo lang('home');?></a></li>

					<li ><a href="<?php echo base_url('category');?>"><?php echo lang('category');?></a></li>

					<li class="active"><?php echo lang('edit_category');?></li>

				</ol>

             <!-- <h3 class="box-title"><?php echo lang('category_form');?></h3>-->

            </div>

			<?php if($categoryDetail['status']=='true'){

				$value = $categoryDetail['resultSet'];



				@$image1 = $value->catImage;

					if(isset($image)){

						$image1 = "noimage.jpg";

					}

				?>

				  

            <form method="post" name="business_category" id="b_category" action="<?php echo base_url('category/editCategory/'.$value->id);?>" enctype="multipart/form-data">

				<div class="box-body">

					<div class="form-group">

					  <label for=""><?php echo lang('category_name');?></label>

					  <input type="text" class="form-control" id="cate_name" name="cate_name" placeholder="Category name" value="<?php echo $value->title;?>">

					</div>

					<div class="form-group">

					  <label for=""><?php echo lang('template');?></label>
						<select name="template" id="template" class="form-control">
						  	<option value="">Choose Template</option>
						  	<option value="black" <?php if($value->template == 'black') { echo 'selected'; }?> >Black</option>
							<option value="gray" <?php if($value->template == 'gray') { echo 'selected'; }?>>Gray</option>
						</select>
					
					</div>

					<div class="form-group">

					  <label for=""><?php echo lang('description');?>*</label>

					  <textarea id="description" name="description" class="form-control ckeditor"><?php echo $value->description;?>

						</textarea>

					</div>

					<div class="form-group">

					  <label for=""><?php echo lang('meta_title');?></label>

					  <input type="text" maxlength="30" class="form-control" id="meta_title" name="meta_title" placeholder="Category Meta Title" value="<?php echo $value->meta_title;?>">

					</div>

					<div class="form-group">

					  <label for=""><?php echo lang('meta_keyword');?></label>

					  <input type="text" maxlength="50" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Category Meta Keyword" value="<?php echo $value->meta_keyword;?>">

					</div>

					<div class="form-group">

					  <label for=""><?php echo lang('meta_description');?></label>

					  <textarea id="meta_description" class="form-control" name="meta_description" placeholder="Category Meta Description"><?php echo $value->meta_description;?></textarea>

					  

                <button type="submit" class="btn btn-primary">Submit</button>

                <a href="<?php echo base_url('category');?>"  class="btn btn-danger">Cancel</a>

				</div>

              </div>

			 <?php }else{

				 

				 

			 }?>

            </form>

          </div>

        </div>

      </div>

    </section>

<script type="text/javascript">

 var row_id='';



function removeRow(removeNum) {

	removeNum--;

jQuery('#add_new_row'+removeNum).remove();

}



function fffff(val){

	var value = val.split('_');

	var id = value[0];

	var status = value[1];

	

	if (status == '1') {

		var r = confirm("Are you sure you want to Activate");

	} else {

		var r = confirm("Are you sure you want to De-Activate");

	}

	if (r == true){

		$.ajax({

			url: '<?php echo base_url();?>category/business_cate_lang_status/',

			type: 'POST',

			datatype: 'json',

			data: {'id':id, 'status':status},

			success: function(response){

				if(response){

					obj = JSON.parse(response);

					if(obj.status == 'true'){

						$(".kk"+id).html(obj.html);

						$("#update_status_value"+id).val(status);

						return false;

					}

				}

			},

		});

	}	

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