<?php
class Mpengumuman extends CI_Model{
	function data(){
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->order_by('id_pengumuman', 'desc');
		return $this->db->get();
	}
	function preview($id){
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->where('id_pengumuman',$id);
		return $this->db->get();
	}
	function insert($data){
		if($this->db->insert('pengumuman', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function update($data, $where){
		if($this->db->update('pengumuman', $data, $where)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function delete($data){
		if($this->db->delete('pengumuman', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}