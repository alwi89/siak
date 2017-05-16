<?php
/*
model merupakan kelas yang menangani perintah2 query ke database
*/
class Mlogin extends CI_Model{
	//fungsi yang dipanggil dari controller tadi dengan data yang dikirimkannya
	function is_login($data){
		/*
		kode dibawah sama artinya dengan query
		select * from user where username='username yang diinputkan di data awal tadi' and password='password yang diinputkan di data awal tadi' and status='aktif'
		*/
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $data['username']);
		$this->db->where('password', $data['password']);
		$this->db->where('status', 'aktif');
		return $this->db->get();//get adalah untuk memperoleh hasil dari query
	}
}