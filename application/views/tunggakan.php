<?php
if(empty($this->session->userdata('sis'))){
	redirect('tidakketemu');
}
?>
<script>
$(function(){
	document.title = 'Data Tunggakan';
});
</script>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Data Tunggakan
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
              <div id="isi">
                <?php
				$jml = $data_tunggakan->num_rows();
				if($jml==0){
					echo 'Anda tidak memiliki tunggakan';
				}else{
				?>
                <a href="<?php echo site_url(); ?>tunggakan/cetak" target="_blank"><input type="button" value="cetak" class="btn btn-danger" /></a><br /><br />
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Jenis Pembayaran</th>
                            <th>Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
						$total = 0;
						foreach($data_tunggakan->result() as $tunggakan){ ?>
                        <tr>
                        	<td><?php echo $tunggakan->nama_jenis; ?></td>
                            <td><?php echo number_format($tunggakan->biaya); ?></td>
                        </tr>
                        <?php $total+=$tunggakan->biaya; } ?>
                        <tr>
                        	<td align="right"><b>Total Rp.</b></td>
                            <td><b><?php echo number_format($total); ?></b></td>
                        </tr>
                    </tbody>
                </table>
                <?php } ?>       
              </div>          
        </section><!-- /.content -->