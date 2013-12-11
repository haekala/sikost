
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
	
		<div class="signup_wrap">
		<div class="signin_form">
		<form action=' <?php echo base_url().'index.php/loginCon/process'?>' method='post'>
		Email Userr 	:
		<input type="text" name ="email"/>
		Password	:
		<input type="password" name="password"/>
		<input type="submit" value="login"/>
		</form>
		</div>
	</div>
	
<div id="poptrox">
	<!-- start -->
	<ul id="gambar">
	
	</ul>
	<div class="reg_form">
	<div class="form_title">Form Registrasi User</div>
		<?php echo validation_errors(); ?>
	<?php echo form_open("user/registration"); ?>
		<p>	
			<label for="nama">Name:</label>
			<?php echo '<input type="text" name="nama" value = "'.$nama.'"/>'?> 
		</p>        
		<p>
			<label for="email">Email:</label>
			<?php echo '<input type="text"  name="email"/ value = "'.$email.'">'?>
		</p>
		<p>
			<label for="password">Password:</label>
			<input type="password" name="password"  />
		</p>
		<p>
			<label for="con_password">Confirm Password:</label>
			<input type="password"  name="con_password"  />
		</p> 
		<p>
			<label for="noTelp">No Telepon:</label>
			<?php echo '<input type="noTelp"  name="noTelp" value = "'.$noTelp.'" />'?>
		</p> 
		<p>
			<input type="submit" class="greenButton" value="Submit" />
		</p>
		</form>
	</div>
	
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
