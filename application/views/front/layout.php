 <?php  
 $uri = $this->uri->segment('2');
 $segment = $this->uri->segment('1');
  if($uri == 'fetchProduct' || $segment == 'product'){
  	$this->load->view('front/product_header');
  	$this->load->view($main_content);
  	$this->load->view('front/product_footer');
  } else{
  $this->load->view('front/header');
  $this->load->view($main_content);
  $this->load->view('front/footer');
}

?> 
<!-- Footer -->
