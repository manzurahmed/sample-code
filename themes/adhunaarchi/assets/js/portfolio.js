(function($) {
  $(document).ready(function($) {

    // init Isotope
    var $grid = $(".portfolio-list").isotope();
    // filter items on button click
    $(".portfolio-filter").on("click", "li", function() {
      $(".portfolio-filter li").removeClass("active");
      $(this).addClass("active");

      var filterValue = $(this).attr("data-filter");
      $grid.isotope({ filter: filterValue });
    });
  });
})(jQuery);
