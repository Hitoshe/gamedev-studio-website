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
        'image' => '/assets/images/merch/gnome.jpg',
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
        'image' => '/assets/images/merch/tshirt.jpg',
        'price' => 19.99,
        'slug' => 'bof-tshirt'
    ],
    [
        'name' => [
            'en' => 'Torch Night Light',
            'ru' => 'Ночник-факел'
        ],
        'description' => [
            'en' => 'A USB-powered night light shaped like a dungeon torch. Keeps the darkness at bay.',
            'ru' => 'Ночник с питанием от USB в форме факела из подземелья. Удерживает тьму на расстоянии.'
        ],
        'image' => '/assets/images/merch/torch.jpg',
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
        'image' => '/assets/images/merch/monster.jpg',
        'price' => 26.99,
        'slug' => 'monster-plushie'
    ],
    [
        'name' => [
            'en' => 'Studio Logo Mug',
            'ru' => 'Кружка с логотипом студии'
        ],
        'description' => [
            'en' => 'A sturdy ceramic mug with the PineappleSoup studio logo.',
            'ru' => 'Прочная керамическая кружка с логотипом.'
        ],
        'image' => '/assets/images/merch/mug.jpg',
        'price' => 14.99,
        'slug' => 'studio-mug'
    ],
    [
        'name' => [
            'en' => 'Flame Pin',
            'ru' => 'Значок-пламя'
        ],
        'description' => [
            'en' => 'An elegant enamel pin in the shape of the Burden of Flame icon.',
            'ru' => 'Элегантный эмалированный значок в форме ... .'
        ],
        'image' => '/assets/images/merch/pin.jpg',
        'price' => 9.99,
        'slug' => 'flame-pin'
    ],
];

$productsCollection->insertMany($products);

echo "Merch setup complete! " . count($products) . " products have been added to the database.";