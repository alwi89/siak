<?php
class Daftar_ulang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/mdaftar_ulang');
		$this->load->model('admin/msiswa');
	}
	function index(){
		$data = array('konten' => 'admin/daftar_ulang', 'data' => $this->mdaftar_ulang->data());
		$this->load->view('admin/template', $data);
	}
	function edit($id){
		$id = urldecode(str_replace("_", "/", $id));
		$data = array('konten' => 'admin/daftar_ulang', 'data' => $this->mdaftar_ulang->data(), 'data_lama' => $this->mdaftar_ulang->preview($id)->row());
		$this->load->view('admin/template', $data);
	}
	function simpan(){
		$aksi = $this->db->escape_str($this->input->post('aksi'));
		$id_daftar = $this->db->escape_str($this->input->post('id_daftar'));
		$nis = $this->db->escape_str($this->input->post('nis'));
		$tahun = $this->db->escape_str($this->input->post('tahun'));
		$kelas = $this->db->escape_str($this->input->post('kelas'));
		$jurusan = $this->db->escape_str($this->input->post('jurusan'));
		$isi = array('nis' => $nis, 'tahun' => $tahun, 'id_kelas' => $kelas);
		if($aksi=='tambah'){
			if($this->mdaftar_ulang->insert($isi)){
				$isiSiswa = array('id_kelas' => $kelas, 'id_jurusan' => $jurusan);
				$whereSiswa = "nis='$nis'";
				$this->msiswa->update($isiSiswa, $whereSiswa);
				$this->session->set_flashdata('berhasil', 'berhasil menambah daftar ulang');
			}else{
				$this->session->set_flashdata('gagal', 'gagal menambah daftar ulang');
			}
		}else{
			$where = "id_daftar='$id_daftar'";
			if($this->mdaftar_ulang->update($isi, $where)){
				$isiSiswa = array('id_kelas' => $kelas, 'id_jurusan' => $jurusan);
				$whereSiswa = "nis='$nis'";
				$this->msiswa->update($isiSiswa, $whereSiswa);
				$this->session->set_flashdata('berhasil', 'berhasil mengedit daftar ulang');
			}else{
				$this->session->set_flashdata('gagal', 'gagal mengedit daftar ulang');
			}
		}
		redirect('admin/daftar_ulang');
	}
	function hapus($id){
		$id = urldecode(str_replace("_", "/", $id));
		$data = array('id_daftar' => $id);
		if($this->mdaftar_ulang->delete($data)){
			$this->session->set_flashdata('berhasil', 'berhasil menghapus daftar ulang');
		}else{
			$this->session->set_flashdata('gagal', 'gagal menghapus daftar ulang');
		}
		redirect('admin/daftar_ulang');
	}
}