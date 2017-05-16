<script src="plugins/autoNumeric.js"></script>
<script>
$(function(){
	document.title = 'Akun';
	$('#data').DataTable();
	$('#fakun').bootstrapValidator({
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
            Akun
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
				<form action="<?php echo site_url(); ?>admin/akun/simpan" method="post" id="fakun" class="form-horizontal"> 
				<input type="hidden" name="kode_lama" value="<?php echo $data_akun->id_user; ?>" />
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Username</label>
                                <div class="col-lg-5">
									<input type="text" name="username" class="form-control" value="<?php echo $data_akun->username; ?>" required maxlength="30" autocomplete="off" />
                                </div>
                            </div>
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Nama</label>
                                <div class="col-lg-5">
									<input type="text" name="nama" class="form-control" value="<?php echo $data_akun->nama; ?>" required maxlength="50" />
							  	</div>
							</div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" name="password" value="<?php echo $data_akun->password; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Konfirmasi Password</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" name="konf_password" value="<?php echo $data_akun->password; ?>"  />
                                </div>
                            </div>
							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="<?php echo site_url(); ?>admin"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
              </div>              
        </section><!-- /.content -->