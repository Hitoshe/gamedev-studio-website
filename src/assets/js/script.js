document.addEventListener('DOMContentLoaded', function() {

    // --- ИНИЦИАЛИЗАЦИЯ ВСЕХ СЛАЙДЕРОВ ---

    // 1. Главный слайдер (инициализируем отдельно)
    new Swiper('.hero-slider .swiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.hero-slider > .swiper > .swiper-button-next',
            prevEl: '.hero-slider > .swiper > .swiper-button-prev',
        },
    });

    // 2. Вложенные слайдеры (инициализируем в цикле - более надежно)
    const nestedSwiperConfigs = [
        { selector: '.swiper-bof', delay: 2500 },
        { selector: '.swiper-nh',  delay: 2500 },
        { selector: '.swiper-sotr', delay: 2500 }
    ];

    nestedSwiperConfigs.forEach(config => {
        const swiperEl = document.querySelector(config.selector);
        if (swiperEl) { // Проверяем, что элемент существует
            new Swiper(swiperEl, { // Передаем сам DOM-элемент, а не строку
                loop: true,
                nested: true,
                autoplay: {
                    delay: config.delay,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true, // УЛУЧШЕНИЕ: останавливать при наведении мыши
                },
                navigation: {
                    // Ищем кнопки внутри этого конкретного элемента
                    nextEl: swiperEl.querySelector('.swiper-button-next'),
                    prevEl: swiperEl.querySelector('.swiper-button-prev'),
                },
            });
        }
    });

    // --- ЭФФЕКТ "МАТОГО СТЕКЛА" ДЛЯ ХЭДЕРА ---
    const header = document.querySelector('.main-header');
    const handleHeaderScroll = () => {
        if (!header) return;
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    };
    window.addEventListener('scroll', handleHeaderScroll);
    handleHeaderScroll();
});