<?php
class Jurusan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/mjurusan');
	}
	function index(){
		$data = array('konten' => 'admin/jurusan', 'data' => $this->mjurusan->data());
		$this->load->view('admin/template', $data);
	}
	function edit($id){
		$data = array('konten' => 'admin/jurusan', 'data' => $this->mjurusan->data(), 'data_lama' => $this->mjurusan->preview($id)->row());
		$this->load->view('admin/template', $data);
	}
	function simpan(){
		$aksi = $this->db->escape_str($this->input->post('aksi'));
		$id_jurusan = $this->db->escape_str($this->input->post('kode_lama'));
		$nama_jurusan = $this->db->escape_str($this->input->post('nama_jurusan'));
		$isi = array('nama_jurusan' => $nama_jurusan);
		if($aksi=='tambah'){
			if($this->mjurusan->insert($isi)){
				$this->session->set_flashdata('berhasil', 'berhasil menambah jurusan');
			}else{
				$this->session->set_flashdata('gagal', 'gagal menambah jurusan');
			}
		}else{
			$where = "id_jurusan='$id_jurusan'";
			if($this->mjurusan->update($isi, $where)){
				$this->session->set_flashdata('berhasil', 'berhasil mengedit jurusan');
			}else{
				$this->session->set_flashdata('gagal', 'gagal mengedit jurusan');
			}
		}
		redirect('admin/jurusan');
	}
	function hapus($id){
		$data = array('id_jurusan' => $id);
		if($this->mjurusan->delete($data)){
			$this->session->set_flashdata('berhasil', 'berhasil menghapus jurusan');
		}else{
			$this->session->set_flashdata('gagal', 'gagal menghapus jurusan');
		}
		redirect('admin/jurusan');
	}
}