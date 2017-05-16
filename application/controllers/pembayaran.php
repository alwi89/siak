<?php
class Pembayaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mpembayaran');
	}
	function index(){
		$jenis = "";
		$bulan = "0";
		$tahun = "0";
		$tahun2 = "0";
		$dari = "0";
		$sampai = "0";
		if(empty($this->input->post('jenis')) || $this->input->post('jenis')=='harian'){
			$jenis = "harian";
			$data_pembayaran = $this->mpembayaran->harian();
		}else if($this->input->post('jenis')=='bulanan'){
			$jenis = "bulanan";
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$data_pembayaran = $this->mpembayaran->bulanan($bulan, $tahun);
		}else if($this->input->post('jenis')=='tahunan'){
			$jenis = "tahunan";
			$tahun2 = $this->input->post('tahun');
			$data_pembayaran = $this->mpembayaran->tahunan($tahun2);
		}else{
			$jenis = "periode";
			$dari = $this->input->post('dari');
			$daris = explode("/", $dari);
			$tgl_dari = $daris[2].'-'.$daris[1].'-'.$daris[0];
			$sampai = $this->input->post('sampai');
			$sampais = explode("/", $sampai);
			$tgl_sampai = $sampais[2].'-'.$sampais[1].'-'.$sampais[0];
			$data_pembayaran = $this->mpembayaran->periode($tgl_dari, $tgl_sampai);
		}		
		$data = array('data_pembayaran' => $data_pembayaran, 'bulan' => $bulan, 'tahun' => $tahun, 'tahun2' => $tahun2, 'dari' => $dari, 'sampai' => $sampai, 'jenis' => $jenis, 'konten' => 'pembayaran');			
		$this->load->view('templates', $data);
	}
	function cetak($jenis, $bulan, $tahun, $tahun2, $dari, $sampai){
		if($jenis=="harian"){
			$data_pembayaran = $this->mpembayaran->harian();
		}else if($jenis=='bulanan'){
			$data_pembayaran = $this->mpembayaran->bulanan($bulan, $tahun);
		}else if($jenis=='tahunan'){
			$data_pembayaran = $this->mpembayaran->tahunan($tahun2);
		}else{
			$daris = explode("_", $dari);
			$tgl_dari = $daris[2].'-'.$daris[1].'-'.$daris[0];
			$sampais = explode("_", $sampai);
			$tgl_sampai = $sampais[2].'-'.$sampais[1].'-'.$sampais[0];
			$data_pembayaran = $this->mpembayaran->periode($tgl_dari, $tgl_sampai);
		}
		$data = array('data_pembayaran' => $data_pembayaran, 'bulan' => $bulan, 'tahun' => $tahun, 'tahun2' => $tahun2, 'dari' => $dari, 'sampai' => $sampai, 'jenis' => $jenis);			
		$this->load->view('cetak_pembayaran', $data);
	}
}