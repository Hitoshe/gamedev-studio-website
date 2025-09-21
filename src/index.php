<?php include 'templates/header.php'; ?>

<!-- Секция с главной игрой/слайдером. Вдохновляемся Larian -->
<!-- Секция со слайдером игр -->
<section class="hero-slider">
    <!-- Slider main container -->
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide" style="background-image: url('/assets/images/game1.jpg');">
                <div class="hero-content">
                    <h1>BURDEN OF FLAME</h1>
                    <p>Беги беги беги.</p>
                    <a href="#" class="btn-buy">BUY NOW</a>
                </div>
            </div>
            <div class="swiper-slide" style="background-image: url('/assets/images/game2.jpg');">
                <div class="hero-content">
                    <h1>NEW EPIC GAME</h1>
                    <p>Описание второй супер-игры.</p>
                    <a href="#" class="btn-buy">LEARN MORE</a>
                </div>
            </div>
            <div class="swiper-slide" style="background-image: url('/assets/images/game3.jpg');">
                 <div class="hero-content">
                    <h1>ANOTHER ADVENTURE</h1>
                    <p>Описание третьей игры.</p>
                    <a href="#" class="btn-buy">EXPLORE</a>
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

<!-- Секция новостей -->
<section class="news-section">
    <h2>Latest News</h2>
    <div class="news-container">
        <!-- Сюда мы будем выводить новости из базы данных -->
        <article class="news-item">
            <h3>Заголовок новости 1</h3>
            <p>Текст новости... <a href="#">Читать далее</a></p>
        </article>
        <article class="news-item">
            <h3>Заголовок новости 2</h3>
            <p>Текст новости... <a href="#">Читать далее</a></p>
        </article>
    </div>
</section>

<?php include 'templates/footer.php'; ?>