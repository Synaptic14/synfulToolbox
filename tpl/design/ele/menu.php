<?php

if($_SESSION['main_access'] == 1) {
  $style = "display:none";
}


if($_SESSION['main_access'] == 1) {
  if($_POST['logout']) {
    $_SESSION = array();
    session_destroy();
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./">';
    exit;
}
}
echo '
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Synful Toolbox</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
    <form action="#" method="post">
      <ul class="nav navbar-nav navbar-right">
      ';
      if($_SESSION['main_access'] != 1) {
        echo '<li style="'.$style.'"><form action="#" method="post"><input type="text" name="username" placeholder="Username"><input type="password" name="password" placeholder="Password"><input type="submit" name="access_submit" value="Login"></form></li>';
        if ($detect->isMobile()) {
        echo '<li style="'.$style.'"><a href="register">Register</a>';
      }
      }
      if($_SESSION['main_access'] == 1) {
        echo '<li style="color: fff; font-weight: bold; float:right; padding-right: 10px;">Hello, '.$_SESSION['username'].'   <form action="#" method="post"><input style="background-color:#333" type="submit" value="logout" name="logout"></form></li><br />';
        if ($detect->isMobile()) {
        echo '<li style="float:right"><a href="./">Home</a></li>';
        echo '<li style="float: right"><a href="fileUpload">Image Upload</a></li>';
        echo '<li style="float:right"><a href="myFiles">My Files</a></li>';
      }
      }

      /*if($detect->isMobile()) {
        echo '<li><a href="search">Search</a></li>
              <li><a href="add_player">Add Player</a></li>
              <li><a href="members">Riot Members</a></li>

        ';
      }*/

      echo '</ul>
      </form>
    </div>
  </div>
</nav>
';
?>