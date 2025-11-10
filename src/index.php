<?php require_once 'init.php'; ?>
<?php include 'templates/header.php'; ?>

<!-- УЛУЧШЕННАЯ СЕКЦИЯ СО СЛАЙДЕРОМ -->
<section class="hero-slider">
    <!-- Главный контейнер Swiper -->
    <div class="swiper">
        <div class="swiper-wrapper">

            <!-- СЛАЙД 1: BURDEN OF FLAME -->
            <div class="swiper-slide" style="background-image: url('/assets/images/94597305382d17e61d6e6b28375da18e.jpg');">
                <div class="slide-grid">
                    <div class="hero-content">
                        <h1>BURDEN OF FLAME</h1>
                        <p><?php echo t('SLIDE_BOF_SLOGAN'); ?></p>
                        <a href="#" class="btn-buy"><?php echo t('HERO_BUTTON'); ?></a>
                    </div>
                    <div class="media-slider">
                        <!-- ИСПРАВЛЕНО: Добавлен уникальный класс swiper-bof -->
                        <div class="swiper swiper-nested swiper-bof">
                            <div class="swiper-wrapper">
                                <!-- ЗАМЕНИТЕ НА ВАШИ СКРИНШОТЫ -->
                                <div class="swiper-slide"><img src="/assets/images/screenshots/bof_ss1.jpg" alt="Burden of Flame Screenshot 1"></div>
                                <div class="swiper-slide"><img src="/assets/images/screenshots/bof_ss2.jpg" alt="Burden of Flame Screenshot 2"></div>
                                <div class="swiper-slide"><img src="/assets/images/screenshots/bof_ss3.jpg" alt="Burden of Flame Screenshot 3"></div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- СЛАЙД 2: NITRO HEIST -->
            <div class="swiper-slide" style="background-image: url('/assets/images/13bdcc60fb28ad4f025d9c290fe42bbd.jpg');">
                <div class="slide-grid">
                    <div class="hero-content">
                        <h1>NITRO HEIST</h1>
                        <p><?php echo t('SLIDE_NH_SLOGAN'); ?></p>
                        <a href="#" class="btn-buy"><?php echo t('HERO_BUTTON'); ?></a>
                    </div>
                    <div class="media-slider">
                        <!-- ИСПРАВЛЕНО: Добавлен уникальный класс swiper-nh -->
                        <div class="swiper swiper-nested swiper-nh">
                            <div class="swiper-wrapper">
                                <!-- ЗАМЕНИТЕ НА ВАШИ СКРИНШОТЫ -->
                                <div class="swiper-slide"><img src="/assets/images/screenshots/nh_ss1.jpg" alt="Nitro Heist Screenshot 1"></div>
                                <div class="swiper-slide"><img src="/assets/images/screenshots/nh_ss2.jpg" alt="Nitro Heist Screenshot 2"></div>
                                <div class="swiper-slide"><img src="/assets/images/screenshots/nh_ss3.jpg" alt="Nitro Heist Screenshot 3"></div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- СЛАЙД 3: SHADOW OF THE RONIN -->
            <div class="swiper-slide" style="background-image: url('/assets/images/a263b70ba9bb52b2f5c28e52e52a6dfc.jpg');">
                <div class="slide-grid">
                    <div class="hero-content">
                        <h1>SHADOW OF THE RONIN</h1>
                        <p><?php echo t('SLIDE_SOTR_SLOGAN'); ?></p>
                        <a href="#" class="btn-buy"><?php echo t('HERO_BUTTON'); ?></a>
                    </div>
                    <div class="media-slider">
                        <!-- ИСПРАВЛЕНО: Добавлен уникальный класс swiper-sotr -->
                        <div class="swiper swiper-nested swiper-sotr">
                            <div class="swiper-wrapper">
                                <!-- ЗАМЕНИТЕ НА ВАШИ СКРИНШОТЫ -->
                                <div class="swiper-slide"><img src="/assets/images/screenshots/sotr_ss1.jpg" alt="Shadow of the Ronin Screenshot 1"></div>
                                <div class="swiper-slide"><img src="/assets/images/screenshots/sotr_ss2.jpg" alt="Shadow of the Ronin Screenshot 2"></div>
                                <div class="swiper-slide"><img src="/assets/images/screenshots/sotr_ss3.jpg" alt="Shadow of the Ronin Screenshot 3"></div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Элементы управления главным слайдером -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>

<!-- БОКОВИНКИ -->
<div class="content-with-columns">

<!-- Секция новостей (остается без изменений) -->
<section class="news-section">
    <h2><?php echo t('LATEST_NEWS'); ?></h2>
    <div class="news-container">
        <!-- ... ваши новости ... -->
        <article class="news-item">
            <h3><?php echo t('NEWS_PREALPHA_TITLE'); ?></h3>
            <p><?php echo t('NEWS_PREALPHA_TEXT'); ?> <a href="#"><?php echo t('NEWS_READ_MORE'); ?></a></p>
        </article>
        <article class="news-item">
            <h3><?php echo t('NEWS_MERCH_TITLE'); ?></h3>
            <p><?php echo t('NEWS_MERCH_TEXT'); ?> <a href="#"><?php echo t('NEWS_READ_MORE'); ?></a></p>
        </article>
        <article class="news-item">
            <h3><?php echo t('NEWS_STEAM_TITLE'); ?></h3>
            <p><?php echo t('NEWS_STEAM_TEXT'); ?> <a href="#"><?php echo t('NEWS_READ_MORE'); ?></a></p>
        </article>
        <article class="news-item">
            <h3><?php echo t('NEWS_DEVDIARY_TITLE'); ?></h3>
            <p><?php echo t('NEWS_DEVDIARY_TEXT'); ?> <a href="#"><?php echo t('NEWS_READ_MORE'); ?></a></p>
        </article>
    </div>
</section>

<?php include 'templates/footer.php'; ?>