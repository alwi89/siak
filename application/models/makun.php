<?php
class Makun extends CI_Model{
	function is_login($data){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('nis', $data['nis']);
		$this->db->where('password', $data['password']);
		$this->db->where('status', 'aktif');
		return $this->db->get();
	}
	function data(){
		$this->db->select('*');
		$this->db->from('siswa s');
		$this->db->join('daftar_ulang_kenaikan d', 's.nis=d.nis');
		$this->db->where('s.nis', $this->session->userdata('sis'));
		return $this->db->get();
	}
	function update($data, $where){
		if($this->db->update('siswa', $data, $where)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}