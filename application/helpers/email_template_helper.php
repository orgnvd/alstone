<?php 
	if(!function_exists('callBack')){
			function callBack($name){
				//print_r($post); 
				$CI = &get_instance();
				$base_url = $CI->config->base_url();
				$html = '<table width="700" border="0" cellspacing="0" cellpadding="25" bgcolor="f1f1f1" align="center" style=" width:100%; max-width:700px;">
				  <tbody>
					<tr>
					  <td align="center">
					  <table  border="0" cellspacing="0" cellpadding="0" align="center"  width="100%">
						<tbody>
						<tr>
						  <td align="center" style="text-align:center; padding-top:10px; padding-bottom:50px;"><a href="'.$base_url.'"><img src="'.$base_url.'public/front/images/black-logo.png" alt="" title="" style="border:0;"/></a></td>
						</tr>
						<tr align="left">
						<td style="font-size:15px; color:#000; font-family:arial; text-align:left;">Dear '.$name.',</td>
						</tr>
					<tr>
					<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Thank you for showing your interest in Alstone. Our Customer care Executive will get in touch with you shortly.
					</td>
					</tr>
					<tr>
					<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Thank you for your patience.
					</td>
					</tr>
				<tr>
					<td style="font-size:15px; color:#000; font-family:arial; padding-top:20px; text-align:left; line-height:20px;">Sincerely,
					</td>
				</tr>
				<tr>
					<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;">The Alstone Team
					</td>
				</tr>				<tr>
					<td style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px;"><strong>Email:</strong> <a href="mailto:info@alstoneindia.com" style="font-size:15px; color:#000; font-family:arial;  text-align:left; line-height:20px; text-decoration:none;">info@alstoneindia.com</a>
				</td>
				</tr>
				</tbody>
				</table>
				</td>
				</tr>
				</tbody>
				</table>';
								return $html;
			}
	}	
	if(!function_exists('sendEmail')){
		function sendEmail($from=false,$to=false,$subject=false,$body=false,$attchement=false){
			$CI = &get_instance();
			$CI->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$CI->email->initialize($config);                 
			$CI->email->from('info@site4clientdemo.com.co', 'ALSTONE'); 
			$CI->email->to($to);
			//$CI->email->bcc('homesh.pal@csipl.net'); 
			$CI->email->subject($subject); 
			$CI->email->message($body);
			if(trim($attchement) != '')
			{
				$CI->email->attach($attchement);
			}
			return $CI->email->send();
		}
	}