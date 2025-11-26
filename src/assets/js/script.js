document.addEventListener('DOMContentLoaded', function() {

    // --- ИНИЦИАЛИЗАЦИЯ ВСЕХ СЛАЙДЕРОВ ---

    // 1. Главный слайдер
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

    // 2. Вложенные слайдеры
    new Swiper('.swiper-bof', {
        loop: true,
        nested: true,
        navigation: {
            nextEl: '.swiper-bof .swiper-button-next',
            prevEl: '.swiper-bof .swiper-button-prev',
        },
    });

    new Swiper('.swiper-nh', {
        loop: true,
        nested: true, 
        navigation: {
            nextEl: '.swiper-nh .swiper-button-next',
            prevEl: '.swiper-nh .swiper-button-prev',
        },
    });

    new Swiper('.swiper-sotr', {
        loop: true,
        nested: true, 
        navigation: {
            nextEl: '.swiper-sotr .swiper-button-next',
            prevEl: '.swiper-sotr .swiper-button-prev',
        },
    });

    // --- ЭФФЕКТ "МАТОВОГО СТЕКЛА" ДЛЯ ХЭДЕРА ---
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