<?php
class Kelas extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/mkelas');
	}
	function index(){
		$data = array('konten' => 'admin/kelas', 'data' => $this->mkelas->data());
		$this->load->view('admin/template', $data);
	}
	function edit($id){
		$data = array('konten' => 'admin/kelas', 'data' => $this->mkelas->data(), 'data_lama' => $this->mkelas->preview($id)->row());
		$this->load->view('admin/template', $data);
	}
	function simpan(){
		$aksi = $this->db->escape_str($this->input->post('aksi'));
		$id_kelas = $this->db->escape_str($this->input->post('kode_lama'));
		$nama_kelas = $this->db->escape_str($this->input->post('nama_kelas'));
		$isi = array('nama_kelas' => $nama_kelas);
		if($aksi=='tambah'){
			if($this->mkelas->insert($isi)){
				$this->session->set_flashdata('berhasil', 'berhasil menambah kelas');
			}else{
				$this->session->set_flashdata('gagal', 'gagal menambah kelas');
			}
		}else{
			$where = "id_kelas='$id_kelas'";
			if($this->mkelas->update($isi, $where)){
				$this->session->set_flashdata('berhasil', 'berhasil mengedit kelas');
			}else{
				$this->session->set_flashdata('gagal', 'gagal mengedit kelas');
			}
		}
		redirect('admin/kelas');
	}
	function hapus($id){
		$data = array('id_kelas' => $id);
		if($this->mkelas->delete($data)){
			$this->session->set_flashdata('berhasil', 'berhasil menghapus kelas');
		}else{
			$this->session->set_flashdata('gagal', 'gagal menghapus kelas');
		}
		redirect('admin/kelas');
	}
}