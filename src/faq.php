<?php require_once 'init.php'; ?>
<?php include 'templates/header.php'; ?>

<!-- Добавляем обертку для боковых колонн, если нужно -->
<div class="content-with-columns">

    <div class="page-container">
        <h1><?php echo t('FAQ_TITLE'); ?></h1>
        
        <div class="faq-item">
            <h3><?php echo t('FAQ_Q1_TITLE'); ?></h3>
            <p><?php echo t('FAQ_Q1_TEXT'); ?></p>
        </div>

        <div class="faq-item">
            <h3><?php echo t('FAQ_Q2_TITLE'); ?></h3>
            <p><?php echo t('FAQ_Q2_TEXT'); ?></p>
        </div>

        <div class="faq-item">
            <h3><?php echo t('FAQ_Q3_TITLE'); ?></h3>
            <p><?php echo t('FAQ_Q3_TEXT'); ?></p>
        </div>

        <div class="faq-item">
            <h3><?php echo t('FAQ_Q4_TITLE'); ?></h3>
            <p><?php echo t('FAQ_Q4_TEXT'); ?></p>
        </div>

        <!-- Больше вопросов и ответов по мере необходимости -->

    </div>

    <style>
    /* Стили для этой страницы, можно вынести в style.css */
    .page-container {
        padding: 4rem 10%;
        max-width: 900px;
        margin: 0 auto;
    }
    .faq-item {
        margin-bottom: 2rem;
        border-bottom: 1px solid #333;
        padding-bottom: 1.5rem;
    }
    .faq-item h3 {
        color: var(--accent-color);
    }
    </style>

</div> <!-- Конец .content-with-columns -->

<?php include 'templates/footer.php'; ?>