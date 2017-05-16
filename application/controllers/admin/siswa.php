<?php
class Siswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/msiswa');
	}
	function index(){
		$data = array('konten' => 'admin/siswa', 'data' => $this->msiswa->data());
		$this->load->view('admin/template', $data);
	}
	function edit($id){
		$id = urldecode(str_replace("_", "/", $id));
		$data = array('konten' => 'admin/siswa', 'data' => $this->msiswa->data(), 'data_lama' => $this->msiswa->preview($id)->row());
		$this->load->view('admin/template', $data);
	}
	function simpan(){
		$aksi = $this->db->escape_str($this->input->post('aksi'));
		$tahun_masuk = $this->db->escape_str($this->input->post('tahun_masuk'));
		$nis_lama = $this->db->escape_str($this->input->post('kode_lama'));
		$nis = $this->db->escape_str($this->input->post('nis'));
		$nama = $this->db->escape_str($this->input->post('nama'));
		$alamat = $this->db->escape_str($this->input->post('alamat'));
		$nama_wali = $this->db->escape_str($this->input->post('nama_wali'));
		$no_telp = $this->db->escape_str($this->input->post('no_telp'));
		$password = $this->db->escape_str($this->input->post('password'));
		$kelas = $this->db->escape_str($this->input->post('kelas'));
		$jurusan = $this->db->escape_str($this->input->post('jurusan'));
		$status = $this->db->escape_str($this->input->post('status'));
		$foto = str_replace(" ", "_", $_FILES['foto']['name']);
		$source = $_FILES['foto']['tmp_name'];
		$dest = "foto_siswa/$foto";
		$isi = array('nis' => $nis, 'id_kelas' => $kelas, 'nama' => $nama, 'alamat' => $alamat, 'nama_wali' => $nama_wali, 'no_telp' => $no_telp, 'password' => $password, 'id_jurusan' => $jurusan, 'status' => $status, 'tahun_masuk' => $tahun_masuk);
		if($aksi=='tambah'){
			if($this->msiswa->insert($isi)){
				if(strlen($source)!=0){
					if($this->msiswa->update(array('pp' => $foto), "nis='$nis_lama'")){
						@copy($source, $dest);
					}
				}
				$this->session->set_flashdata('berhasil', 'berhasil menambah siswa');
			}else{
				$this->session->set_flashdata('gagal', 'gagal menambah siswa');
			}
		}else{
			$where = "nis='$nis_lama'";
			if($this->msiswa->update($isi, $where)){
				if(strlen($source)!=0){
					if($this->msiswa->update(array('pp' => $foto), $where)){
						@copy($source, $dest);
					}
				}
				$this->session->set_flashdata('berhasil', 'berhasil mengedit siswa');
			}else{
				$this->session->set_flashdata('gagal', 'gagal mengedit siswa');
			}
		}
		redirect('admin/siswa');
	}
	function hapus($id){
		$id = urldecode(str_replace("_", "/", $id));
		$data = array('nis' => $id);
		if($this->msiswa->delete($data)){
			$this->session->set_flashdata('berhasil', 'berhasil menghapus siswa');
		}else{
			$this->session->set_flashdata('gagal', 'gagal menghapus siswa');
		}
		redirect('admin/siswa');
	}
	function cek_unique(){
		$nis_lama = $this->input->post('nis_lama');
		$jml = $this->msiswa->cek_nis($nis_lama)->num_rows();
		if($jml==0){
			$nis_terdaftar[] = NULL;
		}else{
			foreach($this->msiswa->cek_nis($nis_lama)->result() as $data_nis){
				$nis_terdaftar[] = $data_nis->nis;
			}
		}
		$nis  = $this->db->escape_str($this->input->post('nis'));
		if( in_array($nis, $nis_terdaftar) ){
			echo json_encode(array('valid' => false));
		}else{
			echo json_encode(array('valid' => true));
		}
	}
}