<?php require_once 'init.php'; ?>
<?php include 'templates/header.php'; ?>

<!-- Добавляем обертку для боковых колонн -->
<div class="content-with-columns">

    <!-- Основной контейнер страницы вакансий -->
    <div class="page-container careers-page">
        
        <h1><?php echo t('CAREERS_TITLE'); ?></h1>
        <p class="page-intro"><?php echo t('CAREERS_INTRO'); ?></p>

        <!-- Контейнер для списка вакансий -->
        <div class="job-listings">

            <!-- ВАКАНСИЯ 1: UE5 ПРОГРАММИСТ -->
            <article class="job-item">
                <h3><?php echo t('JOB_PROGRAMMER_TITLE'); ?></h3>
                <p><?php echo t('JOB_PROGRAMMER_DESC'); ?></p>
                
                <h4><?php echo t('CAREERS_RESPONSIBILITIES'); ?></h4>
                <ul>
                    <li><?php echo t('JOB_PROGRAMMER_R1'); ?></li>
                    <li><?php echo t('JOB_PROGRAMMER_R2'); ?></li>
                    <li><?php echo t('JOB_PROGRAMMER_R3'); ?></li>
                    <li><?php echo t('JOB_PROGRAMMER_R4'); ?></li>
                </ul>

                <h4><?php echo t('CAREERS_QUALIFICATIONS'); ?></h4>
                <ul>
                    <li><?php echo t('JOB_PROGRAMMER_Q1'); ?></li>
                    <li><?php echo t('JOB_PROGRAMMER_Q2'); ?></li>
                    <li><?php echo t('JOB_PROGRAMMER_Q3'); ?></li>
                    <li><?php echo t('JOB_PROGRAMMER_Q4'); ?></li>
                </ul>
                <a href="/apply.php?job=programmer" class="btn-apply"><?php echo t('CAREERS_APPLY_NOW'); ?></a>
            </article>

            <!-- ВАКАНСИЯ 2: 3D ХУДОЖНИК -->
            <article class="job-item">
                <h3><?php echo t('JOB_ARTIST_TITLE'); ?></h3>
                <p><?php echo t('JOB_ARTIST_DESC'); ?></p>

                <h4><?php echo t('CAREERS_RESPONSIBILITIES'); ?></h4>
                <ul>
                    <li><?php echo t('JOB_ARTIST_R1'); ?></li>
                    <li><?php echo t('JOB_ARTIST_R2'); ?></li>
                    <li><?php echo t('JOB_ARTIST_R3'); ?></li>
                    <li><?php echo t('JOB_ARTIST_R4'); ?></li>
                </ul>

                <h4><?php echo t('CAREERS_QUALIFICATIONS'); ?></h4>
                <ul>
                    <li><?php echo t('JOB_ARTIST_Q1'); ?></li>
                    <li><?php echo t('JOB_ARTIST_Q2'); ?></li>
                    <li><?php echo t('JOB_ARTIST_Q3'); ?></li>
                    <li><?php echo t('JOB_ARTIST_Q4'); ?></li>
                </ul>
                <a href="/apply.php?job=artist" class="btn-apply"><?php echo t('CAREERS_APPLY_NOW'); ?></a>
            </article>

            <!-- ВАКАНСИЯ 3: ЗВУКОВОЙ ДИЗАЙНЕР -->
            <article class="job-item">
                <h3><?php echo t('JOB_SOUND_TITLE'); ?></h3>
                <p><?php echo t('JOB_SOUND_DESC'); ?></p>
                
                <h4><?php echo t('CAREERS_RESPONSIBILITIES'); ?></h4>
                <ul>
                    <li><?php echo t('JOB_SOUND_R1'); ?></li>
                    <li><?php echo t('JOB_SOUND_R2'); ?></li>
                    <li><?php echo t('JOB_SOUND_R3'); ?></li>
                    <li><?php echo t('JOB_SOUND_R4'); ?></li>
                </ul>

                <h4><?php echo t('CAREERS_QUALIFICATIONS'); ?></h4>
                <ul>
                    <li><?php echo t('JOB_SOUND_Q1'); ?></li>
                    <li><?php echo t('JOB_SOUND_Q2'); ?></li>
                    <li><?php echo t('JOB_SOUND_Q3'); ?></li>
                    <li><?php echo t('JOB_SOUND_Q4'); ?></li>
                </ul>
                <a href="/apply.php?job=sound" class="btn-apply"><?php echo t('CAREERS_APPLY_NOW'); ?></a>

        </div>
    </div>
    
</div> <!-- Конец .content-with-columns -->

<?php include 'templates/footer.php'; ?>