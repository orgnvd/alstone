<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MediaDetails extends CI_Controller
{
	function __construct() {
        parent::__construct();
		$this->load->model('App_mediaDetails');
        if(getSessionData() =='true'){
			return true;
		}else{
			redirect('admin');
		}
    }
    
	public function fetch($slug)
	{
		// echo $slug; die();
		$this->load->model('mediaDetails/App_mediaDetails');
		$this->App_mediaDetails->getMedia($slug);
		$data['media_Details'] = $this->App_mediaDetails->getMedia($slug);
		$media =  $data['media_Details'][0]['id']; 
		$data['media_next'] = $this->App_mediaDetails->getNextLink($media);
		// pr($data['media_next']); die();
		$data['media_previous'] = $this->App_mediaDetails->getPreviousLink($media);
		//pr($data['media_previous']); die();
		$data['main_content'] = 'mediaDetails/index';
		$this->load->view('front/layout', $data);
	}

	 
}