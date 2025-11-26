<?php
require_once 'admin/mongo_connect.php';

// Очищаем старые коллекции
$db->dropCollection('products');
$db->dropCollection('reviews');

// Получаем доступ к коллекциям
$productsCollection = $db->products;

// Добавляем наши товары с расширенными данными
$products = [
    [
        'name' => ['en' => 'Gnome Plushie', 'ru' => 'Плюшевый Гном'],
        'description' => ['en' => 'An adorable plushie gnome, a perfect guardian for your desk.', 'ru' => 'Очаровательный плюшевый гном, идеальный страж для вашего рабочего стола.'],
        'image' => '/assets/images/merch/gnome.png', 'price' => 24.99, 'slug' => 'gnome-plushie',
        'category' => 'Toys', 'stock' => 15, 'tags' => ['plushie', 'collectible', 'new'],
        'suppliers' => [
            ['name' => 'PlushWorld', 'country' => 'China', 'contract_date' => new MongoDB\BSON\UTCDateTime(strtotime("2023-05-10") * 1000)],
            ['name' => 'GameToys', 'country' => 'USA', 'contract_date' => new MongoDB\BSON\UTCDateTime(strtotime("2023-08-01") * 1000)]
        ],
        'discounts' => ['regular' => 5, 'holiday' => 15]
    ],
    [
        'name' => ['en' => 'Burden of Flame T-Shirt', 'ru' => 'Футболка Burden of Flame'],
        'description' => ['en' => 'High-quality black t-shirt with the official game logo.', 'ru' => 'Высококачественная черная футболка с официальным логотипом игры.'],
        'image' => '/assets/images/merch/tshirt.png', 'price' => 19.99, 'slug' => 'bof-tshirt',
        'category' => 'Apparel', 'stock' => 30, 'tags' => ['clothing', 'logo', 'new'],
        'suppliers' => [['name' => 'PrintFactory', 'country' => 'Germany', 'contract_date' => new MongoDB\BSON\UTCDateTime(strtotime("2023-03-15") * 1000)]],
        'discounts' => ['regular' => 0]
    ],
    [
        'name' => ['en' => 'Helmet Night Light', 'ru' => 'Ночник-шлем'],
        'description' => ['en' => 'A USB-powered night light shaped like a dark knight helmet.', 'ru' => 'Ночник с питанием от USB в форме рыцарского шлема.'],
        'image' => '/assets/images/merch/helmet.png', 'price' => 29.99, 'slug' => 'helmet-light',
        'category' => 'Decor', 'stock' => 10, 'tags' => ['lighting', 'collectible'],
        'suppliers' => [['name' => 'LightUp', 'country' => 'USA', 'contract_date' => new MongoDB\BSON\UTCDateTime(strtotime("2022-12-01") * 1000)]],
        'discounts' => ['regular' => 10]
    ],
    [
        'name' => ['en' => 'Monster Plushie', 'ru' => 'Плюшевый Монстр'],
        'description' => ['en' => 'A terrifyingly cute plush monster from the lower depths.', 'ru' => 'Ужасающе милый плюшевый монстр из нижних глубин.'],
        'image' => '/assets/images/merch/monster.png', 'price' => 26.99, 'slug' => 'monster-plushie',
        'category' => 'Toys', 'stock' => 8, 'tags' => ['plushie', 'monster'],
        'suppliers' => [['name' => 'PlushWorld', 'country' => 'China', 'contract_date' => new MongoDB\BSON\UTCDateTime(strtotime("2023-05-10") * 1000)]],
        'discounts' => ['regular' => 5]
    ],
    [
        'name' => ['en' => 'Gnome Mug', 'ru' => 'Кружка с гномом'],
        'description' => ['en' => 'A sturdy ceramic mug with the Gnome.', 'ru' => 'Прочная керамическая кружка с гномом.'],
        'image' => '/assets/images/merch/mug.png', 'price' => 14.99, 'slug' => 'gnome-mug',
        'category' => 'Homeware', 'stock' => 50, 'tags' => ['kitchen', 'collectible'],
        'suppliers' => [['name' => 'Ceramics Inc.', 'country' => 'Germany', 'contract_date' => new MongoDB\BSON\UTCDateTime(strtotime("2023-01-20") * 1000)]],
        'discounts' => ['regular' => 0]
    ],
    [
        'name' => ['en' => 'Flame Pin', 'ru' => 'Значок-пламя'],
        'description' => ['en' => 'An elegant enamel pin in the shape of the candle.', 'ru' => 'Элегантный эмалированный значок в форме свечи.'],
        'image' => '/assets/images/merch/pin.png', 'price' => 9.99, 'slug' => 'flame-pin',
        'category' => 'Accessories', 'stock' => 100, 'tags' => ['pin', 'accessory', 'new'],
        'suppliers' => [['name' => 'PinMakers', 'country' => 'USA', 'contract_date' => new MongoDB\BSON\UTCDateTime(strtotime("2023-09-05") * 1000)]],
        'discounts' => ['regular' => 0]
    ],
];

$productsCollection->insertMany($products);

// Создаем индексы
$productsCollection->createIndex(['category' => 1]); // Индекс по категории
$productsCollection->createIndex(['category' => 1, 'price' => -1]); // Составной индекс
$productsCollection->createIndex(['name.en' => 'text', 'description.en' => 'text']); // Текстовый индекс

echo "Merch setup complete! " . count($products) . " products with extended data and indexes have been added to the database.";

?>