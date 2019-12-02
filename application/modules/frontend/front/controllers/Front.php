<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller {
	
	/**
	* @ Function Name		: __construct
	* @ Function Params	: 
	* @ Function Purpose 	: initilizing variable and providing pre functionalities
	* @ Function Returns	: 
	*/

	public function __construct() {
		parent::__construct(); 
		$this->load->model('front/front_model');
		$this->load->model('products/Products_model');
	}
	
	/**
	* @ Function Name		: index
	* @ Function Params		: 
	* @ Function Purpose 	: To get the latest product 
	* @ Function Returns	: 
	*/
	public function index(){
		#last inserted
		$data = $this->front_model->getId(); 
		$slug = 'wood-polymer-composite-sheet';
		$list = $this->front_model->getPId();
		//pr($list); die();
		$data['all_products'] = $list;
		$data['show_product'] = $this->front_model->getProduct($slug);
		$data['template'] = $this->front_model->getProductTemplate($slug);
		// pr($data['show_product']); die();
		if(!empty($data['show_product']))
		{
			$data['main_content'] = 'front/product';
			$this->load->view('front/layout', $data);
		} else{
			redirect('custom404');
		}
	}

	/**
	* @ Function Name		: fetchProduct
	* @ Function Params		: $slug
	* @ Function Purpose 	: To get the product data 
	* @ Function Returns	: it will return product data by slug(id)
	*/
	
	public function fetchProduct($slug=FALSE){
		$list = $this->front_model->getPId();
		$data['categories'] = $this->front_model->get_categories();
		//pr($data['categories']); die;
		$data['all_products'] = $list;
		$res = $this->front_model->getProduct($slug);
		$data['template'] = $this->front_model->getProductTemplate($slug);
		$data['show_product'] = $res;
		$parent_id = $res[0]['parent_id'];  
		//pr($data['template']); die;
		if(!empty($res)){
			$data['main_content'] = 'front/product';
			$this->load->view('front/layout', $data);
		} else{
			redirect("custom404");
		}
	}

}

?>

