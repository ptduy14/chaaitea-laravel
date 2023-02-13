$('.main__slider-wrapper').slick({
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  prevArrow: $(".nav-prev"),
  nextArrow: $(".nav-next"),
  autoplay: false,
  autoplaySpeed: 2000,

  responsive: [
    {
      breakpoint: 1023,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 740,
      settings: {
        slidesToShow: 1,
      }
    }
  ]
  
});


$('.feedback__slider-wrapper').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  prevArrow: $(".feedback__slider-prev"),
  nextArrow: $(".feedback__slider-next"),
  autoplaySpeed: 2000,
});



