<?php

require_once 'lib/Google/Client.php';
require_once 'lib/Google/Service/YouTube.php';
function searchKeyword($keyword)
{
  define("MAX_RESULTS", 1);
  $DEVELOPER_KEY = 'AIzaSyBhdgmMUkmZ2TXrPu853ZqNrBwHxSSOn4g';
  $client = new Google_Client();
  $client->setDeveloperKey($DEVELOPER_KEY);

  // Define an object that will be used to make all API requests.
  $youtube = new Google_Service_YouTube($client);
  try {
    // Call the search.list method to retrieve results matching the specified
    // query term.
    $searchResponse = $youtube->search->listSearch('id,snippet', array(
      'q' => $keyword,
      'maxResults' => MAX_RESULTS,
    ));

    $videos = '';
    $channels = '';
    $playlists = '';

    // Add each result to the appropriate list, and then display the lists of
    // matching videos, channels, and playlists.
    foreach ($searchResponse['items'] as $searchResult) {
      switch ($searchResult['id']['kind']) {
        case 'youtube#video':
          $videos .= sprintf('<li>%s (%s)</li>',
              $searchResult['snippet']['title'], $searchResult['id']['videoId']);
          break;
        case 'youtube#channel':
          $channels .= sprintf('<li>%s (%s)</li>',
              $searchResult['snippet']['title'], $searchResult['id']['channelId']);
          break;
        case 'youtube#playlist':
          $playlists .= sprintf('<li>%s (%s)</li>',
              $searchResult['snippet']['title'], $searchResult['id']['playlistId']);
          break;
      }
    }

    //$echo "<h3>Videos</h3><ul>".$videos."</ul><h3>Channels</h3><ul>".$channels."</ul><h3>Playlists</h3><ul>".$playlists."</ul>";

  } catch (Google_Service_Exception $e) {
    echo sprintf('<p>A service error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  } catch (Google_Exception $e) {
    echo sprintf('<p>An client error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  }
}
?>