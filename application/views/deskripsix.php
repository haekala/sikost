
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
			  <?php if($this->session->userdata('jenis')==""):?><li class="dropdown">
			  	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-comment icon-white"></i> Registrasi <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>index.php/user"><i class="icon-fire"></i> User</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/pemilik"><i class="icon-asterisk"></i> Pemilik Kost</a></li>
                </ul>
              </li><?php endif?>
			  <?php if($this->session->userdata('jenis')=="user"):?><li class="active"><a href="<?php echo base_url(); ?>index.php/dashboard_user"><i class="icon-home icon-white"></i>Dashboard User</a><?php endif?></li>
			  <?php if($this->session->userdata('jenis')=="pkost"):?><li class="active"><a href="<?php echo base_url(); ?>index.php/dashboard_pemilik"><i class="icon-home icon-white"></i>Dashboard Pemilik kost</a><?php endif?></li>
			  <?php if($this->session->userdata('jenis')=="admin"):?><li class="active"><a href="<?php echo base_url(); ?>index.php/dashboard_admin"><i class="icon-home icon-white"></i>Dashboard Admin</a><?php endif?></li>
            </ul>
			<?php if($this->session->userdata('jenis')==""):?>
			<?php echo form_open('loginCon/process','class="navbar-form pull-right"'); ?>
              <input class="span2" type="text" name="email" placeholder="email..." value="<?php echo set_value('username'); ?>">
              <input class="span2" type="password" name="password" placeholder="Password...">
              <button type="submit" class="btn btn-primary "><i class="icon-share icon-white"></i> Log in</button>
           <?php echo form_close(); ?>
		   <?php else:?>
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
			<?php endif?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<div class="container">
	 <!-- Main Area -->
                <div id="main_area">
                        <!-- Slider -->
                        <div class="row">
                                <div class="span12" id="slider">
                                        <!-- Top part of the slider -->
                                        <div class="row">
                                                <div class="span8" id="carousel-bounding-box">
                                                        <div id="myCarousel" class="carousel slide">
                                                                <!-- Carousel items -->
                                                                <div class="carousel-inner">
																	<?php $a=0;?>
																	<?php foreach($gambars as $gambar): ?> 
																		<?php if ($a == 6):?>
																		<?php break;?>
																		<?php elseif ($a==0):?>
																		<div class="active item" data-slide-number="0"><img src="<?php echo base_url()?>image/<?php echo $gambar?>.jpg" style="width: 770px; height: 300px;"  /></div>
																		<?php $a=$a+1;?>
																		<?php else:?>
																		<div class="item" data-slide-number="<?php echo $a?>"><img src="<?php echo base_url()?>image/<?php echo $gambar?>.jpg" style="width: 770px; height: 300px;"  /></div>
																		<?php $a=$a+1;?>
																		<?php endif;?>
																	<?php endforeach?>
                                                                </div>
                                                                <!-- Carousel nav -->
                                                                <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>
                                                                <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
                                                        </div>
                                                </div>
                                                <div class="span4" id="carousel-text"></div>
 
                                                <div style="display: none;" id="slide-content">
                                                        <div id="slide-content-0">
                                                                <h2>Gambar 1</h2>
                                                                <p><?php  echo $desgambars[0]?></p>
                                                                <p class="sub-text"><?php if($this->session->userdata('jenis')=="") {echo $tombol4;} else {echo $tombol;}?> </a></p>
                                                        </div>
                                                        <div id="slide-content-1">
                                                                <h2>Gambar 2</h2>
                                                                <p><?php echo $desgambars[1]?></p>
                                                                <p class="sub-text"><?php if($this->session->userdata('jenis')=="") {echo $tombol4;} else {echo $tombol;}?> </a></p>
                                                        </div>
                                                        <div id="slide-content-2">
                                                                <h2>Gambar 3</h2>
                                                                <p><?php echo $desgambars[2]?></p>
                                                                <p class="sub-text"><?php if($this->session->userdata('jenis')=="") {echo $tombol4;} else {echo $tombol;}?> </a></p>
                                                        </div>
                                                        <div id="slide-content-3">
                                                                <h2>Gambar 4</h2>
                                                                <p><?php echo $desgambars[3]?></p>
                                                                <p class="sub-text"><?php if($this->session->userdata('jenis')=="") {echo $tombol4;} else {echo $tombol;}?> </a></p>
                                                        </div>
                                                        <div id="slide-content-4">
                                                                <h2>Gambar 5</h2>
                                                                <p><?php echo $desgambars[4]?></p>
                                                                <p class="sub-text"><?php if($this->session->userdata('jenis')=="") {echo $tombol4;} else {echo $tombol;}?> </a></p>
                                                        </div>
                                                        <div id="slide-content-5">
                                                                <h2>Gambar 6</h2>
                                                                <p><?php echo $desgambars[5]?></p>
                                                                <p class="sub-text"><?php if($this->session->userdata('jenis')=="") {echo $tombol4;} else {echo $tombol;}?> </a></p>
                                                        </div>
														
                                                </div>
                                        </div>
 
                                </div>
                        </div> <!--/Slider-->
 
                        <div class="row hidden-phone" id="slider-thumbs">
                                <div class="span12">
                                        <!-- Bottom switcher of slider -->
                                        <ul class="thumbnails">
										<?php $a=0?>
										<?php foreach($gambars as $gambar):?>
											<?php if($a==6):?>
											<?php break;?>
											<?php else:?>
                                                <li class="span2">
                                                        <a class="thumbnail" id="carousel-selector-<?php echo $a;?>">
                                                                <img src="<?php echo base_url();?>image/<?php echo $gambar;?>.jpg" style="width : 170px; height :100px;"/>
                                                        </a>
                                                </li>
												<?php $a=$a+1;?>
											<?php endif?>
                                        <?php endforeach?>
                                        </ul>
                                </div>
                        </div>
</div>

<div class="well">
<section>
  <table class="table table-hover table-condensed">
    <thead>
      <tr>
        <th>No.</th>
        <th>idkamar</th>
        <th>harga</th>
        <th>status</th>
		<th>fasilitas</th>
		<!--<th>Aksi</th>-->
      </tr>
    </thead>
    <tbody>
	
<?php
		$selec=0;
		$no=$tot+1;
		foreach($data_kamar->result_array() as $dp)
		{
	?>
	<?php if($selec<$tot):?>
	<?php elseif($no>$tot+5):?>
	<?php else :?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $dp['idkamar']; ?></td>
        <td><?php echo $dp['harga']; ?></td>
        <td><?php if ($dp['status']==0) {echo "Kosong";} else {echo "Terisi";}?></td>
        <td><?php echo $dp['fasilitas']; ?></td>
      </tr>
	 <?php
			$no++; endif;$selec++;
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
	</section></div>
<?php echo $deskripsi;?>
<script>
  jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        $('#carousel-text').html($('#slide-content-0').html());
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click( function(){
                var id_selector = $(this).attr("id");
                var id = id_selector.substr(id_selector.length -1);
                var id = parseInt(id);
                $('#myCarousel').carousel(id);
        });
 
 
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid', function (e) {
                var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
 
 
});
</script>
	
      <footer class="well">
        <p><?php echo $credit; ?></p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
