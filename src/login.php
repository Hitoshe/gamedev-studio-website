<?php
// 1. НАЧИНАЕМ СЕССИЮ. ВСЕГДА В САМОМ ВЕРХУ.
session_start();

// 2. СРАЗУ ПРОВЕРЯЕМ, НЕ АВТОРИЗОВАН ЛИ ПОЛЬЗОВАТЕЛЬ.
// Если да, то делаем редирект ДО вывода любого HTML.
if (isset($_SESSION['user_id'])) {
    header('Location: /');
    exit();
}

$message = '';

// 3. ВСЯ ЛОГИКА ОБРАБОТКИ ФОРМЫ ИДЕТ ЗДЕСЬ.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db_connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Успешный логин!
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];

        // Делаем редирект. Это сработает, потому что HTML еще не выводился.
        header('Location: /');
        exit(); // Завершаем скрипт

    } else {
        $message = "Неверный email или пароль.";
    }
}

// 4. И ТОЛЬКО ТЕПЕРЬ, КОГДА ВСЯ ЛОГИКА ЗАВЕРШЕНА, ПОДКЛЮЧАЕМ HTML.
include 'templates/header.php';
?>

<!-- HTML форма для входа -->
<div class="form-container">
    <h2>Login</h2>
    
    <?php if ($message): ?>
        <p class="message"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn-buy">Login</button>
    </form>
</div>

<!-- Стили можно взять из register.php или вынести в общий style.css -->
<style>
.form-container { max-width: 500px; margin: 5rem auto; padding: 2rem; background-color: var(--surface-color); border-radius: 5px; }
.form-group { margin-bottom: 1.5rem; }
.form-group label { display: block; margin-bottom: 0.5rem; font-family: var(--font-main); }
.form-group input { width: 100%; padding: 0.8rem; background-color: var(--bg-color); border: 1px solid var(--secondary-text-color); color: var(--primary-text-color); border-radius: 3px; }
.message { padding: 1rem; background-color: #5a2a2a; border: 1px solid #c83030; margin-bottom: 1rem; text-align: center; }
</style>

<?php include 'templates/footer.php'; ?>