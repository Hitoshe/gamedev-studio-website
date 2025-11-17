<?php
require_once 'init.php'; // Подключаем init для работы с сессиями

// Проверяем, что запрос был отправлен методом POST и содержит ID товара
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = (string)$_POST['product_id'];

    // Проверяем, существует ли корзина и есть ли в ней такой товар
    if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$product_id])) {
        // Удаляем товар из массива корзины
        unset($_SESSION['cart'][$product_id]);
    }
}

// В любом случае, перенаправляем пользователя обратно в корзину
header('Location: /cart.php');
exit();