<?php
class Mlaporan extends CI_Model{
	function harian($tgl){
		/*
		$this->db->select('tgl_bayar, p.no_pembayaran, s.nis, nama, nama_jenis, d.biaya');
		$this->db->from('pembayaran p');
		$this->db->join('siswa s', 'p.nis=s.nis');
		$this->db->join('detail_pembayaran d', 'p.no_pembayaran=d.no_pembayaran');
		$this->db->join('jenis_pembayaran j', 'd.id_jenis=j.id_jenis');
		$this->db->where('tgl_bayar', $tgl);
		$this->db->order_by('tgl_bayar', 'desc');
		$this->db->order_by('no_pembayaran', 'desc');
		return $this->db->get();
		*/
		$this->db->select('nama_jenis, sum(d.biaya) total');
		$this->db->from('jenis_pembayaran j');
		$this->db->join('detail_pembayaran d', 'j.id_jenis=d.id_jenis');
		$this->db->join('pembayaran p', 'd.no_pembayaran=p.no_pembayaran');
		$this->db->where('tgl_bayar', $tgl);
		$this->db->group_by('d.id_jenis');
		$this->db->order_by('d.id_jenis', 'asc');
		return $this->db->get();
	}
	function bulanan($bulan, $tahun){
		/*
		$this->db->select('tgl_bayar, p.no_pembayaran, s.nis, nama, nama_jenis, d.biaya');
		$this->db->from('pembayaran p');
		$this->db->join('siswa s', 'p.nis=s.nis');
		$this->db->join('detail_pembayaran d', 'p.no_pembayaran=d.no_pembayaran');
		$this->db->join('jenis_pembayaran j', 'd.id_jenis=j.id_jenis');
		$this->db->where('month(tgl_bayar)', $bulan);
		$this->db->where('year(tgl_bayar)', $tahun);
		$this->db->order_by('tgl_bayar', 'desc');
		$this->db->order_by('no_pembayaran', 'desc');
		return $this->db->get();
		*/
		$this->db->select('nama_jenis, sum(d.biaya) total');
		$this->db->from('jenis_pembayaran j');
		$this->db->join('detail_pembayaran d', 'j.id_jenis=d.id_jenis');
		$this->db->join('pembayaran p', 'd.no_pembayaran=p.no_pembayaran');
		$this->db->where('month(tgl_bayar)', $bulan);
		$this->db->where('year(tgl_bayar)', $tahun);
		$this->db->group_by('d.id_jenis');
		$this->db->order_by('d.id_jenis', 'asc');
		return $this->db->get();
	}
	function tahunan($tahun){
		/*
		$this->db->select('tgl_bayar, p.no_pembayaran, s.nis, nama, nama_jenis, d.biaya');
		$this->db->from('pembayaran p');
		$this->db->join('siswa s', 'p.nis=s.nis');
		$this->db->join('detail_pembayaran d', 'p.no_pembayaran=d.no_pembayaran');
		$this->db->join('jenis_pembayaran j', 'd.id_jenis=j.id_jenis');
		$this->db->where('year(tgl_bayar)', $tahun);
		$this->db->order_by('tgl_bayar', 'desc');
		$this->db->order_by('no_pembayaran', 'desc');
		return $this->db->get();
		*/
		$this->db->select('nama_jenis, sum(d.biaya) total');
		$this->db->from('jenis_pembayaran j');
		$this->db->join('detail_pembayaran d', 'j.id_jenis=d.id_jenis');
		$this->db->join('pembayaran p', 'd.no_pembayaran=p.no_pembayaran');
		$this->db->where('year(tgl_bayar)', $tahun);
		$this->db->group_by('d.id_jenis');
		$this->db->order_by('d.id_jenis', 'asc');
		return $this->db->get();
	}
	function jenis($id_jenis, $dari, $sampai){
		$this->db->select('tgl_bayar, p.no_pembayaran, s.nis, nama, nama_jenis, d.biaya');
		$this->db->from('pembayaran p');
		$this->db->join('siswa s', 'p.nis=s.nis');
		$this->db->join('detail_pembayaran d', 'p.no_pembayaran=d.no_pembayaran');
		$this->db->join('jenis_pembayaran j', 'd.id_jenis=j.id_jenis');
		$this->db->where('d.id_jenis', $id_jenis);
		$this->db->where("tgl_bayar between '$dari' and ", $sampai);
		$this->db->order_by('tgl_bayar', 'desc');
		$this->db->order_by('no_pembayaran', 'desc');
		return $this->db->get();
	}
	function rekap($dari, $sampai){
		$this->db->select('tgl_bayar, p.no_pembayaran, s.nis, nama, nama_jenis, d.biaya');
		$this->db->from('pembayaran p');
		$this->db->join('siswa s', 'p.nis=s.nis');
		$this->db->join('detail_pembayaran d', 'p.no_pembayaran=d.no_pembayaran');
		$this->db->join('jenis_pembayaran j', 'd.id_jenis=j.id_jenis');
		$this->db->where("tgl_bayar between '$dari' and ", $sampai);
		$this->db->order_by('tgl_bayar', 'desc');
		$this->db->order_by('no_pembayaran', 'desc');
		return $this->db->get();
	}
	function nama_jenis($id){
		$this->db->select('nama_jenis');
		$this->db->from('jenis_pembayaran');
		$this->db->where('id_jenis', $id);
		return $this->db->get();
	}
	function tunggakan_semua(){
		$this->db->select('s.nis, nama, nama_kelas, nama_jurusan, tahun');
		$this->db->from('siswa s');
		$this->db->join('jurusan j', 's.id_jurusan=j.id_jurusan');
		$this->db->join('kelas k', 's.id_kelas=k.id_kelas');
		$this->db->join('daftar_ulang_kenaikan d', 's.nis=d.nis');
		$this->db->order_by('nama', 'asc');
		return $this->db->get();
	}
	function tunggakan_kelas($kelas, $jurusan){
		$this->db->select('s.nis, nama, nama_kelas, nama_jurusan, tahun');
		$this->db->from('siswa s');
		$this->db->join('jurusan j', 's.id_jurusan=j.id_jurusan');
		$this->db->join('kelas k', 's.id_kelas=k.id_kelas');
		$this->db->join('daftar_ulang_kenaikan d', 's.nis=d.nis');
		$this->db->where('nama_kelas', $kelas);
		if($jurusan!='semua'){
			$this->db->where('nama_jurusan', $jurusan);
		}
		$this->db->order_by('nama', 'asc');
		return $this->db->get();
	}
	function tunggakan_nis($nis){
		$this->db->select('s.nis, nama, nama_kelas, nama_jurusan, tahun');
		$this->db->from('siswa s');
		$this->db->join('jurusan j', 's.id_jurusan=j.id_jurusan');
		$this->db->join('kelas k', 's.id_kelas=k.id_kelas');
		$this->db->join('daftar_ulang_kenaikan d', 's.nis=d.nis');
		$this->db->where('nis', $nis);
		$this->db->order_by('nama', 'asc');
		return $this->db->get();
	}
}