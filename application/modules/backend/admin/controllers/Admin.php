<?php
error_reporting(-1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function _construct(){
		parent:: _construct();
		
		if(getSessionData() =='true'){
			return true;
		}else{
			redirect('admin');
		}
	}


	public function index(){	
      if ($this->session->userdata('s_user_id') == TRUE ) {
			redirect('dashboard');
		} else {
        	$this->load->view('login');
		}
	}
	
	public function authAuthentication(){	
		$this->load->model('admin/App_admin_model');
		if($this->input->post()){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			if($username !='' && $password !=''){
				$pass = md5($password);
				$result = $this->App_admin_model->userAutheticate($username, $pass);
				if($result['status']=='okay'){
					$user_data = array();
					$user_data['s_user_id'] = $result['userDetail']->id;
					$user_data['s_username'] = $result['userDetail']->user_name;
					$user_data['s_first_name'] = $result['userDetail']->first_name;
					$user_data['s_last_name'] = $result['userDetail']->last_name;
					$user_data['s_mobile'] = $result['userDetail']->user_mobile;
					$user_data['s_user_role'] = $result['userDetail']->user_role_id;
					$user_data['s_loginStatus'] = 'true';
					$user_data['logged_in'] = 'true';
					$this->session->set_userdata($user_data);
					redirect('dashboard');				
				}else{
					$this->session->set_flashdata('error_message', 'Username or password');
					redirect('admin/authAuthentication');
				}
				
			}else{
				$this->session->set_flashdata('error_message', 'Please enter valid email-id or passwrod');
				redirect('admin/authAuthentication');
			}
			
		}else{
			$this->session->set_flashdata('error_message', 'Please enter valid email-id or passwrod');
			redirect('admin');
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}
	
}
