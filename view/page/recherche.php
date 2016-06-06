<!-- Récupération des vidéo Youtube -->

<?php
 
$cleYoutube = "AIzaSyAV8LiMsVOrtRxzehg0IVxV5XeVUSzYnj4";

$client = new Google_Client();
$client->setApplicationName("fluxcenter");
$client->setDeveloperKey($cleYoutube);

$youtube = new Google_Service_YouTube($client);

