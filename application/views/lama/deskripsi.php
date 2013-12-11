
<!DOCTYPE html>
<!-- Fig. 5.1: inline.html -->
<!-- Using inline styles --><html xmlns = "http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>siKost.com</title>
<?php echo '<link href="'.base_url().'css/style2.css" rel="stylesheet" type="text/css" media="screen" />'?>
<script type="text/javascript" src="jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="jquery.poptrox-0.1.js"></script>
</head>
<body>
<div id="header" class="container">
	<div id="logo">
		<h1><a href="#">siKost.com</a></h1>
		<p>sistem Informasi Kost pertama di UI</p>
	</div>
	<div id="menu">
		<ul>
			<?php echo '<li class="current_page_item"><a href='.base_url().'>Home</a></li> '?>
			<li><a href="image/gallery.htm">Hubungi Kami</a></li>
			<li><a href="dream.htm">Tentang</a></li>

		</ul>
	</div>
</div>
<!-- end #header -->
	<!-- box Login -->
	
	<div id="selamat datang">
		<?php echo '<p> '.$nama.'  </p>'; ?>
	</div>
	
	
	
<div id="poptrox">
	<!-- start -->
	<ul id="gallery">
		<?php foreach($gambars as $gambar): ?>
		<?php echo '<li> <img src= "'.base_url().'image/'.$gambar.'.jpg"  width=150 height=142 title="" alt="gambar"/></li>'; ?>
		<?php endforeach;?>
	</ul>
		<ul id="kamar">
			<?php echo '<p> daftar kamar yang kosong </p>'; ?>
			<?php echo $meja ?>
			
		</ul>
		<ul id="nama">
			<?php echo '<p> Kost'.$nama.'  </p>'; ?>
			
		</ul>
		<ul id="deskripsi">
			
			<?php echo '<p> '.$deskripsi.'  </p>'; ?>
			<?php echo '<p> '.$lokasi.'  </p>'; ?>
		</ul>
		
	<ul id="kuota">
			<?php echo '<p>Kuota kost yang tersedia:  '.$kuota.'  </p>'; ?>
			
		</ul>
	<br class="clear" />
	
	<!-- end -->
</div>
<div id="page">
	<div id="bg1">
		<div id="bg2">
			<div id="bg3">
				<div id="sidebar">
					<h3>Contact us on : </h3>
                    <p></p>
                    <a href="image/kaskus.png"><img src="image/kaskus.png" width="50" height="50" title="" alt="kaskus.png" /></a>
                    <a href=""><img src="image/facebook.png" width="50" height="50" title="" alt="facebook.png" /></a>
                    <a href=""><img src="image/twitter.png" width="50" height="50" title="" alt="twitter.png" /></a>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="footer">
	<p>Copyright (c) 2011 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
