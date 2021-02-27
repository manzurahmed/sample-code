/* *** Custom jQuery Code *** */
(function($) {
  $(document).ready(function($) {
    /* Google Map */
    var center = [23.755267, 90.3762];
    $(".contact-map")
      .gmap3({
        zoom: 15,
        center: center,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      })
      .circle({
        center: center,
        radius: 250,
        fillColor: "#ffaf9f",
        strokeColor: "#ff512f"
      })
      .marker({
        position: center,
        icon: "../images/images/map-marker-48px.png"
      });
  });
})(jQuery);
