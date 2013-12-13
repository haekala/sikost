

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
        <h2>Booking Kost siKost.com</h2>
	</div>


            <form class="form-horizontal" action="<?php echo base_url();?>index.php/Registrasi/registration/<?php echo $idkos?>"  method="post">
                <div class="control-group">
                    <label class="control-label" for="inputName">Nama Lengkap</label>
                    <div class="controls">
                        <input type="text" id="nama" name="nama" placeholder=" ">
                        <br>
                        </label>

                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Fakultas</label>
                    <div class="controls">
                        <input type="text" id="fakultas" name="fakultas" placeholder="">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">Jenis Kelamin</label>
                    <div class="controls">
                        <input type="radio" name="sex" value="male"> Laki-Laki<br>
                        <input type="radio" name="sex" value="female"> Perempuan
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputNo">nomor Rekening</label>
                    <div class="controls">
                        <input type="text" id="norek" name="norek" placeholder="">
                    </div>
                </div>
                <div class="control-group">
				<label for="country" class="control-label">	
					idkamar
				</label>
				<div class="controls">
					<select name="idkamar" id="idkamar">
						<option value=""></option>
						<?php foreach($kamars->result_array() as $kamar):?>
						<option value="<?php echo $kamar['idkamar'];?>"><?php echo $kamar['idkamar'];?></option>
						<?php endforeach?>
					</select>
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
