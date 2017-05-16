<?php
function kelas(){
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->from('kelas');
	$CI->db->order_by('nama_kelas', 'asc');
	return $CI->db->get();
}
function siswa(){
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->from('siswa');
	$CI->db->order_by('nama', 'asc');
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
	document.title = 'Master - Daftar Ulang';
	$('#data').DataTable({
		"ordering": false
	});
	$('#fdaftar').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			nis: {
                validators: {
                    notEmpty: {
                        message: 'Siswa harus dipilih'
                    },
                }
            },
			tahun: {
                validators: {
                    notEmpty: {
                        message: 'Tahun harus diisi'
                    },
                }
            },
            kelas: {
                validators: {
                    notEmpty: {
                        message: 'Kelas harus dipilih'
                    },
                }
            },
            jurusan: {
                validators: {
                    notEmpty: {
                        message: 'Jurusan harus dipilih'
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
            Master Daftar Ulang
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
				<form action="<?php echo site_url(); ?>admin/daftar_ulang/simpan" method="post" id="fdaftar" class="form-horizontal" enctype="multipart/form-data"> 
				<input type="hidden" name="aksi" value="<?php echo isset($data_lama)?'edit':'tambah'; ?>" />
				<input type="hidden" name="id_daftar" value="<?php echo isset($data_lama)?$data_lama->id_daftar:''; ?>" />
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Siswa</label>
                                <div class="col-lg-5">
                                	<select name="nis" class="form-control" data-provide="typeahead">
                                        <option value="">nama siswa - nis</option>
                                        <?php foreach(siswa()->result() as $data_siswa){ ?>
                                        <option value="<?php echo $data_siswa->nis; ?>" <?php echo isset($data_lama)&&$data_lama->nis==$data_siswa->nis?'selected':''; ?>><?php echo $data_siswa->nama.' - '.$data_siswa->nis; ?></option>
                                        <?php } ?>
                                	</select>
                                </div>
                            </div>
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Kelas</label>
                                <div class="col-lg-5">
                                	<select name="kelas" class="form-control">
                                        <option value="">=pilih kelas=</option>
                                        <?php foreach(kelas()->result() as $data_kelas){ ?>
                                        <option value="<?php echo $data_kelas->id_kelas; ?>" <?php echo isset($data_lama)&&$data_lama->id_kelas==$data_kelas->id_kelas?'selected':''; ?>><?php echo $data_kelas->nama_kelas; ?></option>
                                        <?php } ?>
                                	</select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Jurusan</label>
                                <div class="col-lg-5">
                                    <select name="jurusan" class="form-control">
                                        <option value="">=pilih jurusan=</option>
                                        <?php foreach(jurusan()->result() as $data_jurusan){ ?>
                                        <option value="<?php echo $data_jurusan->id_jurusan; ?>" <?php echo isset($data_lama)&&$data_lama->id_jurusan==$data_jurusan->id_jurusan?'selected':''; ?>><?php echo $data_jurusan->nama_jurusan; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Tahun</label>
                                <div class="col-lg-5">
									<input type="text" name="tahun" class="form-control" value="<?php echo isset($data_lama)?$data_lama->tahun:''; ?>" maxlength="50" />
							  	</div>
							</div>
							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="<?php echo site_url(); ?>admin/daftar_ulang"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Tahun</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php  foreach($data->result() as $siswa){ ?>
                        <tr>
                            <td><?php echo $siswa->nis; ?></td>
                            <td><?php echo $siswa->nama; ?></td>
                            <td><?php echo $siswa->tahun; ?></td>
                            <td><?php echo $siswa->nama_kelas; ?></td>
                            <td><?php echo $siswa->nama_jurusan; ?></td>
                            <td align="center">
                            	<a href="<?php echo site_url(); ?>admin/daftar_ulang/edit/<?php echo str_replace("/", "_", $siswa->id_daftar); ?>" title="edit"><img src="<?php echo base_url(); ?>templates/images/edit.png" width="20" height="20" /></a>
                                <a href="<?php echo site_url(); ?>admin/daftar_ulang/hapus/<?php echo str_replace("/", "_", $siswa->id_daftar); ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="<?php echo base_url(); ?>templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>              
        </section><!-- /.content -->	