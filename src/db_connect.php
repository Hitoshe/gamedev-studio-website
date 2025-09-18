<?php
// Данные для подключения берем из docker-compose.yml
$host = 'db'; // Имя сервиса базы данных в docker-compose
$port = '5432';
$dbname = 'gamedev_db';
$user = 'user';
$password = 'password';

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

try {
    // Создаем объект PDO для подключения к БД
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    // В случае ошибки подключения, выводим сообщение
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}