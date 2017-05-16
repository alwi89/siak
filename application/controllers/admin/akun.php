<?php
class Akun extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/makun');
	}
	function index(){
		$data = array('konten' => 'admin/akun', 'data_akun' => $this->makun->data()->row());
		$this->load->view('admin/template', $data);
	}
	function simpan(){
		$id_user = $this->db->escape_str($this->input->post('kode_lama'));
		$username = $this->db->escape_str($this->input->post('username'));
		$nama = $this->db->escape_str($this->input->post('nama'));
		$password = $this->db->escape_str($this->input->post('password'));
		if(strlen($password)<30){
			$data = array('username' => $username, 'nama'=> $nama, 'password' => md5($password));
		}else{
			$data = array('username' => $username, 'nama'=> $nama);
		}
		$where = "id_user='$id_user'";
		if($this->makun->update($data, $where)){
			$this->session->set_flashdata('berhasil', 'berhasil menyimpan data');
		}else{
			$this->session->set_flashdata('gagal', 'gagal menyimpan data');
		}
		redirect('admin/akun');
	}
	function cek_unique(){
		$id_user = $this->input->post('id_user');
		$jml = $this->makun->cek_username($id_user)->num_rows();
		if($jml==0){
			$username_terdaftar[] = NULL;
		}else{
			foreach($this->makun->cek_username($id_user)->result() as $data_user){
				$username_terdaftar[] = $data_user->username;
			}
		}
		$username  = $this->db->escape_str($this->input->post('username'));
		if( in_array($username, $username_terdaftar) ){
			echo json_encode(array('valid' => false));
		}else{
			echo json_encode(array('valid' => true));
		}
	}
	function keluar(){
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('nama');
		redirect('admin/login');
	}
}