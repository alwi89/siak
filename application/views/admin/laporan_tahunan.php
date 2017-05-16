<script>
document.title = ' laporan tahunan';
</script>
<section class="content-header">
          <h1 style="margin-top:30px;">
            Laporan Tahunan
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
              <div id="isi">
              <form method="post" action="<?php echo site_url(); ?>admin/laporan/tahunan">
              	<table>
                    <tr>
                         <td>
                            <select name="tahun" class="form-control">
                            	<?php for($i=date("Y"); $i>=2016; $i--){ ?>
                                <option value="<?php echo $i; ?>" <?php echo $tahun==$i?'selected':''; ?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                       </td>
                   </tr>
                   <tr>
                   		<td>
                        	<input type="submit" value="Lihat" class="btn btn-primary" />
                            <?php
							if($this->session->userdata('level')=='bendahara'){
							?>
                            <a target="_blank" href="<?php echo site_url(); ?>admin/laporan/cetak_tahunan/<?php echo $tahun; ?>"><input type="button" value="Cetak" class="btn btn-danger" /></a>
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