<html>
	<head>
    	<title>cetak laporan perjenis</title>
    </head>
    <body onLoad="javascript:print();">
                <div align="center">
                	LAPORAN PERJENIS<br />
                    SMK YP - 17<br />
                    SELOREJO - BLITAR
                    <hr />
                    <strong>
                    	jenis : <?php echo $jenis; ?><br />
                        periode : <?php echo $dari; ?> s/d <?php echo $sampai; ?>
					</strong>
                </div>
                <table id="data" border="1" cellpadding="3" cellspacing="0" width="100%">
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
                <div style="float:left;text-align:center;">
                    Dicetak Oleh<br /><br /><br />
                    <?php echo $_SESSION['nama']; ?>
                </div>
                <div style="clear:both;border-bottom:1px dotted #000000;">&nbsp;</div>
    	
    </body>
</html>