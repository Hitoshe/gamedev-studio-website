<?php require_once 'init.php'; ?>
<?php include 'templates/header.php'; ?>

<!-- Секция со слайдером игр -->
<section class="hero-slider">
    <!-- Slider main container -->
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide" style="background-image: url('/assets/images/94597305382d17e61d6e6b28375da18e.jpg');">
                <div class="hero-content">
                    <h1>BURDEN OF FLAME</h1>
                    <p><?php echo t('SLIDE_BOF_SLOGAN'); ?></p>
                    <a href="#" class="btn-buy"><?php echo t('HERO_BUTTON'); ?></a>
                </div>
            </div>
            <div class="swiper-slide" style="background-image: url('/assets/images/13bdcc60fb28ad4f025d9c290fe42bbd.jpg');">
                <div class="hero-content">
                    <h1>NITRO HEIST</h1>
                    <p><?php echo t('SLIDE_NH_SLOGAN'); ?></p>
                    <a href="#" class="btn-buy"><?php echo t('HERO_BUTTON'); ?></a>
                </div>
            </div>
            <div class="swiper-slide" style="background-image: url('/assets/images/a263b70ba9bb52b2f5c28e52e52a6dfc.jpg');">
                 <div class="hero-content">
                    <h1>SHADOW OF THE RONIN</h1>
                    <p><?php echo t('SLIDE_SOTR_SLOGAN'); ?></p>
                    <a href="#" class="btn-buy"><?php echo t('HERO_BUTTON'); ?></a>
                </div>
            </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>

<!-- БОКОВИНКИ -->
<div class="content-with-columns">

<!-- Секция новостей -->
<section class="news-section">
    <h2><?php echo t('LATEST_NEWS'); ?></h2>
    <div class="news-container">
        <!-- Сюда мы будем выводить новости из базы данных -->
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