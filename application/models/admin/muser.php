<?php
class Muser extends CI_Model{
	function data(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user', 'desc');
		return $this->db->get();
	}
	function preview($id){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user',$id);
		return $this->db->get();
	}
	function insert($data){
		if($this->db->insert('user', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function update($data, $where){
		if($this->db->update('user', $data, $where)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function delete($data){
		if($this->db->delete('user', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}