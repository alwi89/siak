<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script>
$(function(){
	document.title = 'Master - Pengumuman';
	CKEDITOR.replace('teks_isi');
	$('#data').DataTable({
		"ordering": false
	});
	$('#fpengumuman').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			judul: {
                validators: {
                    notEmpty: {
                        message: 'Judul harus diisi'
                    },
                }
            },
			isi: {
                validators: {
                    notEmpty: {
                        message: 'Isi Pengumuman harus diisi'
                    },
                }
            },
			gambar: {
                validators: {
                    file: {
                        extension: 'jpg',
                        type: 'image/jpeg',
                        message: 'Gambar harus jpg'
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
            Master Pengumuman
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
				<form action="<?php echo site_url(); ?>admin/pengumuman/simpan" method="post" id="fpengumuman" class="form-horizontal" enctype="multipart/form-data"> 
				<input type="hidden" name="aksi" value="<?php echo isset($data_lama)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($data_lama)?$data_lama->id_pengumuman:''; ?>" />
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Judul</label>
                                <div class="col-lg-5">
									<input type="text" name="judul" class="form-control" value="<?php echo isset($data_lama)?$data_lama->judul:''; ?>" required maxlength="30" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Gambar</label>
                                <div class="col-lg-5">
                                    <input type="file" class="form-control" name="gambar" />
                                    <?php echo isset($data_lama)?"<img src=\"".base_url()."gambar_pengumuman/".$data_lama->gambar."\" width=\"100\" height=\"100\" />":''; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="box-body pad">
									<textarea name="isi" id="teks_isi"><?php echo isset($data_lama)?$data_lama->isi:''; ?></textarea>
                                </div>
                            </div>
							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="<?php echo site_url(); ?>admin/pengumuman"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Tgl Post</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php  foreach($data->result() as $pengumuman){ ?>
                        <tr>
                            <td><?php echo date("d/m/Y H:i:s", strtotime($pengumuman->tgl)); ?></td>
                            <td><?php echo $pengumuman->judul; ?></td>
                            <td><?php echo strlen(strip_tags($pengumuman->isi))<100?strip_tags($pengumuman->isi):substr(strip_tags($pengumuman->isi), 0, 100).'.....'; ?></td>
                            <td><img src="<?php echo base_url(); ?>gambar_pengumuman/<?php echo $pengumuman->gambar; ?>" width="100" height="100" /></td>
                            <td align="center">
                            	<a href="<?php echo site_url(); ?>admin/pengumuman/edit/<?php echo $pengumuman->id_pengumuman; ?>" title="edit"><img src="<?php echo base_url(); ?>templates/images/edit.png" width="20" height="20" /></a>
                                <a href="<?php echo site_url(); ?>admin/pengumuman/hapus/<?php echo $pengumuman->id_pengumuman; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="<?php echo base_url(); ?>templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>              
        </section><!-- /.content -->