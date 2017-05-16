<?php
class Mjenis_pembayaran extends CI_Model{
	function data(){
		$this->db->select('*');
		$this->db->from('jenis_pembayaran');
		$this->db->order_by('id_jenis', 'desc');
		return $this->db->get();
	}
	function preview($id){
		$this->db->select('*');
		$this->db->from('jenis_pembayaran');
		$this->db->where('id_jenis',$id);
		return $this->db->get();
	}
	function insert($data){
		if($this->db->insert('jenis_pembayaran', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function update($data, $where){
		if($this->db->update('jenis_pembayaran', $data, $where)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function delete($data){
		if($this->db->delete('jenis_pembayaran', $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}