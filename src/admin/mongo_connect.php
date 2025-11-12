<?php
// Подключаем "автозагрузчик" Composer.
require_once __DIR__ . '/../vendor/autoload.php';

// Создаем нового "клиента" для подключения к MongoDB.
$mongoClient = new MongoDB\Client(
    //Указываем "строку подключения" (connection string).
    'mongodb://root:rootpassword@mongo:27017'
);

// Выбираем конкретную базу данных.
$db = $mongoClient->gamedev_db;
// Выбираем конкретную "коллекцию" внутри базы данных.
$newsCollection = $db->news;