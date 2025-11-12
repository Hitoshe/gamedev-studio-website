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

    <!-- Font Awesome для иконок -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
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
                <li><a href="/"><?php echo t('HEADER_HOME'); ?></a></li>
                <li><a href="/about.php"><?php echo t('HEADER_ABOUT'); ?></a></li>
                <li><a href="/games.php"><?php echo t('HEADER_GAMES'); ?></a></li>
                <li><a href="/faq.php"><?php echo t('HEADER_FAQ'); ?></a></li>
                <li><a href="/careers.php"><?php echo t('HEADER_CAREERS'); ?></a></li>
                <li><a href="#"><?php echo t('HEADER_MERCH'); ?></a></li>
            </ul>
        </nav>

        <div class="header-right-panel">
            
            <!-- Переключатель языков -->
            <div class="lang-switcher">
                <a href="?lang=en" class="<?php echo $_SESSION['lang'] == 'en' ? 'active' : ''; ?>">EN</a>
                <a href="?lang=ru" class="<?php echo $_SESSION['lang'] == 'ru' ? 'active' : ''; ?>">RU</a>
            </div>

            <!-- ============================================= -->
            <!-- НОВЫЙ БЛОК: ССЫЛКА НА АДМИН-ПАНЕЛЬ ДЛЯ АДМИНОВ -->
            <!-- ============================================= -->
            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true): ?>
                <div class="admin-link">
                    <a href="/admin/index.php">Admin Panel</a>
                </div>
            <?php endif; ?>
            <!-- ============================================= -->

            <!-- Ссылки для авторизации/пользователя -->
            <div class="auth-links">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- Если пользователь авторизован -->
                    <span class="user-email"><?php echo htmlspecialchars($_SESSION['user_email']); ?></span>
                    <a href="/logout.php"><?php echo t('HEADER_LOGOUT'); ?></a>
                <?php else: ?>
                    <!-- Если пользователь гость -->
                    <a href="/login.php"><?php echo t('HEADER_LOGIN'); ?></a>
                    <a href="/register.php"><?php echo t('HEADER_REGISTER'); ?></a>
                <?php endif; ?>
            </div>

            <script src="/assets/js/script.js"></script>
            
        </div> 

    </header>
    <main>