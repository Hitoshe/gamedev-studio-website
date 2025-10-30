<?php
require_once 'init.php';
require 'db_connect.php';
include 'templates/header.php';

$message = '';
$message_type = 'error';

// Проверяем, был ли передан токен в URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Ищем пользователя с таким токеном
    $sql = "SELECT * FROM users WHERE verification_token = ? AND is_active = FALSE";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        // Если пользователь найден, активируем его и удаляем токен
        $sql_update = "UPDATE users SET is_active = TRUE, verification_token = NULL WHERE id = ?";
        $stmt_update = $pdo->prepare($sql_update);
        $stmt_update->execute([$user['id']]);

        $message = 'Ваш аккаунт успешно подтвержден! Теперь вы можете войти.';
        $message_type = 'success';
    } else {
        // Если токен не найден или аккаунт уже активен
        $message = 'Неверный или устаревший токен подтверждения.';
    }
} else {
    $message = 'Токен подтверждения не был предоставлен.';
}
?>

<div class="page-container" style="text-align: center;">
    <h1>Account Verification</h1>
    <p class="message <?php echo $message_type; ?>"><?php echo htmlspecialchars($message); ?></p>
    <?php if ($message_type == 'success'): ?>
        <a href="/login.php" class="btn-buy">Go to Login</a>
    <?php endif; ?>
</div>

<?php include 'templates/footer.php'; ?>