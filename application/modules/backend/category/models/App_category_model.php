<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_category_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }
	
	//protected $tbl_Category = 'tbl_Category';
	protected $tbl_visa_category = 'tbl_category';
	
	
	public function insertCategory($post_value){
		if(!empty($post_value)){
			$this->db->insert('tbl_category', $post_value);
			$inserted_id =$this->db->insert_id();
			if($inserted_id){			
				$return['status'] = 'true';
				$return['inserted_id'] = $inserted_id;
				$return['message'] = "Record added successfully.";				
			}else{
				$return['status'] = 'false';
				$return['message'] = "Somthing went wrong.";
			}
			
			return $return;
		}
	}
	
	public function updateCategory($id, $post_value){
	  // pr($post_value);die;
		if(!empty($post_value) && $id!=''){
			$this->db->where('id', $id);
			$updated = $this->db->update($this->tbl_visa_category, $post_value);
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

	public function getCategoryList($id=false){
		if($id){
			$this->db->select('*');
			$this->db->where('id', $id);
			$query = $this->db->get($this->tbl_visa_category);
			if($query->num_rows() > 0){
				$return['status'] = 'true';
				$return['resultSet'] = $query->row();
			}else{
				$return['status'] = 'false';
			}
			 
		}else{
			$this->db->select('*');
			$this->db->order_by('id','desc');
			$this->db->order_by('title', 'ASC');
			$query = $this->db->get($this->tbl_visa_category);
			if($query->num_rows() > 0){
				$return['status'] = 'true';
				$return['resultSet'] = $query->result();
			}else{
				$return['status'] = 'false';
			}
		}
		return @$return;
	}
	
	
	
	public function deleteCate($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get($this->tbl_visa_category);
		if($query->num_rows() > 0){
			$this->db->where('id', $id);
			$this->db->delete($this->tbl_visa_category);
			
			$return['status'] = 'true';
		}else{
			$return['status'] ='false';
		}
		return $return;
	}
	
	public function updateStatus($post_value){
		if(!empty($post_value)){
			$id = $post_value['row_id'];
			$data = array();
			$data['cat_status'] = $post_value['status'];
			
			$this->db->where('id', $id);
			$updated = $this->db->update($this->tbl_visa_category, $data);
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
	
	/* get breadcumb list here*/
	public function get_breadcumb_list($id=false){
		if($id){
			$breadcumb =$this->getRecursion($id);// get breadcumb list
			$this->db->select('*');
			$this->db->where('id',$id);
			$this->db->where('is_active',1);
			$query = $this->db->get($this->tbl_visa_category);
			if($query->num_rows() == 1){
				$result = $query->row();
				$return['status'] = 'true';
				$return['category_view'] = $result;
				$return['breadcumb'] = $breadcumb;
			}else if($query->num_rows() > 1){
				$result = $query->result();
				$return['status'] = 'true';
				$return['resultSet'] = $result;
				$return['breadcumb'] = $breadcumb;
			}else{
				$return['status'] ='false';
			}
			return $return;
		}
	}
	
	public function getRecursion($id){
		 if ($id < 0) {
				throw new InvalidArgumentException('id cannot be less than zero');
			}
			$breadcumb = array();
			$i=0;
			while ($id > 0) {
				$this->db->select('id,cate_name,parent_id');
				$this->db->where('id',$id);
				$this->db->where('is_active',1);
				$this->db->order_by('id', 'desc');
				$query = $this->db->get($this->tbl_visa_category);
				if($query->num_rows() > 0){
					$result = $query->row();
					$breadcumb[$i]['cate_name'] = $result->cate_name;
					$breadcumb[$i]['cate_id'] = $result->id;
				}else{
					$return['status'] ='false';
				}
				$id =$result->parent_id;
				$i++;
			}
			return array_reverse($breadcumb);
	}
	
}
