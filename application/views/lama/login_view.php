<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>

<head>	
	<title>Login Screen </title>
</head>
<body>
	<?php $this->load->helper('url'); ?>
	<div id='login_form'>
		<form action='<?php echo base_url();?>index.php/loginCon//process' method='post' name='process'>
		
			<h2>User Login</h2>
			<br />
			<?php if(! is_null($msg)) {echo "aaa";echo $msg;}?>			
			<label for='email'>email</label>
			<input type='text' name='email' id='email' size='25' /><br />
		
			<label for='password'>Password</label>
			<input type='password' name='password' id='password' size='25' /><br />							
		
			<input type='Submit' value='Login' />			
		</form>
	</div>
</body>
</html>