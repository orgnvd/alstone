<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller
{
	public function index()
	{		$this->load->model('home/App_home_model');		$this->load->model('front/front_model'); 		$data['media'] = $this->load->App_home_model->getMedia();
		$this->load->model('about/app_about_model');
		$data['main_content'] = 'about/index';
		$this->load->view('front/layout', $data);
	}
}