<html>
	<head>
    	<title>cetak laporan bulanan</title>
    </head>
    <body onLoad="javascript:print();">
                <div align="center">
                	LAPORAN BULANAN<br />
                    SMK YP - 17<br />
                    SELOREJO - BLITAR
                    <hr />
                    <strong>
                        <?php
						$bln = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
							$idx_bln = intval($bulan)-1;
							echo 'bulan : '.$bln[$idx_bln].' '.$tahun;
						?>
					</strong>
                </div>
                <table id="data" border="1" cellpadding="3" cellspacing="0" width="100%">
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
                <div style="float:left;text-align:center;">
                    Dicetak Oleh<br /><br /><br />
                    <?php echo $_SESSION['nama']; ?>
                </div>
                <div style="clear:both;border-bottom:1px dotted #000000;">&nbsp;</div>
    	
    </body>
</html>