<?php
require_once 'init.php';

// Список наших вакансий
$jobs = [
    'programmer' => 'JOB_PROGRAMMER_TITLE',
    'artist' => 'JOB_ARTIST_TITLE',
    'sound' => 'JOB_SOUND_TITLE'
];

$form_submitted_successfully = false;

// --- Обработка отправленной формы ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_slug = $_POST['job_title'];
    $cover_letter = $_POST['cover_letter'];
    
    // --- Обработка загруженного файла ---
    if (isset($_FILES['cv_file']) && $_FILES['cv_file']['error'] == 0) {
        $target_dir = "uploads/";
        // Создаем уникальное имя файла, чтобы избежать перезаписи
        $original_name = basename($_FILES["cv_file"]["name"]);
        $target_file = $target_dir . time() . '_' . $original_name;

        // Перемещаем файл из временной папки в нашу папку 'uploads'
        if (move_uploaded_file($_FILES["cv_file"]["tmp_name"], $target_file)) {
            // Файл успешно загружен. Симулируем отправку и показываем сообщение об успехе.
            $form_submitted_successfully = true;
        } else {
            // Ошибка при перемещении файла
            $message = "Sorry, there was an error uploading your file.";
            $message_type = 'error';
        }
    } else {
        $message = "Error: No file uploaded or upload error.";
        $message_type = 'error';
    }
}

// Получаем выбранную вакансию из URL для предзаполнения
$selected_job = $_GET['job'] ?? '';

include 'templates/header.php';
?>

<div class="content-with-columns">
<div class="page-container apply-page">

    <?php if ($form_submitted_successfully): ?>
        <!-- Сообщение об успехе -->
        <div style="text-align: center;">
            <h1><?php echo t('APPLY_SUCCESS_TITLE'); ?></h1>
            <p><?php echo t('APPLY_SUCCESS_TEXT'); ?></p>
            <a href="/careers.php" class="btn-buy"><?php echo t('APPLY_GO_BACK'); ?></a>
        </div>
    <?php else: ?>
        <!-- Форма подачи заявки -->
        <h1><?php echo t('APPLY_TITLE'); ?></h1>

        <?php if (!empty($message)): ?>
            <p class="message <?php echo $message_type; ?>"><?php echo $message; ?></p>
        <?php endif; ?>

        <!-- ВАЖНО: enctype="multipart/form-data" ОБЯЗАТЕЛЕН для загрузки файлов -->
        <form action="apply.php" method="POST" enctype="multipart/form-data" class="form-container">
            
            <div class="form-group">
                <label for="job_title"><?php echo t('APPLY_JOB_TITLE_LABEL'); ?></label>
                <select id="job_title" name="job_title" required style="width: 100%; padding: 0.8rem;">
                    <option value=""><?php echo t('APPLY_SELECT_JOB'); ?></option>
                    <?php foreach ($jobs as $slug => $translation_key): ?>
                        <option value="<?php echo $slug; ?>" <?php if ($slug === $selected_job) echo 'selected'; ?>>
                            <?php echo t($translation_key); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="cv_file"><?php echo t('APPLY_CV_LABEL'); ?></label>
                <input type="file" id="cv_file" name="cv_file" required accept=".pdf,.doc,.docx">
            </div>

            <div class="form-group">
                <label for="cover_letter"><?php echo t('APPLY_COVER_LETTER_LABEL'); ?></label>
                <textarea id="cover_letter" name="cover_letter" rows="8" style="width: 100%;"></textarea>
            </div>

            <button type="submit" class="btn-buy"><?php echo t('APPLY_SUBMIT_BUTTON'); ?></button>
        </form>
    <?php endif; ?>

</div>
</div>

<?php include 'templates/footer.php'; ?>