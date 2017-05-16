<script>
document.title = ' laporan bulanan';
</script>
<section class="content-header">
          <h1 style="margin-top:30px;">
            Laporan Bulanan
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
              <div id="isi">
              <form method="post" action="<?php echo site_url(); ?>admin/laporan/bulanan">
              	<table>
                    <tr>
                    	<td>
                            <select name="bulan" class="form-control">
                            	<option value="01" <?php echo $bulan=='01'?'selected':''; ?>>Januari</option>
                                <option value="02" <?php echo $bulan=='02'?'selected':''; ?>>Februari</option>
                                <option value="03" <?php echo $bulan=='03'?'selected':''; ?>>Maret</option>
                                <option value="04" <?php echo $bulan=='04'?'selected':''; ?>>April</option>
                                <option value="05" <?php echo $bulan=='05'?'selected':''; ?>>Mei</option>
                                <option value="06" <?php echo $bulan=='06'?'selected':''; ?>>Juni</option>
                                <option value="07" <?php echo $bulan=='07'?'selected':''; ?>>Juli</option>
                                <option value="08" <?php echo $bulan=='08'?'selected':''; ?>>Agustus</option>
                                <option value="09" <?php echo $bulan=='09'?'selected':''; ?>>September</option>
                                <option value="10" <?php echo $bulan=='10'?'selected':''; ?>>Oktober</option>
                                <option value="11" <?php echo $bulan=='11'?'selected':''; ?>>November</option>
                                <option value="21" <?php echo $bulan=='12'?'selected':''; ?>>Desember</option>
                            </select>
                         </td>
                         <td>
                            <select name="tahun" class="form-control">
                            	<?php for($i=date("Y"); $i>=2016; $i--){ ?>
                                <option value="<?php echo $i; ?>" <?php echo $tahun==$i?'selected':''; ?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                       </td>
                   </tr>
                   <tr>
                   		<td colspan="2">
                        	<input type="submit" value="Lihat" class="btn btn-primary" />
                            <?php
							if($this->session->userdata('level')=='bendahara'){
							?>
                            <a target="_blank" href="<?php echo site_url(); ?>admin/laporan/cetak_bulanan/<?php echo $bulan; ?>/<?php echo $tahun; ?>"><input type="button" value="Cetak" class="btn btn-danger" /></a>
                            <?php } ?>
                        </td>
                   </tr>
                </table>
                </form> 
<table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                        	<th>Jenis Pembayaran</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $total = 0; foreach($data->result() as $laporan){ ?>
                        <tr>
                        	<td><?php echo $laporan->nama_jenis; ?></td>
                            <td><?php echo number_format($laporan->total); ?></td>
                        </tr>
                        <?php $total+=$laporan->total; } ?>
                        <tr>
                        	<td align="right"><b>Total Rp.</b></td>
                            <td><b><?php echo number_format($total); ?></b></td>
                        </tr>
                    </tbody>
                </table>
              
              </div>
        </section>