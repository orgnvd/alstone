<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_mediaDetails extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }

    public function getMedia($slug)
	{
		$this->db->select('*'); 
		$this->db->from('tbl_media');
		$this->db->where('slug',$slug);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array($query);
		} else{
			return false;
		}
	}

	public function getMediaId($id)
	{
		// $last_row=$this->db->select('id')->order_by('id',"desc")->limit(1)->get('tbl_media')->row();
		$this->db->select('*'); 
		$this->db->from('tbl_media');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array($query);
		} else{
			return false;
		}
	}

	public function getNextLink($media)
	{
		$this->db->select('slug');
		$this->db->from('tbl_media');
		$this->db->where('id >', $media);
		$this->db->limit('1');
		$query = $this->db->get();
		$ret = $query->row();
		return $ret;
		// if($query->num_rows() > 0){
		// 	return $query->result($query);
		// } else{
		// 	return false;
		// }
	}

	public function getPreviousLink($media)
	{
		$this->db->select('slug');
		$this->db->from('tbl_media');
		$this->db->where('id <', $media);
		$this->db->limit('1');
		$query = $this->db->get();
		$ret = $query->row();
		//echo $this->db->last_query(); 
		//return $ret;
		if($query->num_rows() > 0){
			return $ret = $query->row();;
		 } else{
		 	//die("falseee");
		 	return false;
		 }
	}
	
}