<?php
class Profil extends CI_Controller{
	function index(){
		$data = array('konten' => 'admin/profil');
		$this->load->view('admin/template', $data);
	}
}