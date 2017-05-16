<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/mpengumuman');
	}
	function index(){
		$data = array('konten' => 'pengumuman', 'data' => $this->mpengumuman->data());
		$this->load->view('templates', $data);
	}
}