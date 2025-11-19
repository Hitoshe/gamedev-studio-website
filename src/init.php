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

// =======================================================
// --- МУЛЬТИВАЛЮТНОСТЬ ---
// =======================================================

// 1. Список поддерживаемых валют (код => символ)
$supported_currencies = [
    'USD' => '$',
    'EUR' => '€',
    'RUB' => '₽',
    'BYN' => 'BYN',
    'CNY' => '¥'
];

// 2. Примерные курсы относительно USD (1 USD = X другой валюты)
//    В будущем данные нужно получать через API.
$exchange_rates = [
    'USD' => 1,
    'EUR' => 0.92,  // 1 USD = 0.92 EUR
    'RUB' => 90.50, // 1 USD = 90.50 RUB
    'BYN' => 3.25,  // 1 USD = 3.25 BYN
    'CNY' => 7.25   // 1 USD = 7.25 CNY
];

// 3. Валюта по умолчанию
$default_currency = 'USD';

// 4. Логика определения валюты
if (isset($_GET['currency']) && array_key_exists($_GET['currency'], $supported_currencies)) {
    $_SESSION['currency'] = $_GET['currency'];
}
if (!isset($_SESSION['currency'])) {
    $_SESSION['currency'] = $default_currency;
}

// 5. Глобальная переменная с текущей валютой
$current_currency = $_SESSION['currency'];

// 6. Вспомогательная функция для форматирования цены
function format_price($price_in_usd) {
    global $current_currency, $exchange_rates, $supported_currencies;

    // Конвертируем цену из USD в текущую валюту
    $converted_price = $price_in_usd * $exchange_rates[$current_currency];
    
    // Получаем символ валюты
    $currency_symbol = $supported_currencies[$current_currency];

    // Форматируем число (2 знака после запятой)
    $formatted_price = number_format($converted_price, 2);

    // Возвращаем строку вида "$24.99" или "2256.55 ₽"
    if ($current_currency === 'USD' || $current_currency === 'EUR' || $current_currency === 'CNY') {
        return $currency_symbol . $formatted_price; // Символ перед числом
    } else {
        return $formatted_price . ' ' . $currency_symbol; // Символ после числа
    }
}