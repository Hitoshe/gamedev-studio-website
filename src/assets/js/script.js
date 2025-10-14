const swiper = new Swiper('.swiper', {
    // Опциональные параметры
    direction: 'horizontal',
    loop: true,
  
    // Если нужна pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  
    // Стрелки навигации
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
});

// Эффект "матового стекла" для хэдера при прокрутке
document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.main-header');

    if (header) { // Проверяем, что хэдер существует
        window.addEventListener('scroll', function() {
            // Если пользователь прокрутил страницу больше чем на 50 пикселей
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }
});