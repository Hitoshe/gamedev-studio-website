<?php
require_once 'init.php';

// --- ЗАЩИТА: УДАЛИТЬ МОЖЕТ ТОЛЬКО АВТОРИЗОВАННЫЙ ПОЛЬЗОВАТЕЛЬ ---
if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit();
}
// -----------------------------------------------------------------

// Подключаемся к обеим базам данных
require 'db_connect.php'; // PostgreSQL
require 'admin/mongo_connect.php'; // MongoDB

try {
    // Получаем ID пользователя из сессии
    $user_id_to_delete = $_SESSION['user_id'];
    $user_email_to_delete = $_SESSION['user_email']; // для логов или других действий в будущем

    // --- УДАЛЕНИЕ ИЗ POSTGRESQL ---
    // Начинаем транзакцию для безопасности
    $pdo->beginTransaction();
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id_to_delete]);
    $pdo->commit();

    // --- УДАЛЕНИЕ ИЗ MONGODB ---
    // Удаляем все отзывы, оставленные этим пользователем
    $reviewsCollection->deleteMany(['user_id' => $user_id_to_delete]);

    // --- ЗАВЕРШЕНИЕ СЕССИИ ---
    $_SESSION = [];
    session_destroy();

    // Перенаправляем на главную страницу с сообщением об успехе (опционально)
    header('Location: /index.php?message=account_deleted');
    exit();

} catch (Exception $e) {
    // Если что-то пошло не так, откатываем транзакцию
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    // Можно записать ошибку в лог, а пользователю показать общее сообщение
    die("An error occurred while deleting your account. Please contact support. Error: " . $e->getMessage());
}