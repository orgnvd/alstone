<style>
.bgnone {
	background-color: transparent;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo lang('add_product');?>
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
        <li ><a href="<?php echo base_url('cms');?>"><?php echo lang('product');?></a></li>
        <li class="active"><?php echo lang('add_product');?></li>
      </ol>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?= validation_errors(); ?>
            <?php $attributes = array('id' => 'frm_subadmin', 'name'=>'frm_subadmin');
			echo form_open_multipart('products/addProducts', $attributes); ?>
				<div class="box-body">
					<div class="form-group">
					  <label for=""><?php echo lang('pro_tagline');?>*</label>
					  <input type="text" class="form-control" id="pro_tagline" name="product_tagline" placeholder="Product Tagline" value="<?php echo set_value('product_tagline'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('pro_title');?>*</label>
					  <input type="text" class="form-control" id="product_title" name="product_title" placeholder="Product Title" value="<?php echo set_value('product_title'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('pro_slug');?>*</label>
					  <input type="text" class="form-control" id="product_slug" name="product_slug" placeholder="Product Slug" value="<?php echo set_value('product_slug'); ?>">
					</div>
					<div class="form-group">
						<label for=""><?php echo lang('pro_list');?>*</label>
						<select name="parent_id" id="parent_id" class="form-control">
							<option value="12">NO Parent</option>
							<?php foreach($all_products as $row) :?>
							<option value="<?php echo $row->id; ?>"><?php echo $row->title;?></option>
						<?php endforeach; ?>
							
						</select>
					</div>
					<div class="form-group">
					  <label for=""><?php echo 'Product Order';?> </label>
					  <input type="text" class="form-control" id="product_order" name="product_order" placeholder="Product Order" value=" ">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('pro_desc');?>*</label>
						<textarea id="product_description" name="product_description" class="form-control ckeditor"><?php echo set_value('product_description'); ?>
						</textarea>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('pro_production');?>*</label>
						<textarea id="product_production" name="product_production" class="form-control ckeditor"><?php echo set_value('product_production'); ?>
						</textarea>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('pro_overview');?>*</label>
					  <textarea id="product_overview" name="product_overview" class="form-control ckeditor">
						</textarea>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('pro_spec');?>*</label>
					  <textarea id="product_specification" name="product_specification" class="form-control ckeditor">
						</textarea>
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('pro_image_upload');?></label>
					  <input name="product_image" type="file" id="product_image" multiple />
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('pro_image_gallery');?></label>
					  <input name="product_gallery" type="file" id="product_gallery" multiple />
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('pro_banner');?></label>
					  <input name="product_banner" type="file" id="product_banner" multiple />
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('pro_meta_title');?>*</label>
					  <input type="text" maxlength="30" class="form-control" id="meta_title" name="meta_title" placeholder="Product Meta Title" value="<?php echo set_value('meta_title'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('pro_meta_keyword');?>*</label>
					  <input type="text" maxlength="50" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Product Meta Keyword" value="<?php echo set_value('meta_keyword'); ?>">
					</div>
					<div class="form-group">
					  <label for=""><?php echo lang('pro_meta_desc');?>*</label>
					  <input type="text" maxlength="165" class="form-control" id="meta_description" name="meta_description" placeholder="Product Meta Description" value="<?php echo set_value('meta_description'); ?>">
					  <input type="date" name="created_at" value="<?php echo date('Y/m/d'); ?>" hidden>
					</div>
					</div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
				<a href="<?php echo base_url('cms');?>" class="btn btn-danger">Cancel</a>
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
  
 <link rel="stylesheet" href="<?php echo base_url();?>public/admin/css/selectize.default.css">
  <script src="<?php echo base_url();?>public/admin/js/selectize.js"></script>
  <script src="<?php echo base_url();?>public/admin/js/index.js"></script>
  <script>
  var unique = $('#select-words-unique').selectize({
					create: true,
					createFilter: function(input) {
						input = input.toLowerCase();
						return $.grep(unique.getValue(), function(value) {
							return value.toLowerCase() === input;
						}).length == 0;
					}
				})[0].selectize;
				
	
	$('.select-tags').selectize({
		plugins: ['remove_button'],
		persist: true,
		render: {
			item: function(data, escape) {
				return '<div>' + escape(data.text) + '</div>';
			}
		},
		
	});
	$(document).ready(function() {
            //initialize selectize for both fields
            
            $("#district").selectize();
 
            // onchange
            $("#province_id").change(function() {
                $.post('./ajax_country_list', { 'language_id' : $(this).val() } , function(jsondata) {
					var htmldata = '';
                    var new_value_options   = '[';
                    for (var key in jsondata) {
                        htmldata += '<option value="'+jsondata[key].country_id+'">'+jsondata[key].country_name+'</option>';
 
                        var keyPlus = parseInt(key) + 1;
                        if (keyPlus == jsondata.length) {
                            new_value_options += '{text: "'+jsondata[key].country_name+'", value: '+jsondata[key].country_id+'}';
                        } else {
                            new_value_options += '{text: "'+jsondata[key].country_name+'", value: '+jsondata[key].country_id+'},';
                        }
                    }
                    new_value_options   += ']';
 
                    //convert to json object
                    new_value_options = eval('(' + new_value_options + ')');
                    if (new_value_options[0] != undefined) {
                        // re-fill html select option field 
                        $("#district").html(htmldata);
                        // re-fill/set the selectize values
                        var selectize = $("#district")[0].selectize;
 
                        selectize.clear();
                        selectize.clearOptions();
                        selectize.renderCache['option'] = {};
                        selectize.renderCache['item'] = {};
 
                        selectize.addOption(new_value_options);
 
                        //selectize.setValue(new_value_options[0].value);
                        selectize.setValue(new_value_options.value);
                    }
 
                }, 'json');
            });
        });

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
            ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
            rules: {
			   'product_title': {required: true},
			   'product_slug': {
				   required: true
			   },
			   'product_description': {required: true},
			   'product_overview': {required: true},
			   'product_specification': {required: true},
			   'product_image': {required: true},
			   //'product_banner': {required: true},
			   'product_gallery': {required: true},
			   'meta_title': {required: true},
			   'meta_keyword': {required: true},
			   'meta_description': {required: true},
			   'mainimage[]': {required: true}
			},
			  submitHandler: function(form) {
			  form.submit();
			}
			
		});
	});
 </script>
  