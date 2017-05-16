<?php
class Edit_pembayaran extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin/mpembayaran');
	}
	function index(){
		$data = array('konten' => 'admin/edit_pembayaran', 'data_pembayaran' => $this->mpembayaran->data_pembayaran());
		$this->load->view('admin/template', $data);
	}
	function edit($id){
		$data = array('konten' => 'admin/edit_pembayaran', 'data_pembayaran' => $this->mpembayaran->data_pembayaran(), 'detail' => $this->mpembayaran->detail($id)->row());
		$this->load->view('admin/template', $data);
	}
	function hapus($no_pembayaran, $id_detail=""){
		if($id_detail==""){
			$a = $this->db->query("delete from pembayaran where no_pembayaran='$no_pembayaran'");
			$lokasi = "edit_pembayaran";
		}else{
			$q_detail = $this->db->query("select * from detail_pembayaran where id_detail='$id_detail'");
			$h_detail = $q_detail->row();
			$a = $this->db->query("delete from detail_pembayaran where id_detail='$id_detail'");
			$x = $this->db->query("select * from detail_pembayaran where no_pembayaran='$no_pembayaran'");
			$jml = $x->num_rows();
			if($jml==0){
				$this->db->query("delete from pembayaran where no_pembayaran='$no_pembayaran'");
				$lokasi = "edit_pembayaran";
			}else{
				$this->db->query("update pembayaran set total=total-".$h_detail->biaya.", dibayar=null, kembali=null where no_pembayaran='$no_pembayaran'");
				$lokasi = "edit_pembayaran/edit/$no_pembayaran";
			}
		}
		if($a){
			$this->session->set_flashdata("berhasil", "berhasil menyimpan perubahan");
		}else{
			$this->session->set_flashdata("gagal", "gagal menyimpan perubahan");
		}
		redirect("admin/$lokasi");
	}
	function simpan(){
		$no_pembayaran = $this->db->escape_str($this->input->post('no_pembayaran'));
		$total = $this->db->escape_str($this->input->post('total'));
		$dibayar = $this->db->escape_str($this->input->post('dibayar'));
		$kembali = $this->db->escape_str($this->input->post('kembali'));
		$a = $this->db->query("update pembayaran set total='$total', dibayar='$dibayar', kembali='$kembali', tgl_bayar=date(now()) where no_pembayaran='$no_pembayaran'");
		if($a){
			$this->session->set_flashdata("berhasil", "berhasil menyimpan perubahan");
		}else{
			$this->session->set_flashdata("gagal", "gagal menyimpan perubahan");
		}
		redirect('admin/edit_pembayaran');
	}
}