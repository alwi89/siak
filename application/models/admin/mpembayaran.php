<?php
class Mpembayaran extends CI_Model{
	function generate_no_pembayaran(){
		$a = $this->db->query("select no_pembayaran from pembayaran where tgl_bayar=date(now())");
		$jml = $a->num_rows();
		if($jml==0){
			$no_pembayaran = date("dmY").'-1';
		}else{
			foreach($a->result() as $b){
				$urutans = explode("-", $b->no_pembayaran);
				$data[] = $urutans[1];
			}
			$no_pembayaran = date("dmY").'-'.(max($data)+1);		
		}
		return $no_pembayaran;
	}
	function jenis_pembayaran($nis){
		$dipilih = "";
		if(isset($_SESSION['trx'])){
			$trx = explode(",", $_SESSION['trx']);		
			for($i=0; $i<sizeof($trx); $i++){
				if($dipilih==""){
					$dipilih = "'$trx[$i]'";
				}else{
					$dipilih .= ", '$trx[$i]'";
				}
			}
		}
		if($dipilih==""){
			$dipilih = "''";
		}
		$q_kelas = $this->db->query("select tahun, nama_kelas, nama_jurusan from kelas k join siswa s on k.id_kelas=s.id_kelas join jurusan j on s.id_jurusan=j.id_jurusan join daftar_ulang_kenaikan d on s.nis=d.nis where s.nis='$nis'");
		$h_kelas = $q_kelas->row();
		/*
		select * from jenis_pembayaran where angkatan='2016' and id_jenis not in('') and id_jenis not in(select id_jenis from detail_pembayaran d join pembayaran p on d.no_pembayaran=p.no_pembayaran where nis='9998313570 / 89-89.064' and kelas='X' and angkatan='2016') order by id_jenis ASC
		*/
		$a = $this->db->query("select * from jenis_pembayaran where angkatan='".$h_kelas->tahun."' and id_jenis not in($dipilih) and id_jenis not in(select id_jenis from detail_pembayaran d join pembayaran p on d.no_pembayaran=p.no_pembayaran where nis='$nis' and kelas='".$h_kelas->nama_kelas."' and angkatan='".$h_kelas->tahun."') order by id_jenis asc");
		$jml = $a->num_rows();
		if($jml==0){
			$data[] = NULL;
		}else{
			foreach($a->result() as $b){
				$data[] = $b;
			}
		}
		return json_encode($data);
	}
	function siswa(){
		$a = $this->db->query("select * from siswa s join daftar_ulang_kenaikan d on s.nis=d.nis order by s.nis asc");
		$jml = $a->num_rows();
		if($jml==0){
			$data[] = NULL;
		}else{
			foreach($a->result() as $b){
				$data[] = $b;
			}
		}
		return json_encode($data);
	}
	function cart(){
		if(!isset($_SESSION['trx'])){
			echo '{
				"sEcho": 1,
				"iTotalRecords": "0",
				"iTotalDisplayRecords": "0",
				"aaData": []
			}';
		}else{
			$items = explode(',', $_SESSION['trx']);
			$contents = array();
			foreach ($items as $item) {
				$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
			}
			$total = 0;
			foreach ($contents as $id=>$qty) {
				$a = $this->db->query("select * from jenis_pembayaran where id_jenis='$id'");
				$b = $a->row();
				$total += $b->biaya;
				$data['aaData'][] = array('id_jenis' => $b->id_jenis, 'nama_jenis' => $b->nama_jenis, 'biaya' => $b->biaya, 'total' => $total);
			}
			echo json_encode($data);	
		}
	}
	function add($id_jenis){
		for($i=0; $i<sizeof($id_jenis); $i++){
			if(!isset($_SESSION['trx'])){
				$_SESSION['trx'] = $id_jenis[$i];
			}else{
				$_SESSION['trx'] .= ','.$id_jenis[$i];
			}
		}
		$data[] = array('status' => $_SESSION['trx']);
		echo json_encode($data);
	}
	function del($id_jenis){
		$items = explode(',',$_SESSION['trx']);
		$newcart = '';
		foreach ($items as $item) {
			if ($id_jenis != $item) {
				if ($newcart != '') {
					$newcart .= ','.$item;
				} else {
					$newcart = $item;
				}
			}
		}
		if($newcart!=''){	
			$_SESSION['trx'] = $newcart;
			$data[] = array('status' => 'remove from cart');
		}else{
			unset($_SESSION['trx']);
			$data[] = array('status' => '0');
		}
		echo json_encode($data);
	}
	function nota($id){
		$query = $this->db->query("select no_pembayaran, s.nama siswa, u.nama petugas, tgl_bayar, total, dibayar, kembali from pembayaran p join siswa s on p.nis=s.nis join user u on p.id_user=u.id_user where no_pembayaran='$id'");
		return $query->row();
	}
	function data_pembayaran(){
		$this->db->select('*');
		$this->db->from('pembayaran p');
		$this->db->join('siswa s', 'p.nis=s.nis');
		$this->db->order_by('tgl_bayar', 'desc');
		$this->db->order_by('no_pembayaran', 'desc');
		return $this->db->get();
	}
	function detail($id){
		$this->db->select('s.nis, no_pembayaran, s.nama siswa, u.nama petugas, tgl_bayar, total, dibayar, kembali');
		$this->db->from('pembayaran p');
		$this->db->join('siswa s', 'p.nis=s.nis');
		$this->db->join('user u', 'p.id_user=u.id_user');
		$this->db->where('no_pembayaran', $id);
		return $this->db->get();
	}
}