<?php


echo '
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Dashboard</h1>';

if($_SESSION['main_access'] != 1) {
	die('Please login to view this page.');
} else if($_SESSION['confirmEmail'] != 1)
{
	die('Please confirm your email address by clicking the link located in the email sent to you upon registration.');
}

if(!file_exists($_SESSION['uploadPath']))
{
	die("You do not have any images uploaded. || ".$_SESSION['uploadPath']);
} else
{
	$userUploadArray = drawArray(new DirectoryIterator($_SESSION['uploadPath']));
	echo "<h3>Your Files:</h3><br /><ol>";
	foreach($userUploadArray as $k => $file)
	{
		echo '<li><a target="_blank" href="'.$_SESSION['uploadPath'].'/'.$file.'">'.$file.'</a></li>';
	}
	echo "</ol>";
}



echo '</div>';