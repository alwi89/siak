<html>
	<head>
    	<title>cetak laporan tunggakan</title>
    </head>
    <body onLoad="javascript:print();">
				
                <div align="center">
                	LAPORAN TUNGGAKAN<br />
                    SMK YP - 17<br />
                    SELOREJO BLITAR
                    <hr />
                    <strong>
                    	Jenis Laporan : 
                        <?php
						if($jenis=='semua'){
							echo 'Semua';
						}else if($jenis=='kelas'){
							echo 'Kelas<br />Kelas : '.$kelas.', Jurusan : '.$jurusan;
						}else if($jenis=='nis'){
							echo 'NIS<br />NIS : '.$nis;
						}
						?>
					</strong>
                </div>
                <table border="1" cellpadding="3" cellspacing="0" width="100%">
                		<thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Tunggakan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
						$total = 0;
						foreach($data_tunggakan->result() as $tunggakan){ ?>
                        <tr>
                        	<td><?php echo $tunggakan->nis; ?></td>
                            <td><?php echo $tunggakan->nama; ?></td>
                            <td><?php echo $tunggakan->nama_kelas; ?></td>
                            <td><?php echo $tunggakan->nama_jurusan; ?></td>
                            <?php
							$tunggakans = '';
							$jumlah = 0;
							foreach(tunggakan($tunggakan->nis, $tunggakan->nama_kelas, $tunggakan->nama_jurusan)->result() as $h_tunggakan){
								if($tunggakans==''){
									$tunggakans = $h_tunggakan->nama_jenis.'('.number_format($h_tunggakan->biaya).')';
								}else{
									$tunggakans .= ', '.$h_tunggakan->nama_jenis.'('.number_format($h_tunggakan->biaya).')';
								}
								$jumlah += $h_tunggakan->biaya;
							}
							?>
                            <td><?php echo $tunggakans; ?></td>
                            <td><?php echo number_format($jumlah); ?></td>
                        </tr>
                        <?php $total+=$jumlah; } ?>
                        <tr>
                        	<td colspan="5" align="right"><b>Total Rp.</b></td>
                            <td><b><?php echo number_format($total); ?></b></td>
                        </tr>
                    </tbody>
                </table>  
                <div style="float:left;text-align:center;">
                    Dicetak Oleh<br /><br /><br />
                    <?php echo $_SESSION['nama']; ?>
                </div>
                <div style="clear:both;border-bottom:1px dotted #000000;">&nbsp;</div>
    	
    </body>
</html>
<?php
function tunggakan($nis, $kelas, $jurusan){
	$CI =& get_instance();
	$query = $CI->db->query("select nama_jenis, biaya from jenis_pembayaran where id_jenis not in(select id_jenis from detail_pembayaran d join pembayaran p on d.no_pembayaran=p.no_pembayaran where nis='$nis' and kelas='$kelas' and jurusan='$jurusan')");
	return $query;
}
?>