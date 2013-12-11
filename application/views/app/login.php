
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_pendek.' - Sistem Informasi Kost Pertama di UI'; ?></title>
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
              <li><a href="<?php echo base_url(); ?>"><i class="icon-home icon-white"></i> Beranda</a></li>
			  <li class="dropdown">
			  	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-comment icon-white"></i> Registrasi <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>index.php/user"><i class="icon-fire"></i> User</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/pemilik"><i class="icon-asterisk"></i> Pemilik Kost</a></li>
                </ul>
              </li>
            </ul>
			<?php echo form_open('loginCon/process','class="navbar-form pull-right"'); ?>
              <input class="span2" type="text" name="email" placeholder="Email..." value="<?php echo set_value('username'); ?>">
              <input class="span2" type="password" name="password" placeholder="Password...">
              <button type="submit" class="btn btn-primary "><i class="icon-share icon-white"></i> Log in</button>
           <?php echo form_close(); ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
	
	<?php if(validation_errors()) { ?>
	<div class="alert alert-block">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  	<h4>Terjadi Kesalahan!</h4>
		<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
	
	<?php if($this->session->flashdata('result_login')) { ?>
	<div class="alert alert-block">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  	<h4>Terjadi Kesalahan!</h4>
		<?php echo $this->session->flashdata('result_login'); ?>
	</div>
	<?php } ?>
	
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
      <p align="center"><a href= "<?php echo base_url();?>index.php/tempatkost/deskripsi/<?php echo $gambar[1]?>" class="btn btn-primary btn-block">Open</a></p>
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
