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
  function fetchPosts(searchQuery) {
    // αίτημα ajax για αναζήτηση με ακριβή τίτλο
    $.ajax({
      url: "http://project-briefing.local/wp-json/wp/v2/posts",
      data: {
        search: searchQuery,
        _fields: "id,title,link", // καθορίζει τα πεδία ανάκτησης
        title: searchQuery, //
      },
      success: function (response) {
        // Σε περίπτωση που ειναι επιτυχημένο το αίτημα
        $(".custom-search-results").empty();
        response.forEach(function (post) {
          // Απόδοση των αποτελεσμάτων
          var title = $("<a>")
            .attr("href", post.link)
            .text(post.title.rendered);
          var button = $("<ion-icon>")
            .attr("name", "caret-forward-outline")
            .attr("id", "forward-button");
          var result = $("<div>")
            .addClass("search-result")
            .append(title)
            .append(button);
          $(".custom-search-results").append(result);
        });
      },
      error: function (xhr, status, error) {
        // Χειρισμός error
        console.error(xhr.responseText);
      },
    });
  }

  $("#custom-search-input").on("input", function () {
    var searchQuery = $(this).val().trim();
    // Εμφάνιση των post με βάση την αναζήτηση
    if (searchQuery.length > 0) {
      fetchPosts(searchQuery);
    } else {
      $(".custom-search-results").empty();
    }
  });

  // Event listener για το close button στο input
  $("#close-btn").on("click", function () {
    // Καθαρίζει τις τιμές στο input και αφαιρεί τα post κάτω απο το input
    $("#custom-search-input").val("");
    $(".custom-search-results").empty();
  });
});

jQuery(document).ready(function ($) {
  // Event listener για το input
  $("#custom-search-input").on("focus", function () {
    $(".search-container").addClass("focused");
    $("#close-btn").css("color", "rgb(0, 132, 255)");
  });

  $("#custom-search-input").on("blur", function () {
    $(".search-container").removeClass("focused");
    $("#close-btn").css("color", "black");
  });

  $("#close-btn").on("click", function () {
    // Επαναφέρει τα αρχικά χρώματα
    $(".search-container").css("border-color", "grey");
    $("#close-btn").css("color", "black");
    // Κενή τιμή του search
    $("#custom-search-input").val("");
    // Καθαρίζει τα αποτελέσματα απο το search
    $(".custom-search-results").empty();
  });

  $(document).on("click", function (event) {
    // Αφαιρεί το border color όταν γίνεται κλικ εκτός του search
    if (!$(event.target).closest(".search-container").length) {
      $(".search-container").css("border-color", "grey");
      $("#close-btn").css("color", "black");
    }
  });
});
