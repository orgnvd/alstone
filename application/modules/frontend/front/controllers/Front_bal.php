<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller
{
	public function index()
	{
		#last inserted

		$data = $this->front_model->getId(); 

		$slug = 'wood-polymer-composite-sheet';
		$this->load->model('front/front_model');
		$this->load->model('products/Products_model');
		$list = $this->front_model->getPId();
		//pr($list); die();
		$data['all_products'] = $list;
		$data['show_product'] = $this->front_model->getProduct($slug);
		// pr($data['show_product']); die();
		if(!empty($data['show_product']))
		{
			$data['main_content'] = 'front/product';
			$this->load->view('front/layout', $data);
		} else{
			redirect('custom404');
		}
	}

	


	// public function in()
	// {

	// 	$this->load->model('front/front_model');

	// 	$li = $this->front_model->get();
	// 	echo '<pre>',print_r($li),'</pre>';
	// }

	#function to fetch product data

	public function fetchProduct($slug=FALSE)
	{
		// $uri = $this->uri->segment('2');
		// if($uri == 'fetchProduct'){
		// 	redirect('fetchProduct/wood-polymer-composite-sheet');
		// }
		
		$this->load->model('front/front_model');
		$this->load->model('products/Products_model');
		$list = $this->front_model->getPId();
		//pr($list); die();
		$data['all_products'] = $list;
		$res = $this->front_model->getProduct($slug);
		$data['show_product'] = $res;
		$parent_id = $res[0]['parent_id'];  
		$data['show_product'] = $this->front_model->getProduct($slug);
		if($parent_id == 9)
		{
			$data['main_content'] = 'front/product';
			$this->load->view('front/layout', $data);
		} else{
			//die("222");
			$data['main_content'] = 'front/silicone_product';
			$this->load->view('front/layout', $data);
		}

	}

	 
	

	

	
	

	

}

?>

