<?php
require_once 'init.php';
include 'templates/header.php';

// --- ПОДКЛЮЧАЕМСЯ К MONGODB И ПОЛУЧАЕМ НОВОСТИ ---
require_once 'admin/mongo_connect.php';

// Ищем все документы в коллекции 'news'
$posts = $newsCollection->find(
    [], // Пустой фильтр, чтобы получить все новости
    [
        'sort' => ['created_at' => -1], // Сортируем по дате создания (новые сверху)
        'limit' => 4                    // Ограничиваем количество до 4 последних
    ]
);
// --------------------------------------------------

?>

<!-- СЕКЦИЯ СО СЛАЙДЕРОМ -->
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
                        <div class="swiper swiper-nested swiper-bof">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="/assets/images/BurdenOfFlame/2gameScrin.png" alt="Burden of Flame Screenshot 1"></div>
                                <div class="swiper-slide"><img src="/assets/images/BurdenOfFlame/3gameScrin.png" alt="Burden of Flame Screenshot 2"></div>
                                <div class="swiper-slide"><img src="/assets/images/BurdenOfFlame/1gameScrin.png" alt="Burden of Flame Screenshot 3"></div>
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
                        <div class="swiper swiper-nested swiper-nh">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="/assets/images/NITRO HEIST/nh_ss1.jpg" alt="Nitro Heist Screenshot 1"></div>
                                <div class="swiper-slide"><img src="/assets/images/NITRO HEIST/nh_ss2.jpg" alt="Nitro Heist Screenshot 2"></div>
                                <div class="swiper-slide"><img src="/assets/images/NITRO HEIST/nh_ss3.jpg" alt="Nitro Heist Screenshot 3"></div>
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
                        <div class="swiper swiper-nested swiper-sotr">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="/assets/images/SHADOW OF THE RONIN/sotr_ss1.jpg" alt="Shadow of the Ronin Screenshot 1"></div>
                                <div class="swiper-slide"><img src="/assets/images/SHADOW OF THE RONIN/sotr_ss2.jpg" alt="Shadow of the Ronin Screenshot 2"></div>
                                <div class="swiper-slide"><img src="/assets/images/SHADOW OF THE RONIN/sotr_ss3.jpg" alt="Shadow of the Ronin Screenshot 3"></div>
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

<!-- Секция новостей -->
<section class="news-section">
    <h2><?php echo t('LATEST_NEWS'); ?></h2>
    <div class="news-container">
        
<!-- ДИНАМИЧЕСКИЙ ВЫВОД НОВОСТЕЙ -->
        <?php foreach ($posts as $post): ?>
            <article class="news-item">
                <h3>
                    <?php
                    // Пытаемся показать заголовок на текущем языке, если его нет - показываем на английском
                    $current_lang = $_SESSION['lang'] ?? 'en';
                    echo htmlspecialchars($post['title'][$current_lang] ?? $post['title']['en'] ?? 'Untitled');
                    ?>
                </h3>
                <p>
                    <?php
                    // То же самое для текста
                    echo nl2br(htmlspecialchars($post['content'][$current_lang] ?? $post['content']['en'] ?? 'No content.'));
                    ?>
                    <a href="#"><?php echo t('NEWS_READ_MORE'); ?></a>
                </p>
            </article>
        <?php endforeach; ?>

    </div>
</section>

<?php include 'templates/footer.php'; ?>