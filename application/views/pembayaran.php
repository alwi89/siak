<?php
if(empty($this->session->userdata('sis'))){
	redirect('tidakketemu');
}
?>
<script>
$(function(){
	document.title = 'Data Pembayaran';
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
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Data Pembayaran
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
              <div id="isi">
              	<form method="post" action="<?php echo site_url(); ?>pembayaran">
              	<table>
                	<tr>
                    	<td><input type="radio" name="jenis" value="harian" <?php echo isset($jenis)&&$jenis=='harian'?'checked':''; ?> required  />Hari Ini</td>
                    </tr>
                    <tr>
                    	<td class="form-inline">
                        	<input type="radio" name="jenis" <?php echo isset($jenis)&&$jenis=='bulanan'?'checked':''; ?> value="bulanan" required />Bulanan<br />
                            <select name="bulan" class="form-control">
                            	<option value="01" <?php echo isset($bulan)&&$bulan=='01'?'selected':''; ?>>Januari</option>
                                <option value="02" <?php echo isset($bulan)&&$bulan=='02'?'selected':''; ?>>Februari</option>
                                <option value="03" <?php echo isset($bulan)&&$bulan=='03'?'selected':''; ?>>Maret</option>
                                <option value="04" <?php echo isset($bulan)&&$bulan=='04'?'selected':''; ?>>April</option>
                                <option value="05" <?php echo isset($bulan)&&$bulan=='05'?'selected':''; ?>>Mei</option>
                                <option value="06" <?php echo isset($bulan)&&$bulan=='06'?'selected':''; ?>>Juni</option>
                                <option value="07" <?php echo isset($bulan)&&$bulan=='07'?'selected':''; ?>>Juli</option>
                                <option value="08" <?php echo isset($bulan)&&$bulan=='08'?'selected':''; ?>>Agustus</option>
                                <option value="09" <?php echo isset($bulan)&&$bulan=='09'?'selected':''; ?>>September</option>
                                <option value="10" <?php echo isset($bulan)&&$bulan=='10'?'selected':''; ?>>Oktober</option>
                                <option value="11" <?php echo isset($bulan)&&$bulan=='11'?'selected':''; ?>>November</option>
                                <option value="21" <?php echo isset($bulan)&&$bulan=='12'?'selected':''; ?>>Desember</option>
                            </select>
                            <select name="tahun" class="form-control">
                            	<?php for($i=date("Y"); $i>=2016; $i--){ ?>
                                <option value="<?php echo $i; ?>" <?php echo isset($tahun)&&$tahun==$i?'selected':''; ?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                       </td>
                   </tr>
                   <tr class="form-inline">
                    	<td>
                        	<input type="radio" name="jenis" value="tahunan" <?php echo isset($jenis)&&$jenis=='tahunan'?'checked':''; ?> required />Tahunan<br />
                            <select name="tahun2" class="form-control">
                            	<?php for($i=date("Y"); $i>=2016; $i--){ ?>
                                <option value="<?php echo $i; ?>" <?php echo isset($tahun2)&&$tahun2==$i?'selected':''; ?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                       </td>
                   </tr>
                   <tr class="form-inline">
                    	<td>
                        	<input type="radio" name="jenis" value="periode" <?php echo isset($jenis)&&$jenis=='periode'?'checked':''; ?> required />Periode<br />
                            dari <input type="text" class="form-control" name="dari" id="dari" value="<?php echo isset($dari)&&$jenis=='periode'?$dari:''; ?>" /> s/d <input type="text" class="form-control" name="sampai" id="sampai" value="<?php echo isset($sampai)&&$jenis=='periode'?$sampai:''; ?>" />
                        </td>
                   </tr>
                   <tr>
                   		<td>
                        	<input type="submit" value="Lihat" class="btn btn-primary" />
                            <a target="_blank" href="<?php echo site_url(); ?>pembayaran/cetak/<?php echo $jenis; ?>/<?php echo $bulan; ?>/<?php echo $tahun; ?>/<?php echo $tahun2; ?>/<?php echo str_replace("/", "_", $dari); ?>/<?php echo str_replace("/", "_", $sampai); ?>"><input type="button" value="Cetak" class="btn btn-danger" /></a>
                        </td>
                   </tr>
                </table>
                </form>     
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                        	<th>Tgl Pembayaran</th>
                            <th>No. Pembayaran</th>
                            <th>Petugas</th>
                            <th>Jenis Pembayaran</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $total=0; foreach($data_pembayaran->result() as $pembayaran){ ?>
                        <tr>
                        	<td><?php echo date("d/m/Y", strtotime($pembayaran->tgl_bayar)); ?></td>
                            <td><?php echo $pembayaran->no_pembayaran; ?></td>
                            <td><?php echo $pembayaran->nama; ?></td>
                            <td><?php echo $pembayaran->nama_jenis; ?></td>
                            <td><?php echo number_format($pembayaran->biaya); ?></td>
                        </tr>
                        <?php $total+=$pembayaran->biaya; } ?>
                        <tr>
                        	<td colspan="4" align="right"><b>Total Rp.</b></td>
                            <td><b><?php echo number_format($total); ?></b></td>
                        </tr>
                    </tbody>
                </table>                
              </div>          
        </section><!-- /.content -->