<?php
// Проверяем, не была ли сессия уже запущена, и только тогда запускаем
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Список поддерживаемых языков
$supported_langs = ['en', 'ru'];

// Язык по умолчанию
$default_lang = 'en';

// --- Логика определения языка ---

// 1. Проверяем, если язык был передан в URL (например, ?lang=ru)
if (isset($_GET['lang']) && in_array($_GET['lang'], $supported_langs)) {
    // Если да, сохраняем его в сессию
    $_SESSION['lang'] = $_GET['lang'];
}

// 2. Если в сессии нет языка, устанавливаем язык по умолчанию
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = $default_lang;
}

// 3. Загружаем нужный языковой файл
$lang_file = __DIR__ . '/languages/' . $_SESSION['lang'] . '.php';
if (file_exists($lang_file)) {
    $t = require $lang_file; // $t будет содержать наш массив с переводами
} else {
    // Если файл не найден, загружаем английский по умолчанию
    $t = require __DIR__ . '/languages/en.php';
}

// --- Вспомогательная функция для перевода ---
// Она делает код чище: вместо $t['KEY'] можно писать t('KEY')
function t($key) {
    global $t;
    return $t[$key] ?? $key; // Если ключ не найден, возвращаем сам ключ
}