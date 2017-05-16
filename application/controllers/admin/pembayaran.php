<?php
class Pembayaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/mpembayaran');
	}
	function index(){
		$data = array('konten' => 'admin/pembayaran');
		$this->load->view('admin/template', $data);
	}
	function siswa(){
		echo $this->mpembayaran->siswa();
	}
	function jenis(){
		//$_POST['nis'] = '0004152866 / 90-90.064';
		$nis = $this->input->post('nis');
		echo $this->mpembayaran->jenis_pembayaran($nis);
	}
	function cart(){
		$this->mpembayaran->cart();
	}
	function add(){
		$jenis = $this->input->post('jenis');
		$this->mpembayaran->add($jenis);
	}
	function del(){
		$jenis = $this->input->post('jenis');
		$this->mpembayaran->del($jenis);
	}
	function simpan(){
		$no_pembayaran = $this->mpembayaran->generate_no_pembayaran();
		$nis = $this->db->escape_str($this->input->post('siswa'));
		$id_user = $this->session->userdata('id_user');
		$total = $this->db->escape_str($this->input->post('total'));
		$dibayar = $this->db->escape_str($this->input->post('dibayar'));
		$kembali = $this->db->escape_str($this->input->post('kembali'));
		$tgl_bayars = explode("/", $this->db->escape_str($this->input->post('tgl_bayar')));
		$tgl_bayar = $tgl_bayars[2].'-'.$tgl_bayars[1].'-'.$tgl_bayars[0];
		$q_kelas = $this->db->query("select tahun, nama_kelas, nama_jurusan from kelas k join siswa s on k.id_kelas=s.id_kelas join jurusan j on s.id_jurusan=j.id_jurusan join daftar_ulang_kenaikan d on s.nis=d.nis where s.nis='$nis'");
		$h_kelas = $q_kelas->row();
		$a = $this->db->query("insert into pembayaran(no_pembayaran, nis, tgl_bayar, id_user, total, dibayar, kembali, kelas, jurusan, angkatan) values('$no_pembayaran', '$nis', '$tgl_bayar', '$id_user', '$total', '$dibayar', '$kembali', '".$h_kelas->nama_kelas."', '".$h_kelas->nama_jurusan."', '".$h_kelas->tahun."')");
			if($a){
				$items = explode(',', $_SESSION['trx']);
				$contents = array();
				foreach ($items as $item) {
					$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
				}
				foreach ($contents as $id=>$qty) {
					$b = $this->db->query("select * from jenis_pembayaran where id_jenis='$id'");
					$c = $b->row();
					$d = $this->db->query("insert into detail_pembayaran(no_pembayaran, id_jenis, biaya) values('$no_pembayaran', '".$c->id_jenis."', '".$c->biaya."')");
				}
				unset($_SESSION['trx']);
				$this->session->unset_userdata('trx');
				redirect('admin/pembayaran/preview/'.$no_pembayaran);
			}else{
				redirect('admin/pembayaran');
			}
	}
	function preview($id){
		$data = array('konten' => 'admin/preview', 'data_pembayaran' => $this->mpembayaran->nota($id));
		$this->load->view('admin/template', $data);
	}
	function cetak($id){
		$data = array('data_pembayaran' => $this->mpembayaran->nota($id));
		$this->load->view('admin/nota', $data);
	}
}