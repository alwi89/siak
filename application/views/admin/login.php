<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login siakes smk yp 17</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>templates/login.css" />
</head>
<body>
	<div id="main">
	<!--kalau diamati pada bagian action, mengarah ke site_url() artinya localhost/siak kemudian ada admin/login/login_cek artinya controller di folder admin/login.php/kode function login_cek-->
    <form action="<?php echo site_url(); ?>admin/login/login_cek" method="post">
    	<table width="100%" cellpadding="3">
          <tr>
          	<td align="center"><b>LOGIN SIAKES SMK YP 17</b></td>
          </tr>
          <tr>
          	<td align="center">
            	<span class="error"><?php echo $this->session->flashdata('gagal'); ?></span>
            </td>
          </tr>
          <tr>
          	<td>
				<!--ini adalah inputan untuk username dengan name="username" artinya nanti untuk mengambil nilai yang diinputkan idnya adalah username-->
			 	<input name="username" type="text" placeholder="username" />
             </td>
          </tr>
          <tr>
          	<td>
				<!--ini adalah inputan untuk username dengan name="password" artinya nanti untuk mengambil nilai yang diinputkan idnya adalah password-->
            	<input name="password" type="password" placeholder="password" />
             </td>
          </tr>
          <tr>
          	<td>
				<!--ini adalah tombol login yang kalau dieksekusi menuju action formnya yang diatas-->
            	<input type="submit" value="LOGIN" />
            </td>
          </tr>
        </table>
	</form>
    <!--end main-->
    </div>
</body>
</html>