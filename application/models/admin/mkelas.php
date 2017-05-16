<?php
class Mkelas extends CI_Model{
	function data(){
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->order_by('id_kelas', 'desc');
		return $this->db->get();
	}
	function preview($id){
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->where('id_kelas',$id);
		return $this->db->get();
	}
	function insert($data){
		if($this->db->insert('kelas', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function update($data, $where){
		if($this->db->update('kelas', $data, $where)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function delete($data){
		if($this->db->delete('kelas', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}