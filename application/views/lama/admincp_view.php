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
			<li class="current_page_item"><a href="home">Home</a></li>
			<li><a href="image/gallery.htm">Hubungi Kami</a></li>
			<li><a href="dream.htm">Tentang</a></li>

		</ul>
	</div>
</div>
<!-- end #header -->
	<!-- box Login -->
	
	<div class="signup_wrap">
		<div class="signin_form">
		</form>
		<?php echo "Selamat datang,".$this->session->userdata('name')."                   "; ?>
		<?php echo '<a href = "'.base_url().'index.php/loginlogout/do_logout"> logout </a>'?>
		</div>
	</div>
	<br><br><?php echo "<a href='".base_url()."index.php/admin/verification'>"?>
	<div id="header" class="container">	<div id="logo">Halaman verifikasi pemilik kost </div></a></div><br>
	<br><?php echo "<a href='".base_url()."index.php/admin/delete'>"?>
	<div id="header" class="container">	<div id="logo">Hapus tempat Kost </div></a></div><br>
	
	
<div id="poptrox">
	<!-- start -->
	<br class="clear" />
	<script type="text/javascript">
		$('#gallery').poptrox();
		</script>
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
