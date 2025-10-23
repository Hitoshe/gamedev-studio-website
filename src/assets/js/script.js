document.addEventListener('DOMContentLoaded', function() {

    // --- Инициализация слайдера Swiper (с защитой от ошибок) ---
    const swiperElement = document.querySelector('.swiper');

    if (swiperElement) {
        // Создаем переменную swiper ТОЛЬКО ОДИН РАЗ
        const swiper = new Swiper('.swiper', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    }


    // --- Эффект "матового стекла" для хэдера ---
    const header = document.querySelector('.main-header');
    
    const handleHeaderScroll = () => {
        if (!header) {
            return;
        }
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    };

    window.addEventListener('scroll', handleHeaderScroll);
    handleHeaderScroll(); // Проверка при первой загрузке
});