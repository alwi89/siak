<script>
$(function(){
	document.title = 'Master - Jurusan';
	$('#data').DataTable({
		"ordering": false
	});
	$('#fjurusan').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			nama_jurusan: {
                validators: {
                    notEmpty: {
                        message: 'Nama Jurusan harus diisi'
                    },
                }
            }            
        }
    });
});
</script>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Master Jurusan
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
				<form action="<?php echo site_url(); ?>admin/jurusan/simpan" method="post" id="fjurusan" class="form-horizontal"> 
				<input type="hidden" name="aksi" value="<?php echo isset($data_lama)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($data_lama)?$data_lama->id_jurusan:''; ?>" />
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Nama Jurusan</label>
                                <div class="col-lg-5">
									<input type="text" name="nama_jurusan" class="form-control" value="<?php echo isset($data_lama)?$data_lama->nama_jurusan:''; ?>" required maxlength="50" />
							  	</div>
							</div>
							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="<?php echo site_url(); ?>admin/jurusan"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Nama Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php  foreach($data->result() as $jurusan){ ?>
                        <tr>
                            <td><?php echo $jurusan->nama_jurusan; ?></td>
                            <td align="center">
                            	<a href="<?php echo site_url(); ?>admin/jurusan/edit/<?php echo $jurusan->id_jurusan; ?>" title="edit"><img src="<?php echo base_url(); ?>templates/images/edit.png" width="20" height="20" /></a>
                                <a href="<?php echo site_url(); ?>admin/jurusan/hapus/<?php echo $jurusan->id_jurusan; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="<?php echo base_url(); ?>templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>          
        </section><!-- /.content -->