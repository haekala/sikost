
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_lengkap.' - '.$instansi; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/docs.css" rel="stylesheet">
	
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
    
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo base_url(); ?>"><?php echo $judul_pendek; ?></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url(); ?>"><i class="icon-home icon-white"></i> Beranda</a></li>
			  <?php if($this->session->userdata('jenis')=="user"):?><li class="active"><a href="<?php echo base_url(); ?>index.php/dashboard_user"><i class="icon-home icon-white"></i>Dashboard User</a><?php endif?></li>
			  <?php if($this->session->userdata('jenis')=="pkost"):?><li class="active"><a href="<?php echo base_url(); ?>index.php/dashboard_pemilik"><i class="icon-home icon-white"></i>Dashboard Pemilik kost</a><?php endif?></li>
			  <?php if($this->session->userdata('jenis')=="admin"):?><li class="active"><a href="<?php echo base_url(); ?>index.php/dashboard_admin"><i class="icon-home icon-white"></i>Dashboard Admin</a><?php endif?></li>
            </ul>
            <div class="btn-group pull-right">
			
			  <button class="btn btn-primary"><i class="icon-user icon-white"></i> <?php echo $this->session->userdata('name'); ?></button>
			  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
				<li><a href="<?php echo base_url(); ?>app/change_password"><i class="icon-wrench"></i> Pengaturan Akun</a></li>
				<li><a href="<?php echo base_url(); ?>manage_user"><i class="icon-tasks"></i> Manajemen User</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/loginlogout/do_logout"><i class="icon-off"></i> Log Out</a></li>
			  </ul>
			</div>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<div class="container">
	<div class="hero-unit">
        <h2>Selamat Datang di <?php echo $judul_lengkap.' '.$instansi; ?></h2>
        <p>SiKost.com merupakan sebuah aplikasi berbasis <i>web</i> untuk membantu pencarian dan pendaftaran kost di area Kutek Universitas Indonesia. Aplikasi ini sangat bermanfaat bagi setiap pengguna yang ingin melakukan pendaftaran dan pembayaran online sesuai dengan kost yang diinginkan.</p>
      </div>
	  
	  <ul class="thumbnails">
<?php foreach($gambars as $gambar): ?>
<li class="span4">
  <div class="thumbnail">
    <img src="<?php echo base_url(); ?>image/<?php echo $gambar[1]?>.jpg" alt="ALT NAME" style="width:320px; height:200px;">
    <div class="caption">
      <h3><?php echo $gambar[2]?></h3>
      <p>Vacancy : <?php echo $gambar[3]?></p>
      <p align="center"><a href= "<?php echo base_url(); ?>index.php/tempatkost/deskripsi/<?php echo $gambar[1]?>" class="btn btn-primary btn-block">Open</a></p>
    </div>
  </div>
</li>
<?php endforeach;?>
</ul>
	
      <footer class="well">
        <p><?php echo $credit; ?></p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
