<?php
class Akun extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('makun');
	}
	function index(){
		$data = array('konten' => 'akun', 'data_akun' => $this->makun->data()->row());
		$this->load->view('templates', $data);
	}
	function profil(){
		$data = array('konten' => 'profil_user', 'data_akun' => $this->makun->data()->row());
		$this->load->view('templates', $data);
	}
	function login(){
		$data = array('nis' => $this->db->escape_str($this->input->post('nis')),
						'password' => $this->db->escape_str($this->input->post('password'))
					);
		if($this->makun->is_login($data)->num_rows()!=0){
			$data_login = $this->makun->is_login($data)->row();
			$this->session->set_userdata('sis', $data_login->nis);
			redirect('akun/profil');
		}else{
			$this->session->set_flashdata('msg', 'NIS atau password salah');
			redirect('pengumuman');
		}
	}
	function simpan(){
		$aksi = $this->db->escape_str($this->input->post('aksi'));
		$nis_lama = $this->db->escape_str($this->input->post('kode_lama'));
		$nama = $this->db->escape_str($this->input->post('nama'));
		$alamat = $this->db->escape_str($this->input->post('alamat'));
		$nama_wali = $this->db->escape_str($this->input->post('nama_wali'));
		$no_telp = $this->db->escape_str($this->input->post('no_telp'));
		$password = $this->db->escape_str($this->input->post('password'));
		$foto = str_replace(" ", "_", $_FILES['foto']['name']);
		$source = $_FILES['foto']['tmp_name'];
		$dest = "foto_siswa/$foto";
		$isi = array('nama' => $nama, 'alamat' => $alamat, 'nama_wali' => $nama_wali, 'no_telp' => $no_telp, 'password' => $password);
		if($aksi=='edit'){
			$where = "nis='$nis_lama'";
			if($this->makun->update($isi, $where)){
				if(strlen($source)!=0){
					if($this->makun->update(array('pp' => $foto), $where)){
						@copy($source, $dest);
					}
				}
				$this->session->set_flashdata('berhasil', 'berhasil mengedit akun');
			}else{
				$this->session->set_flashdata('gagal', 'gagal mengedit akun');
			}
		}
		redirect('akun');
	}
	function keluar(){
		$this->session->unset_userdata('sis');
		redirect('pengumuman');
	}
	
}