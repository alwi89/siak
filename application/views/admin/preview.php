<?php
function detail($id){
	//select d.biaya, nama_jenis from detail_pembayaran d join jenis_pembayaran p on d.id_jenis=p.id_jenis where no_pembayaran='$b[no_pembayaran]'
	$CI =& get_instance();
	$CI->db->select('d.biaya, nama_jenis');
	$CI->db->from('detail_pembayaran d');
	$CI->db->join('jenis_pembayaran p', 'd.id_jenis=p.id_jenis');
	$CI->db->where('no_pembayaran', $id);
	$CI->db->order_by('id_detail', 'asc');
	return $CI->db->get()->result();
}
?>
<script>
$(function(){
	document.title = 'Preview Nota Pembayaran';
});
</script>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Preview Nota Pembayaran
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
              <div id="isi">
                <div align="center">
                	NOTA BUKTI PEMBAYARAN<br />
                    SMK YP 17<br />
                    SELOREJO - BLITAR
                    <hr />
                    <strong>No. Pembayaran : <?php echo $data_pembayaran->no_pembayaran; ?></strong>
                </div>
				<table width="100%">
                	<tr>
                    	<td width="15%">Nama</td>
                        <td>: <?php echo $data_pembayaran->siswa; ?></td>
                    </tr>
                    <tr>
                    	<td>Tgl Pembayaran</td>
                        <td>: <?php echo date("d/m/Y", strtotime($data_pembayaran->tgl_bayar)); ?></td>
                    </tr>
                </table>
                    <table width="100%" border="1" cellpadding="0" cellspacing="1">
                    	<tr>
                        	<td width="30%">Jenis Pembayaran</td>
                            <td>Nominal Rp.</td>
                        </tr>
                    <?php foreach(detail($data_pembayaran->no_pembayaran) as $detail){ ?>
                    	<tr>
                        	<td><?php echo $detail->nama_jenis; ?></td>
                            <td><?php echo number_format($detail->biaya, 2); ?></td>
                        </tr>
                     <?php } ?>
                     <tr>
                     	<td align="right">Total Rp.</td>
                        <td><?php echo number_format($data_pembayaran->total, 2); ?></td>
                     </tr>
                     <tr>
                     	<td align="right">Dibayar Rp.</td>
                        <td><?php echo number_format($data_pembayaran->dibayar, 2); ?></td>
                     </tr>
                     <tr>
                     	<td align="right">Kembali Rp.</td>
                        <td><?php echo number_format($data_pembayaran->kembali, 2); ?></td>
                     </tr>
                </table>
                <div style="float:left;text-align:center;">
                    Petugas<br /><br /><br />
                    <?php echo $data_pembayaran->petugas; ?>
                </div>
                <div style="text-align:center;margin-left:100px;">
                    Siswa<br /><br /><br />
                    <?php echo $data_pembayaran->siswa; ?>
                </div>
                <div style="clear:both;">&nbsp;</div>
                <div>
                	<table>
                    	<tr>
                        	<td><a href="<?php echo site_url().'admin/pembayaran/cetak/'.$data_pembayaran->no_pembayaran; ?>" target="_blank"><input type="button" value="Cetak Bukti Pembayaran" class="btn btn-primary" /></a></td>
                            <td><a href="<?php echo site_url().'admin/pembayaran'; ?>"><input type="button" value="input pembayaran baru" class="btn btn-primary" /></a></td>
                     </tr>
                     </table>
                </div>
              </div>          
        </section><!-- /.content -->