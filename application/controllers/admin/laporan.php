<?php
class Laporan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/mlaporan');
	}
	function harian(){
		$tgl = date('d/m/Y');
		if(!empty($this->input->post('tgl'))){
			$tgl = $this->input->post('tgl');
		}
		$tgl_bayars = explode("/", $tgl);
		$tgl_bayar = $tgl_bayars[2].'-'.$tgl_bayars[1].'-'.$tgl_bayars[0];
		$data = array('konten' => 'admin/laporan_harian', 'data' => $this->mlaporan->harian($tgl_bayar), 'tgl' => $tgl);
		$this->load->view('admin/template', $data);
	}
	function cetak_harian($tgl){
		$tgl = str_replace("_", "/", $tgl);
		$tgl_bayars = explode("/", $tgl);
		$tgl_bayar = $tgl_bayars[2].'-'.$tgl_bayars[1].'-'.$tgl_bayars[0];
		$data = array('data' => $this->mlaporan->harian($tgl_bayar), 'tgl' => $tgl);
		$this->load->view('admin/cetak_laporan_harian', $data);
	}
	function bulanan(){
		$bulan = date('m');
		$tahun = date('Y');
		if(!empty($this->input->post('bulan'))){
			$bulan = $this->input->post('bulan');
		}
		if(!empty($this->input->post('tahun'))){
			$tahun = $this->input->post('tahun');
		}
		$data = array('konten' => 'admin/laporan_bulanan', 'data' => $this->mlaporan->bulanan($bulan, $tahun), 'bulan' => $bulan, 'tahun' => $tahun);
		$this->load->view('admin/template', $data);
	}
	function cetak_bulanan($bulan, $tahun){
		$data = array('data' => $this->mlaporan->bulanan($bulan, $tahun), 'bulan' => $bulan, 'tahun' => $tahun);
		$this->load->view('admin/cetak_laporan_bulanan', $data);
	}
	function tahunan(){
		$tahun = date('Y');
		if(!empty($this->input->post('tahun'))){
			$tahun = $this->input->post('tahun');
		}
		$data = array('konten' => 'admin/laporan_tahunan', 'data' => $this->mlaporan->tahunan($tahun), 'tahun' => $tahun);
		$this->load->view('admin/template', $data);
	}
	function cetak_tahunan($tahun){
		$data = array('data' => $this->mlaporan->tahunan($tahun), 'tahun' => $tahun);
		$this->load->view('admin/cetak_laporan_tahunan', $data);
	}
	function jenis(){
		$jenis = "";
		if(!empty($this->input->post('jenis'))){
			$jenis = $this->input->post('jenis');
		}
		$dari = date('d/m/Y');
		if(!empty($this->input->post('dari'))){
			$dari = $this->input->post('dari');
		}
		$tgl_daris = explode("/", $dari);
		$tgl_dari = $tgl_daris[2].'-'.$tgl_daris[1].'-'.$tgl_daris[0];
		$sampai = date('d/m/Y');
		if(!empty($this->input->post('sampai'))){
			$sampai = $this->input->post('sampai');
		}
		$tgl_sampais = explode("/", $sampai);
		$tgl_sampai = $tgl_sampais[2].'-'.$tgl_sampais[1].'-'.$tgl_sampais[0];
		$data = array('konten' => 'admin/laporan_jenis', 'data' => $this->mlaporan->jenis($jenis, $tgl_dari, $tgl_sampai), 'dari' => $dari, 'sampai' => $sampai, 'jenis' => $jenis);
		$this->load->view('admin/template', $data);		
	}
	function cetak_jenis($dari, $sampai, $jenis=""){
		if($jenis==""){
			echo "<script>alert('harap pilih jenis pembayaran');window.close();</script>";
		}else{
			$dari = str_replace("_", "/", $dari);
			if(!empty($this->input->post('dari'))){
				$dari = $this->input->post('dari');
			}
			$tgl_daris = explode("/", $dari);
			$tgl_dari = $tgl_daris[2].'-'.$tgl_daris[1].'-'.$tgl_daris[0];
			$sampai = str_replace("_", "/", $sampai);
			if(!empty($this->input->post('sampai'))){
				$sampai = $this->input->post('sampai');
			}
			$tgl_sampais = explode("/", $sampai);
			$tgl_sampai = $tgl_sampais[2].'-'.$tgl_sampais[1].'-'.$tgl_sampais[0];
			$data = array('data' => $this->mlaporan->jenis($jenis, $tgl_dari, $tgl_sampai), 'dari' => $dari, 'sampai' => $sampai, 'jenis' => $this->mlaporan->nama_jenis($jenis)->row()->nama_jenis);
			$this->load->view('admin/cetak_jenis', $data);		
		}
	}
	function rekap(){
		$dari = date('d/m/Y');
		if(!empty($this->input->post('dari'))){
			$dari = $this->input->post('dari');
		}
		$tgl_daris = explode("/", $dari);
		$tgl_dari = $tgl_daris[2].'-'.$tgl_daris[1].'-'.$tgl_daris[0];
		$sampai = date('d/m/Y');
		if(!empty($this->input->post('sampai'))){
			$sampai = $this->input->post('sampai');
		}
		$tgl_sampais = explode("/", $sampai);
		$tgl_sampai = $tgl_sampais[2].'-'.$tgl_sampais[1].'-'.$tgl_sampais[0];
		$data = array('konten' => 'admin/laporan_rekap', 'data' => $this->mlaporan->rekap($tgl_dari, $tgl_sampai), 'dari' => $dari, 'sampai' => $sampai);
		$this->load->view('admin/template', $data);		
	}
	function cetak_rekap($dari, $sampai){
		$dari = str_replace("_", "/", $dari);
		if(!empty($this->input->post('dari'))){
			$dari = $this->input->post('dari');
		}
		$tgl_daris = explode("/", $dari);
		$tgl_dari = $tgl_daris[2].'-'.$tgl_daris[1].'-'.$tgl_daris[0];
		$sampai = str_replace("_", "/", $sampai);
		if(!empty($this->input->post('sampai'))){
			$sampai = $this->input->post('sampai');
		}
		$tgl_sampais = explode("/", $sampai);
		$tgl_sampai = $tgl_sampais[2].'-'.$tgl_sampais[1].'-'.$tgl_sampais[0];
		$data = array('data' => $this->mlaporan->rekap($tgl_dari, $tgl_sampai), 'dari' => $dari, 'sampai' => $sampai);
		$this->load->view('admin/cetak_rekap', $data);		
	}
	function tunggakan(){
		$jenis = "";
		$kelas = "0";
		$jurusan = "0";
		$nis = "0";
		if(empty($this->input->post('jenis')) || $this->input->post('jenis')=='semua'){
			$jenis = 'semua';
			$data_tunggakan = $this->mlaporan->tunggakan_semua();
		}else if($this->input->post('jenis')=='kelas'){
			$jenis = 'kelas';
			$kelas = $this->input->post('kelas');
			$jurusan = $this->input->post('jurusan');
			$data_tunggakan = $this->mlaporan->tunggakan_kelas($kelas, $jurusan);
		}else{
			$jenis = 'nis';
			$nis = $this->db->escape_str($this->input->post('nis'));
			$data_tunggakan = $this->mlaporan->tunggakan_nis($nis);			
		}
		$data = array('konten' => 'admin/laporan_tunggakan', 'data_tunggakan' => $data_tunggakan, 'jenis' => $jenis, 'kelas' => $kelas, 'jurusan' => $jurusan, 'nis' => $nis);
		$this->load->view('admin/template', $data);
	}
	function cetak_tunggakan($jenis, $kelas, $jurusan, $nis){
		if($jenis=='semua'){
			$data_tunggakan = $this->mlaporan->tunggakan_semua();
		}else if($jenis=='kelas'){
			$kelas = urldecode($kelas);
			$jurusan = urldecode(str_replace("_", "(", $jurusan));
			$jurusan = str_replace("-", ")", $jurusan);
			$data_tunggakan = $this->mlaporan->tunggakan_kelas($kelas, $jurusan);
		}else{
			$nis = urldecode(str_replace("_", "/", $nis));
			$data_tunggakan = $this->mlaporan->tunggakan_nis($nis);			
		}
		$data = array('data_tunggakan' => $data_tunggakan, 'jenis' => $jenis, 'kelas' => $kelas, 'jurusan' => $jurusan, 'nis' => $nis);
		$this->load->view('admin/cetak_laporan_tunggakan', $data);
	}
}