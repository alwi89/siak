<?php
class Makun extends CI_Model{
	function data(){
		/*
		artinya sama dengan query
		select * from user where id_user='session pengenal berupa id_user yang diisikan saat login berhasil tadi'
		*/
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->get();
	}
	function update($data, $where){
		if($this->db->update('user', $data, $where)){
			$this->session->set_userdata('nama', $data['nama']);
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function cek_username($id_user){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user<>', $id_user);
		return $this->db->get();
	}
}