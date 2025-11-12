<?php
// Подключаем init.php и автозагрузчик Composer для PHPMailer
require_once 'init.php';
require_once __DIR__ . '/vendor/autoload.php';

// Используем классы из PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Подключаем шапку сайта
include 'templates/header.php';

// Переменные для хранения сообщений
$message = '';
$message_type = 'error'; // Тип сообщения: 'error' или 'success'

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Подключаемся к БД
    require 'db_connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = t('REGISTER_INVALID_EMAIL');
    } elseif (strlen($password) < 6) {
        $message = t('REGISTER_PASSWORD_TOO_SHORT');
    } else {
        try {
            // Создаем таблицу users со всеми необходимыми колонками СРАЗУ
            $pdo->exec("CREATE TABLE IF NOT EXISTS users (
                id SERIAL PRIMARY KEY,
                email VARCHAR(255) UNIQUE NOT NULL,
                password VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                is_active BOOLEAN DEFAULT FALSE NOT NULL,
                verification_token VARCHAR(255),
                role VARCHAR(50) DEFAULT 'user' NOT NULL
            )");
            
            $verification_token = bin2hex(random_bytes(32));
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO users (email, password, verification_token) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email, $hashed_password, $verification_token]);

            // --- Отправка Email с подтверждением ---
            $mail = new PHPMailer(true);
            try {
                // Настройки сервера Gmail
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'dragfiredragon4@gmail.com'; // GMAIL
                $mail->Password = 'ivvb quhk ltuz aiyv'; // ПАРОЛЬ ПРИЛОЖЕНИЯ
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->CharSet = 'UTF-8';

                // Отправитель и получатель
                $mail->setFrom('psoup.studio@gmail.com', 'PineappleSoup Studio');
                $mail->addAddress($email);

                // Контент письма
                $verification_link = "http://localhost:8080/verify.php?token=" . $verification_token;
                $mail->isHTML(true);
                $mail->Subject = t('REGISTER_EMAIL_SUBJECT');
                $mail->Body    = t('REGISTER_EMAIL_BODY_HTML') . "<br><a href='{$verification_link}'>{$verification_link}</a>";
                $mail->AltBody = t('REGISTER_EMAIL_BODY_TEXT') . $verification_link;

                $mail->send();

                $message = t('REGISTER_SUCCESS_MESSAGE');
                $message_type = 'success';

            } catch (Exception $e) {
                $message = t('REGISTER_EMAIL_ERROR') . " {$mail->ErrorInfo}";
            }

        } catch (PDOException $e) {
            if ($e->getCode() == 23505) {
                $message = t('REGISTER_EMAIL_EXISTS');
            } else {
                $message = t('REGISTER_DB_ERROR') . " " . $e->getMessage();
            }
        }
    }
}
?>

<!-- HTML форма для регистрации -->
<div class="form-container">
    <h2><?php echo t('HEADER_REGISTER'); ?></h2>
    
    <?php if ($message): ?>
        <p class="message <?php echo $message_type; ?>"><?php echo $message; ?></p>
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
        <button type="submit" class="btn-buy"><?php echo t('HEADER_REGISTER'); ?></button>
    </form>
</div>

<style>
/* Стили для формы и сообщений */
.form-container { max-width: 500px; margin: 5rem auto; padding: 2rem; background-color: var(--surface-color); border-radius: 5px; }
.form-group { margin-bottom: 1.5rem; }
.form-group label { display: block; margin-bottom: 0.5rem; font-family: var(--font-main); }
.form-group input { width: 100%; padding: 0.8rem; background-color: var(--bg-color); border: 1px solid var(--secondary-text-color); color: var(--primary-text-color); border-radius: 3px; }
.message { padding: 1rem; margin-bottom: 1rem; text-align: center; border-radius: 4px; }
.message.error { background-color: #5a2a2a; border: 1px solid #c83030; }
.message.success { background-color: #2a5a3b; border: 1px solid #30c86b; }
</style>

<?php include 'templates/footer.php'; ?>