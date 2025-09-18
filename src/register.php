<?php
// Подключаем шапку сайта
include 'templates/header.php';

// Переменная для хранения сообщений (успех или ошибка)
$message = '';

// Проверяем, была ли отправлена форма (метод POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Подключаемся к БД
    require 'db_connect.php';

    // Получаем данные из формы
    $email = $_POST['email'];
    $password = $_POST['password'];

    // --- Простая валидация ---
    // В реальном проекте валидация должна быть гораздо серьезнее!
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Неверный формат email.";
    } elseif (strlen($password) < 6) {
        $message = "Пароль должен быть не менее 6 символов.";
    } else {
        // Хешируем пароль - НИКОГДА не храните пароли в открытом виде!
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Подготавливаем SQL-запрос для вставки нового пользователя
            // Сначала создадим таблицу, если ее нет
            $pdo->exec("CREATE TABLE IF NOT EXISTS users (
                id SERIAL PRIMARY KEY,
                email VARCHAR(255) UNIQUE NOT NULL,
                password VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )");

            $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email, $hashed_password]);

            $message = "Регистрация прошла успешно!";

        } catch (PDOException $e) {
            // Проверяем, если ошибка связана с дубликатом email
            if ($e->getCode() == 23505) {
                $message = "Этот email уже зарегистрирован.";
            } else {
                $message = "Ошибка регистрации: " . $e->getMessage();
            }
        }
    }
}
?>

<!-- HTML форма для регистрации -->
<div class="form-container">
    <h2>Registration</h2>
    
    <?php if ($message): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="register.php" method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn-buy">Register</button>
    </form>
</div>

<style>
/* Простые стили для формы, можно вынести в style.css */
.form-container {
    max-width: 500px;
    margin: 5rem auto;
    padding: 2rem;
    background-color: var(--surface-color);
    border-radius: 5px;
}
.form-group {
    margin-bottom: 1.5rem;
}
.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-family: var(--font-main);
}
.form-group input {
    width: 100%;
    padding: 0.8rem;
    background-color: var(--bg-color);
    border: 1px solid var(--secondary-text-color);
    color: var(--primary-text-color);
    border-radius: 3px;
}
.message {
    padding: 1rem;
    background-color: #5a2a2a;
    border: 1px solid #c83030;
    margin-bottom: 1rem;
    text-align: center;
}
</style>

<?php include 'templates/footer.php'; ?>