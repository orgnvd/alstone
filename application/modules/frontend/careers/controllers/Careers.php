<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Careers extends CI_Controller
{

	/**
	* @ Function Name		: __construct
	* @ Function Params	: 
	* @ Function Purpose 	: initilizing variable and providing pre functionalities
	* @ Function Returns	: 
	*/
	public function __construct() {
		parent::__construct(); 
		$this->load->model('careers/App_careers_model');
		$this->load->library('form_validation');
		$this->load->library('email');  
		$this->load->helper(array('form', 'url','email'));
		$this->lang->load('contact');
	}

	public function index()
	{
		$this->load->model('careers/app_careers_model');
		$data['list'] = $this->app_careers_model->getCareerList();
		$data['main_content'] = 'index';
		$this->load->view('front/layout', $data);
	}

	public function contact()
	{
		// $this->load->model('careers/app_careers_model');
		$data = array();
		$submit = $this->input->post('btnSubmit');

		$data['post'] ='';
		
		if(!empty($_FILES['file1']['name'])){
			
			//die("okkk");
			$config['upload_path'] = 'images/attachments/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|PDF|pdf|DOC|doc|txt';
			$config['file_name'] = time() .'1'. date('Ymd');
			$this->load->library('upload');
			$this->upload->initialize($config);				
			if($this->upload->do_upload('file1')){
				$image_data = $this->upload->data();
				$fname = $image_data['file_name'];
				$fpath = $image_data['file_path'].$fname;
				//pr($_FILES); echo $file1; die("fsafsa");
			} else { 
				$this->session->set_flashdata('error_message', 'Opps something wrong with uploading image');
				redirect('careers');
			} 
		}else{
			$fpath = '';
		}
		
		$postData = $this->input->post();
		//pr($postData); die();
		if(!empty($postData)){
				$rule = array( 
					array(
						'field' => 'name',
						'label' => 'Your Name',
						'rules' => 'required'
					),
					array(
						'field' => 'user_email',
						'label' => 'Email',
						'rules' => 'required'
					),
					array(
						'field' => 'user_phone',
						'label' => 'Mobile No.', 
						'rules' => 'required'
					)
				);
				$this->form_validation->set_rules($rule);
				if ($this->form_validation->run() == TRUE ) {
					$POST = $this->input->post();
					$post = $this->input->post();
					@$send = $this->_contactmail($POST,$fpath);
					if($send){
						$this->session->set_flashdata('contact', 'Your Message has been sent successfully.');
						redirect('contact/thankyou');
					}else{
						$this->session->set_flashdata('neg', 'Somthing went wrong.');
						redirect('careers');
					}
					 
				} else {
					 $data['post_error'] = 'Please fill up all mandatory fields properly.'; 
				}
	}
}

	private function _contactmail($post,$fpath){
		// pr($post); die('===');
		$name=$post['name'];
		$email= $post['user_email'];
		$phone= $post['user_phone'];
		$job_title= $post['job_title'];				
		$dob= $post['dob'];	
		$state= $post['state'];					
		$gender= $post['radio'];
		$message = $post['txtMessage'];
		$formsubject = "Career on Alstone";
		$formmessage= $post['txtMessage'];
		//$to = 'homeshr1@gmail.com';
		$from    = $email;
		$email_id = $to;
		$email_list = array('homesh@newvisiondigital.co', 'shashi.v@newvisiondigital.co', 'shreya@newvisiondigital.co');
        $subject  = $formsubject;		
		#SMTP

			
			$message = '';
			$message .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
        	$message .= '<tr>';
        	$message .= '<td height="26" style="font-family:Tahoma, Arial, sans-serif; font-size:11px;color:#828282;"><strong>Dear Admin</strong>,</td>';
        	$message .= '</tr>';
        	$message .= '<tr>';
        	$message .= '<td style="font-family:Tahoma, Arial, sans-serif; font-size:11px; color:#828282; line-height:15px; padding-bottom:10px;">There is a contact form submission on your website. below are the details submitted by the user.</td>';
        	$message .= '</tr>';
        	$message .= '<tr>';
        	$message .= '<td height="5"></td>';
        	$message .= '</tr>';
        	$message .= '<tr>';
        	$message .= '<td align="left">';
        	$message .= '<table width="100%" border="0" bgcolor="#ddd" cellspacing="1" cellpadding="6" style="font-family: "Roboto", sans-serif;">';
        	$message .= '<tr  bgcolor="#000000">';
        	$message .= '<td style="border-top:#1D7DC6 solid 0px; font-size:16px; color:#ffffff; font-family: "Roboto", sans-serif; font-weight:normal; font-family: "Roboto", sans-serif; " colspan="2"><strong style="color:#FFF;">Contact Information</strong></td>';
        	$message .= '</tr>';
        	$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  style="color:#535258; font-weight:normal; " width="100"><strong>Name:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' .@$name . '</td>';
			$message .= '</tr>';
			$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  style="color:#535258; font-weight:normal; " width="100"><strong>Email:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' .@$email . '</td>';
			$message .= '</tr>'; 
			$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  style="color:#535258; font-weight:normal; " width="100"><strong>Phone:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' . @$phone . '</td>';
			$message .= '</tr>'; 
			$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  style="color:#535258; font-weight:normal; " width="100"><strong>Gender:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' . @$gender . '</td>';
			$message .= '</tr>'; 
			$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  style="color:#535258; font-weight:normal; " width="100"><strong>State:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' . @$state . '</td>';
			$message .= '</tr>'; 
			$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  style="color:#535258; font-weight:normal; " width="100"><strong>Country:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' . @$country . '</td>';
			$message .= '</tr>'; 
			$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  style="color:#535258; font-weight:normal; " width="100"><strong>Subject:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' . @$formsubject. '</td>';
			$message .= '</tr>'; 
			$message .= '<tr  bgcolor="#ffffff">';
			$message .= '<td  valign="top" style="color:#535258; font-weight:normal; " width="100"><strong>Message:</strong></td>';
			$message .= '<td width="470" style="color:#535258;">' . @nl2br($formmessage). '</td>';
			$message .= '</tr>'; 
			$message .= '</table>';
			$message .= '</td>';
			$message .= '</tr>';
			
			$from_email = "info@site4clientdemo.com.co"; 
			//Load email library 
			$this->load->library('email'); 
			$this->email->from($from_email, 'Career Alstone'); 
			$this->email->to($email_list);
		   // $this->email->bcc('homeshr1@gmail.com'); 
			$this->email->subject($subject); 
			$this->email->message($message);
			$this->email->set_mailtype('html');
			$this->email->attach($fpath);
			
			//Send mail 
			if($this->email->send()){
				$this->load->helper('email_template');
				$email_template = callBack($post['name']); 
				sendEmail($from_email,$email,'Thank You for choosing Alstone',$email_template);
				return '1';
			}else{ 
				 //show_error($this->email->print_debugger());
				  return '0'; 
			}		
    }

	

}