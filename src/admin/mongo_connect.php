<?php
require_once __DIR__ . '/../vendor/autoload.php';

$mongoClient = new MongoDB\Client(
    'mongodb://root:rootpassword@mongo:27017'
);

$db = $mongoClient->gamedev_db;
$newsCollection = $db->news;