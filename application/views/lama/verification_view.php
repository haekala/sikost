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
		<p>Administration Control Panel</p>
	</div>
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="<?php echo base_url().'index.php/admin'?>">Home</a></li>
			<li><a href="">Hubungi Kami</a></li>
			<li><a href="">Tentang</a></li>

		</ul>
	</div>
</div>
	
<!-- end #header -->
	<!-- box Login -->
	
	<div class="signup_wrap">
		<div class="signin_form">
		</form>
		<?php echo "Selamat datang,".$this->session->userdata('name')."                 "; ?>
		<?php echo '<a href = "'.base_url().'index.php/loginlogout/do_logout"> logout </a>'?>
		</div>
	</div>
	<?php echo $success ?> <br /><br />
	<?php echo $meja?>
	
</body>
</html>
