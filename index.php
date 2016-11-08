<?php

include("inc/config.php");

session_start();
if($_POST['access_submit']) {

	$db = new DBConnection();
	$username = strtolower($_POST['username']);
	$password = $_POST['password'];

	$db->query('SELECT password FROM users WHERE username = :user');

	$db->bind(':user', $username);
	$row = $db->single();

	if(password_verify($password, $row['password']))
	{
		$_SESSION['main_access'] = 1;
		$_SESSION['username'] = $username;
    $user_path = strtolower($_SESSION['username']);
		$_SESSION['uploadPath'] = "./userUpload/".$user_path;
	} else {
		$_SESSION['main_access'] = 0;
		$script = '<script type="text/javascript">alert("Incorrect Username/Password combination. Please try again.")</script>';
		echo $script;
	}
}

if($_SESSION['main_access'] == 1)
{
	$checkDB = new DBConnection();
	$checkDB->query('SELECT confirm_email FROM users WHERE username = :user');
	$checkDB->bind(':user', $_SESSION['username']);
	$checkRow = $checkDB->single();
	if($checkRow['confirm_email'] != 1)
	{
		$_SESSION['confirmEmail'] = 0;
	} else
	{
		$_SESSION['confirmEmail'] = 1;
	}
}

$main_access = $_SESSION['main_access'];
$user = $_SESSION['username'];
//Establish pages
  $page = $_GET['page'];
  if ($page == '')  $page = 'home';
  if (!file_exists('tpl/pages/'.$page.'.php')) {  
    $page = '404';
    die("You do not have access to this page.");
  }

  include("tpl/index.php");