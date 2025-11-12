<?php
require_once '../init.php'; // Подключаем init для сессий

// --- ЗАЩИТА АДМИН-ПАНЕЛИ ---
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header('Location: /login.php'); // Если не админ, отправляем на логин
    exit();
}
// ----------------------------

require_once 'mongo_connect.php'; // Подключаемся к MongoDB

// Логика удаления новости
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $newsCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($delete_id)]);
    header('Location: /admin/index.php'); // Перезагружаем страницу
    exit();
}

// Получаем все новости, сортируем по дате (новые сверху)
$posts = $newsCollection->find([], ['sort' => ['created_at' => -1]]);

include '../templates/header.php';
?>
<div class="content-with-columns">
<div class="page-container">
    <h1>Admin Panel: Manage News</h1>
    <a href="add_news.php" class="btn-buy">Add New Post</a>
    <hr style="margin: 2rem 0;">

    <?php foreach ($posts as $post): ?>
    <div class="job-item" style="display:flex; justify-content:space-between; align-items:center;">
        <div>
            <h3><?php echo htmlspecialchars($post['title']['en'] ?? 'No English Title'); ?></h3>
            <p style="font-size: 0.8em; color: var(--secondary-text-color);">
                Posted on: <?php echo $post['created_at']->toDateTime()->format('Y-m-d H:i'); ?>
            </p>
        </div>
        <form method="POST" action="index.php" onsubmit="return confirm('Are you sure you want to delete this post?');">
            <input type="hidden" name="delete_id" value="<?php echo $post['_id']; ?>">
            <button type="submit" class="btn-apply" style="background-color:#c83030;">Delete</button>
        </form>
    </div>
    <?php endforeach; ?>
</div>
</div>
<?php include '../templates/footer.php'; ?>