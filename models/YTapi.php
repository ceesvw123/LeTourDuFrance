<?php

require_once 'google-api-php-client/vendor/autoload.php';
require_once '../config/config.php';
require_once '../libs/database.php';


$sql = "SELECT number,artist,title FROM hitlist ORDER BY number DESC";
$result = $mysqli->query($sql);

while ($rowList = $result->fetch_assoc()) {
    $song = $rowList['artist'] . ' - ' . $rowList['title'];


    $htmlBody = <<<END
END;

// This code will execute if the user entered a search query in the form
// and submitted the form. Otherwise, the page displays the form above.
    // Call set_include_path() as needed to point to your client library.
    require_once 'google-api-php-client/src/Google/Client.php';
    require_once 'google-api-php-client/src/Google/Service/YouTube.php';

    /*
     * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
     * Google Developers Console <https://console.developers.google.com/>
     * Please ensure that you have enabled the YouTube Data API for your project.
     */
    $DEVELOPER_KEY = 'API KEY';

    $client = new Google_Client();
    $client->setDeveloperKey($DEVELOPER_KEY);

    // Define an object that will be used to make all API requests.
    $youtube = new Google_Service_YouTube($client);

    try {
        // Call the search.list method to retrieve results matching the specified
        // query term.
        $searchResponse = $youtube->search->listSearch('id,snippet', array(
            'q' => $song,
            'maxResults' => 1,
        ));

        $videos = '';


        // Add each result to the appropriate list, and then display the lists of
        // matching videos, channels, and playlists.
        foreach ($searchResponse['items'] as $searchResult) {
            switch ($searchResult['id']['kind']) {
                case 'youtube#video':
                    $videos = $searchResult['id']['videoId'];
                    break;
            }
        }

        $htmlBody .= <<<END
END;
    } catch (Google_Service_Exception $e) {
        $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    } catch (Google_Exception $e) {
        $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    }


    $num = $rowList['number'];

    $mysqli->query("UPDATE hitlist SET embed = '$videos' WHERE number = $num");
}