<?php
class Pengumuman extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/mpengumuman');
	}
	function index(){
		$data = array('konten' => 'admin/pengumuman', 'data' => $this->mpengumuman->data());
		$this->load->view('admin/template', $data);
	}
	function edit($id){
		$data = array('konten' => 'admin/pengumuman', 'data' => $this->mpengumuman->data(), 'data_lama' => $this->mpengumuman->preview($id)->row());
		$this->load->view('admin/template', $data);
	}
	function simpan(){
		date_default_timezone_set('Asia/Jakarta');
		$aksi = $this->db->escape_str($this->input->post('aksi'));
		$id_pengumuman = $this->db->escape_str($this->input->post('kode_lama'));
		$judul = $this->db->escape_str($this->input->post('judul'));
		$isi = $this->input->post('isi');
		$id_user = $this->session->userdata('id_user');
		$gambar = str_replace(" ", "_", $_FILES['gambar']['name']);
		$source = $_FILES['gambar']['tmp_name'];
		$dest = "gambar_pengumuman/$gambar";
		$isi = array('judul' => $judul, 'isi' => $isi, 'id_user' => $id_user, 'tgl' => date('Y-m-d H:i:s'));
		if($aksi=='tambah'){
			if($this->mpengumuman->insert($isi)){
				if(strlen($source)!=0){
					$id_pengumuman = $this->db->insert_id();
					if($this->mpengumuman->update(array('gambar' => $gambar), "id_pengumuman='$id_pengumuman'")){
						@copy($source, $dest);
					}
				}
				$this->session->set_flashdata('berhasil', 'berhasil menambah pengumuman');
			}else{
				$this->session->set_flashdata('gagal', 'gagal menambah pengumuman');
			}
		}else{
			$where = "id_pengumuman='$id_pengumuman'";
			if($this->mpengumuman->update($isi, $where)){
				if(strlen($source)!=0){
					if($this->mpengumuman->update(array('gambar' => $gambar), $where)){
						@copy($source, $dest);
					}
				}
				$this->session->set_flashdata('berhasil', 'berhasil mengedit pengumuman');
			}else{
				$this->session->set_flashdata('gagal', 'gagal mengedit pengumuman');
			}
		}
		redirect('admin/pengumuman');
	}
	function hapus($id){
		$data = array('id_pengumuman' => $id);
		if($this->mpengumuman->delete($data)){
			$this->session->set_flashdata('berhasil', 'berhasil menghapus pengumuman');
		}else{
			$this->session->set_flashdata('gagal', 'gagal menghapus pengumuman');
		}
		redirect('admin/pengumuman');
	}
	function preview(){
		$data = array('konten' => 'admin/preview_pengumuman', 'data' => $this->mpengumuman->data());
		$this->load->view('admin/template', $data);
	}
	function detail($id){
		$data = array('konten' => 'admin/detail_pengumuman', 'detail' => $this->mpengumuman->preview($id)->row());
		$this->load->view('admin/template', $data);
	}
}