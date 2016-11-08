<?php
$confirmation_code = "g6Md1tHSR90CIlWkR5GXouWO9";
$to = 'glitcher14@gmail.com';
	$subject = 'Welcome to the World 13 Alliance Manager';
	$message = 'Thank you for registering at the world 13 Alliance Manager. In order to confirm your registration please go to the following link http://wontoolbox.com/toolbox/validate.php?confirmation='.$confirmation_code;
	$headers = 'From: xgn_ai@wontoolbox.com' . "\r\n" .
    'Reply-To: synaptic@wontoolbox.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);


?>