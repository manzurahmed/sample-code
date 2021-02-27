/* *** Custom jQuery Code *** */
(function($) {
  $(document).ready(function($) {
    // Sticky header
    $(".site-header").sticky({
      topSpacing: 32.8,
      zIndex: 999
    });

    // Slicknav Menu
    $("#primary-menu").slicknav({
      prependTo: ".responsive-menu-wrap",
      allowParentLinks: true
    });

    $(".project-slides").owlCarousel({
      items: 1,
      loop: true,
      nav: true,
      navText: [
        "<i class='fa fa-long-arrow-left'></i>",
        "<i class='fa fa-long-arrow-right'></i>"
      ],
      autoplay: true,
      autoplayTimeout: 4000
    });

    // Scroll To Top
    $("body").append(
      '<a href="#" class="scroll-top"><i class="fa fa-arrow-up"></i></a>'
    );
    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $(".scroll-top")
          .css("visibility", "visible")
          .css("opacity", "0.5");
      } else {
        $(".scroll-top")
          .css("visibility", "visible")
          .css("opacity", "0");
      }
    });
    $(".scroll-top").click(function() {
      $("html, body").animate(
        {
          scrollTop: 0
        },
        600
      );
    });
  });
})(jQuery);
