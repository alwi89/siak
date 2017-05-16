<?php
if(empty($this->session->userdata('id_user'))){
	redirect('admin/login');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->session->userdata('level'); ?> - siakes smk yp 17</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>templates/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>templates/font-awesome-4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!--link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"-->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>templates/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>templates/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>templates/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>templates/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>templates/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
     <link rel="stylesheet" href="<?php echo base_url(); ?>templates/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>templates/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>templates/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>templates/plugins/datatables/dataTables.bootstrap.css">
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>templates/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>templates/plugins/validator/dist/css/bootstrapValidator.css"/>
    <script type="text/javascript" src="<?php echo base_url(); ?>templates/plugins/validator/dist/js/bootstrapValidator.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
	td{
	padding:5px;
}
.main-sidebar{
	margin-top:100px;
}
#banner{
	background:#FFFFFF;
	width:100%;
	height:100px;
}
#judul{
 font-size:24px;
 padding-top:15px;
 color:#605ca8;
}
#lokasi{
 font-size:27px;
 color:#605ca8;
}
#isi{
 background:#e6e4fc;
 padding:15px;
}
#konten{
 background:#FFFFFF;
 padding:10px;
}
/*
#data th{
	background:#0099CC;
}
#data tr:nth-child(even){
	background: #CCC
}
#data tr:nth-child(odd){
	background: #FFF
}
*/
	</style>  
  </head>
  <body class="hold-transition skin-purple-light sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
      	<div id="banner">
        	<img src="<?php echo base_url(); ?>templates/images/logo_smk.jpg" width="100" height="100" align="left" >
        	<div id="judul">SIAKES SMK YP 17 SELOREJO  </div>
            <div id="lokasi">Sistem Informasi Administrasi Keuangan Sekolah Menengah Kejuruan Yayasan Pendidikan 17 Selorejo</div>        
        </div>
      	<!--img src="<?php echo base_url(); ?>templates/images/banner.png" width="100%" height="100px" /-->
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="<?php echo base_url(); ?>templates/images/logo.png" width="50" height="50" /></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b style="color:#FFFFFF;"><?php echo $this->session->userdata('level'); ?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='preview'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/pengumuman/preview">Pengumuman</a></li>
              <li <?php echo !empty($this->uri->segment(2))&&$this->uri->segment(2)=='profil'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/profil">Profil Sekolah</a></li>
              <li <?php echo !empty($this->uri->segment(2))&&$this->uri->segment(2)=='galeri'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/galeri">Galeri</a></li>
              
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>templates/images/account.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><nama_login><?php echo $this->session->userdata('nama'); ?></nama_login></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>templates/images/account.png" class="img-circle" alt="User Image">
                    <p>
                      <nama_login><?php echo $this->session->userdata('nama'); ?></nama_login>
                      <small><level_login><?php echo $this->session->userdata('level'); ?></level_login></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo site_url(); ?>admin/akun" class="btn btn-default btn-flat">Edit Akun</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url(); ?>admin/akun/keluar" class="btn btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>templates/images/account.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><nama_login><?php echo $this->session->userdata('nama'); ?></nama_login></p>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU UTAMA</li>
            <li class="treeview">
              <a href="<?php echo site_url(); ?>admin">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span><small class="label pull-right bg-red" id="jml_tempo"></small></i>
              </a>
            </li>
            <?php if($this->session->userdata('level')=='admin'){ ?>
            <li class="active">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Master</span>
              </a>
              <ul class="treeview-menu">
              	<li <?php echo !empty($this->uri->segment(2))&&$this->uri->segment(2)=='user'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/user"><i class="fa fa-circle-o"></i> User</a></li>
                <li <?php echo !empty($this->uri->segment(2))&&$this->uri->segment(2)=='kelas'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/kelas"><i class="fa fa-circle-o"></i> Kelas</a></li>
                <li <?php echo !empty($this->uri->segment(2))&&$this->uri->segment(2)=='jurusan'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/jurusan"><i class="fa fa-circle-o"></i> Jurusan</a></li>
                <li <?php echo !empty($this->uri->segment(2))&&$this->uri->segment(2)=='siswa'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/siswa"><i class="fa fa-circle-o"></i> Siswa</a></li>
                <li <?php echo !empty($this->uri->segment(2))&&$this->uri->segment(2)=='daftar_ulang'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/daftar_ulang"><i class="fa fa-circle-o"></i> Daftar Ulang</a></li>
              </ul>
            </li>
            <li class="active">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Laporan</span>
              </a>
              <ul class="treeview-menu">
              	<li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='harian'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/harian"><i class="fa fa-circle-o"></i> Laporan Harian</a></li>
                <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='bulanan'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/bulanan"><i class="fa fa-circle-o"></i> Laporan Bulanan</a></li>
                <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='tahunan'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/tahunan"><i class="fa fa-circle-o"></i> Laporan Tahunan</a></li>
                <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='jenis'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/jenis"><i class="fa fa-circle-o"></i> Laporan Perjenis</a></li>
                <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='rekap'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/rekap"><i class="fa fa-circle-o"></i> Rekap Transaksi</a></li>
                <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='tunggakan'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/tunggakan"><i class="fa fa-circle-o"></i> Laporan Tunggakan</a></li>
              </ul>
            </li>
            <?php }else if($this->session->userdata('level')=='bendahara'){ ?>
            <li class="active">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Master</span>
              </a>
              <ul class="treeview-menu">
              	<li <?php echo !empty($this->uri->segment(2))&&$this->uri->segment(2)=='pengumuman'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/pengumuman"><i class="fa fa-circle-o"></i> Pengumuman</a></li>
                <li <?php echo !empty($this->uri->segment(2))&&$this->uri->segment(2)=='jenis_pembayaran'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/jenis_pembayaran"><i class="fa fa-circle-o"></i> Jenis Pembayaran</a></li>
              </ul>
            </li>
            <li class="active">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Laporan</span>
              </a>
              <ul class="treeview-menu">
              	<li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='harian'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/harian"><i class="fa fa-circle-o"></i> Laporan Harian</a></li>
                <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='bulanan'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/bulanan"><i class="fa fa-circle-o"></i> Laporan Bulanan</a></li>
                <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='tahunan'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/tahunan"><i class="fa fa-circle-o"></i> Laporan Tahunan</a></li>
                <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='jenis'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/jenis"><i class="fa fa-circle-o"></i> Laporan Perjenis</a></li>
                <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='rekap'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/rekap"><i class="fa fa-circle-o"></i> Rekap Transaksi</a></li>
                <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='tunggakan'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/tunggakan"><i class="fa fa-circle-o"></i> Laporan Tunggakan</a></li>
              </ul>
            </li>
            <?php }else if($this->session->userdata('level')=='tu'){ ?>
            <li class="active">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Transaksi</span>
              </a>
              <ul class="treeview-menu">
              	<li <?php echo !empty($this->uri->segment(2))&&$this->uri->segment(2)=='pembayaran'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/pembayaran"><i class="fa fa-circle-o"></i> Pembayaran</a></li>
                <li <?php echo !empty($this->uri->segment(2))&&$this->uri->segment(2)=='edit_pembayaran'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/edit_pembayaran"><i class="fa fa-circle-o"></i> Edit Pembayaran</a></li>
              </ul>
            </li>
            <li class="active">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Laporan</span>
              </a>
              <ul class="treeview-menu">
              	<li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='harian'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/harian"><i class="fa fa-circle-o"></i> Laporan Harian</a></li>
                <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='bulanan'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/bulanan"><i class="fa fa-circle-o"></i> Laporan Bulanan</a></li>
                <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='tahunan'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/tahunan"><i class="fa fa-circle-o"></i> Laporan Tahunan</a></li>
                <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='jenis'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/jenis"><i class="fa fa-circle-o"></i> Laporan Perjenis</a></li>
                <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='rekap'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/rekap"><i class="fa fa-circle-o"></i> Rekap Transaksi</a></li>
                <li <?php echo !empty($this->uri->segment(3))&&$this->uri->segment(3)=='tunggakan'?'class="active"':''; ?>><a href="<?php echo site_url(); ?>admin/laporan/tunggakan"><i class="fa fa-circle-o"></i> Laporan Tunggakan</a></li>
              </ul>
            </li>
            <?php } ?>
            <li class="treeview">
              <a href="<?php echo site_url(); ?>admin/akun">
                <i class="fa fa-dashboard"></i> <span>Akun</span></i>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
          <div class="row" id="konten">
            <?php $this->load->view($konten); ?><!--isi dari konten adalah tergantung variabel konten yang diberikan dari controllernya-->
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Free Template By <a href="http://SMKYP-17selorejo">@SMK YP-17 Selorejo</a>.</strong><br />
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url(); ?>templates/plugins/jQueryUI/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      //$.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>templates/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <!--script src="<?php echo base_url(); ?>templates/https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script-->
    <script src="<?php echo base_url(); ?>templates/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>templates/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url(); ?>templates/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>templates/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>templates/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <!--script src="<?php echo base_url(); ?>templates/https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script-->
    <script src="<?php echo base_url(); ?>templates/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>templates/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url(); ?>templates/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url(); ?>templates/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>templates/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>templates/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url(); ?>templates/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>templates/dist/js/demo.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>templates/plugins/jQuery/ui.tabs.closable.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>templates/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>templates/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>templates/plugins/autoNumeric.js"></script>
    <script src="<?php echo base_url(); ?>templates/plugins/bootstrap-typeahead.js"></script>
    
    
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>templates/plugins/datatables/buttons.bootstrap.min.css">
	<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>templates/plugins/datatables/dataTables.buttons.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>templates/plugins/datatables/buttons.bootstrap.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>templates/plugins/datatables/jszip.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>templates/plugins/datatables/pdfmake.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>templates/plugins/datatables/vfs_fonts.js">
	</script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>templates/plugins/datatables/buttons.html5.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>templates/plugins/datatables/buttons.print.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>templates/plugins/datatables/buttons.colVis.min.js">
	</script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>templates/plugins/jquery-csv-master/src/jquery.csv.min.js">
	</script>

  </body>
</html>