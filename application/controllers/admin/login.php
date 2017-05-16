<?php
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/mlogin');//memanggil model mlogin.php di folder admin
	}
	//index merupakan kode yang dieksekusi pertamakali ketika sebuah controller dipanggil, dapat kita lihat url http://localhost/siak/admin/login
	//artinya memanggil kelas login controller, karena setelah kata login tidak ada kata berikutnya otomatis kode yang dieksekusi adalah function index
	function index(){
		$this->load->view('admin/login');//memanggil view (user interface) login.php yang ada di folder view/admin, berarti interfacenya adalah login.php di folder view/admin
	}
	//ini adalah fungsi yang dituju ketika tombol login dieksekusi
	function login_cek(){
		//selanjutnya data yang dikirimkan dari user interface berupa username dan password ditangkap dan dimasukkan kedalam sebuah variabel
		$data = array('username' => $this->db->escape_str($this->input->post('username')),
						'password' => md5($this->db->escape_str($this->input->post('password')))
					);//setelah semua data diterima dalam masing2 variabel kemudian data tersebut digabungkan dalam 1 variabel dengan nama $data
		if($this->mlogin->is_login($data)->num_rows()!=0){//memanggil model mlogin, function is_login dengan mengirimkan data inputan tadi, sedangkan !=0 artinya jika data hasil query tidak 0 baris (ditemukan)
			$data_login = $this->mlogin->is_login($data)->row();//menampung hasil querynya
			$this->session->set_userdata('id_user', $data_login->id_user);//membuat identitas login berupa id_user dari yang login
			$this->session->set_userdata('level', $data_login->level);//membuat identitas login berupa level dari user yang login
			$this->session->set_userdata('nama', $data_login->nama);//membuat identitas login berupa nama dari user yang login
			redirect('admin/home');//lempar kehalaman admin/home.php (ingat ini adalah controllernya)
		}else{
			$this->session->set_flashdata('gagal', 'username atau password salah');
			redirect('admin/login');
		}
		
	}
	
}