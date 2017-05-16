<script>
$(function(){
	document.title = 'Master - User';
	$('#data').DataTable({
		"ordering": false
	});
	$('#fuser').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			username: {
                validators: {
                    notEmpty: {
                        message: 'Username harus diisi'
                    },
					remote: {
                        url: "<?php echo site_url().'admin/akun/cek_unique'; ?>",
                        type: "post",
						data: function(validator, $field, value) {
						   return {
							   id_user: validator.getFieldElements('kode_lama').val()
						   };
						}, 
						message: 'Username sudah dipakai, coba yang lain'
                    }
                }
            },
			nama: {
                validators: {
                    notEmpty: {
                        message: 'Nama harus diisi'
                    },
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password harus diisi'
                    },
                    identical: {
                        field: 'konf_password',
                        message: 'Password harus sama dengan Konfirmasi Password'
                    },
                }
            },
            konf_password: {
                validators: {
                    notEmpty: {
                        message: 'Konfirmasi Passord harus diisi'
                    },
                    identical: {
                        field: 'password',
                        message: 'konfirmasi Password harus sama dengan Password'
                    },
                }
            },
            
        }
    });
});
</script>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Master User
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
             <?php if($this->session->flashdata('berhasil')!=""){ ?>
             <div class="box box-solid box-success" id="berhasil">
                <div class="box-header">
                  <h3 class="box-title" id="judul_berhasil">sukses</h3>
                </div>
                <div class="box-body" id="pesan_berhasil"><?php echo $this->session->flashdata('berhasil'); ?></div>
              </div>
            <?php } ?>
            <?php if($this->session->flashdata('gagal')!=""){ ?>
              <div class="box box-solid box-danger" id="gagal">
                <div class="box-header">
                  <h3 class="box-title" id="judul_gagal">gagal</h3>
                </div>
                <div class="box-body" id="pesan_gagal"><?php echo $this->session->flashdata('gagal'); ?></div>
              </div>
            <?php } ?>
              <div id="isi">
				<form action="<?php echo site_url(); ?>admin/user/simpan" method="post" id="fuser" class="form-horizontal"> 
				<input type="hidden" name="aksi" value="<?php echo isset($data_lama)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($data_lama)?$data_lama->id_user:''; ?>" />
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Username</label>
                                <div class="col-lg-5">
									<input type="text" name="username" class="form-control" value="<?php echo isset($data_lama)?$data_lama->username:''; ?>" required maxlength="30" autocomplete="off" />
                                </div>
                            </div>
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Nama</label>
                                <div class="col-lg-5">
									<input type="text" name="nama" class="form-control" value="<?php echo isset($data_lama)?$data_lama->nama:''; ?>" required maxlength="50" />
							  	</div>
							</div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" name="password" value="<?php echo isset($data_lama)?$data_lama->password:''; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Konfirmasi Password</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" name="konf_password" value="<?php echo isset($data_lama)?$data_lama->password:''; ?>"  />
                                </div>
                            </div>
                            <div class="form-group">
                            	<label class="col-lg-3 control-label">Level</label>
                                <div class="col-lg-5">
								<select name="level" class="form-control">
                                	<option value="tu" <?php echo isset($data_lama)&&$data_lama->level=='tu'?'selected':''; ?>>TU</option>
                                    <option value="bendahara" <?php echo isset($data_lama)&&$data_lama->level=='bendahara'?'selected':''; ?>>Bendahara</option>
                                    <option value="admin" <?php echo isset($data_lama)&&$data_lama->level=='admin'?'selected':''; ?>>Admin</option>
                                </select>
							  </div>
                            </div>
                            <div class="form-group">
                            	<label class="col-lg-3 control-label">Status</label>
                                <div class="col-lg-5">
								<select name="status" class="form-control">
                                	<option value="aktif" <?php echo isset($data_lama)&&$data_lama->status=='aktif'?'selected':''; ?>>aktif</option>
                                    <option value="non aktif" <?php echo isset($data_lama)&&$data_lama->status=='non aktif'?'selected':''; ?>>non aktif</option>
                                </select>
                                </div>
							</div>
							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="<?php echo site_url(); ?>admin/user"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php  foreach($data->result() as $user){ ?>
                        <tr>
                            <td><?php echo $user->username; ?></td>
                            <td><?php echo $user->nama; ?></td>
                            <td><?php echo $user->password;//'*****';//disini tulisan password tersebut, ini hanya tampilan statis, tapi di database passwordnya ya yg dirubah oleh TU tadi, kalau saya tampilkan enkripsinya seperti berikut ?></td>
                            <td><?php echo $user->status; ?></td>
                            <td><?php echo $user->level; ?></td>
                            <td align="center">
                            	<a href="<?php echo site_url(); ?>admin/user/edit/<?php echo $user->id_user; ?>" title="edit"><img src="<?php echo base_url(); ?>templates/images/edit.png" width="20" height="20" /></a>
                                <a href="<?php echo site_url(); ?>admin/user/hapus/<?php echo $user->id_user; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="<?php echo base_url(); ?>templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>              
        </section><!-- /.content -->