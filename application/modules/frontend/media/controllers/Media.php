<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller
{
	public function index($category='News')
	{
		$this->load->model('media/app_media_model');
		// $test = $this->input->get($category);
		//echo $category;
		$media_list = $this->app_media_model->getMediaList($category);
		$data['media_list'] = $media_list;
		// print_r($data['media_list']); die();
		// $li = $this->app_media_model->news($category);
		// $data['li'] = $li;
		$data['main_content'] = 'media/index';
		$this->load->view('front/layout', $data);
	}

	public function listing($category=FALSE)
	{	
		$this->load->model('media/app_media_model');
		$this->load->library('pagination');
		
		$config['base_url'] = base_url('media/listing/'.$category);
		$config['total_rows'] = $this->app_media_model->numOfRows($category);
		$config['per_page'] = 4;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>"; 
		$this->pagination->initialize($config);
		$data['media_list'] = $this->app_media_model->getMediaList($category, $config['per_page'], $this->uri->segment(4));
		$data['events'] = $this->app_media_model->getEvents();
				//echo $this->pagination->create_links();
		$data["links"] = $this->pagination->create_links();

		
		$data['main_content'] = 'media/index';
		$this->load->view('front/layout', $data);
	}


	

	
}