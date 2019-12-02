<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_media_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }

    public function getMediaList($cat, $limit, $offset)
	{
		$query = $this->db->select('*') 
						->from('tbl_media')
	   					->where('media_category',$cat)
						->limit($limit, $offset)
						->get();
		return $query->result();
	}

	public function numOfRows($cat)
	{
		$this->db->where('media_category', $cat);
        $num_rows = $this->db->count_all_results('tbl_media');
		return $num_rows;
	}

	public function getEvents()
	{
		$query = $this->db->select('*') 
						->from('tbl_media')
	   					->where('media_category', 'events')
						->get();
		return $query->result();
	}

	
}