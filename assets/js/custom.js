document.addEventListener("DOMContentLoaded", function () {
  const swipers = document.querySelectorAll(".mySwiper");
  swipers.forEach(function (container) {
    new Swiper(container, {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 10,
      grabCursor: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  });
});
