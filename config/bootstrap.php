<?php

/**
 *   
 */
session_start();


/**
 * Encrypte le site en UTF-8 
 */
header('Content-Type: text/html; charset=utf-8');

/**
 * Permet d'importer un variable contenant tout les paramètres du site
 */
require __DIR__ . '/paths.php';

require   dirname(__DIR__).DS . 'vendor/autoload.php';

/**
 * Permet d'importer la bdd 
 */
require_once 'db.php';


/**
 * Youtube intégration 
 */
 

$formHelper = new FormHelper($pdo);

$cleYoutube = "AIzaSyAV8LiMsVOrtRxzehg0IVxV5XeVUSzYnj4";

$client = new Google_Client();
$client->setApplicationName("fluxcenter");
$client->setDeveloperKey($cleYoutube);

$youtube = new Google_Service_YouTube($client);
