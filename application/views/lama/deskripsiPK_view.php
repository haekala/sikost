<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- Fig. 5.1: inline.html -->
<!-- Using inline styles --><html xmlns = "http://www.w3.org/1999/xhtml">

<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>siKost.com</title>
<?php echo '<link href="'.base_url().'css/style2.css" rel="stylesheet" type="text/css" media="screen" />'?>

</head>
<body>
<div id="header" class="container">
	<div id="logo">
		<h1><a href="#">siKost.com</a></h1>
		<p>sistem Informasi Kost pertama di UI</p>
	</div>
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="home">Home</a></li>
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
	<ul id="gambar">
		<?php echo form_open_multipart('upload/do_upload/'.$nomorgambar.'/'.$idkos); ?>
		<input type="file" name="userfile" size="20" />	
		<br /><br />
		<input type="submit" value="upload" />
		</form>
		<?php foreach($gambars as $gambar): ?>
		<?php echo '<li><a href= "localhost/sikost/index.php/tempatkost/deskripsi/'.$gambar.'"> <img src= "'.base_url().'image/'.$gambar.'.jpg"  width=150 height=142 title="" alt=""/></a></li>'; ?>
		<?php endforeach;?>	
	</ul>
		
		<?php echo form_open_multipart('tempatkost/hapus/'.$idkos); ?><input type="submit" value="hapus tempat kost" ></form>
	
		Daftar Kamar: <br />
		<?php echo $meja2 ?>
	<ul id="deskripsi">
			<?php echo '<p> '.$nama.'  </p>'; ?>
			<?php echo '<p> '.$deskripsi.'  </p>'; ?>
			<?php echo '<p> '.$kuota.'  </p>'; ?>
			<?php echo '<p> '.$lokasi.'  </p>'; ?>
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
