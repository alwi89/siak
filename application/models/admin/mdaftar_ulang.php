<?php
class Mdaftar_ulang extends CI_Model{
	function data(){
		$this->db->select('*');
		$this->db->from('siswa s');
		$this->db->join('daftar_ulang_kenaikan d', 's.nis=d.nis');
		$this->db->join('kelas k', 'd.id_kelas=k.id_kelas');
		$this->db->join('jurusan j', 's.id_jurusan=j.id_jurusan');
		///$this->db->where('tahun', 'year(now())', false);
		$this->db->order_by('tahun', 'desc');
		$this->db->order_by('nama_kelas', 'desc');
		$this->db->order_by('s.nis', 'desc');
		return $this->db->get();
	}
	function preview($id){
		$this->db->select('*');
		$this->db->from('daftar_ulang_kenaikan d');
		$this->db->join('siswa s', 'd.nis=s.nis');
		$this->db->where('id_daftar',$id);
		return $this->db->get();
	}
	function insert($data){
		if($this->db->insert('daftar_ulang_kenaikan', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function update($data, $where){
		if($this->db->update('daftar_ulang_kenaikan', $data, $where)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function delete($data){
		if($this->db->delete('daftar_ulang_kenaikan', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
}