<?php
function jenis(){
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->from('jenis_pembayaran');
	$CI->db->order_by('id_jenis', 'asc');
	return $CI->db->get();
}
?>
<script>
document.title = ' laporan perjenis';
$(function(){
	$("#dari").datepicker({
		autoclose: true,
		format: 'dd/mm/yyyy',
		todayHighlight: true
	});
	$("#sampai").datepicker({
		autoclose: true,
		format: 'dd/mm/yyyy',
		todayHighlight: true
	});
});
</script>
<section class="content-header">
          <h1 style="margin-top:30px;">
            Laporan Perjenis
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
              <div id="isi">
              <form method="post" action="<?php echo site_url(); ?>admin/laporan/jenis">
              	<table>
                    <tr>
                         <td>dari</td>
                         <td><input type="text" name="dari" id="dari" value="<?php echo $dari; ?>" class="form-control" /></td>
                         <td>s/d</td>
                         <td><input type="text" name="sampai" id="sampai" value="<?php echo $sampai; ?>" class="form-control" /></td>
                   </tr>
                   <tr>
                         <td>jenis</td>
                         <td colspan="3">
                         	<select name="jenis" class="form-control">
                            	<option value="">=pilih jenis pembayaran=</option>
                                <?php foreach(jenis()->result() as $list_jenis) { ?>
                                	<option value="<?php echo $list_jenis->id_jenis; ?>" <?php echo $jenis==$list_jenis->id_jenis?'selected':''; ?>><?php echo $list_jenis->nama_jenis.' - '.$list_jenis->angkatan; ?></option>
                                <?php } ?>
                            </select>
                         </td>
                   </tr>
                   <tr>
                   		<td></td>
                   		<td colspan="3">
                        	<input type="submit" value="Lihat" class="btn btn-primary" />
                            <?php
							if($this->session->userdata('level')=='bendahara'){
							?>
                            <a target="_blank" href="<?php echo site_url(); ?>admin/laporan/cetak_jenis/<?php echo str_replace("/", "_", $dari); ?>/<?php echo str_replace("/", "_", $sampai); ?>/<?php echo $jenis; ?>"><input type="button" value="Cetak" class="btn btn-danger" /></a>
                            <?php } ?>
                        </td>
                   </tr>
                </table>
                </form> 
<table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                        	<th>Tgl Pembayaran</th>
                            <th>No. Pembayaran</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Pembayaran</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $total = 0; foreach($data->result() as $laporan){ ?>
                        <tr>
                        	<td><?php echo date("d/m/Y", strtotime($laporan->tgl_bayar)); ?></td>
                            <td><?php echo $laporan->no_pembayaran; ?></td>
                            <td><?php echo $laporan->nis; ?></td>
                            <td><?php echo $laporan->nama; ?></td>
                            <td><?php echo $laporan->nama_jenis; ?></td>
                            <td><?php echo number_format($laporan->biaya); ?></td>
                        </tr>
                        <?php $total+=$laporan->biaya; } ?>
                        <tr>
                        	<td colspan="5" align="right"><b>Total Rp.</b></td>
                            <td><b><?php echo number_format($total); ?></b></td>
                        </tr>
                    </tbody>
                </table>
              
              </div>
        </section>