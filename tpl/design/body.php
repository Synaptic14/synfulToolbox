<?php
if($page == 'news') {
  echo "<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1611485085775466',
      xfbml      : true,
      version    : 'v2.4'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = \"//connect.facebook.net/en_US/sdk.js\";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>";
}

include("tpl/design/ele/menu.php");

echo '
<div class="container-fluid">
  <div class="row">
  ';
  	if ($detect->isMobile()) {
      $mobile = 1;
    } else {
		include("tpl/design/ele/side_menu.php");
	}
    include("tpl/pages/".$page.".php");
  echo '
  </div>
</div>
';
echo '
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>
';