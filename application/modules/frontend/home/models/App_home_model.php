<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_home_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
        
    }
	
	/* Global Banner List Start */
	public function getBannerList($global_id = False ,$business_cat_id = False){
	$this->db->select('tbl_banner_management.id,tbl_banner_management.banner_name,tbl_banner_management.banner_image,tbl_banner.banner_link,tbl_banner.start_date,tbl_banner.end_date,tbl_banner.sequence,tbl_banner.country_id');
    $this->db->from('tbl_banner_management');
    $this->db->join('tbl_banner', 'tbl_banner.banner_id = tbl_banner_management.id');
	$this->db->where('tbl_banner.is_active', '1');
	$this->db->where('tbl_banner_management.is_active', '1');
	$this->db->where('tbl_banner.country_id', $global_id);
	$this->db->where('tbl_banner_management.business_category_id', $business_cat_id);
	$this->db->order_by('tbl_banner_management.id', 'DESC');
	$this->db->limit('10');
    $query = $this->db->get();
	if($query->num_rows()>0)
	{
		$data = $query->result_array();
		return $data;
	}
	return false; 
	}
	/* Global Banner List End */
	
	/* Global About us Page Start */
	public function getAbout($global_id = False ,$business_cat_id = False , $slug = False){
	$this->db->select('tbl_content_management.id,tbl_content_management.title_name,tbl_content_management.description,tbl_content_management.sub_title_name,tbl_content_management.slug,tbl_cms_banner.banner_image');
    $this->db->from('tbl_content_management');
    $this->db->join('tbl_cms', 'tbl_cms.cms_id = tbl_content_management.id');
	$this->db->join('tbl_cms_banner', 'tbl_cms_banner.cms_id = tbl_content_management.id');
    $this->db->where('tbl_content_management.is_active', '1');
	$this->db->where('tbl_content_management.title_name', 'About us');
	$this->db->where('tbl_cms.country_id', $global_id);
	$this->db->where('tbl_content_management.business_category_id', $business_cat_id);
	if(!empty($slug))
	{
		$this->db->where('tbl_content_management.slug', $slug);
	}
    $query = $this->db->get();
	if($query->num_rows()>0)
	{
		$data = $query->result_array();
		return $data;
	}
	return false; 
	}
	/* Global About us Page End */
	
	/* Global News List Start */
	public function getNewsList($global_id = False ,$business_cat_id = False ,$news = False){
	$this->db->select('tbl_news_management.title,tbl_news_management.news_type,tbl_news_management.link,tbl_news_management.slug');
    $this->db->from('tbl_news_management');
    $this->db->join('tbl_news', 'tbl_news.news_id = tbl_news_management.id');
	$this->db->where('tbl_news_management.is_active', '1');
	$this->db->where('tbl_news.country_id', $global_id);
	$this->db->where('tbl_news_management.business_category_id', $business_cat_id);
	$this->db->order_by('tbl_news_management.id', 'DESC');
	if(empty($news))
	{
		$this->db->limit('4');
	}
	$query = $this->db->get();
	if($query->num_rows()>0)
	{
		$data = $query->result_array();
		return $data;
	}
	return false; 
	}
	/* Global News List End */
	
	/* Global Article List Start */
	public function getArticleList($global_id = False ,$business_cat_id = False){
	$this->db->select('tbl_article_management.title_name,tbl_article_management.description,tbl_article_management.banner_image');
    $this->db->from('tbl_article_management');
    $this->db->join('tbl_article', 'tbl_article.article_id = tbl_article_management.id');
	$this->db->where('tbl_article_management.is_active', '1');
	$this->db->where('tbl_article_management.article_type', '1');
	$this->db->where('tbl_article.country_id', $global_id);
	$this->db->where('tbl_article_management.business_category_id', $business_cat_id);
	$this->db->order_by('tbl_article_management.id', 'DESC');
	$this->db->limit('4');
    $query = $this->db->get();
	if($query->num_rows()>0)
	{
		$data = $query->result_array();
		return $data;
	}
	return false; 
	}
	/* Global Article List End */
	
	/* Global Why Mahindra Page Start */
	public function getCMSList($global_id = False ,$business_cat_id = False){
	$this->db->select('tbl_content_management.id,tbl_content_management.title_name,tbl_content_management.description,tbl_content_management.sub_title_name');
    $this->db->from('tbl_content_management');
    $this->db->join('tbl_cms', 'tbl_cms.cms_id = tbl_content_management.id');
    $this->db->where('tbl_content_management.is_active', '1');
	$this->db->where('tbl_content_management.title_name', 'why mahindraa');
	$this->db->where('tbl_cms.country_id', $global_id);
	$this->db->where('tbl_content_management.business_category_id', $business_cat_id);
	$query = $this->db->get();
	if($query->num_rows()>0)
	{
		$data = $query->result_array();
		return $data;
	}
	return false; 
	}
	/* Global Why Mahindra Page End */
	
	/* Global Why Mahindra Banner Start */
	public function getCMSBannerList(){
	$this->db->select('*');
    $this->db->from('tbl_cms_banner');
    $this->db->where('tbl_cms_banner.cms_id', '25');
	$query = $this->db->get();
	if($query->num_rows()>0)
	{
		$data = $query->result_array();
		return $data;
	}
	return false; 
	}
	/* Global Why Mahindra Banner End */
	
	/* Global Article Performance Start */
	public function getArticlePerformanceList($global_id = False ,$business_cat_id = False){
	$this->db->select('tbl_article_management.banner_image');
    $this->db->from('tbl_article_management');
    $this->db->join('tbl_article', 'tbl_article.article_id = tbl_article_management.id');
	$this->db->where('tbl_article_management.is_active', '1');
	$this->db->where('tbl_article_management.article_type', '2');
	$this->db->where('tbl_article.country_id', $global_id);
	$this->db->where('tbl_article_management.business_category_id', $business_cat_id);
	$this->db->order_by('tbl_article_management.id', 'DESC');
	$this->db->limit('4');
    $query = $this->db->get();
	if($query->num_rows()>0)
	{
		$data = $query->result_array();
		return $data;
	}
	return false; 
	}
	/* Global Article Performance End */
	
	/* Global Medal Start */
	public function getMedalList($global_id = False ,$business_cat_id = False){
	$this->db->select('tbl_medal_management.year,tbl_medal_management.title_name,tbl_medal_management.banner_image');
    $this->db->from('tbl_medal_management');
    $this->db->join('tbl_medal', 'tbl_medal.medal_id = tbl_medal_management.id');
	$this->db->where('tbl_medal_management.is_active', '1');
	$this->db->where('tbl_medal.country_id', $global_id);
	$this->db->where('tbl_medal_management.business_category_id', $business_cat_id);
	$this->db->order_by('tbl_medal_management.id', 'DESC');
	$this->db->limit('2');
    $query = $this->db->get();
	if($query->num_rows()>0)
	{
		$data = $query->result_array();
		return $data;
	}
	return false; 
	}
	
	public function getMedalDescription($global_id = False ,$business_cat_id = False){
	$this->db->select('tbl_medal_des_management.s_description,tbl_medal_des_management.l_description');
    $this->db->from('tbl_medal_des_management');
    $this->db->join('tbl_medal_des', 'tbl_medal_des.medal_id = tbl_medal_des_management.id');
	$this->db->where('tbl_medal_des_management.is_active', '1');
	$this->db->where('tbl_medal_des.country_id', $global_id);
	$this->db->where('tbl_medal_des_management.business_category_id', $business_cat_id);
	$this->db->order_by('tbl_medal_des_management.id', 'DESC');
	$this->db->limit('1');
	$query = $this->db->get();
	if($query->num_rows()>0)
	{
		$data = $query->result_array();
		return $data;
	}
	return false; 
	}
	/* Global Medal End */
	
	/* Global Testimonial Start */
	public function getTestimonialList($global_id = False ,$business_cat_id = False , $testimonial = False){
	$this->db->select('tbl_testimonial_management.title,tbl_testimonial_management.description');
    $this->db->from('tbl_testimonial_management');
    $this->db->join('tbl_testimonial', 'tbl_testimonial.testi_id = tbl_testimonial_management.id');
	$this->db->where('tbl_testimonial_management.is_active', '1');
	$this->db->where('tbl_testimonial.country_id', $global_id);
	$this->db->where('tbl_testimonial_management.business_category_id', $business_cat_id);
	$this->db->order_by('tbl_testimonial_management.id', 'DESC');
	if(empty($testimonial))
	{
		$this->db->limit('1');
	}
	$query = $this->db->get();
	if($query->num_rows()>0)
	{
		$data = $query->result_array();
		return $data;
	}
	return false; 
	}
	/* Global Testimonial End */
	
	/* Global Achievement Start */
	public function getAchievementList($global_id = False ,$business_cat_id = False){
	$this->db->select('tbl_achievement_management.year,tbl_achievement_management.title_name,tbl_achievement_management.description,tbl_achievement_management.banner_image');
    $this->db->from('tbl_achievement_management');
    $this->db->join('tbl_achievement', 'tbl_achievement.achievement_id = tbl_achievement_management.id');
	$this->db->where('tbl_achievement_management.is_active', '1');
	$this->db->where('tbl_achievement.country_id', $global_id);
	$this->db->where('tbl_achievement_management.business_category_id', $business_cat_id);
	$this->db->order_by('tbl_achievement_management.year', 'DESC');
	$this->db->limit('10');
    $query = $this->db->get();
	if($query->num_rows()>0)
	{
		$data = $query->result_array();
		return $data;
	}
	return false; 
	}
	/* Global Achievement End */
	
	/* Global Gallery Start */
	public function getGalleryList($global_id = False ,$business_cat_id = False){
	$this->db->select('tbl_gallery_content.id,tbl_gallery_content.title_name,tbl_gallery_content.description,tbl_gallery_content.youtube_id');
    $this->db->from('tbl_gallery_content');
    $this->db->join('tbl_gallery_country', 'tbl_gallery_country.gallery_id = tbl_gallery_content.id');
    $this->db->where('tbl_gallery_content.is_active', '1');
	$this->db->where('tbl_gallery_country.country_id', $global_id);
	$this->db->where('tbl_gallery_content.business_category_id', $business_cat_id);
    $query = $this->db->get();
	if($query->num_rows()>0)
	{
		$data = $query->result_array();
		return $data;
	}
	return false; 
	}
	
	public function getGalleryImage($id){
	$this->db->select('banner_image');
    $this->db->from('tbl_gallery_banner');
    $this->db->where('tbl_gallery_banner.gallery_id', $id);
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
	/* Global Gallery End */

	public function getTestimonial()
	{
		$this->db->select('*');
	    $this->db->from('tbl_testimonial_management');
	   	$this->db->where('is_active', '1');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getMedia(){
		$this->db->select('*');
	    $this->db->from('tbl_media');
		$query = $this->db->get();
		return $query->result();
	}

	public function getWpcList($parent_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_products');
		$this->db->where('product_banner !=' , '');
		$this->db->where_in('parent_id', explode(',', $parent_id));
		$query = $this->db->get();
		// echo $this->db->last_query(); die;
		return $query->result();
	}
	public function getHomeContent($id){
		$this->db->select('cmsShortDesc');
		$this->db->from('tbl_cms');
		$this->db->where('cmsid', $id);
		$query = $this->db->get();
		return $query->row();
	}
	public function HomeContent($id){ 
		$this->db->select('cmsShortDesc,cmsBanner');
		$this->db->from('tbl_cms');
		$this->db->where('cmsid', $id);
		$query = $this->db->get();
		return $query->row();
	}
	
	#insertNewsletter
	public function insertNewsLetter($post_value){
		if(!empty($post_value)) {
			$insert_data = array(
				'email'        => $post_value['email'],
				'phone'        => $post_value['phone'],
				'created_at'   => date("Y-m-d H:i:s")
			);
			$insert_id = $this->db->insert('tbl_newsletter', $insert_data);
			if($insert_id){			
				$return['status'] = 'true';
				$return['message'] = "added successfully.";				
			}else{
				$return['status'] = 'false';
				$return['message'] = "Somthing went wrong.";
			}
			return $return;
		}
	}
	
	#check_exist
	public function check_Exist($c_name){
        $email = trim($c_name);
		$this->db->select('*');
		$this->db->where('email', $email);

		$query = $this->db->get('tbl_newsletter');        

		return $query->num_rows();

	}
	
}
