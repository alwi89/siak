<?php
class Jenis_pembayaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/mjenis_pembayaran');
	}
	function index(){
		$data = array('konten' => 'admin/jenis_pembayaran', 'data' => $this->mjenis_pembayaran->data());
		$this->load->view('admin/template', $data);
	}
	function edit($id){
		$data = array('konten' => 'admin/jenis_pembayaran', 'data' => $this->mjenis_pembayaran->data(), 'data_lama' => $this->mjenis_pembayaran->preview($id)->row());
		$this->load->view('admin/template', $data);
	}
	function simpan(){
		$aksi = $this->db->escape_str($this->input->post('aksi'));
		$id_jenis = $this->db->escape_str($this->input->post('kode_lama'));
		$nama_jenis = $this->db->escape_str($this->input->post('nama_jenis'));
		$angkatan = $this->db->escape_str($this->input->post('angkatan'));
		$biaya = $this->db->escape_str($this->input->post('biaya'));
		$isi = array('nama_jenis' => $nama_jenis, 'angkatan' => $angkatan, 'biaya' => $biaya);
		if($aksi=='tambah'){
			if($this->mjenis_pembayaran->insert($isi)){
				$this->session->set_flashdata('berhasil', 'berhasil menambah jenis pembayaran');
			}else{
				$this->session->set_flashdata('gagal', 'gagal menambah jenis pembayaran');
			}
		}else{
			$where = "id_jenis='$id_jenis'";
			if($this->mjenis_pembayaran->update($isi, $where)){
				$this->session->set_flashdata('berhasil', 'berhasil mengedit jenis pembayaran');
			}else{
				$this->session->set_flashdata('gagal', 'gagal mengedit jenis pembayaran');
			}
		}
		redirect('admin/jenis_pembayaran');
	}
	function hapus($id){
		$data = array('id_jenis' => $id);
		if($this->mjenis_pembayaran->delete($data)){
			$this->session->set_flashdata('berhasil', 'berhasil menghapus jenis pembayaran');
		}else{
			$this->session->set_flashdata('gagal', 'gagal menghapus jenis pembayaran');
		}
		redirect('admin/jenis_pembayaran');
	}
}