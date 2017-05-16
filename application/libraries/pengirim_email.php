<?php
class Pengirim_email{
	public function kirim_email($tujuan, $subjek, $isi){
		//login gmail, dan atur keamanan dikurangi melalui https://www.google.com/settings/security/lesssecureapps
		//jika localhost aktifkan deskripsi config dibawah ini
		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'youremail@gmail.com', // change it to yours
		  'smtp_pass' => 'yourpasswordemail', // change it to yours
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);
		$CI =& get_instance();
		$CI->load->library('email', $config);
      	$CI->email->set_newline("\r\n");
		$CI->email->from('youremail@gmail.com', 'Optimum Fitness Center');
		$CI->email->to($tujuan); 	
		$CI->email->subject($subjek);
		$CI->email->message($isi);			
		//Send mail 
        if($CI->email->send()){ 
	         return TRUE;
         }else {
         	return FALSE;
		}
		//echo $CI->email->print_debugger();
	}
}