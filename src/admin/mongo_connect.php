<?php
// Подключаем автозагрузчик Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Создаем клиента для подключения к MongoDB
$mongoClient = new MongoDB\Client(
    'mongodb://root:rootpassword@mongo:27017'
);

// Выбираем нашу базу данных
$db = $mongoClient->gamedev_db;

// --- СОЗДАЕМ ПЕРЕМЕННЫЕ ДЛЯ ВСЕХ НАШИХ КОЛЛЕКЦИЙ ---

// 1. Коллекция для новостей
$newsCollection = $db->news;

// 2. Коллекция для товаров
$productsCollection = $db->products;

// 3. Коллекция для отзывов
$reviewsCollection = $db->reviews;