<?php
class Tidakketemu extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function index(){
		$data = array('konten' => 'tidakketemu');
		if($this->uri->segment(1)=='admin'){
			$this->load->view('admin/template', $data);
		}else{
			$this->load->view('templates', $data);
		}
	}
}