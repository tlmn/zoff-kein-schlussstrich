var $ = jQuery;
$(document).ready(function () {
  $(".menu-item__programme > a").click(function (event) {
    event.preventDefault();
    if ($("#sub-menu__container").css("display") === "none") {
      $("#sub-menu__container").slideDown("slow", function () {});
    } else {
      $("#sub-menu__container").slideUp("slow", function () {});
    }
  });
});
