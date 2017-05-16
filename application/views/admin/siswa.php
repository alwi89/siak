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
	document.title = 'Master - Siswa';
	$('#data').DataTable({
		"ordering": false
	});
	$('#fsiswa').bootstrapValidator({
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
                        message: 'NIS harus diisi'
                    },
					remote: {
                        url: "<?php echo site_url().'admin/siswa/cek_unique'; ?>",
                        type: "post",
						data: function(validator, $field, value) {
						   return {
							   nis_lama: validator.getFieldElements('kode_lama').val()
						   };
						}, 
						message: 'NIS sudah dipakai, coba yang lain'
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
            alamat: {
                validators: {
                    notEmpty: {
                        message: 'Alamat harus diisi'
                    },
                }
            },
            nama_wali: {
                validators: {
                    notEmpty: {
                        message: 'Nama Wali harus diisi'
                    },
                }
            },
			foto: {
                validators: {
                    file: {
                        extension: 'jpg',
                        type: 'image/jpeg',
                        message: 'Foto harus jpg'
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
            },
			tahun_masuk: {
                validators: {
                    notEmpty: {
                        message: 'Tahun Masuk harus diisi'
                    },
                }
            },
			no_telp: {
				validators:{
					stringLength: {
                        min: 5,
                        max: 15,
                        message: 'No. Telpon minimal 5 digit, maksimal 15 digit'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'No. Telpon hanya boleh angka'
                    }
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
            }
        }
    });
});
</script>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Master Siswa
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
				<form action="<?php echo site_url(); ?>admin/siswa/simpan" method="post" id="fsiswa" class="form-horizontal" enctype="multipart/form-data"> 
				<input type="hidden" name="aksi" value="<?php echo isset($data_lama)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($data_lama)?$data_lama->nis:''; ?>" />
							<div class="form-group">
                            	<label class="col-lg-3 control-label">NIS</label>
                                <div class="col-lg-5">
									<input type="text" name="nis" class="form-control" value="<?php echo isset($data_lama)?$data_lama->nis:''; ?>" required maxlength="30" autocomplete="off" />
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
                            	<label class="col-lg-3 control-label">Nama</label>
                                <div class="col-lg-5">
									<input type="text" name="nama" class="form-control" value="<?php echo isset($data_lama)?$data_lama->nama:''; ?>" required maxlength="50" />
							  	</div>
							</div>
                            <div class="form-group">
                            	<label class="col-lg-3 control-label">Tahun Masuk</label>
                                <div class="col-lg-5">
									<input type="text" name="tahun_masuk" class="form-control" value="<?php echo isset($data_lama)?$data_lama->tahun_masuk:''; ?>" required maxlength="50" />
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
                                <label class="col-lg-3 control-label">Alamat</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="alamat" value="<?php echo isset($data_lama)?$data_lama->alamat:''; ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nama Wali</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" required name="nama_wali" value="<?php echo isset($data_lama)?$data_lama->nama_wali:''; ?>"  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">No. Telpon</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="no_telp" value="<?php echo isset($data_lama)?$data_lama->no_telp:''; ?>"  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Foto</label>
                                <div class="col-lg-5">
                                    <input type="file" class="form-control" name="foto" />
                                    <?php echo isset($data_lama)?"<img src=\"".base_url()."foto_siswa/".$data_lama->pp."\" width=\"100\" height=\"100\" />":''; ?>
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
									<a href="<?php echo site_url(); ?>admin/siswa"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Tahun Masuk</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Nama Wali</th>
                            <th>No. Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php  foreach($data->result() as $siswa){ ?>
                        <tr>
                            <td><?php echo $siswa->nis; ?></td>
                            <td><?php echo $siswa->nama; ?></td>
                            <td><?php echo $siswa->tahun_masuk; ?></td>
                            <td><?php echo $siswa->nama_kelas; ?></td>
                            <td><?php echo $siswa->nama_jurusan; ?></td>
                            <td><?php echo $siswa->nama_wali; ?></td>
                            <td><?php echo $siswa->no_telp; ?></td>
                            <td align="center">
                            	<a href="<?php echo site_url(); ?>admin/siswa/edit/<?php echo str_replace("/", "_", $siswa->nis); ?>" title="edit"><img src="<?php echo base_url(); ?>templates/images/edit.png" width="20" height="20" /></a>
                                <a href="<?php echo site_url(); ?>admin/siswa/hapus/<?php echo str_replace("/", "_", $siswa->nis); ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="<?php echo base_url(); ?>templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>              
        </section><!-- /.content -->