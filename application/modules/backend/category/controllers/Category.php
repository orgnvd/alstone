<?php error_reporting(-1);

defined('BASEPATH') OR exit('No direct script access allowed');



class Category extends CI_Controller {

	

	function __construct() {

        parent:: __construct();

		

        if(getSessionData() =='true'){

			$this->load->model('category/App_category_model');

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

	

	public function addCategory(){

		$user_id = $this->session->userdata('s_user_id');

		$this->load->model('category/App_category_model');

		$this->load->model('cms/App_cms_model');

		if($this->input->post()){

			$post_value = $this->input->post();

			$postValue['title'] = $post_value['cate_name'];

			$postValue['template'] = $post_value['template'];

			$postValue['description'] = $post_value['description'];

			$postValue['meta_title'] = $post_value['meta_title'];

			$postValue['meta_keyword'] = $post_value['meta_keyword'];

			$postValue['meta_description'] = $post_value['meta_description'];

			$postValue['created_date'] = date('Y-m-d H:i:s');

			$postValue['cat_status'] = '1';

			//pr($post_value);die;

			$inserted = $this->App_category_model->insertCategory($postValue);

			if($inserted['status']=='true'){				

				$this->session->set_flashdata('success_message', lang('insert_message'));

				redirect('category');

			}else{

				$this->session->set_flashdata('error_message', lang('error_message'));

				redirect('category');

			}

			

		}else{

			$this->load->model('cms/App_cms_model');

			$cms_object = new App_cms_model();

			$data['category_list'] = $this->App_category_model->getCategoryList();

			$data['main_content'] = 'category/addCategory';

			$this->load->view('admin/layout', $data);

		}

	}

	

	public function editCategory($id=false){

		$user_id = $this->session->userdata('s_user_id');

		$this->load->model('category/App_category_model');

		$this->load->model('cms/App_cms_model');

		if($this->input->post()){

			$post_value = $this->input->post();



		    $postValue['title'] = $post_value['cate_name'];

		    $postValue['template'] = $post_value['template'];

			$postValue['description'] = $post_value['description'];

			$postValue['meta_title'] = $post_value['meta_title'];

			$postValue['meta_keyword'] = $post_value['meta_keyword'];

			$postValue['meta_description'] = $post_value['meta_description'];

			$cc = modifyUserIpDetail($user_id);

		 

			//pr($postValue);die;

			$inserted = $this->App_category_model->updateCategory($id, $postValue);

			redirect('category');

		}else{

			$this->load->model('cms/App_cms_model');

			$cms_object = new App_cms_model();

			 

			$data['categoryDetail'] = $this->App_category_model->getCategoryList($id, $id);

			$data['main_content'] = 'category/editCategory';

			$this->load->view('admin/layout', $data);

		}

	}

	

	public function deleteCate($id=false){

		if($id){

			$this->load->model('category/App_category_model');

			$result = $this->App_category_model->deleteCate($id);

			if($result['status'] =='true'){

				$this->session->set_flashdata('success_message', lang('delete_message'));

				redirect('category');

			}else{

				$this->session->set_flashdata('error_message', lang('error_message'));

				redirect('category');

			}

		}else{

			$this->session->set_flashdata('error_message', lang('error_message'));

			redirect('category');

		}

	}

	

	public function updateStatus(){

		$return = array();

		$post_value = $this->input->post();

		$this->load->model('category/App_category_model');

		$result = $this->App_category_model->updateStatus($post_value);

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

	/* for view category for all lebel*/

	public function viewCategory($id=false){

		if($id){

			$viewCategory = $this->getBreadcumbList($id);

			//pr($viewCategory); die;

			$data['viewCategory'] = $viewCategory;

			$data['main_content'] = 'category/viewCategory';

			$this->load->view('admin/layout', $data);

		}

	}

	

	public function getBreadcumbList($id=false){

		if($id){

			$this->load->model('category/App_category_model');

			$bradecumb = $this->App_category_model->get_breadcumb_list($id);

			if($bradecumb['status']=='true'){

				$return['status'] = 'true';

				$return['categoryDetail'] = $bradecumb;

			}else{

				$return['status'] = 'false';

			}

			return $return;

		}

	}

	

	public function dataTable(){

		$this->load->view('category/new_index');

	}

}

