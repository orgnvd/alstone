<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_model extends CI_Model
{
	function __construct() {
        parent::__construct();
        
    }

    protected $tbl_products = 'tbl_products';

	public function getProduct($slug)
	{
		$this->db->select('*'); 
		$this->db->from('tbl_products');
		$this->db->where('product_slug',$slug);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array($query);
		} else{
			return false;
		}
	}
#changes
	public function getId()
	{

		// die("FDSAFSAF");

		$last_row=$this->db->select('id')->order_by('id',"desc")->limit(1)->get('tbl_products')->row();
		  

		$this->db->select('*'); 
		$this->db->from('tbl_products');
		$this->db->where('product_slug',$slug);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array($query);
		} else{
			return false;
		}
	}

	public function get()
	{
		$last_row=$this->db->select('id')->order_by('id',"desc")->limit(1)->get('tbl_products')->row();
		return $last_row;
	}

	public function getParentId()
	{
		$this->db->distinct();
		$this->db->select('tbl_products.parent_id'); 
		$this->db->from('tbl_products');
		$query = $this->db->get();
		$parentData  = $query->result_array($query);
		$data = array();

		if($query->num_rows() > 0){
			foreach ($parentData as $row) {

				$data[] = $row;
				$parent_id =  $row['parent_id'];
				$this->db->select('product_title, product_slug,id');
				$this->db->where('parent_id', $parent_id);
				$this->db->from('tbl_products');
				$q = $this->db->get();
				$data[]['products'] = $q->result_array();

				// $data = array();


			}
			echo pr($data);  
			 die();
 		}
}    
#test

	public function getPId()
	{
		$this->db->select('tbl_products.id as product_id,tbl_products.product_title, tbl_products.product_slug, tbl_category.title,tbl_category.id as cat_id , tbl_category.title');
		$this->db->from('tbl_category');
        $this->db->join('tbl_products', 'tbl_products.parent_id = tbl_category.id','right');
        $query = $this->db->get();
       
        return $query->result();
	}

	




}