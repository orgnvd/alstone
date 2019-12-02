<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		
        if(getSessionData() =='true'){
			return true;
		}else{
			redirect('admin');
		}
    }
	public function index(){
	    $this->load->model('category/App_category_model');
		$data['category_list'] = $this->App_category_model->getCategoryList();
		$data['main_content'] = 'category/index';
		$this->load->view('admin/layout', $data);
	}
	
	public function addGallery($id){
		$this->load->model('gallery/App_gallery_model');
		$this->load->library('form_validation');
		$user_id=$this->session->userdata('s_user_id');
		$this->form_validation->set_rules('title_name', 'Gallery Title', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$pageData = $this->App_gallery_model->getDetails($id);
		// pr($pageData); die;
		if(!empty($pageData)) {
		    $pageInfo 	= array(
				"catID"				=> $pageData->catID,
				"catTitle"			=> $pageData->catTitle,
				"catImage" 			=> $pageData->catImage,
				"catStatus"		    => $pageData->catStatus
			); 
		}
		$data['detail'] = $pageInfo;
		if ($this->form_validation->run() == FALSE){
			$data['gallery_image'] = $this->App_gallery_model->fetchgalleryimage();
			$data['main_content'] = 'gallery/addGallery';
			$this->load->view('admin/layout', $data);
		} else {
			
		if($this->input->post()){
			$post_value1 = $this->input->post();
			$total_selected_image = $_FILES['mainimage']['name'];
			$file_count = count($total_selected_image);
			$images_arr = array();
			if($file_count > 0){
				//echo "dd"; die;
				for($i=0; $i < $file_count; $i++){
					if(!empty($_FILES['mainimage']['name'])){
						$image2 = array();
						$image2['name'] = $_FILES['mainimage']['name'][$i];
						$image2['type'] = $_FILES['mainimage']['type'][$i];
						$image2['tmp_name'] = $_FILES['mainimage']['tmp_name'][$i];;
						$image2['error']= $_FILES['mainimage']['error'][$i];
						$image2['size']= $_FILES['mainimage']['size'][$i];
						//pr($image2); die;
						if($image2['error']==0){
							$_FILES['new_array']= $image2; 
							$config['upload_path'] = 'images/gallery/';
							$config['allowed_types'] = 'jpg|jpeg|png|gif';
							$config['file_name'] = $i.'_'.time() . date('Ymd');
							
							$this->load->library('upload');
							$this->upload->initialize($config);				
							if($this->upload->do_upload('new_array')){
								$uploadData = $this->upload->data();
								$images_arr[] = $uploadData['file_name'];
								$configImageResize = array(
									'source_image' => $config['upload_path'] . $uploadData['file_name'],
									'new_image' => 'images/gallery/thumb/',
									'maintain_ratio' => true,
									'width' => 421,
									'height' => 495
										);
								$this->load->library('image_lib');
								$this->image_lib->initialize($configImageResize);
								$this->image_lib->resize();
								$this->image_lib->clear();
								
								$configImageResize1 = array(
									'source_image' => $config['upload_path'] . $uploadData['file_name'],
									'new_image' => 'images/gallery/footerthumb/',
									'maintain_ratio' => true,
									'width' => '',
									'height' => 71
										);
								$this->load->library('image_lib');
								$this->image_lib->initialize($configImageResize1);
								$this->image_lib->resize();
								$this->image_lib->clear();
							}else{
								echo $this->upload->display_errors(); die;
							}
						} 
					}else{
						$images_arr = '';
					}
				}	
			}
			//print_r($images_arr); exit;
			$fileName = implode(',',$images_arr); 
						
			$total_selected_image1 = $_FILES['mainimage1']['name'];
			$file_count1 = count($total_selected_image1);
			$images_arr1 = array();
			if($file_count1 > 0){
				//echo "dd"; die;
				for($i=0; $i < $file_count1; $i++){
					if(!empty($_FILES['mainimage1']['name'])){
						$image2 = array();
						$image2['name'] = $_FILES['mainimage1']['name'][$i];
						$image2['type'] = $_FILES['mainimage1']['type'][$i];
						$image2['tmp_name'] = $_FILES['mainimage1']['tmp_name'][$i];;
						$image2['error']= $_FILES['mainimage1']['error'][$i];
						$image2['size']= $_FILES['mainimage1']['size'][$i];
						//pr($image2); die;
						if($image2['error']==0){
							$_FILES['new_array']= $image2; 
							$config['upload_path'] = 'images/gallery/';
							$config['allowed_types'] = 'jpg|jpeg|png|gif';
							$config['file_name'] = $i.'_'.time() . date('Ymd');
							
							$this->load->library('upload');
							$this->upload->initialize($config);				
							if($this->upload->do_upload('new_array')){
								$uploadData = $this->upload->data();
								$images_arr1[] = $uploadData['file_name'];
								$configImageResize = array(
									'source_image' => $config['upload_path'] . $uploadData['file_name'],
									'new_image' => 'images/gallery/thumb/',
									'maintain_ratio' => true,
									'width' => 421,
									'height' => 495
										);
								$this->load->library('image_lib');
								$this->image_lib->initialize($configImageResize);
								$this->image_lib->resize();
								$this->image_lib->clear();
								
								$configImageResize1 = array(
									'source_image' => $config['upload_path'] . $uploadData['file_name'],
									'new_image' => 'images/gallery/footerthumb/',
									'maintain_ratio' => true,
									'width' => '',
									'height' => 71
										);
								$this->load->library('image_lib');
								$this->image_lib->initialize($configImageResize1);
								$this->image_lib->resize();
								$this->image_lib->clear();
							}else{
								echo $this->upload->display_errors(); die;
							}
						} 
					}else{
						$images_arr1 = '';
					}
				}	
			}
			//print_r($images_arr); exit;
			$fileName1 = implode(',',$images_arr1);
			 
			$post_value = $post_value1;
			$inserted = $this->App_gallery_model->insertModule($post_value,$fileName,$fileName1);
			if($inserted['status']=='true'){
				$this->session->set_flashdata('success_message', lang('insert_message'));
				redirect('category');
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('category');
			}
			
		}else{
			$data['main_content'] = 'gallery/addGallery';
			$this->load->view('admin/layout', $data);
		} }
	}
	
	public function editGallery($id=false){
		$this->load->model('gallery/App_gallery_model');
		$user_id=$this->session->userdata('s_user_id');
		if(!empty($_POST)){
	 		$static_pageData1 = $this->input->post();
			   
			$total_selected_image = $_FILES['mainimage']['name'];
			$file_count = count($total_selected_image);
			$images_arr = array();
			if($file_count > 0){
				 //echo "dd"; die;
				for($i=0; $i < $file_count; $i++){
					if(!empty($_FILES['mainimage']['name'])){
						$image2 = array();
						$image2['name'] = $_FILES['mainimage']['name'][$i];
						$image2['type'] = $_FILES['mainimage']['type'][$i];
						$image2['tmp_name'] = $_FILES['mainimage']['tmp_name'][$i];;
						$image2['error']= $_FILES['mainimage']['error'][$i];
						$image2['size']= $_FILES['mainimage']['size'][$i];
						//pr($image2); die;
						if($image2['error']==0){
							$_FILES['new_array']= $image2; 
							$config['upload_path'] = 'images/gallery/';
							$config['allowed_types'] = 'jpg|jpeg|png|gif';
							$config['file_name'] = $i.'_'.time() . date('Ymd');
							
							$this->load->library('upload');
							$this->upload->initialize($config);				
							if($this->upload->do_upload('new_array')){
								$uploadData = $this->upload->data();
								$images_arr[] = $uploadData['file_name'];
								$configImageResize = array(
									'source_image' => $config['upload_path'] . $uploadData['file_name'],
									'new_image' => 'images/gallery/thumb/',
									'maintain_ratio' => true,
									'width' => 421,
									'height' => 495
										);
								$this->load->library('image_lib');
								$this->image_lib->initialize($configImageResize);
								$this->image_lib->resize();
								$this->image_lib->clear();
								
								$configImageResize1 = array(
									'source_image' => $config['upload_path'] . $uploadData['file_name'],
									'new_image' => 'images/gallery/footerthumb/',
									'maintain_ratio' => true,
									'width' => '',
									'height' => 71
										);
								$this->load->library('image_lib');
								$this->image_lib->initialize($configImageResize1);
								$this->image_lib->resize();
								$this->image_lib->clear();
							}else{
								echo $this->upload->display_errors(); die;
							}
						} 
					}else{
						$images_arr = '';
					}
				}	
			}
			//print_r($images_arr); exit;
			$fileName = implode(',',$images_arr); 
						
			$total_selected_image1 = $_FILES['mainimage1']['name'];
			$file_count1 = count($total_selected_image1);
			$images_arr1 = array();
			if($file_count1 > 0){
				//echo "dd"; die;
				for($i=0; $i < $file_count1; $i++){
					if(!empty($_FILES['mainimage1']['name'])){
						$image2 = array();
						$image2['name'] = $_FILES['mainimage1']['name'][$i];
						$image2['type'] = $_FILES['mainimage1']['type'][$i];
						$image2['tmp_name'] = $_FILES['mainimage1']['tmp_name'][$i];;
						$image2['error']= $_FILES['mainimage1']['error'][$i];
						$image2['size']= $_FILES['mainimage1']['size'][$i];
						//pr($image2); die;
						if($image2['error']==0){
							$_FILES['new_array']= $image2; 
							$config['upload_path'] = 'images/gallery/';
							$config['allowed_types'] = 'jpg|jpeg|png|gif';
							$config['file_name'] = $i.'_'.time() . date('Ymd');
							
							$this->load->library('upload');
							$this->upload->initialize($config);				
							if($this->upload->do_upload('new_array')){
								$uploadData = $this->upload->data();
								$images_arr1[] = $uploadData['file_name'];
								$configImageResize = array(
									'source_image' => $config['upload_path'] . $uploadData['file_name'],
									'new_image' => 'images/gallery/thumb/',
									'maintain_ratio' => true,
									'width' => 421,
									'height' => 495
										);
								$this->load->library('image_lib');
								$this->image_lib->initialize($configImageResize);
								$this->image_lib->resize();
								$this->image_lib->clear();
								
								$configImageResize1 = array(
									'source_image' => $config['upload_path'] . $uploadData['file_name'],
									'new_image' => 'images/gallery/footerthumb/',
									'maintain_ratio' => true,
									'width' => '',
									'height' => 71
										);
								$this->load->library('image_lib');
								$this->image_lib->initialize($configImageResize1);
								$this->image_lib->resize();
								$this->image_lib->clear();
							}else{
								echo $this->upload->display_errors(); die;
							}
						} 
					}else{
						$images_arr1 = '';
					}
				}	
			}
		 
			$fileName1 = implode(',',$images_arr1); 
		 
		$static_pageData = array_merge($static_pageData1);
		
		/* Update Gallery Page */
		$updateStatus = $this->App_gallery_model->updategallery_page($static_pageData,$id,$fileName,$fileName1);
		/* Update Gallery Page */
		if ($updateStatus) {
			$this->session->set_flashdata('success_message', lang('update_message'));
			redirect('category');
			exit();
		} else {
		$this->session->set_flashdata('error_message', lang('error_message'));
		redirect('category');
		}
		} else {
	 
		 
		$result_gallery = $this->App_gallery_model->fetchgalleryimage();
		$data['gallery_image'] = $result_gallery;
		$result_module = $this->App_gallery_model->fetchEditgallery($id);
		//pr($result_module); exit;
		foreach($result_module as $key=>$val_post)
			{
				$gallery_country = '';
				$gallery_banner = '';
				$gallery = '';
				 
				$gallery_banner=$this->App_gallery_model->getbannerDetail($val_post['catID']);
			}
		//$result_module[$key]['country'] = $gallery_country;
		$result_module[$key]['banner'] = $gallery_banner;
		/*$result_module[$key]['gallery'] = $gallery;*/
		//pr($result_module); exit;
		if($result_module){
			$data['fetchmodule'] = $result_module;
			}else{
			$this->session->set_flashdata('error_message', lang('error_message'));
			redirect('cms');
		}
		$data['main_content'] = 'gallery/editGallery';
		$this->load->view('admin/layout', $data);
		}
	}
	
	function deletesinglebanner(){
		  $id = $this->input->post('delete');
		  $this->db->where('id',$id);
		  $this->db->delete('tbl_gallery_banner');
	} 
	
}
