 <?php require_once 'init.php'; ?>
<?php include 'templates/header.php'; ?>

<!-- Обертка для боковых колонн -->
<div class="content-with-columns">

    <div class="page-container about-page">
        <h1><?php echo t('ABOUT_TITLE'); ?></h1>

        <!-- Секция с описанием студии -->
        <section class="about-intro">
            <div class="about-intro-image">
                <!-- Одна из картинок со слайдера для атмосферы -->
                <img src="/assets/images/94597305382d17e61d6e6b28375da18e.jpg" alt="Studio Atmosphere">
            </div>
            <div class="about-intro-text">
                <h2><?php echo t('ABOUT_INTRO_HEADING'); ?></h2>
                <p><?php echo t('ABOUT_INTRO_TEXT'); ?></p>
            </div>
        </section>

        <!-- Секция с командой -->
        <section class="team-section">
            <h2><?php echo t('ABOUT_TEAM_HEADING'); ?></h2>
            <div class="team-grid">
                
                <div class="team-member">
                    <div class="team-member-photo">
                        <!-- Заглушка для фото. -->
                        <img src="https://via.placeholder.com/250" alt="Team Member 1 Photo">
                    </div>
                    <h3><?php echo t('ABOUT_TEAM_MEMBER_1'); ?></p></h3>
                    <p class="team-member-role"><?php echo t('ABOUT_TEAM_MEMBER_1_ROLE'); ?></p>
                </div>

                <div class="team-member">
                    <div class="team-member-photo">
                        <!-- Заглушка для фото. -->
                        <img src="https://via.placeholder.com/250" alt="Team Member 2 Photo">
                    </div>
                    <h3><?php echo t('ABOUT_TEAM_MEMBER_2'); ?></p></h3>
                    <p class="team-member-role"><?php echo t('ABOUT_TEAM_MEMBER_2_ROLE'); ?></p>
                </div>

            </div>
        </section>

    </div>
</div>

<?php include 'templates/footer.php'; ?>
