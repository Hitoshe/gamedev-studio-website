<?php
require_once 'admin/mongo_connect.php';

// Очищаем старые коллекции, если они есть
$db->dropCollection('products');
$db->dropCollection('reviews');

// Получаем доступ к коллекциям
$productsCollection = $db->products;
$reviewsCollection = $db->reviews;

// Добавляем наши товары
$products = [
    [
        'name' => [
            'en' => 'Gnome Plushie',
            'ru' => 'Плюшевый Гном'
        ],
        'description' => [
            'en' => 'An adorable (yet grumpy) plushie gnome, a perfect guardian for your desk.',
            'ru' => 'Очаровательный (но ворчливый) плюшевый гном, идеальный страж для вашего рабочего стола.'
        ],
        'image' => '/assets/images/merch/gnome.png',
        'price' => 24.99,
        'slug' => 'gnome-plushie'
    ],
    [
        'name' => [
            'en' => 'Burden of Flame T-Shirt',
            'ru' => 'Футболка Burden of Flame'
        ],
        'description' => [
            'en' => 'High-quality black t-shirt with the official game logo.',
            'ru' => 'Высококачественная черная футболка с официальным логотипом игры.'
        ],
        'image' => '/assets/images/merch/tshirt.png',
        'price' => 19.99,
        'slug' => 'bof-tshirt'
    ],
    [
        'name' => [
            'en' => 'Helmet Night Light',
            'ru' => 'Ночник-шлем'
        ],
        'description' => [
            'en' => 'A USB-powered night light shaped like a dark knight helmet. Keeps the darkness at bay.',
            'ru' => 'Ночник с питанием от USB в форме рыцарского шлема. Удерживает тьму на расстоянии.'
        ],
        'image' => '/assets/images/merch/helmet.png',
        'price' => 29.99,
        'slug' => 'torch-light'
    ],
    [
        'name' => [
            'en' => 'Monster Plushie',
            'ru' => 'Плюшевый Монстр'
        ],
        'description' => [
            'en' => 'A terrifyingly cute plush monster from the lower depths.',
            'ru' => 'Ужасающе милый плюшевый монстр из нижних глубин.'
        ],
        'image' => '/assets/images/merch/monster.png',
        'price' => 26.99,
        'slug' => 'monster-plushie'
    ],
    [
        'name' => [
            'en' => 'Gnome Mug',
            'ru' => 'Кружка с гномом'
        ],
        'description' => [
            'en' => 'A sturdy ceramic mug with the Gnome.',
            'ru' => 'Прочная керамическая кружка с гномом.'
        ],
        'image' => '/assets/images/merch/mug.png',
        'price' => 14.99,
        'slug' => 'studio-mug'
    ],
    [
        'name' => [
            'en' => 'Flame Pin',
            'ru' => 'Значок-пламя'
        ],
        'description' => [
            'en' => 'An elegant enamel pin in the shape of the candle.',
            'ru' => 'Элегантный эмалированный значок в форме свечи.'
        ],
        'image' => '/assets/images/merch/pin.png',
        'price' => 9.99,
        'slug' => 'flame-pin'
    ],
];

$productsCollection->insertMany($products);

echo "Merch setup complete! " . count($products) . " products have been added to the database.";