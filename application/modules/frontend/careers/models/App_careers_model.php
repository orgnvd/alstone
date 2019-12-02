<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_careers_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }

    public function getCareerList()
	{
		$this->db->select('*');
    	$this->db->from('tbl_career');
    	$query = $this->db->get();
    	if($query->num_rows()>0){
	    return $query->result_array($query);
		} else{
		return false;
		}
	}

	
}