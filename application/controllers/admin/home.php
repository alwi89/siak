<?php
/*
controller merupakan sebuah kelas yang menghubungkan user interface (view) dengan kelas yang menangani database (model)
*/
class Home extends CI_Controller{
	//construct adalah bagian kode dalam kelas Controller yang selalu dieksekusi
	function __construct(){
		parent::__construct();//artinya kode ini menurunkan sifat construct yang ada di ci
		if($this->session->userdata('id_user')==FALSE){//ketika user pertamakali mengakses folder admin, maka apabila belum ada session (pengenal) login akan dilempar ke halaman login yang ada di folder admin
			redirect('admin/login');//melempar ke controller admin, file login.php
			exit();//tutup controller home karena belum memiliki akses login
		}
		//tapi jika sudah login maka file yang ada di dalam folder mode/admin dengan nama file makun.php dipanggil
		$this->load->model('admin/makun');//memanggil model makun.php difolder admin
	}
	//fungsi yang dieksekusi pertamakali
	function index(){
		$data = array('konten' => 'admin/profil_user', 'data_akun' => $this->makun->data()->row());
		$this->load->view('admin/template', $data);//memanggil view difolder admin dengan nama template.php
	}
}