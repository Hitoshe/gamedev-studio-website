<?php require_once 'init.php'; ?>
<?php include 'templates/header.php'; ?>

<!-- Обертка для боковых колонн -->
<div class="content-with-columns">
    <div class="page-container games-page">
        <h1><?php echo t('GAMES_TITLE'); ?></h1>

        <!-- ИГРА 1: BURDEN OF FLAME -->
        <article class="game-entry">
            <div class="game-gallery">
                <!-- Главное изображение, как на слайдере -->
                <img src="/assets/images/94597305382d17e61d6e6b28375da18e.jpg" alt="Burden of Flame Screenshot">
            </div>
            <div class="game-info">
                <h2>BURDEN OF FLAME</h2>
                <p><?php echo t('GAME_BOF_DESC'); ?></p>
                <!-- Реальная ссылка на Steam -->
                <a href="#" class="btn-buy steam-link" target="_blank"><i class="fab fa-steam"></i> <?php echo t('GAME_VISIT_STEAM'); ?></a>
            </div>
        </article>

        <!-- ИГРА 2: NITRO HEIST -->
        <article class="game-entry">
            <div class="game-gallery">
                <img src="/assets/images/13bdcc60fb28ad4f025d9c290fe42bbd.jpg" alt="Nitro Heist Screenshot">
            </div>
            <div class="game-info">
                <h2>NITRO HEIST</h2>
                <p><?php echo t('GAME_NH_DESC'); ?></p>
                <a href="#" class="btn-buy steam-link" target="_blank"><i class="fab fa-steam"></i> <?php echo t('GAME_VISIT_STEAM'); ?></a>
            </div>
        </article>

        <!-- ИГРА 3: SHADOW OF THE RONIN -->
        <article class="game-entry">
            <div class="game-gallery">
                <img src="/assets/images/a263b70ba9bb52b2f5c28e52e52a6dfc.jpg" alt="Shadow of the Ronin Screenshot">
            </div>
            <div class="game-info">
                <h2>SHADOW OF THE RONIN</h2>
                <p><?php echo t('GAME_SOTR_DESC'); ?></p>
                <a href="#" class="btn-buy steam-link" target="_blank"><i class="fab fa-steam"></i> <?php echo t('GAME_VISIT_STEAM'); ?></a>
            </div>
        </article>
        
    </div>
</div>

<?php include 'templates/footer.php'; ?>
