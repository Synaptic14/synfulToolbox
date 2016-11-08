<?php
require 'lib/youtubeConverter/youtube-dl.class.php';
require 'inc/ripperFunctions.php';
echo '
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Dashboard</h1>';

if($_SESSION['main_access'] != 1) {
	die('Please login to view this page.');
}
echo '
<form method="GET" action="#">
		<table style="text-align:center; margin: 0 auto">
			<tr>
				<td style="padding: 0 20px; padding-bottom:23px;">
			   		<label class="control-label" for="yt_url">Youtube URL</label><br />
			  		<input type="text" name="yt_url" id="yt_url" class="input-xlarge" placeholder="">
			  	</td>
			  	<td style="padding: 10px 10px">
			  		<input type="submit" name="yt_url_submit" id="yt_url_submit" value="Submit">
			  	</td>
			</tr>
			<tr>
				<td style="padding: 0 20px; padding-bottom:23px;">
			   		<label class="control-label" for="yt_keyword">Search for a Song</label><br />
			  		<input type="text" name="yt_keyword" id="yt_keyword" class="input-xlarge" placeholder="">
			  	</td>
			  	<td style="padding: 10px 20px">
			  		<input type="submit" name="yt_keyword_submit" id="yt_keyword_submit" value="Submit">
			  	</td>
			</tr>
		</table>
	</form>
';

if($_POST['yt_url_submit'])
{
	downloadAudio($_POST['yt_url']);
}
else if($_POST['yt_keyword_submit'])
{
	searchKeyword($_POST['yt_keyword_submit']);
}


echo '</div>';
?>