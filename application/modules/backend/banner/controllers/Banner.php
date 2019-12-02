<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		
        if(getSessionData() =='true'){
			return true;
		}else{
			redirect('admin');
		}
    }


	public function index(){
		$this->load->model('banner/App_banner_model');
		$banner_list = $this->App_banner_model->getBannerList();
		$data['module_list'] = $banner_list;
		$data['main_content'] = 'banner/index';
		$this->load->view('admin/layout', $data);
	}
	
	public function addBanner(){
		$this->load->model('banner/App_banner_model');
		$this->load->model('cms/App_cms_model');
		$this->load->library('form_validation');
		 
		$this->form_validation->set_rules('banner_name', 'Please select Banner Name', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE){
		 
			$data['main_content'] = 'banner/addBanner';
			$this->load->view('admin/layout', $data);
		} else {
			
		if($this->input->post()){
			//$post_value2 =createUserIpDetail($user_id);
			$post_value1 = $this->input->post();

			if(!empty($_FILES['mainimage']['name'])){
                $config['upload_path'] = 'images/banner/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
 
				$config['file_name'] = time() . date('Ymd');
				$this->load->library('upload');
				$this->upload->initialize($config);				
                if($this->upload->do_upload('mainimage')){
                    $uploadData = $this->upload->data();
					$post_value1['banner_image'] = $uploadData['file_name'];
					$configImageResize = array(
						'source_image' => $config['upload_path'] . $uploadData['file_name'],
						'new_image' => 'images/banner/thumb/',
						'maintain_ratio' => true,
						'width' => 200,
						'height' => 150
							);
					$this->load->library('image_lib');
					$this->image_lib->initialize($configImageResize);
					$this->image_lib->resize();
					$this->image_lib->clear();
                }else{ 
					$this->session->set_flashdata('error_image', lang('error_image'));
					redirect('banner/addBanner');
                } 
            }else{
                $post_value1['banner_image'] = '';
            }
			$post_value = array_merge($post_value1);
					
			$inserted = $this->App_banner_model->insertModule($post_value);
			if($inserted['status']=='true'){
				$this->session->set_flashdata('success_message', lang('insert_message'));
				redirect('banner');
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('banner');
			}
			
		}else{
			$data['countries'] = $this->App_cms_model->fetchcountry();
			//pr($data); exit;
			$data['main_content'] = 'banner/addBanner';
			$this->load->view('admin/layout', $data);
		} }
	}
	
	public function deleteBanner($id=""){
		$this->load->model('banner/App_banner_model');
		if($id!=''){
			$getStatus = $this->App_banner_model->checkbannerExist($id);
			if ($getStatus == 1) {
				if($this->App_banner_model->deletebanner($id)){
					$this->session->set_flashdata('success_message', lang('delete_message'));
					redirect('banner');
					exit();
				}
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('banner');
				exit();
			}
		}else{
			$this->session->set_flashdata('error_message', lang('error_message'));
			redirect('banner');
			exit();
		}
	}
	
	
	
	
	
	public function ajax_getbannerstatus() {
		$this->load->model('banner/App_banner_model');
		$getactive = $this->App_banner_model->checkstatusExist($_POST);
		if($getactive == 1)
		{
        $get_status = $this->App_banner_model->status_active_inacive($_POST);
        if ($get_status == "active") {
            ?>
            <a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="1" class="label-success statuslabel label label-default status_active"> Active </a>
        <?php } else if ($get_status == "inactive") { ?>
            <a title="De-Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="0" class="label-danger statuslabel label label-default status_active"> De-active </a>
            <?php
        } } elseif($getactive == 0)
		{  
		$getStatus = $this->App_banner_model->checkconditionExist($_POST);
		if($getStatus == 0)
		{
		$get_status = $this->App_banner_model->status_active_inacive($_POST);
        if ($get_status == "active") {
            ?>
            <a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="1" class="label-success statuslabel label label-default status_active"> Active </a>
        <?php } else if ($get_status == "inactive") { ?>
            <a title="De-Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="0" class="label-danger statuslabel label label-default status_active"> De-active </a>
        <?php } } else { ?>
		<a title="De-Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="0" class="label-danger statuslabel label label-default status_active"> Country is map Please check </a>
		<?php } }
        exit;
    }
	
	public function checkcountryidexistt()
	{
		$this->load->model('banner/App_banner_model');
		$language_id = $this->input->post('language_id');
		$country_id = $this->input->post('country_id');
		$bannerid = $this->input->post('bannerid');
		$getStatus = $this->App_banner_model->checkcountryidexist($country_id,$language_id,$bannerid);
		echo $getStatus;
		
	}
	
	public function editBanner($id=false){
		$this->load->model('banner/App_banner_model');
		$this->load->model('cms/App_cms_model');
		$user_id=$this->session->userdata('s_user_id');
		$this->load->library('form_validation');
		$user_id=$this->session->userdata('s_user_id');
		$this->form_validation->set_rules('country_id[]', 'Please select country', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if ($this->form_validation->run() == TRUE){
			if($this->input->post()) {
					$static_pageData2 =modifyUserIpDetail($user_id);
					$static_pageData1 = $this->input->post();
					//pr($static_pageData1); exit;
		if(!empty($_FILES['mainimage']['name'])){
                $config['upload_path'] = 'images/banner/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
				/*$config['max_width']      = '1920';
				$config['max_heigth']      = '574';
				$config['min_width']      = '1919';
				$config['min_heigth']      = '573';*/
				$config['file_name'] = time() . date('Ymd');
				$this->load->library('upload');
				$this->upload->initialize($config);				
                if($this->upload->do_upload('mainimage')){
                    $uploadData = $this->upload->data();
					$static_pageData1['banner_image'] = $uploadData['file_name'];
					$configImageResize = array(
						'source_image' => $config['upload_path'] . $uploadData['file_name'],
						'new_image' => 'images/banner/thumb/',
						'maintain_ratio' => true,
						'width' => 200,
						'height' => 150
							);
					$this->load->library('image_lib');
					$this->image_lib->initialize($configImageResize);
					$this->image_lib->resize();
					$this->image_lib->clear();
                }else{ 
					$this->session->set_flashdata('error_image', lang('error_image'));
					redirect('banner/editBanner/'.$id);
                } 
            }else{
               $static_pageData1['banner_image'] = $this->input->post('old_banner_image');
            }
		$static_pageData = array_merge($static_pageData1, $static_pageData2);
		/* Check Language exist in Banner Page */
		//pr($static_pageData); exit;
		//$updatecheck = $this->App_banner_model->checkcountryidexist($static_pageData,$id);
		/* Check Language exist in Banner Page */
		//echo $updatecheck; exit;
			//if($updatecheck == 0)
				//{
		/* Update Banner Page */
		$updateStatus = $this->App_banner_model->updatebanner_page($static_pageData,$id);
					if ($updateStatus) {
						$this->session->set_flashdata('success_message', lang('update_message'));
						redirect('banner');
						exit();
					} else {
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('banner');
					}
					//} else {
		//$this->session->set_flashdata('error_message', lang('error_message'));
		//redirect('banner');
					 //  }
		} } else {
					$result_country = $this->App_cms_model->fetchcountry();
					$data['countries'] = $result_country;
					$result_module = $this->App_banner_model->fetchEditbanner($id);
					foreach($result_module as $key=>$val_post)
			{
				$cms_country = '';
				$cms_country=$this->App_banner_model->getCountryDetail($val_post['id']);
				//pr($cms_country); exit;
			}
				$result_module[$key]['country'] = $cms_country;
				//pr($result_module); exit;
					if($result_module){
						$data['fetchmodule'] = $result_module;
					}else{
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('banner');
					}
					
					//$getStatus = $this->App_module_model->checkmoduleExist($id);
					$data['main_content'] = 'banner/editBanner';
					$this->load->view('admin/layout', $data);
				}
			
		
		//print_r($data);
		
	}
	
	function deletecountrybanner()
	{
		  $id = $this->input->post('delete');
		  $data = array("is_active"=>'0');
		  $this->db->where('id',$id);
		  $this->db->update('tbl_banner',$data);
	} 
	
	function activecountrybanner()
	{
		  $id = $this->input->post('delete');
		  $data = array("is_active"=>'1');
		  $this->db->where('id',$id);
		  $this->db->update('tbl_banner',$data);
		  
	}
	
	public function viewbanner($id=false){
		$this->load->model('banner/App_banner_model');
		$data['view_banner'] = $this->App_banner_model->fetchbannerList($id);
		//pr($data);
		$data['main_content'] = 'banner/viewBanner';
	    $this->load->view('admin/layout', $data);
	}
	
	public function deleteViewBanner($id=""){
		$this->load->model('banner/App_banner_model');
		if($id!=''){
			$cms_id = $this->uri->segment(4);
			$getStatus = $this->App_banner_model->checkviewbannerExist($cms_id);
			if ($getStatus == 1) {
				if($this->App_banner_model->deleteviewbanner($cms_id)){
					$this->session->set_flashdata('success_message', lang('delete_message'));
					redirect('banner/viewbanner/'.$this->uri->segment(3));
					exit();
				}
			}else{
				$this->session->set_flashdata('error_message', lang('error_message'));
				redirect('banner/viewbanner/'.$this->uri->segment(3));
				exit();
			}
		}else{
			$this->session->set_flashdata('error_message', lang('error_message'));
			redirect('banner/viewbanner/'.$this->uri->segment(3));
			exit();
		}
	}
	
	public function ajax_getbannerviewstatus() {
		$this->load->model('banner/App_banner_model');
        $get_status = $this->App_banner_model->status_active_inacive_banner($_POST);
        if ($get_status == "active") {
            ?>
            <a title="Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="1" class="label-success statuslabel label label-default status_active"> Active </a>
        <?php } else if ($get_status == "inactive") { ?>
            <a title="De-Active"  href="javascript:void(0);" static_pageid="<?php echo $_POST['static_page_id']; ?>" static_pagestatus="0" class="label-danger statuslabel label label-default status_active"> De-active </a>
            <?php
        }
        exit;
    }
	
	public function ajax_getbannerglobalstatus() {
		$this->load->model('banner/App_banner_model');
        $get_status = $this->App_banner_model->status_active_inacive_banner_global($_POST);
		//echo $get_status; exit;
        if ($get_status == "active") {
            ?>
            <a title="Active"  href="javascript:void(0);" static_pageglobalid="<?php echo $_POST['static_page_global_id']; ?>" static_pagestatusglobal="1" class="label-success statuslabel label label-default status_active_global"> Active </a>
        <?php } else if ($get_status == "inactive") { ?>
            <a title="De-Active"  href="javascript:void(0);" static_pageglobalid="<?php echo $_POST['static_page_global_id']; ?>" static_pagestatusglobal="0" class="label-danger statuslabel label label-default status_active_global"> De-active </a>
            <?php
        }
        exit;
    }
	
	public function editViewBanner($id=false){
		$this->load->model('banner/App_banner_model');
		$user_id=$this->session->userdata('s_user_id');
		$state_id = $this->uri->segment(4);
			if($this->input->post()) {
			$static_pageData1 = $this->input->post();
			$static_pageData2 =modifyUserIpDetail($user_id);			
			if($_FILES['mainimage']['name']!=''){
			$target_dir = "./images/banner/";
			$target_file = $target_dir.time().$_FILES['mainimage']['name'];
			$target_file1 = $_FILES['mainimage']['name'];
			if(move_uploaded_file($_FILES['mainimage']['tmp_name'],$target_file)){
				$images_arr = time().$target_file1;
			}
			$static_pageData1['banner_image'] = $images_arr;
			} else {
			$static_pageData1['banner_image'] = $this->input->post('old_banner_image');
			}
					$static_pageData = array_merge($static_pageData1, $static_pageData2);
					$updateStatus = $this->App_banner_model->updateviewbanner_page($static_pageData,$state_id);
					if ($updateStatus) {
						$this->session->set_flashdata('success_message', lang('update_message'));
						redirect('banner/viewbanner/'.$this->uri->segment(3));
						exit();
					} else {
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('banner/viewbanner/'.$this->uri->segment(3));
					}
				} else {
					$result_module = $this->App_banner_model->fetchEditviewbanner($state_id);
					if($result_module['status']=='true'){
						$data['fetchmodule'] = $result_module;
					}else{
						$this->session->set_flashdata('error_message', lang('error_message'));
						redirect('banner/viewbanner/'.$this->uri->segment(3));
					}
					
					$data['main_content'] = 'banner/editViewBanner';
					$this->load->view('admin/layout', $data);
				}
	}
	
}