<?php
class Mpembayaran extends CI_Model{
	function harian(){
		$this->db->select('tgl_bayar, p.no_pembayaran, nama, nama_jenis, d.biaya');
		$this->db->from('pembayaran p');
		$this->db->join('detail_pembayaran d', 'p.no_pembayaran=d.no_pembayaran');
		$this->db->join('jenis_pembayaran j', 'd.id_jenis=j.id_jenis');
		$this->db->join('user u', 'p.id_user=u.id_user');
		$this->db->where('tgl_bayar', 'date(now())', false);
		$this->db->where('nis', $_SESSION['sis']);
		$this->db->order_by('tgl_bayar', 'desc');
		$this->db->order_by('no_pembayaran', 'desc');
		return $this->db->get();
	}
	function bulanan($bulan, $tahun){
		$this->db->select('tgl_bayar, p.no_pembayaran, nama, nama_jenis, d.biaya');
		$this->db->from('pembayaran p');
		$this->db->join('detail_pembayaran d', 'p.no_pembayaran=d.no_pembayaran');
		$this->db->join('jenis_pembayaran j', 'd.id_jenis=j.id_jenis');
		$this->db->join('user u', 'p.id_user=u.id_user');
		$this->db->where('month(tgl_bayar)', $bulan);
		$this->db->where('year(tgl_bayar)', $tahun);
		$this->db->where('nis', $_SESSION['sis']);
		$this->db->order_by('tgl_bayar', 'desc');
		$this->db->order_by('no_pembayaran', 'desc');
		return $this->db->get();
	}
	function tahunan($tahun){
		$this->db->select('tgl_bayar, p.no_pembayaran, nama, nama_jenis, d.biaya');
		$this->db->from('pembayaran p');
		$this->db->join('detail_pembayaran d', 'p.no_pembayaran=d.no_pembayaran');
		$this->db->join('jenis_pembayaran j', 'd.id_jenis=j.id_jenis');
		$this->db->join('user u', 'p.id_user=u.id_user');
		$this->db->where('year(tgl_bayar)', $tahun);
		$this->db->where('nis', $_SESSION['sis']);
		$this->db->order_by('tgl_bayar', 'desc');
		$this->db->order_by('no_pembayaran', 'desc');
		return $this->db->get();
	}
	function periode($dari, $sampai){
		$this->db->select('tgl_bayar, p.no_pembayaran, nama, nama_jenis, d.biaya');
		$this->db->from('pembayaran p');
		$this->db->join('detail_pembayaran d', 'p.no_pembayaran=d.no_pembayaran');
		$this->db->join('jenis_pembayaran j', 'd.id_jenis=j.id_jenis');
		$this->db->join('user u', 'p.id_user=u.id_user');
		$this->db->where('nis', $_SESSION['sis']);
		$this->db->where("tgl_bayar between '$dari' and ", $sampai);
		$this->db->order_by('tgl_bayar', 'desc');
		$this->db->order_by('no_pembayaran', 'desc');
		return $this->db->get();
	}
	function tunggakan(){
		$q_login = $this->db->query("select * from siswa s join kelas k on s.id_kelas=k.id_kelas join jurusan j on s.id_jurusan=j.id_jurusan join daftar_ulang_kenaikan d on s.nis=d.nis where s.nis='$_SESSION[sis]'");
		$h_login = $q_login->row();
		$kelas = $h_login->nama_kelas;
		$jurusan = $h_login->nama_jurusan;
		$angkatan = $h_login->tahun;
		$query = $this->db->query("select * from jenis_pembayaran where angkatan='$angkatan' and id_jenis not in(select id_jenis from pembayaran p join detail_pembayaran d on p.no_pembayaran=d.no_pembayaran where nis='$_SESSION[sis]' and kelas='$kelas' and jurusan='$jurusan' and p.angkatan='$angkatan')");
		return $query;
	}
	
}