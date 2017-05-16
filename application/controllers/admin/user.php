<?php
class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/muser');
	}
	function index(){
		$data = array('konten' => 'admin/user', 'data' => $this->muser->data());
		$this->load->view('admin/template', $data);
	}
	function edit($id){
		$data = array('konten' => 'admin/user', 'data' => $this->muser->data(), 'data_lama' => $this->muser->preview($id)->row());
		$this->load->view('admin/template', $data);
	}
	function simpan(){
		$aksi = $this->db->escape_str($this->input->post('aksi'));
		$id_user = $this->db->escape_str($this->input->post('kode_lama'));
		$username = $this->db->escape_str($this->input->post('username'));
		$nama = $this->db->escape_str($this->input->post('nama'));
		$password = $this->db->escape_str($this->input->post('password'));
		$level = $this->db->escape_str($this->input->post('level'));
		$status = $this->db->escape_str($this->input->post('status'));
		if($aksi=='tambah'){
			$isi = array('username' => $username, 'nama' => $nama, 'password' => md5($password), 'level' => $level, 'status' => $status);
			if($this->muser->insert($isi)){
				$this->session->set_flashdata('berhasil', 'berhasil menambah user');
			}else{
				$this->session->set_flashdata('gagal', 'gagal menambah user');
			}
		}else{
			if(strlen($password)<30){
				$isi = array('username' => $username, 'nama' => $nama, 'password' => md5($password), 'level' => $level, 'status' => $status);
			}else{
				$isi = array('username' => $username, 'nama' => $nama, 'level' => $level, 'status' => $status);
			}
			$where = "id_user='$id_user'";
			if($this->muser->update($isi, $where)){
				$this->session->set_flashdata('berhasil', 'berhasil mengedit user');
			}else{
				$this->session->set_flashdata('gagal', 'gagal mengedit user');
			}
		}
		redirect('admin/user');
	}
	function hapus($id){
		$data = array('id_user' => $id);
		if($this->muser->delete($data)){
			$this->session->set_flashdata('berhasil', 'berhasil menghapus user');
		}else{
			$this->session->set_flashdata('gagal', 'gagal menghapus user');
		}
		redirect('admin/user');
	}	
}