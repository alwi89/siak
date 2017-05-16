<?php
function detail_pembayaran($id){
	$CI =& get_instance();
	$CI->db->select('no_pembayaran, id_detail, d.biaya, nama_jenis');
	$CI->db->from('detail_pembayaran d');
	$CI->db->join('jenis_pembayaran p', 'd.id_jenis=p.id_jenis');
	$CI->db->where('no_pembayaran', $id);
	$CI->db->order_by('id_detail', 'asc');
	return $CI->db->get();
}
?>
<script src="<?php echo site_url(); ?>templates/plugins/autoNumeric.js"></script>
<script>
$(function(){
	document.title = 'Master - Edit Pembayaran';
	$('#data').DataTable({
		"ordering": false
	});
	$('#ttotal').autoNumeric('init');
	$('#tdibayar').autoNumeric('init');
	$('#tkembali').autoNumeric('init');
	$('#tdibayar').keyup(function(){
		var total = $('#ttotal').autoNumeric('get');
		var dibayar = $('#tdibayar').autoNumeric('get');
		$('#dibayar').val(dibayar);
		var kembali = dibayar-total;
		if(kembali<0){
			$('#tkembali').val('');
			$('#kembali').val('');
		}else{
			$('#tkembali').autoNumeric('set', kembali);
			$('#kembali').val(kembali);
		}
	});
	$('#fbayar').submit(function(){
		if($('#tkembali').val()==""){
			alert('jumlah dibayar masih kurang');
			$('#tdibayar').focus();
			return false;
		}else{
			return true;
		}
	});
	var isEdit = "<?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='edit'?'ok':'no'; ?>";
	if(isEdit=="ok"){
		$("#modal_bayar").modal('toggle');
	}
});
</script>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Edit Pembayaran
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
             <?php if($this->session->flashdata('berhasil')!=""){ ?>
             <div class="box box-solid box-success" id="berhasil">
                <div class="box-header">
                  <h3 class="box-title" id="judul_berhasil">sukses</h3>
                </div>
                <div class="box-body" id="pesan_berhasil"><?php echo $this->session->flashdata('berhasil'); ?></div>
              </div>
            <?php } ?>
            <?php if($this->session->flashdata('gagal')!=""){ ?>
              <div class="box box-solid box-danger" id="gagal">
                <div class="box-header">
                  <h3 class="box-title" id="judul_gagal">gagal</h3>
                </div>
                <div class="box-body" id="pesan_gagal"><?php echo $this->session->flashdata('gagal'); ?></div>
              </div>
            <?php } ?>
              <div id="isi">                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                        	<th>Tgl Pembayaran</th>
                            <th>No. Pembayaran</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php foreach($data_pembayaran->result() as $pembayaran){ ?>
                        <tr>
                        	<td><?php echo date("d/m/Y", strtotime($pembayaran->tgl_bayar)); ?></td>
                            <td><?php echo $pembayaran->no_pembayaran; ?></td>
                            <td><?php echo $pembayaran->nis; ?></td>
                            <td><?php echo $pembayaran->nama; ?></td>
                            <td><?php echo number_format($pembayaran->total); ?></td>
                            <td align="center">
                            	<a href="<?php echo site_url(); ?>admin/edit_pembayaran/edit/<?php echo $pembayaran->no_pembayaran; ?>" title="edit"><img src="<?php echo base_url(); ?>templates/images/edit.png" width="20" height="20" /></a>
                                <a href="<?php echo site_url(); ?>admin/edit_pembayaran/hapus/<?php echo $pembayaran->no_pembayaran; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="<?php echo base_url(); ?>templates/images/remove.png" width="20" height="20" /></a>
                                <a href="<?php echo site_url(); ?>admin/pembayaran/cetak/<?php echo $pembayaran->no_pembayaran; ?>" target="_blank" title="cetak bukti pembayaran" ><img src="<?php echo base_url(); ?>templates/images/printer.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

<form method="post" id="fbayar" action="<?php echo site_url(); ?>admin/edit_pembayaran/simpan">
 <!-- Modal bayar-->
<div class="modal fade" id="modal_bayar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Pembayaran</h4>
      </div>
      <div class="modal-body" id="detail_jadwal">
        <div id="history">
				<table width="100%">
                	<tr>
                    	<td width="20%">NIS</td>
                        <td><input type="text" name="nis" value="<?php echo isset($detail)?$detail->nis:''; ?>" class="form-control" readonly /></td>
                    </tr>
                	<tr>
                    	<td width="20%">Nama</td>
                        <td><input type="text" name="nama" value="<?php echo isset($detail)?$detail->siswa:''; ?>" class="form-control" readonly /></td>
                    </tr>
                    <tr>
                    	<td>Tgl Bayar</td>
                        <td><input type="text" name="tgl_bayar" value="<?php echo isset($detail)?date("d/m/Y", strtotime($detail->tgl_bayar)):''; ?>" class="form-control" readonly /></td>
                    </tr>
                </table>
                	<?php if(isset($detail)){ ?>
                    <table width="100%" border="1" cellpadding="1" cellspacing="0">
                    	<tr>
                        	<td width="30%">Jenis Pembayaran</td>
                            <td>Nominal Rp.</td>
                            <td>Aksi</td>
                        </tr>
                    <?php foreach(detail_pembayaran($detail->no_pembayaran)->result() as $item){ ?>
                    	<tr>
                        	<td><?php echo $item->nama_jenis; ?></td>
                            <td><?php echo number_format($item->biaya); ?></td>
                            <td><a href="<?php echo site_url().'admin/edit_pembayaran/hapus/'.$item->no_pembayaran.'/'.$item->id_detail; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="<?php echo site_url(); ?>templates/images/remove.png" width="20" height="20" /></a></td>
                        </tr>
                     <?php } ?>
                     <tr>
                     	<td align="right" colspan="2">Total Rp.</td>
                        <td><input type="text" name="ttotal" id="ttotal" class="form-control" readonly value="<?php echo number_format($detail->total); ?>" /></td>
                        <input type="hidden" name="total" id="total" value="<?php echo $detail->total; ?>" />
                        <input type="hidden" name="no_pembayaran" id="no_pembayaran" value="<?php echo $detail->no_pembayaran; ?>" />
                     </tr>
                     <tr>
                     	<td align="right" colspan="2">Dibayar Rp.</td>
                        <td><input type="text" name="tdibayar" id="tdibayar" class="form-control" required value="<?php echo number_format($detail->dibayar); ?>" /></td>
                        <input type="hidden" name="dibayar" id="dibayar" value="<?php echo $detail->dibayar; ?>" />
                     </tr>
                     <tr>
                     	<td align="right" colspan="2">Kembali Rp.</td>
                        <td><input type="text" name="tkembali" id="tkembali" class="form-control" readonly value="<?php echo number_format($detail->kembali); ?>" /></td>
                        <input type="hidden" name="kembali" id="kembali" value="<?php echo $detail->kembali; ?>" />
                     </tr>
                </table>
            <?php } ?>
        </div>
      </div>
      <div class="modal-footer">
      	<input type="submit" value="Simpan Pembayaran" class="btn btn-primary" onclick="return confirm('yakin menyimpan pembayaran?');" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>
<!--end modal bayar-->                  
                
              </div>          
        </section><!-- /.content -->