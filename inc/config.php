<?php

require_once 'lib/swiftMailer/swift_required.php';
include_once 'Mobile_Detect.php';
include 'database.class.php';
include 'functions.php';

define("DB_HOST", "localhost");
define("DB_USER", "wontoolb_ai");
define("DB_PASS", "~%QuW!RRuxIs");
define("DB_NAME", "wontoolb_toolbox");

$detect = new Mobile_Detect;

$user_agent = $_SERVER['HTTP_USER_AGENT'];


?>