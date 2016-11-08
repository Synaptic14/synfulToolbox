<?php

$ip = $_SERVER['REMOTE_ADDR'];
echo '
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Register</h1>
	<form method="post" action="#">
		<table style="text-align:center; margin: 0 auto">
			<tr>
				<td style="padding: 10px 20px">
			   		<label class="control-label" for="register_username">Username</label><br />
			  		<input type="text" name="register_username" id="register_username" class="input-xlarge" placeholder="">
			  	</td>
			</tr>
			<tr>
			  	<td style="padding: 10px 20px">
			   		<label class="control-label" for="register_password">Password</label><br />
			  		<input type="password" name="register_password" id="register_password" class="input-xlarge" placeholder="">
			  	</td>
			</tr>
			<tr>
			  	<td style="padding: 10px 20px">
			   		<label class="control-label" for="register_password_check">Confirm Password</label><br />
			  		<input type="password" name="register_password_check" id="register_password_check" class="input-xlarge" placeholder="">
			  	</td>
			</tr>
			<tr>
			  	<td style="padding: 10px 20px">
			   		<label class="control-label" for="register_email">Email</label><br />
			  		<input type="text" name="register_email" id="register_email" class="input-xlarge" placeholder="">
			  	</td>
			</tr>
			<input type="hidden" name="ip" id="ip" value="'.$ip.'" class="input-xlarge" placeholder="">
			<tr>
			  	<td style="padding: 10px 20px">
			  		<input type="submit" name="register_submit" id="register_submit" value="Submit">
			  	</td>
			</tr>
		</table>
	</form>';

if($_POST['register_submit']) {
	if(checkRegistration())
	{
		echo "This email or username is already registered to an account.";
	} else {
		$confirmation_code = generateRandomString();

		$password = $_POST['register_password'];
		$password_check = $_POST['register_password_check'];
		if($password == $password_check)
		{
			$error_register = 0;
		}

		if($error_register == 1) {
			die("Pass Fail");
		} else {
			execRegistration($password, $confirmation_code);
			$register_success = 1;
		}
	}
}

	if($register_success == 1) {
		echo "Your registration was successful. A confirmation email has been sent to ".$email.". Please confirm your email by clicking the link in the confirmation email.";
	}
	if($register_error == 1) {
		echo "An unknown error occurred. Please contact the <a href=\"mailto:ai@wontoolbox.com\">Administrator</a>";
	}
echo '</div>';

?>