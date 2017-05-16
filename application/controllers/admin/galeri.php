<?php
class Galeri extends CI_Controller{
	function index(){
		$data = array('konten' => 'admin/galeri');
		$this->load->view('admin/template', $data);
	}
}