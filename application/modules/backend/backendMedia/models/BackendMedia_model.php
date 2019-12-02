<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackendMedia_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }

	protected $tbl_products = 'tbl_media';

    public function insertMedia($post_value, $image_data)
    {
    	 $media_data = array(
                
                'media_title'          =>     $post_value['media_title'],
                'slug'           	   =>     $post_value['slug'],
               	'date' 				   =>     $post_value['date'],
                'status'               =>     '1',
                'media_category'       =>	  $post_value['media_category'],
                'media_description'    =>     $post_value['media_description'],
                'media_image'          =>     $image_data,
                'meta_title'           =>     $post_value['meta_title'],
                'meta_keyword'         =>     $post_value['meta_keyword'],
                'meta_description'     =>     $post_value['meta_description'],

                );
            
            $inserted = $this->db->insert('tbl_media', $media_data);
            if($inserted){
                return true;
            }else {
                return false;
            }
    } 

  	public function getMediaList()
  	{
    	$this->db->select('*');
    	$this->db->from('tbl_media');
    	$query = $this->db->get();
    	if($query->num_rows()>0){
	    return $query->result_array($query);
		} else{
		return false;
		}
    }


    public function getMediaById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_media');
        if($query->num_rows() > 0){
            return $query->row();
        } else {
            return false;
        }
    }

     public function updateMedia($post_value, $id, $image_data)
    {
         $media_data = array(
               'media_title'          =>     $post_value['media_title'],
                'slug'           	   =>     $post_value['slug'],
               	'date' 				   =>     $post_value['date'],
                'status'               =>     '1',
                'media_category'       =>	  $post_value['media_category'],
                'media_description'    =>     $post_value['media_description'],
                'media_image'          =>     $image_data,
                'meta_title'           =>     $post_value['meta_title'],
                'meta_keyword'         =>     $post_value['meta_keyword'],
                'meta_description'     =>     $post_value['meta_description'],

                );

         $this->db->where('id', $id);
         $updatedMedia = $this->db->update('tbl_media', $media_data);
         if($updatedMedia){
            return true;

         }else{

            return false;
         }
    }

    public function deleteMedia($id)
    {
        $this->db->where('id', $id);
        if($this->db->delete('tbl_media')){
            return 1;
        } else{
            return 0;
        }
    }
}
