<?php require_once 'init.php'; ?>
<?php include 'templates/header.php'; ?>

<!-- Добавляем обертку для боковых колонн -->
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
        <section class="faq-form-section">
            <h2><?php echo t('FAQ_FORM_TITLE'); ?></h2>
            <p><?php echo t('FAQ_FORM_TEXT'); ?></p>
                <form action="faq.php" method="POST" class="form-container">
                    <div class="form-group">
                        <label for="email"><?php echo t('FAQ_FORM_EMAIL_LABEL'); ?></label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="question"><?php echo t('FAQ_FORM_QUESTION_LABEL'); ?></label>
                        <textarea id="question" name="question" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn-buy"><?php echo t('FAQ_FORM_SUBMIT_BUTTON'); ?></button>
                </form>
        </section>

    </div>


</div> <!-- Конец .content-with-columns -->

<?php include 'templates/footer.php'; ?>