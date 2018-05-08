<?php

require_once 'lib/swiftMailer/swift_required.php';
include_once 'Mobile_Detect.php';
include 'database.class.php';
include 'functions.php';

define("DB_HOST", "localhost");
define("DB_USER", "DB_USER");
define("DB_PASS", "DB_PASS");
define("DB_NAME", "DB_NAME");

$detect = new Mobile_Detect;

$user_agent = $_SERVER['HTTP_USER_AGENT'];


?>