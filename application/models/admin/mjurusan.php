<?php
class Mjurusan extends CI_Model{
	function data(){
		$this->db->select('*');
		$this->db->from('jurusan');
		$this->db->order_by('id_jurusan', 'desc');
		return $this->db->get();
	}
	function preview($id){
		$this->db->select('*');
		$this->db->from('jurusan');
		$this->db->where('id_jurusan',$id);
		return $this->db->get();
	}
	function insert($data){
		if($this->db->insert('jurusan', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function update($data, $where){
		if($this->db->update('jurusan', $data, $where)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function delete($data){
		if($this->db->delete('jurusan', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}