<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_gallery_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }
	
	public function insertModule($post_value,$fileName,$fileName1){
		 
		if(!empty($post_value['youtube_id'])){
			$youtube = implode(',',$post_value['youtube_id']);
			} else{
			$youtube = '';	
		}
		if(!empty($post_value)){
			 
		//$this->db->insert('tbl_gallery_content', $static_pageData);
		#add images to category of gallery
		$insert_id = $post_value['title_name'];
		if(!empty($fileName)){
		$imgArr = array();
		$imgArr = explode(',',$fileName);
		//pr($imgArr); exit;
		for($i=0;$i< @count($imgArr);$i++)
		{
		$mainimg = $imgArr[$i];
		$sql2 = "insert into tbl_gallery_banner(gallery_id,banner_image,type) values('$insert_id','$mainimg','1')"; 
		$this->db->query($sql2);
		} }
		if(!empty($fileName1)){
			$imgArr1 = array();
			$imgArr1 = explode(',',$fileName1);
			for($i=0;$i< @count($imgArr1);$i++)
			{
			$mainimg = $imgArr1[$i];
			$sql3 = "insert into tbl_gallery_banner(gallery_id,banner_image,type) values('$insert_id','$mainimg','2')"; 
			$this->db->query($sql3);
			} 
		}
		if($insert_id){			
				$return['status'] = 'true';
				$return['message'] = "Gallery added successfully.";				
			}else{
				$return['status'] = 'false';
				$return['message'] = "Somthing went wrong.";
			}
			return $return;
		}
	}
	/**
	* @ Function Name		: getDetails
	* @ Function Params		: 
	* @ Function Purpose 	: function to edit existing subject by admin
	* @ Function Returns	: 
	**/

	function getDetails($id) {
		$this->db->select("*");
		$this->db->from("tbl_category");  
		$this->db->where("tbl_category.catID", $id);
		return $this->db->get()->row();
	}
	
	public function fetchgalleryimage() {
	$this->db->select('banner_image');
	$this->db->group_by('banner_image');
	$this->db->order_by('id', 'DESC');
    $this->db->from('tbl_gallery_banner');
   	$query = $this->db->get();
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			
			return $data; 
	     }
        return false;
    }
	
	/* Edit Gallery Function Start */
	
	public function fetchEditgallery($sid) {
		$this->db->select('*');
		$this->db->from('tbl_category');
		$this->db->where('tbl_category.catID', $sid);
		$query = $this->db->get();
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			return $data; 
	     }
        return false;
    }
	
	public function getbannerDetail($sid) {
	$this->db->select('id,banner_image,type');
    $this->db->from('tbl_gallery_banner');
   	$this->db->where('gallery_id', $sid);
		$query = $this->db->get();
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			
			return $data; 
	     }
        return false;
    }
	
	 
	
	public function getGalleryDetail($sid) {
	$this->db->select('banner_image');
	$this->db->where('gallery_id', $sid);
   	$this->db->from('tbl_gallery_banner');
   	$query = $this->db->get();
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			$res_exp=array();
				foreach ($data as $val)
				 {
					$res_exp[]=$val['banner_image'] ;
				 }
			return $res_exp; 
	     }
        return false;
    }
	
	public function updategallery_page($sub_ad, $id, $fileName, $fileName1) {
		  //pr($id); die("Fdsafasftesttst");
 
		 
		$sub_admin['title_name']  = $sub_ad['title_name'];
		 
		  
 	//$sql2 = "insert into tbl_gallery_banner(gallery_id,banner_image,type) values('$insert_id','$mainimg','1')"
		if(!empty($fileName)){
		$imgArr = array();
		$imgArr = explode(',',$fileName);
		//pr($imgArr); exit;
		for($i=0;$i< @count($imgArr);$i++)
		{
		$mainimg = $imgArr[$i];
		$sql2 = "insert into tbl_gallery_banner(gallery_id,banner_image,type) values('$id','$mainimg','1')"; 
		$this->db->query($sql2);
		} }
		if(!empty($fileName1)){
		$imgArr1 = array();
		$imgArr1 = explode(',',$fileName1);
		for($i=0;$i< @count($imgArr1);$i++)
		{
		$mainimg = $imgArr1[$i];
		$sql3 = "insert into tbl_gallery_banner(gallery_id,banner_image,type) values('$id','$mainimg','2')"; 
		$this->db->query($sql3);
		} }
        if ($update_status) {

            return $update_status;

        } else {

            return FALSE;

        }

    }
	/* Edit Gallery Function End */
	
	/* Listing Gallery List Start */
	
	public function getGalleryList(){
    $this->db->select('tbl_gallery_content.*,tbl_Category.id as cate_id,tbl_Category.cate_name');
    $this->db->from('tbl_gallery_content');
    $this->db->join('tbl_Category', 'tbl_Category.id = tbl_gallery_content.business_category_id');
    $query = $this->db->get();
	if($query->num_rows()>0)
	    return $query->result_array($query);
	  else
	    return array(); 
	}
	
	 
	
	/* Listing Gallery List End */
	
	/* Active Inactive Function Start */
	
	public function checkstatusExist($status) {
		$check = $status['static_page_id'];
		//pr($status); exit;
		$this->db->where('id', $check);
		$this->db->where('is_active', '0');
		$this->db->from('tbl_gallery_content');
		$userStatus = $this->db->count_all_results();        
		if ($userStatus > 0) {
			return 1;
			} else {
			return 0;
		}
		}
		
	public function status_active_inacive($status) {

        $staus = $status['status'];

        if ($staus == 1) {

            $sub_admin['is_active'] = '0';

            $this->db->where('id ', $status['static_page_id']);

            $update_status = $this->db->update('tbl_gallery_content', $sub_admin);

            return 'inactive';

        } else {

            $sub_admin['is_active'] = '1';

            $this->db->where('id ', $status['static_page_id']);

            $update_status = $this->db->update('tbl_gallery_content', $sub_admin);

            return 'active';

        }

    }
	
	public function checkconditionExist($status) {
		$check = $status['static_page_id'];
		//pr($status); exit;
		$this->db->where('gallery_id', $check);
		$this->db->from('tbl_gallery_country');
		$userStatus = $this->db->count_all_results();        
		if ($userStatus > 0) {
			return 1;
			} else {
			return 0;
		}
		}
	
	/* Active Inactive Function End */
	
}
