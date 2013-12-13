

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tambah Kamar - siKost.com</title>
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
        <li class="active"><a href="<?php echo base_url(); ?>index.php/dashboard_pemilik"><i class="icon-book icon-white"></i> Dashboard</a></li>
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
	
	<?php if(validation_errors()) { ?>
	<div class="alert alert-block">
	  <button type="button" class="close" data-dismiss="alert">�</button>
	  	<h4>Terjadi Kesalahan!</h4>
		<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
	
	<?php if($this->session->flashdata('result_login')) { ?>
	<div class="alert alert-block">
	  <button type="button" class="close" data-dismiss="alert">�</button>
	  	<h4>Terjadi Kesalahan!</h4>
		<?php echo $this->session->flashdata('result_login'); ?>
	</div>
	<?php } ?>
    
    <div class="well">
        <h2>Tambah Kamar Kost siKost.com</h2>
	</div>

<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
          <?php $gim= isset($_GET['varname']) ? $_GET['varname'] : '';?>
        <form id="tab" action="<?php echo base_url()?>index.php/tempatkost/tambah" method="post">
            <label>ID Kamar</label>
            <input type="text"  class="input-xlarge" name="idkamar" value="">
            <label>harga</label>
            <input type="text"  class="input-xlarge" name="harga" value="">
            <label>fasilitas[]</label>
              <input type="checkbox" class="input-xlarge" name="fasilitas[]"value="pemadam kebakaran"> Pemadam Kebakaran<br/>
        			<input type="checkbox" class="input-xlarge" name="fasilitas[]"value="kamar mandi"> Kamar Mandi<br/>
        			<input type="checkbox" class="input-xlarge" name="fasilitas[]"value="AC"> ac<br/>
        			<input type="checkbox" class="input-xlarge" name="fasilitas[]"value="wireless internet"> Wireless Internet<br/>
        			<input type="checkbox" class="input-xlarge" name="fasilitas[]"value="LAN internet"> LAN internet<br/>
        			<input type="checkbox" class="input-xlarge" name="fasilitas[]"value="pusat kebugaran"> pusat Kebugaran<br/>
        			<input type="checkbox" class="input-xlarge" name="fasilitas[]"value="jasa laundry"> Free Laundry		<br/>
        			<input type="checkbox" class="input-xlarge" name="fasilitas[]"value="jasa cleaning service"> Cleaning Service		<br/>
        			<input type="checkbox" class="input-xlarge" name="fasilitas[]"value="pemadam kebakaran"> pemadam kebakaran	<br/>
                                <input type="hidden" name="varname" value= <?php echo $gim; ?>>
          	<div>
        	    <button class="btn btn-primary">Update</button>
        	</div>
        </form>
      </div>
      
  </div>
           
           <footer class="well">
        <p><?php echo $credit; ?></p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
