<script src="<?php echo base_url(); ?>templates/plugins/autoNumeric.js"></script>
<script>
$(function(){
	document.title = 'Master - Jenis Pembayaran';
	$('#data').DataTable({
		"ordering": false
	});
	$('#tbiaya').autoNumeric('init');
	$('#tbiaya').keyup(function(){
		$('[name=tbiaya]').change();
		var biaya = $('#tbiaya').autoNumeric('get');
		$('#biaya').val(biaya);
	});
	$('#fjenis_pembayaran').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			nama_jenis: {
                validators: {
                    notEmpty: {
                        message: 'Nama Jenis harus diisi'
                    },
                }
            },
			angkatan: {
                validators: {
                    notEmpty: {
                        message: 'Angkatan harus diisi'
                    },
                }
            },
			tbiaya: {
                validators: {
                    notEmpty: {
                        message: 'Biaya harus diisi'
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
            Master Jenis Pembayaran
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
				<form action="<?php echo site_url(); ?>admin/jenis_pembayaran/simpan" method="post" id="fjenis_pembayaran" class="form-horizontal"> 
				<input type="hidden" name="aksi" value="<?php echo isset($data_lama)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($data_lama)?$data_lama->id_jenis:''; ?>" />
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Nama Jenis</label>
                                <div class="col-lg-5">
									<input type="text" name="nama_jenis" class="form-control" value="<?php echo isset($data_lama)?$data_lama->nama_jenis:''; ?>" required maxlength="50" />
							  	</div>
							</div>
                            <div class="form-group">
                            	<label class="col-lg-3 control-label">Angkatan</label>
                                <div class="col-lg-5">
									<input type="text" name="angkatan" class="form-control" value="<?php echo isset($data_lama)?$data_lama->angkatan:''; ?>" required maxlength="50" />
							  	</div>
							</div>
                            <div class="form-group">
                            	<label class="col-lg-3 control-label">Biaya</label>
                                <div class="col-lg-5">
									<input type="text" name="tbiaya" id="tbiaya" class="form-control" value="<?php echo isset($data_lama)?$data_lama->biaya:''; ?>" data-bv-trigger="change keyup" />
							  	</div>
							</div>
							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="<?php echo site_url(); ?>admin/jenis_pembayaran"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
                            <input type="hidden" name="biaya" id="biaya" value="<?php echo isset($data_lama)?$data_lama->biaya:''; ?>" />
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Nama Jenis</th>
                            <th>Angkatan</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php  foreach($data->result() as $jenis_pembayaran){ ?>
                        <tr>
                            <td><?php echo $jenis_pembayaran->nama_jenis; ?></td>
                            <td><?php echo $jenis_pembayaran->angkatan; ?></td>
                            <td><?php echo number_format($jenis_pembayaran->biaya, 2); ?></td>
                            <td align="center">
                            	<a href="<?php echo site_url(); ?>admin/jenis_pembayaran/edit/<?php echo $jenis_pembayaran->id_jenis; ?>" title="edit"><img src="<?php echo base_url(); ?>templates/images/edit.png" width="20" height="20" /></a>
                                <a href="<?php echo site_url(); ?>admin/jenis_pembayaran/hapus/<?php echo $jenis_pembayaran->id_jenis; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="<?php echo base_url(); ?>templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>          
        </section><!-- /.content -->