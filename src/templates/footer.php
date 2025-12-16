</div>


    <!-- ФУТЕР С ВИЗУАЛЬНЫМ РАЗДЕЛЕНИЕМ -->
    <footer class="site-footer">
        <!-- Единый grid-контейнер для всего футера -->
        <div class="footer-grid">

            <!-- ЛЕВАЯ СЕКЦИЯ (темный фон) -->
            <div class="footer-left-panel">
                <h3 class="footer-heading-small"><?php echo t('FOOTER_SOCIAL_MEDIA'); ?></h3>
                <h2 class="footer-heading-large"><?php echo t('FOOTER_GET_CLOSER'); ?></h2>
                <p><?php echo t('FOOTER_SOCIAL_TEXT'); ?></p>
                <ul class="social-links">
                    <!-- Названия брендов не переводим -->
                    <li><a href="https://www.youtube.com/watch?v=xvFZjo5PgG0&list=RDxvFZjo5PgG0&start_radio=1"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                    <li><a href="https://www.youtube.com/watch?v=xvFZjo5PgG0&list=RDxvFZjo5PgG0&start_radio=1"><i class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a href="https://www.youtube.com/watch?v=xvFZjo5PgG0&list=RDxvFZjo5PgG0&start_radio=1"><i class="fab fa-instagram"></i> Instagram</a></li>
                    <li><a href="https://www.youtube.com/watch?v=xvFZjo5PgG0&list=RDxvFZjo5PgG0&start_radio=1"><i class="fab fa-youtube"></i> Youtube</a></li>
                    <li><a href="https://www.youtube.com/watch?v=xvFZjo5PgG0&list=RDxvFZjo5PgG0&start_radio=1"><i class="fab fa-tiktok"></i> TikTok</a></li>
                    <li><a href="https://www.youtube.com/watch?v=xvFZjo5PgG0&list=RDxvFZjo5PgG0&start_radio=1"><i class="fab fa-steam"></i> Steam</a></li>
                    <li><a href="https://www.youtube.com/watch?v=xvFZjo5PgG0&list=RDxvFZjo5PgG0&start_radio=1"><i class="fab fa-discord"></i> Discord</a></li>
                </ul>
            </div>

            
            <!-- ПРАВАЯ СЕКЦИЯ (светлый фон) -->
            <div class="footer-right-panel">
                <!-- Внутренняя сетка для "квадратиков" -->
                <div class="right-panel-grid">
                    <div class="footer-column">
                        <h2 class="footer-heading-large"><a href="/games.php"><?php echo t('FOOTER_GAMES'); ?></a></h2>
                        <ul class="link-list">
                            <!-- Названия игр не переводим -->
                            <li><a href="/games.php#bof">Burden of Flame</a></li>
                            <li><a href="/games.php#sotr">Shadow of the Ronin</a></li>
                            <li><a href="/games.php#nh">Nitro Heist</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h2 class="footer-heading-large"><a href="/faq.php"><?php echo t('FOOTER_FAQ'); ?></a></h2>
                    </div>

                    <div class="footer-column">
                        <h2 class="footer-heading-large"><a href="/careers.php"><?php echo t('FOOTER_CAREERS'); ?></a></h2>
                    </div>

                    <div class="footer-column">
                        <h2 class="footer-heading-large"><a href="/about.php"><?php echo t('FOOTER_ABOUT'); ?></a></h2>
                    </div>

                    <div class="footer-column">
                        <h2 class="footer-heading-large"><a href="/merch.php"><?php echo t('FOOTER_MERCH'); ?></a></h2>
                    </div>

                    <div class="footer-column">
                        <h2 class="footer-heading-large"><?php echo t('FOOTER_CONTACT'); ?></h2>
                        <ul class="link-list">
                            <!-- Email не переводим -->
                            <li><a href="mailto:psoup.studio@gmail.com">psoup.studio@gmail.com</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Нижняя часть с копирайтом теперь находится внутри правой секции -->
                <div class="footer-bottom">
                    <div class="footer-logo">
                        <img src="/assets/images/PPS.png" alt="Studio Logo">
                    </div>
                    <div class="footer-copyright">
                        <p>
                            <?php 
                                // Заменяем плейсхолдер {year} на текущий год
                                echo str_replace('{year}', date('Y'), t('FOOTER_COPYRIGHT')); 
                            ?>
                        </p>
                        <p>
                            <a href="https://i.pinimg.com/1200x/35/2a/60/352a6025ce84c25f7b9eb64fce3f1b3d.jpg"><?php echo t('FOOTER_COOKIES'); ?></a> | 
                            <a href="https://i.pinimg.com/1200x/35/2a/60/352a6025ce84c25f7b9eb64fce3f1b3d.jpg"><?php echo t('FOOTER_PRIVACY'); ?></a> | 
                            <a href="https://i.pinimg.com/1200x/35/2a/60/352a6025ce84c25f7b9eb64fce3f1b3d.jpg"><?php echo t('FOOTER_FAN_CONTENT'); ?></a>
                        </p>

                            <a href="/delete_account.php" class="remove-link" onclick="return confirm('Are you sure you want to permanently delete your account? This action cannot be undone.');" title="Delete Account">
                            <i class="fas fa-trash-alt"></i> <!-- Иконка корзины -->
                        </a>
                    </div>
                </div>
            </div>

        </div> <!-- Конец .footer-grid -->
    </footer>


    <!-- Swiper.js JS (библиотека) ДОЛЖЕН ИДТИ ПЕРВЫМ -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Файл скриптов ПОСЛЕ него -->
    <script src="/assets/js/script.js"></script>

</body>
</html>