var $ = jQuery;
$(document).ready(function () {
  const regex = new RegExp("programm");

  var submenuHeight = 40;
  $("#sub-menu__container").css("display", "block");
  $("#sub-menu__container").height(
    regex.test(window.location.pathname) ? submenuHeight : 5
  );

  $(".menu-item__programme > a").click(function (event) {
    event.preventDefault();
    if ($("#sub-menu__container").css("height") === "5px") {
      $("#sub-menu__container").animate({ height: submenuHeight }, 500);
    } else {
      $("#sub-menu__container").animate({ height: 5 }, 500);
    }
  });

  $("#marquee-cities-wrapper").marquee({
    duration: 10000,
    delayBeforeStart: 0,
    direction: "left",
    duplicated: true,
  });

  $("#marquee-landing-wrapper").marquee({
    duration: 10000,
    delayBeforeStart: 0,
    direction: "up",
  });

  $("#hamburger--open").click((event) => {
    event.preventDefault();
    $("#hamburger--close").toggle();
    $("#top-menu--mobile").toggle();
    $("html, body").css("overflowY", "hidden");
    $(event.currentTarget).toggle();
  });

  $("#hamburger--close").click((event) => {
    event.preventDefault();
    $("#hamburger--open").toggle();
    $("#top-menu--mobile").toggle();
    $("html, body").css("overflowY", "auto");
    $(event.currentTarget).toggle();
  });
});
