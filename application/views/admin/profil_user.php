<?php
if($this->session->userdata('level')=='bendahara'){
	$jenis_profil = 'Bendahara';
}else if($this->session->userdata('level')=='admin'){
	$jenis_profil = 'Admin';
}else{
	$jenis_profil = 'Tata Usaha';
}
?>
<script>
$(function(){
	document.title = 'Profil <?php echo $jenis_profil; ?>';
});
</script>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Profil <?php echo $jenis_profil; ?>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
              <div id="isi">
					<div class="form-horizontal">
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Username</label>
                                <div class="col-lg-5">
									<input type="text" name="username" class="form-control" value="<?php echo $data_akun->username; ?>" disabled />
                                </div>
                            </div>
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Nama</label>
                                <div class="col-lg-5">
									<input type="text" name="nama" class="form-control" value="<?php echo $data_akun->nama; ?>" disabled />
							  	</div>
							</div>
					</div>
							
              </div>              
        </section><!-- /.content -->