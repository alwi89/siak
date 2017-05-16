<style>
b{
	color:#0000FF;
}
i{
	color:#FF0000;
	font-size:10px;
}
</style>
<script>
$(function(){
	document.title = 'Detail Pengumuman';
});
</script>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Pengumuman
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
              <div style="background:#FFFFFF;padding:15px;">	
                <div style="text-align:justify;border-bottom:1px solid #CCCCCC;padding-bottom:10px;">
                    <b><?php echo $detail->judul; ?></b><br />
                    <i><?php echo date("d/m/Y H:i:s", strtotime($detail->tgl)); ?></i><br />
                    <img src="<?php echo site_url(); ?>gambar_pengumuman/<?php echo $detail->gambar; ?>" width="200" height="180" /><br />
                    <?php echo $detail->isi; ?>
                </div>
              </div>          
        </section><!-- /.content -->