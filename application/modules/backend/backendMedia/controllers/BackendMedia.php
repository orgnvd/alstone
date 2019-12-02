<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackendMedia extends CI_Controller {


	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('BackendMedia_model');
        if(getSessionData() =='true'){
			return true;
		}else{
			redirect('admin');
		}
    }

	public function index(){
		$media_list = $this->BackendMedia_model->getMediaList();
		$data['media_list'] = $media_list;	
		$data['main_content'] = 'backendMedia/index';
		$this->load->view('admin/layout', $data);
	}
	
	 
	 

	public function add()
	{
	 
		$data['main_content'] = 'backendMedia/addMedia'; 
		$this->load->view('admin/layout', $data);
	}

	public function addMedia(){
		
		$this->form_validation->set_rules('media_title', 'Media Title', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required|is_unique[tbl_media.slug]');
		$this->form_validation->set_rules('media_description', 'Media Description', 'required');
		$this->form_validation->set_rules('meta_title', 'Meta Title', 'required');
		$this->form_validation->set_rules('meta_keyword', 'Meta keyword', 'required');
		$this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run() == FALSE){
				redirect('backendMedia/addMedia');	
		} else {
			if($this->input->post()){

				if(!empty($_FILES['media_image']['name'])){
					$config['upload_path'] = 'images/media';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|PDF|pdf|DOC|doc';
					$config['file_name'] = time() . date('Ymd');
					$this->load->library('upload');
					$this->upload->initialize($config);
					if($this->upload->do_upload('media_image')){
						$uploadData = $this->upload->data();
						$image_data = $uploadData['file_name'];
					} else {
						 $this->session->set_flashdata('error_image', lang('error_image'));
						 redirect('backendMedia');	
					}
				} else {
					$image_data =  $this->input->post('old');
				}
			}

			$post_value = $this->input->post();
			$inserted = $this->BackendMedia_model->insertMedia($post_value, $image_data);
			if($inserted){
					$this->session->set_flashdata('success_message', lang('insert_message'));
					redirect('backendMedia');
				}else{
					$data['main_content'] = 'addMedia';
					$this->load->view('admin/layout', $data);
				}
		}
	}

		public function editList($id=''){
			 
			$list = $this->BackendMedia_model->getMediaList();
			$data['list'] = $list;
			$data['updated'] = $this->BackendMedia_model->getMediaById($id);
			$data['main_content'] = 'backendMedia/editMedia';  
			$this->load->view('admin/layout', $data);
		}

		public function update($id=''){
			if($this->input->post()){

				if(!empty($_FILES['media_image']['name'])){
					$config['upload_path'] = 'images/media';
					$config['allowed_types'] = 'jpg|jpeg|png|gif|PDF|pdf|DOC|doc';
					$config['file_name'] = time() . date('Ymd');
					$this->load->library('upload');
					$this->upload->initialize($config);
					if($this->upload->do_upload('media_image')){
						$uploadData = $this->upload->data();
						$image_data = $uploadData['file_name'];
					} else {
						 $this->session->set_flashdata('error_image', lang('error_image'));
						 redirect('backendMedia');	
					}
				} else {
					$image_data =  $this->input->post('old');
				}
			}

			$post_value = $this->input->post();
			$updated = $this->BackendMedia_model->updateMedia($post_value, $id, $image_data);
				

			if($updated){
					$this->session->set_flashdata('success_message', lang('insert_message'));
					redirect('backendMedia');
			}


		}

		public function delete($id)
		{
			$delete = $this->BackendMedia_model->deleteMedia($id);
			if($this->BackendMedia_model->deleteMedia($id)){
				$this->session->set_flashdata('success_message', lang('delete_message'));
						redirect('backendMedia');
						exit();
					} else{
					$this->session->set_flashdata('error_message', lang('error_message'));
					redirect('backendMedia');
					exit();
				}
		
		}

}
