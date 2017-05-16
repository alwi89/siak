<?php
function kelas(){
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->from('kelas');
	$CI->db->order_by('nama_kelas', 'asc');
	return $CI->db->get();
}
function jurusan(){
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->from('jurusan');
	$CI->db->order_by('nama_jurusan', 'asc');
	return $CI->db->get();
}
?>
<script>
$(function(){
	document.title = 'Laporan Tunggakan';
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
            Laporan Tunggakan
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
              <div id="isi">
              	<form method="post" action="<?php echo site_url(); ?>admin/laporan/tunggakan">
              	<table>
                	<tr>
                    	<td><input type="radio" name="jenis" value="semua" <?php echo isset($jenis)&&$jenis=='semua'?'checked':''; ?> required  />Semua</td>
                    </tr>
                    <tr>
                    	<td class="form-inline">
                        	<input type="radio" name="jenis" <?php echo isset($jenis)&&$jenis=='kelas'?'checked':''; ?> value="kelas" required />Kelas<br />
                            <select name="kelas" class="form-control">
                                        <?php foreach(kelas()->result() as $list_kelas){ ?>
                                        <option value="<?php echo $list_kelas->nama_kelas; ?>" <?php echo $kelas==$list_kelas->nama_kelas?'selected':''; ?>><?php echo $list_kelas->nama_kelas; ?></option>
                                        <?php } ?>
                            </select>
                            <select name="jurusan" class="form-control">
                            			<option value="semua" <?php echo $jurusan==""?'selected':'semua'; ?>>semua</option>
                                        <?php foreach(jurusan()->result() as $list_jurusan){ ?>
                                        <option value="<?php echo $list_jurusan->nama_jurusan; ?>" <?php echo $jurusan==$list_jurusan->nama_jurusan?'selected':''; ?>><?php echo $list_jurusan->nama_jurusan; ?></option>
                                        <?php } ?>
                            </select>
                       </td>
                   </tr>
                   <tr>
                    	<td class="form-inline">
                        	<input type="radio" name="jenis" value="nis" <?php echo isset($jenis)&&$jenis=='nis'?'checked':''; ?> required />NIS<br />
                            <input type="text" class="form-control" name="nis" id="nis" value="<?php echo $nis=='0'?'':$nis; ?>" />
                       </td>
                   </tr>
                   <tr>
                   		<td>
                        	<input type="submit" value="Lihat" class="btn btn-primary" />
                            <?php
							if(isset($jenis)){
								$jurusan = str_replace("(", "_", $jurusan);
								$jurusan = str_replace(")", "-", $jurusan);
							?>
                            <?php
							if($this->session->userdata('level')=='bendahara'){
							?>
                            <a target="_blank" href="<?php echo site_url(); ?>admin/laporan/cetak_tunggakan/<?php echo $jenis; ?>/<?php echo $kelas; ?>/<?php echo $jurusan; ?>/<?php echo str_replace("/", "_", $nis); ?>"><input type="button" value="Cetak" class="btn btn-danger" /></a>
                            <?php } ?>
                            <?php } ?>
                        </td>
                   </tr>
                </table>
                </form>     
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
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
                            $jml_spp = 0;
                            $total_spp = 0;
							$jumlah = 0;
							foreach(tunggakan($tunggakan->nis, $tunggakan->nama_kelas, $tunggakan->nama_jurusan, $tunggakan->tahun)->result() as $h_tunggakan){
                                $nama_tunggakan = substr($h_tunggakan->nama_jenis, 0, 3);
								if($tunggakans==''){
                                    if($nama_tunggakan=='SPP'){
                                        $jml_spp += 1;
                                        $total_spp += $h_tunggakan->biaya;
                                    }else{
                                        $tunggakans = $h_tunggakan->nama_jenis.'('.number_format($h_tunggakan->biaya).')';
                                    }
								}else{
                                    if($nama_tunggakan=='SPP'){
                                        $jml_spp += 1;
                                        $total_spp += $h_tunggakan->biaya;
                                    }else{
									   $tunggakans .= ', '.$h_tunggakan->nama_jenis.'('.number_format($h_tunggakan->biaya).')';
                                    }
								}
								$jumlah += $h_tunggakan->biaya;
							}
                            if($jml_spp==0){
                                $spps = '';
                            }else{
                                $spps = "SPP $jml_spp bulan(".number_format($total_spp)."), ";
                            }
							?>
                            <td><?php echo $spps.$tunggakans; ?></td>
                            <td><?php echo number_format($jumlah); ?></td>
                        </tr>
                        <?php $total+=$jumlah; } ?>
                        <tr>
                        	<td colspan="5" align="right"><b>Total Rp.</b></td>
                            <td><b><?php echo number_format($total); ?></b></td>
                        </tr>
                    </tbody>
                </table>  
              </div>          
        </section><!-- /.content -->
<?php
function tunggakan($nis, $kelas, $jurusan, $tahun){
	$CI =& get_instance();
	$query = $CI->db->query("select nama_jenis, biaya from jenis_pembayaran where angkatan='$tahun' and id_jenis not in(select id_jenis from detail_pembayaran d join pembayaran p on d.no_pembayaran=p.no_pembayaran where nis='$nis' and kelas='$kelas' and jurusan='$jurusan' and p.angkatan='$tahun')");
	return $query;
}
?>