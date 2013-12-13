<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registrasi Pemilik Kost - siKost.com</title>
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
        <h2>Registrasi Pemilik Kost siKost.com</h2>
	</div>


            <form class="form-horizontal" method="post" action="<?php echo base_url()?>index.php/pemilik/registration">
                <div class="control-group">
                    <label class="control-label" for="inputName">Nama Lengkap</label>
                    <div class="controls">
                        <input type="text" id="Name" name="nama" placeholder="<?php echo $nama?>">&nbsp; &nbsp; minimum 3 karakter
                        <br>
                        </label>

                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Email</label>
                    <div class="controls">
                        <input type="text" id="Email" name="email" placeholder="<?php echo $email?>">&nbsp; &nbsp; (cth : mail@mail.com)
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">Password</label>
                    <div class="controls">
                        <input type="password" id="Password" name="password" placeholder="">&nbsp; &nbsp; minimum 4, maksimum 34 karakter
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputAlamat">Confirm Password</label>
                    <div class="controls">
                        <input type="password" id="Confirm" name="con_password" placeholder="">&nbsp; &nbsp; sama dengan Password
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputNo">Nomor HP</label>
                    <div class="controls">
                        <input type="text" id="NoHP" name="noTelp" placeholder="<?php echo $noTelp?>">&nbsp; &nbsp; minimum 7, maksimum 12 digit angka
                    </div>
                </div>
				
				<div class="control-group">
                    <label class="control-label" for="inputNo">Nama Kost</label>
                    <div class="controls">
                        <input type="text" id="Nama Kost" name="namakost" placeholder="<?php echo $namaKost?>">
                    </div>
                </div>
				
				<div class="control-group">
                    <label class="control-label" for="inputNo">Alamat Kost</label>
                    <div class="controls">
                        <input type="text" id="Alamat Kost" name="alamat" placeholder="<?php echo $alamat?>">
                    </div>
                </div>
				
				<div class="control-group">
                    <label class="control-label" for="inputNo">Kapasitas Kost</label>
                    <div class="controls">
                        <input type="text" id="Kapasitas Kost" name="kuota" placeholder="<?php echo $kuota?>">
                    </div>
                </div>
				
                <br/><h4> Terms of Service</h4><br />
<p>Pemilik Kost harus mengikuti aturan dan ketentuan yang ditetapkan<br /> oleh pihak Sikost.  Aturan dan ketentuan dapat berubah sewaktu-waktu.  <br />Kerugian dan Penipuan oleh pihak user bukanlah tanggung jawab Sikost.com. <br /> Segala bentuk pelanggaran dapat dikenai hukuman sesuai Undang-Undang <br> yang berlaku di Republik Indonesia</p>
                <div class="control-group">
                    <div class="controls">
                        
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