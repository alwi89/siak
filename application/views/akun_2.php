<?php
if(empty($this->session->userdata('sis'))){
	redirect('tidakketemu');
}
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
	document.title = 'Profil User';
});
</script>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Profil User
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
              <div id="isi">
				<div class="form-horizontal"> 
							<div class="form-group">
                            	<label class="col-lg-3 control-label">NIS</label>
                                <div class="col-lg-5">
									<input type="text" name="nis" class="form-control" value="<?php echo isset($data_akun)?$data_akun->nis:''; ?>" required maxlength="30" disabled />
                                </div>
                            </div>
                            <div class="form-group">
                            	<label class="col-lg-3 control-label">Kelas</label>
                                <div class="col-lg-5">
									<select name="kelas" class="form-control" disabled>
                                        <option value="">=pilih kelas=</option>
                                        <?php foreach(kelas()->result() as $data_kelas){ ?>
                                        <option value="<?php echo $data_kelas->id_kelas; ?>" <?php echo isset($data_akun)&&$data_akun->id_kelas==$data_kelas->id_kelas?'selected':''; ?>><?php echo $data_kelas->nama_kelas; ?></option>
                                        <?php } ?>
                                	</select>
							  	</div>
							</div>
                            <div class="form-group">
                            	<label class="col-lg-3 control-label">Jurusan</label>
                                <div class="col-lg-5">
									<select name="jurusan" class="form-control" disabled>
                                        <option value="">=pilih jurusan=</option>
                                        <?php foreach(jurusan()->result() as $data_jurusan){ ?>
                                        <option value="<?php echo $data_jurusan->id_jurusan; ?>" <?php echo isset($data_akun)&&$data_akun->id_jurusan==$data_jurusan->id_jurusan?'selected':''; ?>><?php echo $data_jurusan->nama_jurusan; ?></option>
                                        <?php } ?>
                                	</select>
							  	</div>
							</div>
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Nama</label>
                                <div class="col-lg-5">
									<input type="text" name="nama" class="form-control" value="<?php echo isset($data_akun)?$data_akun->nama:''; ?>" disabled maxlength="50" />
							  	</div>
							</div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Alamat</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="alamat" value="<?php echo isset($data_akun)?$data_akun->alamat:''; ?>" disabled />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nama Wali</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" disabled name="nama_wali" value="<?php echo isset($data_akun)?$data_akun->nama_wali:''; ?>"  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">No. Telpon</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" disabled name="no_telp" value="<?php echo isset($data_akun)?$data_akun->no_telp:''; ?>"  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Foto</label>
                                <div class="col-lg-5">
                                    <?php echo isset($data_akun)?"<img src=\"".site_url()."foto_siswa/".$data_akun->pp."\" width=\"100\" height=\"100\" />":''; ?>
                                </div>
                            </div>
							
				</div>
              </div>              
        </section><!-- /.content -->