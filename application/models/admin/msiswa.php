<?php
class Msiswa extends CI_Model{
	function data(){
		$this->db->select('*');
		$this->db->from('siswa s');
		$this->db->join('kelas k', 's.id_kelas=k.id_kelas');
		$this->db->join('jurusan j', 's.id_jurusan=j.id_jurusan');
		$this->db->order_by('nis', 'desc');
		return $this->db->get();
	}
	function preview($id){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('nis',$id);
		return $this->db->get();
	}
	function insert($data){
		if($this->db->insert('siswa', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function update($data, $where){
		if($this->db->update('siswa', $data, $where)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function delete($data){
		if($this->db->delete('siswa', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function cek_nis($nis){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('nis<>', $nis);
		return $this->db->get();
	}
}