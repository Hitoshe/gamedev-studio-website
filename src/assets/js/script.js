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