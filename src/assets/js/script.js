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

// --- АНИМАЦИЯ ПОЯВЛЕНИЯ ЭЛЕМЕНТОВ ПРИ ПРОКРУТКЕ ---
document.addEventListener('DOMContentLoaded', function() {
    
    // Находим все элементы, которые мы хотим анимировать
    const animatedElements = document.querySelectorAll('.fade-in-up');

    // Настраиваем "наблюдателя"
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            // Если элемент появился в поле зрения
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                // (Опционально) Отключаем наблюдение после того, как анимация сработала один раз
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1 // Анимация сработает, когда хотя бы 10% элемента будет видно
    });

    // Запускаем наблюдение за каждым элементом
    animatedElements.forEach(el => {
        observer.observe(el);
    });

});

// --- ЛОГИКА ДЛЯ СКРЫТИЯ "ТУМАНА" ВНИЗУ СТРАНИЦЫ ---

// Создаем функцию, которая будет проверять позицию скролла
const checkFooterVisibility = () => {
    const body = document.body;
    const footer = document.querySelector('.site-footer');

    if (!footer) return; // Если футера нет, ничего не делаем

    // Получаем позицию верхней части футера относительно окна
    const footerTop = footer.getBoundingClientRect().top;
    
    // Получаем высоту окна
    const windowHeight = window.innerHeight;

    // Если верхняя часть футера уже видна на экране (или почти видна)
    if (footerTop < windowHeight) {
        body.classList.add('near-footer');
    } else {
        body.classList.remove('near-footer');
    }
};

// "Вешаем" нашу функцию на событие прокрутки
window.addEventListener('scroll', checkFooterVisibility);

// Также вызываем ее один раз при загрузке страницы, на всякий случай
document.addEventListener('DOMContentLoaded', checkFooterVisibility);