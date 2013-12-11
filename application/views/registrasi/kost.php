<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registrasi User - siKost.com</title>
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
			<?php echo form_open('app/index','class="navbar-form pull-right"'); ?>
              <input class="span2" type="text" name="username" placeholder="Username..." value="<?php echo set_value('username'); ?>">
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
    
    <div class="well">
        <h2>Create New Kost siKost.com</h2>
	</div>

 
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/tempatkost/createKost" method="post">
                <div class="control-group">
                    <label class="control-label" for="inputName">Nama Kost</label>
                    <div class="controls">
                        <input type="text" id="nama" name="nama" placeholder="">
                        <br>
                        </label>

                    </div>
                </div>
                
                <div class="control-group">
				 <label class="control-label" for="inputEmail">deskripsi</label>
				<textarea name="deskripsi" id="message" class="input-xlarge span5" rows="10" placeholder = "deskripsi"></textarea>
                   
                    
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">Kapasitas Kost</label>
                    <div class="controls">
                        <input type="text" id="kapasitas" name="tersedia" placeholder="contoh : 40">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputAlamat">Ketersediaan Kamar</label>
                    <div class="controls">
                        <input type="text" id="kuota" name="kuota" placeholder="contoh : 6">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputNo">alamat</label>
                    <div class="controls">
                        <input type="text" id="noTelp" name="alamat" placeholder="">
                    </div>
                </div>
                <br/>
                <div class="control-group">
                    <div class="controls">
                        <p> Dengan ini maka anda menyetujui segala peraturan yang ditentukan oleh administrator</p>
                        <label class="checkbox">
                            <input type="checkbox" name="check"> Menerima persetujuan
                        </label>
                        <button type="submit" class="btn">Register</button>
                    </div>
                </div>
            </form>
           
           <footer class="well">
        <p><?php echo $credit; ?></p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
