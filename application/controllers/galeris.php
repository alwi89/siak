<?php
class Galeris extends CI_Controller{
	function index(){
		$data = array('konten' => 'galeri');
		$this->load->view('templates', $data);
	}
}