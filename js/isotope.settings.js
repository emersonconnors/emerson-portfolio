jQuery(document).ready(function ($) {
  var $grid = $(".grid").isotope({
    // options
    itemSelector: ".grid-item",
    layoutMode: "vertical",
  });

  // filter items on button click
  $(".filter-button-group").on("click", "button", function () {
    var filterValue = $(this).attr("data-filter");
    $grid.isotope({
      filter: filterValue,
    });
  });
});
