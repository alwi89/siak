<?php
class Profil extends CI_Controller{
	function index(){
		$data = array('konten' => 'profil');
		$this->load->view('templates', $data);
	}
}