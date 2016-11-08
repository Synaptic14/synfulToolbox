<?php
echo '
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Dashboard</h1>';

if($_SESSION['main_access'] != 1) {
	echo 'All uploads from unregistered users are deleted ever day at Midnight. Register to save your uploads.';
}

echo '<form action="" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="MAX_FILE_SIZE" value="2097157" />
     <h3 style="padding-top:20px">Upload your image:</h3><br />
     <h4>Maximum File Size: 2MB  ||  Maximum Dimensions: 3000x3000</h4><br />
     <input style="float:left" type="file" name="imgUpload">
     <input style="float:left" type="submit" value="Upload">
</form>';


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include 'inc/uploadClass.php';
	//Start class
	$upload = new uploadHandler();
	//Set path
	if(isset($_SESSION['username']))
	{
		$upload->setPath('./userUpload/'.strtolower($_SESSION['username']));
		$giveLink = 0;
	} else
	{
		$upload->setPath('./userUpload/randomUser');
		$giveLink = 1;
	}
	//Prefix the file name
	$upload->setFilePrefix('user_uploads');
	//Allowed types
	$upload->setAllowed(array('dimensions'=>array('width'=>3000,'height'=>3000),
                          'types'=>array('image/png','image/jpg','image/gif','image/jpeg')));
	//form property name                   
	$upload->setInput('imgUpload');
	//Do upload
	$upload->upload();
}

if(isset($upload->output)){
    echo $upload->output;
}

echo '</div>';