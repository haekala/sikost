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
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/colorbox/colorbox.css" />
	<script src="<?php echo base_url(); ?>asset/colorbox/jquery.colorbox.js"></script>
	<script>
		  $(document).ready(function(){
			  //Examples of how to assign the ColorBox event to elements
			  $(".medium-box").colorbox({rel:'group', iframe:true, width:"90%", height:"90%"});
	
		  });
	</script>
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
			  <li class="active"><a href="<?php echo base_url(); ?>"><i class="icon-book icon-white"></i> Hubungi Kami</a></li>
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
	
	<div class="well">
	  <div class="row">
		<div class="span">
		  <h3><?php echo $judul_lengkap.' '.$instansi; ?></h3>
		  <p><?php echo $alamat; ?></p>
		</div>
	  </div>
	</div>

  <div class="well">
	<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
	  
		<?php if ($cek) :?>
		
		<a href = "<?php echo base_url()?>index.php/tempatkost/createKost"><button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Buat Kost</button></a>
		<?php else :?>
		
		<a href = "<?php echo base_url()?>index.php/imageuploader"><button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Atur Gambar</button></a>
		<div class="container">
		<?php endif ?>
		
		  <a class="brand" href="#">Data Pendaftar</a>
		  <div class="nav-collapse">
			
		  </div>
		<div class="span6 pull-right">
		<?php echo form_open("dashboard_pemilik/cari", 'class="navbar-form pull-right"'); ?>
		  <input type="text" class="span3" name="cari" placeholder="Masukkan kata kunci pencarian">
		  <button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Cari ID Kamar</button>
		<?php echo form_close(); ?>
		</div>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
  
	  <section>
  <table class="table table-hover table-condensed">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Email</th>
        <th>idkamar</th>
        <th>Kelamin</th>
		<th>Status</th>
		<th>Fakultas</th>
		<th>Bataswaktu</th>
		<th>aksi</th>
      </tr>
    </thead>
    <tbody>
	<?php
		$no=$tot+1;
		foreach($data_user->result_array() as $dp)
		{
	?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $dp['nama']; ?></td>
        <td><?php echo $dp['email']; ?></td>
        <td><?php echo $dp['idkamar']; ?></td>
        <td><?php echo $dp['kelamin']; ?></td>
        <td><?php echo $dp['status']; ?></td>
        <td><?php echo $dp['fakultas']; ?></td>
        <td><?php echo $dp['bataswaktu']; ?></td>
		<td>
	        <div class="btn-group">
	          <a class="btn btn-small" href='<?php echo base_url(); ?>index.php/Registrasi/changediterima/<?php echo "".$dp['idkamar']."/".$idkos."/".$dp['email']; ?>' onClick="return confirm('Terima orang ini kedalam kost anda?');"><i class="icon-ok-circle"></i> Terima</a>
	          <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          <ul class="dropdown-menu">
			  
	            <li><a href='<?php echo base_url(); ?>index.php/Registrasi/changesiap/<?php echo "".$dp['idkamar']."/".$idkos."/".$dp['email']; ?>'><i class="icon-pencil"></i> Siap Bayar</a></li>
	            <li><a href='<?php echo base_url(); ?>index.php/Registrasi/changeditolak/<?php echo "".$dp['idkamar']."/".$idkos."/".$dp['email']; ?>' onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Tolak</a></li>
				
	          </ul>
	        </div><!-- /btn-group -->
		</td>
      </tr>
	 <?php
	 		$no++;
	 	}
	 ?>
    </tbody>
  </table>
	<div class="pagination pagination-centered">
		<ul>
		<?php
		echo $paginator;
		?>
		</ul>
	</div>
	
  

</section>
  </div>


    </div> <!-- /container -->

  </body>
</html>