<?php
require_once '../init.php';

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header('Location: /login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'mongo_connect.php';
    
    // Получаем данные для обоих языков
    $title_en = $_POST['title_en'];
    $content_en = $_POST['content_en'];
    $title_ru = $_POST['title_ru'];
    $content_ru = $_POST['content_ru'];

    if (!empty($title_en) && !empty($content_en)) {
        // Собираем документ
        $newsCollection->insertOne([
            'title' => [
                'en' => $title_en,
                'ru' => $title_ru,
            ],
            'content' => [
                'en' => $content_en,
                'ru' => $content_ru,
            ],
            'created_at' => new MongoDB\BSON\UTCDateTime()
        ]);
        header('Location: /admin/index.php');
        exit();
    }
}

include '../templates/header.php';
?>
<div class="content-with-columns">
<div class="page-container">
    <h1>Add New News Post</h1>
    <form method="POST" action="add_news.php" class="form-container">
        
        <!-- English Fields -->
        <fieldset style="border: 1px solid var(--accent-color); padding: 1rem; margin-bottom: 2rem;">
            <legend style="padding: 0 0.5rem; color: var(--accent-color);">English</legend>
            <div class="form-group">
                <label for="title_en">Title (EN):</label>
                <input type="text" id="title_en" name="title_en" required>
            </div>
            <div class="form-group">
                <label for="content_en">Content (EN):</label>
                <textarea id="content_en" name="content_en" rows="10" required style="width: 100%;"></textarea>
            </div>
        </fieldset>

        <!-- Russian Fields -->
        <fieldset style="border: 1px solid #555; padding: 1rem; margin-bottom: 2rem;">
            <legend style="padding: 0 0.5rem; color: #888;">Русский</legend>
            <div class="form-group">
                <label for="title_ru">Заголовок (RU):</label>
                <input type="text" id="title_ru" name="title_ru">
            </div>
            <div class="form-group">
                <label for="content_ru">Содержимое (RU):</label>
                <textarea id="content_ru" name="content_ru" rows="10" style="width: 100%;"></textarea>
            </div>
        </fieldset>

        <button type="submit" class="btn-buy">Publish Post</button>
    </form>
</div>
</div>
<?php include '../templates/footer.php'; ?>