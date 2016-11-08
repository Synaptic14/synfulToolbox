<?php
echo '
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Dashboard</h1>';

if($_SESSION['main_access'] != 1) {
	die('Please login to view this page.');
}

echo "Coming Soon!";

echo '</div>';