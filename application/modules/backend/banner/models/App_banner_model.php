<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_banner_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }
	
	protected $tbl_Module = 'tbl_banner_management';
	protected $tbl_country = 'tbl_country';
	protected $tbl_business_category = 'tbl_category';

	public function insertModule($post_value){
		
		 pr($post_value); die("fdsaf");
		
		if(!empty($post_value)){
			$static_pageData = array(
			'business_category_id' => $post_value['business_category_id'],
			'banner_name' => $post_value['banner_name'],
			'banner_image'     => $post_value['banner_image'],
            'created_date' 	   => $post_value['created_date'],
			'created_by'       => $post_value['created_by'],
			'create_browser'   => $post_value['create_browser'],
			'created_ip'       => $post_value['created_ip']
        );
		$this->db->insert('tbl_banner_management', $static_pageData);
		$insert_id = $this->db->insert_id();
		for($i=0;$i< @count($_POST['country_id']);$i++)
		 {
			$country_id = $_POST['country_id'][$i];
			$language_id = $_POST['language_id'][$i];
			$banner_link = $_POST['banner_link'][$i];
			$start_date = $_POST['start_date'][$i];
			$end_date = $_POST['end_date'][$i];
			$sequence = $_POST['sequence'][$i];
	    $sql1 = "insert into tbl_banner(banner_id,country_id,language_id,banner_link,start_date,end_date,sequence,is_active) values('$insert_id','$country_id','$language_id','$banner_link','$start_date','$end_date','$sequence','1')";  
	   $this->db->query($sql1);
	   }
		if($insert_id){			
				$return['status'] = 'true';
				$return['message'] = "Banner added successfully.";				
			}else{
				$return['status'] = 'false';
				$return['message'] = "Somthing went wrong.";
			}
			return $return;
		}
	}
	/* Update Banner */
	public function fetchEditbanner($sid) {
		$this->db->select('tbl_banner_management.*,tbl_category.catID as cate_id,tbl_category.catTitle');
		$this->db->from('tbl_banner_management');
		$this->db->join('tbl_category', 'tbl_category.catID = tbl_banner_management.business_category_id');
		$this->db->where('tbl_banner_management.id', $sid, 'left outer');
		$query = $this->db->get();
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			return $data; 
	     }
        return false;
    }
	
	public function getCountryDetail($sid) {
		$this->db->select('tbl_banner.*,tbl_country.country_id,tbl_country.country_name,tbl_language.language_id,tbl_language.language_name');
    $this->db->from('tbl_banner');
    $this->db->join('tbl_country', 'tbl_country.country_id = tbl_banner.country_id');
	$this->db->join('tbl_language', 'tbl_language.language_id = tbl_banner.language_id');
		$this->db->where('banner_id', $sid);
		$query = $this->db->get();
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			return $data; 
	     }
        return false;
    }
	
	public function getCountryDetail1($array) {
		//pr($array);DIE;
		$this->db->select('tbl_banner.banner_id,tbl_banner.country_id,tbl_country.country_id,tbl_country.country_name,tbl_language.language_id,tbl_language.language_name');
    $this->db->from('tbl_banner');
    $this->db->join('tbl_country', 'tbl_country.country_id = tbl_banner.country_id');
    $this->db->join('tbl_language', 'tbl_language.language_id = tbl_banner.language_id');
	$this->db->where('banner_id', $array);	
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
	    if ($query->num_rows() > 0) {
            $data = $query->result_array();
			return $data; 
	     }
        return false;
    }
	
	public function checkcountryidexist($country_id,$language_id,$bannerid) {
		$this->db->where('banner_id', $bannerid);
		$this->db->where('language_id', $language_id);
		$this->db->where('country_id', $country_id);
		$this->db->from('tbl_banner');
		//$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		$userStatus = $this->db->count_all_results();        
		if ($userStatus > 0) {
		return 1;
		} else {
		return 0;
		}

    }
	
	public function updatebanner_page($sub_ad, $id) {
		$sub_admin['business_category_id']    = $sub_ad['business_category_id'];
		$sub_admin['banner_name']  = $sub_ad['banner_name'];
		$sub_admin['banner_image']  = $sub_ad['banner_image'];
		$sub_admin['modified_date']  = $sub_ad['modified_date'];
        $sub_admin['modified_by']  = $sub_ad['modified_by'];
        $sub_admin['modified_browser']  = $sub_ad['modified_browser'];
        $sub_admin['modified_ip']  = $sub_ad['modified_ip'];
		$this->db->where('id', $id);
		$update_status = $this->db->update('tbl_banner_management', $sub_admin);
		if(@count($id)>0)
			{
		  $sql_del = "delete from tbl_banner where banner_id='".$id."'";
		  $this->db->query($sql_del);
		for($i=0;$i< @count($_POST['country_id']);$i++)
		 {
			$country_id = $_POST['country_id'][$i];
			$language_id = $_POST['language_id'][$i];
			$banner_link = $_POST['banner_link'][$i];
			$start_date = $_POST['start_date'][$i];
			$end_date = $_POST['end_date'][$i];
			$sequence = $_POST['sequence'][$i];
			$is_active = $_POST['is_active'][$i];
	    $sql1 = "insert into tbl_banner(banner_id,country_id,language_id,banner_link,start_date,end_date,sequence,is_active) values('$id','$country_id','$language_id','$banner_link','$start_date','$end_date','$sequence','$is_active')";  
	   $this->db->query($sql1);
	   }
		 }
        if ($update_status) {

            return $update_status;

        } else {

            return FALSE;

        }

    }
	/* Update Banner */
	
	public function getBannerList(){
    $this->db->select('tbl_banner_management.id,tbl_banner_management.banner_name,tbl_banner_management.is_active,tbl_category.catid as cate_id,tbl_category.catTitle');
    $this->db->from('tbl_banner_management');
    $this->db->join('tbl_category', 'tbl_category.catid = tbl_banner_management.business_category_id');
    $query = $this->db->get();
	if($query->num_rows()>0)
	    return $query->result_array($query);
	  else
	    return array(); 
	}
	/* Delete Banner */
	public function checkbannerExist($editId="") {
		$this->db->where('id', $editId);
		$this->db->from('tbl_banner_management');
		$userStatus = $this->db->count_all_results();        
		if ($userStatus > 0) {
		return 1;
		} else {
		return 0;
		}
	}
	
	
	
	public function deletebanner($id){
		$this->db->where('id', $id);
		if ($this->db->delete('tbl_banner_management')) {
		return 1;
		} else {
		return 0;
		}
	}
	
	/* Delete Banner */
	
	public function status_active_inacive($status) {

        $staus = $status['status'];

        if ($staus == 1) {

            $sub_admin['is_active'] = '0';

            $this->db->where('id', $status['static_page_id']);

            $update_status = $this->db->update('tbl_banner_management', $sub_admin);

            return 'inactive';

        } else {

            $sub_admin['is_active'] = '1';

            $this->db->where('id', $status['static_page_id']);

            $update_status = $this->db->update('tbl_banner_management', $sub_admin);

            return 'active';

        }

    }
	
	
	
	
	
	public function fetchbannerList($sid) {
        $this->db->from('tbl_banner');
        $this->db->where('banner_id', $sid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->result();
			return $data;
        }
			return false;
		
        
    }
	
	public function fetchEditviewbanner($sid) {
        $this->db->from('tbl_banner');
        $this->db->where('id', $sid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
			$return['status'] = 'true';
			$return['resultset'] = $data;
			$return['message'] = '';
        }else{
			$return['status'] = 'false';
			$return['message'] = 'No record found';
		}
        return $return;
    }
	
	public function updateviewbanner_page($sub_ad, $id) {
		$sub_admin['banner_name']    = $sub_ad['banner_name'];
		$sub_admin['banner_title']  = $sub_ad['banner_title'];
		$sub_admin['banner_link']  = $sub_ad['banner_link'];
        $sub_admin['banner_image']  = $sub_ad['banner_image'];
		$this->db->where('id', $id);
		$update_status = $this->db->update('tbl_banner', $sub_admin);
		if ($update_status) {
		return $update_status;
		} else {
		return FALSE;
		}
	}
	
	public function checkviewbannerExist($editId="") {
		$this->db->where('id', $editId);
		$this->db->from('tbl_banner');
		$userStatus = $this->db->count_all_results();        
		if ($userStatus > 0) {
		return 1;
		} else {
		return 0;
		}
	}
	
	public function deleteviewbanner($id){
		$this->db->where('id', $id);
		if ($this->db->delete('tbl_banner')) {
		return 1;
		} else {
		return 0;
		}
	}
	
	public function status_active_inacive_banner($status) {
//pr($status);
        $staus = $status['status'];

        if ($staus == 1) {

            $sub_admin['is_active'] = '0';

            $this->db->where('id', $status['static_page_id']);

            $update_status = $this->db->update('tbl_banner', $sub_admin);

            return 'inactive';

        } else {

            $sub_admin['is_active'] = '1';

            $this->db->where('id', $status['static_page_id']);

            $update_status = $this->db->update('tbl_banner', $sub_admin);

            return 'active';

        }

    }
	
	public function status_active_inacive_banner_global($status) {
		//pr($status);
        $staus = $status['statusglobal'];

        if ($staus == 1) {

            $sub_admin['is_global'] = '0';

            $this->db->where('id', $status['static_page_global_id']);

            $update_status = $this->db->update('tbl_banner', $sub_admin);

            return 'inactive';

        } else {

            $sub_admin['is_global'] = '1';

            $this->db->where('id', $status['static_page_global_id']);

            $update_status = $this->db->update('tbl_banner', $sub_admin);

            return 'active';

        }

    }
	
	public function checkconditionExist($status) {
		$check = $status['static_page_id'];
		//pr($status); exit;
		$this->db->where('banner_id', $check);
		$this->db->from('tbl_banner');
		$userStatus = $this->db->count_all_results();        
		if ($userStatus > 0) {
			return 1;
			} else {
			return 0;
		}
		}
	
	public function checkstatusExist($status) {
		$check = $status['static_page_id'];
		//pr($status); exit;
		$this->db->where('id', $check);
		$this->db->where('is_active', '0');
		$this->db->from('tbl_banner_management');
		$userStatus = $this->db->count_all_results();        
		if ($userStatus > 0) {
			return 1;
			} else {
			return 0;
		}
		}
}
