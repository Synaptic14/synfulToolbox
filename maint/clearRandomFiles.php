<?php
function clearRandomFiles()
{
	define(RANDOM_FILE_PATH, "./userUpload/randomUser");
	if(!file_exists(RANDOM_FILE_PATH))
	{
		die("Fatal Error: File Path incorrectly configured");
	}

	$files = glob(RANDOM_FILE_PATH); // get all file names
	foreach($files as $file)
	{ // iterate files
  		if(is_file($file))
    		unlink($file); // delete file
    		echo $file." has been deleted";
	}
}
clearRandomFiles();