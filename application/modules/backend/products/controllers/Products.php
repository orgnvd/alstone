<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model('Products_model');
        if(getSessionData() =='true'){
			return true;
		}else{
			redirect('admin');
		}
    }

	public function index(){
		$this->load->model('products/Products_model');
		$product_list = $this->Products_model->getProductList();
		$data['product_list'] = $product_list;
		$data['main_content'] = 'products/index';
		$this->load->view('admin/layout', $data);
	}

	public function add($id='', $product_title='')
	{
		$this->load->model('products/Products_model');
		$list = $this->Products_model->getProducts();
		// print_r($list); die();
		$data['all_products'] = $list;
		$data['main_content'] = 'products/addProducts';
		$this->load->view('admin/layout', $data);
	}

	public function addProducts()
	{
		$this->load->model('Products_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('product_title', 'Product Title Name', 'required');
		$this->form_validation->set_rules('product_slug', 'Product Slug', 'required');
		$this->form_validation->set_rules('meta_title', 'Meta Title', 'required');
		$this->form_validation->set_rules('meta_keyword', 'Meta keyword', 'required');
		$this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');                             
		if ($this->form_validation->run() == FALSE){
			 redirect('products/addProducts');	
			// $data['main-content'] = 'products';
			// $this->load->view('admin/layout', $data);
		} else {
			if($this->input->post()){
				
			/* 	pr($this->input->post());
				echo "<pre>"; 
				pr($_FILES);
				
				die; */
				if(!empty($_FILES['product_image']['name'])){
					$config['upload_path'] = 'images/products';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|PDF|pdf|DOC|doc';
					$config['file_name'] = time() . date('Ymd');
					$this->load->library('upload');
					$this->upload->initialize($config);
					if($this->upload->do_upload('product_image')){
						$uploadData = $this->upload->data();
						$image_data = $uploadData['file_name'];
					} 
				} else {
					$image_data =  $this->input->post('old');
				}
				if(!empty($_FILES['product_gallery']['name'][0])){

					$images = array();
					for($i = 0; $i < count($_FILES['product_gallery']['name']) ; $i++){
						$target_dir = "./images/products/gallery/";
						$target_file = $target_dir.time().$_FILES['product_gallery']['name'][$i];
						$target_file1 = $_FILES['product_gallery']['name'][$i];
						if(move_uploaded_file($_FILES['product_gallery']['tmp_name'][$i],$target_file)){
						$images[] = time().$target_file1;
						}
					}
					$fileName = implode(',',$images);
					//pr($fileName); die();
			    }

			    if(!empty($_FILES['multiple_files']['name'][0])){

					$images = array();
					for($i = 0; $i < count($_FILES['multiple_files']['name']) ; $i++){
						$target_dir = "./images/products/document/";
						$target_file = $target_dir.time().$_FILES['multiple_files']['name'][$i];
						$target_file1 = $_FILES['multiple_files']['name'][$i];
						if(move_uploaded_file($_FILES['multiple_files']['tmp_name'][$i],$target_file)){
						$images[] = time().$target_file1;
						}
					}
					$document = implode(',',$images);
					// pr($document); die();
			    }

				if(!empty($_FILES['product_banner']['name'])){
					$config['upload_path'] = 'images/products';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|PDF|pdf|DOC|doc';
					$config['file_name'] = time() . date('Ymd');
					$this->load->library('upload');
					$this->upload->initialize($config);
					if($this->upload->do_upload('product_banner')){
						$uploadData = $this->upload->data();
						$banner_data = $uploadData['file_name'];
					} 
				} else {
					$banner_data =  '';
				}

				$post_value = $this->input->post();
				
				$inserted = $this->Products_model->insertProduct($post_value, $image_data, $fileName, $document,$banner_data);
				// pr($inserted); die();
				if($inserted){
					$this->session->set_flashdata('success_message', lang('insert_message'));
					redirect('products');
				}else{
					$this->session->set_flashdata('error_message', lang('error_message'));
					redirect('products');
				}

			} else {
				$data['main_content'] = 'product/addPoducts';
				$this->load->view('admin/layout', $data);
			}

			redirect('products');

		}
	}

	
	public function edit($id)
	{

		$this->load->model('products/Products_model');
		$list = $this->Products_model->getProducts();
		// print_r($list); die();
		$data['all_products'] = $list;
		$data['updated'] = $this->Products_model->getUserById($id);
		//pr($data['updated']);
		$data['main_content'] = 'products/editProduct';  
		$this->load->view('admin/layout', $data);
	}

	public function update($id='')
	{
		$this->load->model('Products_model');
		if($this->input->post()){
			if(!empty($_FILES['product_image']['name'])){
				// print_r($_FILES); die();
	 			$config['upload_path'] = 'images/products';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|PDF|pdf|DOC|doc';
	 	 		$config['file_name'] = time() . date('Ymd');
	 	 		$this->load->library('upload');
	 	 		$this->upload->initialize($config);
	 	 		if($this->upload->do_upload('product_image')){
	 	 				$uploadData = $this->upload->data();
	 	 				$image_data = $uploadData['file_name'];
					} else {
	 				 $this->session->set_flashdata('error_image', lang('error_image'));
	 					 redirect('products');	
	 	 			} 

	 		} else {
				$image_data = $this->input->post('old');
	 		}

	 		if(!empty($_FILES['product_gallery']['name'][0])){

					$images = array();
					for($i = 0; $i < count($_FILES['product_gallery']['name']) ; $i++){
						$target_dir = "./images/products/gallery/";
						$target_file = $target_dir.time().$_FILES['product_gallery']['name'][$i];
						$target_file1 = $_FILES['product_gallery']['name'][$i];
						if(move_uploaded_file($_FILES['product_gallery']['tmp_name'][$i],$target_file)){
						$images[] = time().$target_file1;
						}
					}
					$fileName = implode(',',$images);
					//pr($fileName); die();
				} else {
				
					$fileName = $this->input->post('multi_image');
				}  

				if(!empty($_FILES['multiple_files']['name'][0])){

					$images = array();
					for($i = 0; $i < count($_FILES['multiple_files']['name']) ; $i++){
						$target_dir = "./images/products/document/";
						$target_file = $target_dir.time().$_FILES['multiple_files']['name'][$i];
						$target_file1 = $_FILES['multiple_files']['name'][$i];
						if(move_uploaded_file($_FILES['multiple_files']['tmp_name'][$i],$target_file)){
						$images[] = time().$target_file1;
						}
					}
					$document = implode(',',$images);
					// pr($document); die();
			    } else {
				
					$document = $this->input->post('old');
				}  



				if(!empty($_FILES['product_banner']['name'])){
					$config['upload_path'] = 'images/products';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|PDF|pdf|DOC|doc';
					$config['file_name'] = time() . date('Ymd');
					$this->load->library('upload');
					$this->upload->initialize($config);
					if($this->upload->do_upload('product_banner')){
						$uploadData = $this->upload->data();
						$banner_data = $uploadData['file_name'];
					} else {
						 $this->session->set_flashdata('error_image', lang('error_image'));
						 redirect('products');	
					} 
				} else {
					$banner_data =  $this->input->post('old_banner');
				}

				//echo $imageold_banner; die;



	 	}
	 		$post_value = $this->input->post();
	 
			$updated = $this->Products_model->updateProduct($post_value, $id, $image_data ,
				$document, $banner_data, $fileName);
			// print_r($updated); 
			if($updated){
				$this->session->set_flashdata('success_message', lang('insert_message'));
					redirect('products');
					exit();
				} else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('products');
				exit();
			}
			
			
	}
	
	public function delete($id)
	{
		$this->load->model('Products_model');
		$delete = $this->Products_model->deleteProduct($id);
		if($this->Products_model->deleteProduct($id)){
			$this->session->set_flashdata('success_message', lang('delete_message'));
					redirect('products');
					exit();
				} else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('products');
				exit();
			}
		
	}
	#update status 
	public function updateStatus(){
		$return = array();
		$post_value = $this->input->post();
		$result = $this->Products_model->updateStatus($post_value);
		if($result['status'] = 'true'){
			$return['status']='true';
			 if ($post_value['status'] == 1) {
				$retrun['data'] ='<a title="Active"  href="javascript:void(0);" row_id="'.$post_value['row_id'].'" status="0" class="label-success statuslabel label label-default status_active"> Active </a>';
			 }else{
				$retrun['data'] ='<a title="De-Active"  href="javascript:void(0);" row_id="'.$post_value['row_id'].'" status="1" class="label-danger statuslabel label label-default status_active"> De-Active </a>'; 
			 }
		}else{
			$return['status']='false';
		}

		echo json_encode($retrun); die;

	}
	
	public function ajax_getcmsstatus() {

        $get_status = $this->Products_model->status_active_inacive($_POST);

		if ($get_status == "active") { ?>
			<a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="1" class="label-success statuslabel label label-default status_active"> Active </a>

		<?php } else if ($get_status == "inactive") { ?>
			<a title="De-Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="0" class="label-danger statuslabel label label-default status_active"> De-active </a>
			<?php
		}

    }
	
}
