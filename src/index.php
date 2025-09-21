<?php include 'templates/header.php'; ?>

<!-- Секция с главной игрой/слайдером. Вдохновляемся Larian -->
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
                    <p>The flame fades, and darkness descends. You are the one to bear its burden.</p>
                    <a href="#" class="btn-buy">BUY NOW</a>
                </div>
            </div>
            <div class="swiper-slide" style="background-image: url('/assets/images/13bdcc60fb28ad4f025d9c290fe42bbd.jpg');">
                <div class="hero-content">
                    <h1>NITRO HEIST</h1>
                    <p>The night streets are your empire. Grab the wheel, hit the gas, and own the asphalt.</p>
                    <a href="#" class="btn-buy">BUY NOW</a>
                </div>
            </div>
            <div class="swiper-slide" style="background-image: url('/assets/images/a263b70ba9bb52b2f5c28e52e52a6dfc.jpg');">
                 <div class="hero-content">
                    <h1>SHADOW OF THE RONIN</h1>
                    <p>Your blade is your soul, and death is just the beginning. Defy the demons of a fallen shogunate.</p>
                    <a href="#" class="btn-buy">BUY NOW</a>
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
            <h3>Burden of Flame reaches Beta 0.2!</h3>
            <p>The journey through the darkness deepens! We've just released Beta version 0.2 for Burden of Flame, featuring a major update to our dungeon generator: procedural doors are now live! Prepare for more unpredictable and challenging layouts. <a href="#">Read More</a></p>
        </article>
        <article class="news-item">
            <h3>Official Burden of Flame Merch is Here!</h3>
            <p>Carry the flame with you! Our official merchandise store is now open. Grab exclusive T-shirts, posters, and mugs featuring stunning art from the game. Show your support and wear your adventure with pride. <a href="#">Read More</a></p>
        </article>
    </div>
</section>

<?php include 'templates/footer.php'; ?>