<?php
if(empty($this->session->userdata('sis'))){
	redirect('tidakketemu');
}
?>
<html>
	<head>
    	<title>cetak pembayaran</title>
    </head>
    <body onLoad="javascript:print();">

                <div align="center">
                	DATA PEMBAYARAN<br />
                    SMK YP - 17<br />
                    SELOREJO - BLITAR
                    <hr />
                    <strong>
                    	Nama : <?php echo data_login()->nama; ?><br />
						Kelas : <?php echo data_login()->nama_kelas.' - '.data_login()->nama_jurusan; ?><br />
                    	Jenis Laporan : 
                        <?php
						if($jenis=='harian'){
							echo 'Harian<br />tgl : '.date('d/m/Y');
						}else if($jenis=='bulanan'){
							$bln = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
							$idx_bln = intval($bulan)-1;
							echo 'Bulanan<br />bulan : '.$bln[$idx_bln].' '.$tahun;
						}else if($jenis=='tahunan'){
							echo 'Tahunan<br />tahun : '.$tahun2;
						}else if($jenis=='periode'){
							echo 'Periode<br />dari '.str_replace("_", "/", $dari).' s/d '.str_replace("_", "/", $sampai);
						}
						?>
					</strong>
                </div>
                <table id="data" border="1" cellpadding="3" cellspacing="0" width="100%">
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
                <div style="float:left;text-align:center;">
                    Dicetak Tgl : <?php echo date("d/m/Y"); ?>
                </div>
                <div style="clear:both;border-bottom:1px dotted #000000;">&nbsp;</div>
    	
    </body>
</html>
<?php
function data_login(){
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->from('siswa s');
	$CI->db->join('kelas k', 's.id_kelas=k.id_kelas');
	$CI->db->join('jurusan j', 's.id_jurusan=j.id_jurusan');
	$CI->db->where('nis', $_SESSION['sis']);
	return $CI->db->get()->row();
}
?>