<?php
// Начинаем сессию на каждой странице, чтобы иметь доступ к $_SESSION
// Проверяем, не была ли сессия уже запущена
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PineappleSoup</title>
    
    <!-- Подключаем шрифты с Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap" rel="stylesheet">
    
    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    
    <!-- Подключаем наш файл стилей (должен идти последним из стилей) -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header class="main-header">
        <div class="logo">
            <a href="/">PineappleSoup</a>
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about.php">About</a></li>
                <li><a href="/games.php">Games</a></li>
                <li><a href="#">FAQ's</a></li>
                <li><a href="#">Social</a></li>
                <li><a href="#">Merch</a></li>
            </ul>
        </nav>
        <div class="auth-links">
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Если пользователь авторизован, показываем его email и кнопку выхода -->
                <span class="user-email"><?php echo htmlspecialchars($_SESSION['user_email']); ?></span>
                <a href="/logout.php" class="auth-link">Logout</a>
            <?php else: ?>
                <!-- Если пользователь гость, показываем кнопки входа и регистрации -->
                <a href="/login.php" class="auth-link">Login</a>
                <a href="/register.php" class="auth-link">Register</a>
            <?php endif; ?>
        </div>
    </header>
    <main>