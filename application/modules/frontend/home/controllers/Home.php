<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model('home/App_home_model');
	}

	public function index(){
		
		$this->load->model('home/App_home_model');
		$this->load->model('front/front_model');
		$list = $this->front_model->getPId();
		$testimonial_list = $this->load->App_home_model->getTestimonial();
		$data['categories'] = $this->front_model->get_categories();
		$data['testimonial_list'] = $testimonial_list;
		$data['media'] = $this->load->App_home_model->getMedia();
		//pr($list); die();
		$data['all_products'] = $list;
		$wpcList = $this->App_home_model->getWpcList(9);
		$silicone_cat = '13,14,15,16,17';
		$silicone = $this->App_home_model->getWpcList($silicone_cat);
		$data['wpcList'] = $wpcList;
		$data['silicone'] = $silicone;
		$data['about_content'] = $this->App_home_model->getHomeContent(1);
		$data['home_content'] = $this->App_home_model->HomeContent(2);
		//pr($data['about_content']); die();
		$data['main_content'] = 'home/index';
		$this->load->view('front/layout', $data);
	}
	public function newsletter(){
		$post = $this->input->post();
		if(!empty($post)){
		   $isnerted = $this->App_home_model->insertNewsLetter($post);
		   if($isnerted){
			   redirect("home");
		   } 
		}
	}
	
	public function check_email_exists(){
	  $c_name = $this->input->get('email');
	  $id = $this->uri->segment(3);
      $get_result = $this->App_home_model->check_Exist($c_name,$id);
	  if ($get_result == 0){
			$valid = 'true';
		}else{
			$valid = 'false';
		}
		echo $valid;
    }

	

	
}
