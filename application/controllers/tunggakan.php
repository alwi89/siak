<?php
class Tunggakan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mpembayaran');
	}
	function index(){
		$data = array('data_tunggakan' => $this->mpembayaran->tunggakan(), 'konten' => 'tunggakan');
		$this->load->view('templates', $data);
	}
	function cetak(){
		$data = array('data_tunggakan' => $this->mpembayaran->tunggakan());
		$this->load->view('cetak_tunggakan', $data);
	}
}