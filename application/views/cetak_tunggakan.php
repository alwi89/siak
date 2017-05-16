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
                	DATA TUNGGAKAN<br />
                    SMK YP 17 SELOREJO<br />
                    Jl. Selorejo No. 1, Telp. 0876544
                    <hr />
                    <strong>
                    	Nama : <?php echo data_login()->nama; ?><br />
						Kelas : <?php echo data_login()->nama_kelas.' - '.data_login()->nama_jurusan; ?><br />
					</strong>
                </div>
				<?php
				$jml = $data_tunggakan->num_rows();
				if($jml==0){
					echo 'Anda tidak memiliki tunggakan';
				}else{
				?>
                <table id="data" border="1" cellpadding="3" cellspacing="0" width="100%">
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