(function($) {
    // Transition to solid background on scroll
    document.addEventListener("DOMContentLoaded", function () {
        const navbar = document.getElementById("floatingHeader");
        
        // Only set up scroll handling if the navbar element exists
        if (navbar) {
            function handleScroll() {
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
            }

            handleScroll(); // run once on load
            window.addEventListener("scroll", handleScroll);
        }
    });

  $('.mv-slick').slick({
    appendArrows: $('.mv-slick-arrows'), // use our custom container
    prevArrow: $('.mv-arrow-prev'),
    nextArrow: $('.mv-arrow-next'),
    centerMode: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: false,
    dots: false,
    autoplay: false,
    draggable: true,
    swipe: true,
    swipeToSlide: true,
    speed: 400,
    cssEase: 'ease-in-out',
    responsive: [
      { breakpoint: 992, settings: { slidesToShow: 2 } },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          centerMode: false,
        }
      }
    ]
  });

})(jQuery);