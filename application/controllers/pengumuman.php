<?php
class Pengumuman extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/mpengumuman');
	}
	function index(){
		$data = array('konten' => 'pengumuman', 'data' => $this->mpengumuman->data());
		$this->load->view('templates', $data);
	}
	function detail($id){
		$data = array('konten' => 'detail_pengumuman', 'detail' => $this->mpengumuman->preview($id)->row());
		$this->load->view('templates', $data);
	}
}