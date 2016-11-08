<?php

require('inc/config.php');

echo '<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header">Confirm your Email</h1>';

if(isset($_GET['confirmation'])) {
	$confirm_code = $_GET['confirmation'];

	$db = new DBConnection();

	$db->query("UPDATE users SET confirm_email = 1 WHERE confirm_code = :confirm_code");
	$db->bind(":confirm_code", $confirm_code);
	$db->execute();
	$rowCount = $db->rowCount();

	if($rowCount < 1) {
		die("Error Code 1A: Invalid validation code. Please contact the <a href=\"mailto:ai@wontoolbox.com\">Administrator</a> for assistance.");
	} else {
		$valid = 1;
	} 
	if($valid == 1)
	{
		echo "You're account has been successfully validated and is now activated.<br /><br />";
		echo "You will be redirected to the Synful Toolbox home page in 5 seconds. Click <a href=\"./\">Here</a> if your browser does not redirect.";
		echo '<script type="text/javascript">';
		echo "
		setTimeout(function () {window.location.href= 'http://wontoolbox.com/toolbox';},5000);";
		echo "</script>";
	}
}