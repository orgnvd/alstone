<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends CI_Controller
{
	public function index()
	{
		// $this->load->model('mediaDetails/App_mediaDetails_model');
		$data['main_content'] = 'questions/index';
		$this->load->view('front/layout', $data);
	}
}