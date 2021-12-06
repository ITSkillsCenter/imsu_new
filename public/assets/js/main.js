!(function($) {
  ("use strict");

  // Gallery carousel (uses the Owl Carousel library)
  $(".gallery-carousel").owlCarousel({
    autoplay: true,
    dots: false,
    nav: false,
    loop: true,
    // items: 3,
    responsive: {
      0: {
        items: 1
      },
      767: {
        items: 2
      },
      992: {
        items: 3
      },
      1200: {
        items: 4
      }
    }
  });

  // Initiate venobox lightbox
  $(document).ready(function () {
    $(".venobox").venobox();
  });

  // Get Year
  const $year = new Date().getFullYear();
  $(".year").html($year);
})(jQuery);
