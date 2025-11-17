<?php
require_once 'init.php';

// Проверяем, что пользователь авторизован. Гости не могут "покупать".
if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit();
}

$cart_items = $_SESSION['cart'] ?? [];

if (!empty($cart_items)) {
    // Получаем ID всех товаров из корзины
    $product_ids = array_keys($cart_items);

    // Инициализируем массив "купленных" товаров, если его нет
    if (!isset($_SESSION['purchased_items'])) {
        $_SESSION['purchased_items'] = [];
    }

    // Добавляем ID купленных товаров в сессию, избегая дубликатов
    $_SESSION['purchased_items'] = array_unique(array_merge($_SESSION['purchased_items'], $product_ids));

    // Очищаем корзину
    $_SESSION['cart'] = [];

    // Перенаправляем на страницу благодарности
    header('Location: /thank_you.php');
    exit();
} else {
    // Если корзина пуста, возвращаем в магазин
    header('Location: /merch.php');
    exit();
}