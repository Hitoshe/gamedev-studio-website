</main>
    
    </div> <!-- КОНЕЦ БОКОВИНОК -->


    <!-- ФУТЕР С ВИЗУАЛЬНЫМ РАЗДЕЛЕНИЕМ -->
    <footer class="site-footer">
        <!-- Единый grid-контейнер для всего футера -->
        <div class="footer-grid">

            <!-- ЛЕВАЯ СЕКЦИЯ (темный фон) -->
            <div class="footer-left-panel">
                <h3 class="footer-heading-small">SOCIAL MEDIA</h3>
                <h2 class="footer-heading-large">GET CLOSER TO US</h2>
                <p>Follow us on our social media channels to join us on our journey and experience the adventure for yourself.</p>
                <ul class="social-links">
                    <li><a href="#"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i> Youtube</a></li>
                    <li><a href="#"><i class="fab fa-tiktok"></i> TikTok</a></li>
                    <li><a href="#"><i class="fab fa-steam"></i> Steam</a></li>
                    <li><a href="#"><i class="fab fa-discord"></i> Discord</a></li>
                </ul>
            </div>

            <!-- ПРАВАЯ СЕКЦИЯ (светлый фон) -->
            <div class="footer-right-panel">
                <!-- Внутренняя сетка для "квадратиков" -->
                <div class="right-panel-grid">
                    <div class="footer-column">
                        <h2 class="footer-heading-large"><a href="/games.php">GAMES</a></h2>
                        <ul class="link-list">
                            <li><a href="#">Burden of Flame</a></li>
                            <li><a href="#">Shadow of the Ronin</a></li>
                            <li><a href="#">Nitro Heist</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h2 class="footer-heading-large"><a href="/faq.php">FAQ</a></h2>
                    </div>

                    <div class="footer-column">
                        <h2 class="footer-heading-large"><a href="#">MERCH</a></h2>
                    </div>

                    <div class="footer-column">
                        <h2 class="footer-heading-large">CONTACT</h2>
                        <ul class="link-list">
                            <li><a href="mailto:contact@yourstudio.com">contact@yourstudio.com</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Нижняя часть с копирайтом теперь находится внутри правой секции -->
                <div class="footer-bottom">
                    <div class="footer-logo">
                        <img src="/assets/images/logo.png" alt="Studio Logo">
                    </div>
                    <div class="footer-copyright">
                        <p>Copyrights © <?php echo date('Y'); ?> Studio Name. All rights reserved.</p>
                        <p>
                            <a href="#">Cookies settings</a> | 
                            <a href="#">Privacy policy</a> | 
                            <a href="#">Fan content policy</a>
                        </p>
                    </div>
                </div>
            </div>

        </div> <!-- Конец .footer-grid -->
    </footer>

    <!-- Swiper.js JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Подключаем наш файл скриптов -->
    <script src="/assets/js/script.js"></script>
</body>
</html>