(function ($) {
  "use strict";

  /**
   * All of the code for your public-facing JavaScript source
   * should reside in this file.
   *
   * Note: It has been assumed you will write jQuery code here, so the
   * $ function reference has been prepared for usage within the scope
   * of this function.
   *
   * This enables you to define handlers, for when the DOM is ready:
   *
   * $(function() {
   *
   * });
   *
   * When the window is loaded:
   *
   * $( window ).load(function() {
   *
   * });
   *
   * ...and/or other possibilities.
   *
   * Ideally, it is not considered best practise to attach more than a
   * single DOM-ready or window-load handler for a particular page.
   * Although scripts in the WordPress core, Plugins and Themes may be
   * practising this, we should strive to set a better example in our own work.
   */
})(jQuery);

jQuery(document).ready(function ($) {
  $(".accordion-header").on("click", function () {
    var content = $(this).next(".accordion-content");
    // Αλλάζει το accordion-content σύροντας προς τα πάνω ή κάτω
    content.slideToggle();

    var icon = $(this).find("ion-icon");

    //Εναλλαγή μεταξύ δύο διαφορετικών icon
    if (icon.attr("name") === "add-circle-outline") {
      icon.attr("name", "remove-circle-outline");
    } else {
      icon.attr("name", "add-circle-outline");
    }

    $(this).toggleClass("active-header");
    $(this).find(".accordion-title").toggleClass("active");
    icon.toggleClass("active");

    content.toggleClass("active-content");
  });
});
