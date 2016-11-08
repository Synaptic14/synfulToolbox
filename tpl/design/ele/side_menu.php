<?php
if($page == 'home') {
	$style1 = 'class="active"';
} else if($page == 'register') {
	$style2 = 'class="active"';
} else if($page == 'xgn') {
	$style3 = 'class="active"';
} else if($page == 'fileUpload') {
	$style4 = 'class="active"';
} else if($page == 'myFiles') {
	$style5 = 'class="active"';
} else {
	$style1 = '';
	$style2 = '';
	$style3 = '';
	$style4 = '';
	$style5 = '';
}
echo '
<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li "'.$style1.'"><a href="./">Dashboard <span class="sr-only">(current)</span></a></li>
    ';
    if($_SESSION['main_access'] != 1) {
    	echo '<li '.$style6.'> <a href="register">Register</a></li>';
    }
    echo '
    <!--<li "'.$style2.'"><a href="youtubeRip">Youtube Ripper</a></li>-->
    <li "'.$style3.'"><a href="xgn">XGN Section</a></li>
    <li "'.$style4.'"><a href="fileUpload">Image Uploader</a></li>';
    if($_SESSION['main_access'] == 1)
    {
        echo '<li "'.$style5.'"><a href="myFiles">My Files</a></li>';
    }
    echo '<li><a href="#">Other</a></li>
  </ul>
</div>';