<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model{

	function __construct() {
        parent::__construct();
        
    }

    protected $tbl_products = 'tbl_products';

    public function getProductList(){
    	$this->db->select('*');
    	$this->db->from('tbl_products');
    	$query = $this->db->get();
    	if($query->num_rows()>0){
	    return $query->result_array($query);
		} else{
		return false;
		}
    }

    public function getProducts(){
        $this->db->select('*');
        $this->db->from('tbl_category');
        $query = $this->db->get();
        return $query->result();

    }

    public function insertProduct($post_value, $fileName, $images, $file)
    {
               $product_data = array(
                'product_tagline'        =>     $post_value['product_tagline'],
                'product_title'          =>     $post_value['product_title'],
                'product_slug'           =>     $post_value['product_slug'],
                'parent_id'              =>     $post_value['parent_id'],
                'product_status'         =>     '1',
                'product_order'          =>     $post_value['product_order'],
                'product_description'    =>     $post_value['product_description'],
                'product_production'     =>     $post_value['product_production'],
                'product_overview'       =>     $post_value['product_overview'],
                'product_specification'  =>     $post_value['product_specification'],
                'product_image'          =>     $fileName,
                'product_gallery'        =>     $images,
                'product_banner'         =>     $file,
                'meta_title'             =>     $post_value['meta_title'],
                'meta_keyword'           =>     $post_value['meta_keyword'],
                'meta_description'       =>     $post_value['meta_description'],

                );
            
            $inserted = $this->db->insert('tbl_products', $product_data);
			if($inserted){
			 return true;
			 }else{
				return false;
			 }
    }

    public function updateProduct($post_value, $id, $fileName,$banner_data,$images)
    {
         $product_data = array(
                'product_tagline'        =>     $post_value['product_tagline'],
                'product_title'          =>     $post_value['product_title'],
                'product_slug'           =>     $post_value['product_slug'],
                'parent_id'              =>     $post_value['parent_id'],
                'product_status'         =>     '1',
				'product_order'          =>     $post_value['product_order'],
                'product_description'    =>     $post_value['product_description'],
                'product_production'     =>     $post_value['product_production'],
                'product_overview'       =>     $post_value['product_overview'],
                'product_specification'  =>     $post_value['product_specification'],
                'product_image'          =>     $fileName,
                'product_gallery'        =>     $images,
                'product_banner'        =>      $banner_data,
                'meta_title'             =>     $post_value['meta_title'],
                'meta_keyword'           =>     $post_value['meta_keyword'],
                'meta_description'       =>     $post_value['meta_description'],

                );

         $this->db->where('id', $id);
         $updatedProduct = $this->db->update('tbl_products', $product_data);
		 if($updatedProduct){
			 return true;
		 }else{
		 return false;
		 }
		 
    }

    public function getUserById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_products');
        if($query->num_rows() > 0){
            return $query->row();
        } else {
            return false;
        }
    }

    public function deleteProduct($id)
    {
        $this->db->where('id', $id);
        if($this->db->delete('tbl_products')){
            return 1;
        } else{
            return 0;
        }
    }
	
	#update status 
	public function updateStatus($post_value){ 
		if(!empty($post_value)){ 
			$id = $post_value['row_id'];
			$data = array();
			$data['product_status'] = $post_value['status'];
			$this->db->where('id', $id);
			$updated = $this->db->update($this->tbl_products, $data);
			if($updated){			
				$return['status'] = 'true';
				$return['message'] = "Record updated successfully.";				
			}else{
				$return['status'] = 'false';
				$return['message'] = "Somthing went wrong, please try again.";
			}
			return $return;
		}
	}
	public function status_active_inacive($status) {
        $staus = $status['status'];
	   // echo  $staus;die;
        if ($staus == 0) {
            $sub_admin['product_status'] = '0';
            $this->db->where('id ', $status['static_page_id']);
            $update_status = $this->db->update('tbl_products', $sub_admin);
            return 'inactive';
        } else {
            $sub_admin['product_status'] = '1';
            $this->db->where('id ', $status['static_page_id']);
            $update_status = $this->db->update('tbl_products', $sub_admin);
            return 'active';
        }
    }
	
}



 