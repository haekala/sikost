<div id="content">
<div class="signup_wrap">
<div class="signin_form">
	<?php echo form_open("loginCon/process"); ?>	
	    <label for="email">Emaiiil:</label>
    	<input type="text" id="email" name="email" value="" />
	    <label for="pass">Password:</label>
		<input type="password" id="password" name="password" value="" />
        <input type="submit" class="" value="SSSSign in" />
    <?php echo form_close(); ?>
</div><!--<div class="signin_form">-->
</div><!--<div class="signup_wrap">-->
<div class="reg_form">
<div class="form_title">Registrasi Sebagai User</div>
<div class="form_sub_title">It's free and anyone can join</div>
<?php echo validation_errors('<p class="error">'); ?>
	<?php echo form_open("user/registration"); ?>
		<p>	
			<label for="nama">Name:</label>
			<input type="text" id="nama" name="nama" value="<?php echo set_value('nama'); ?>" />
		</p>        
		<p>
			<label for="email">Email:</label>
			<input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>" />
		</p>
		<p>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" />
		</p>
		<p>
			<label for="con_password">Confirm Password:</label>
			<input type="password" id="con_password" name="con_password" value="<?php echo set_value('con_password'); ?>" />
		</p> 
		<p>
			<label for="noTelp">No Telepon:</label>
			<input type="noTelp" id="noTelp" name="noTelp" value="<?php echo set_value('noTelp'); ?>" />
		</p> 
		<p>
			<input type="submit" class="greenButton" value="Submit" />
		</p>
	<?php echo form_close(); ?>
</div><!--<div class="reg_form">-->    
</div><!--<div id="content">-->