<script>
$(function(){
	document.title = 'Dashboard';
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
              <div id="isi">	
              	<?php foreach($data->result() as $pengumuman){ ?>
                <div style="text-align:justify;border-bottom:1px solid #CCCCCC;padding-bottom:10px;">
                    <b style="color:#0000FF;"><?php echo $pengumuman->judul; ?></b><br />
                    <i style="color:#FF0000;font-size:10px;"><?php echo date("d/m/Y H:i:s", strtotime($pengumuman->tgl)); ?></i><br />
                    <img src="<?php echo base_url(); ?>gambar_pengumuman/<?php echo $pengumuman->gambar; ?>" width="100" height="80" align="left" style="padding-right:10px;" />
                    <?php echo substr(strip_tags($pengumuman->isi), 0, 600); ?>
                    <div style="clear:both;">
                        <a href="<?php echo site_url(); ?>admin/pengumuman/detail/<?php echo $pengumuman->id_pengumuman; ?>"><input type="button" class="btn btn-danger" value="readmore" style="margin-left:100px;" /></a>
                    </div>
                </div>
                <?php } ?>
              </div>          
        </section><!-- /.content -->