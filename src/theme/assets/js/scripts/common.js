var $ = jQuery;

$(window).resize(() => {
  $(window).width() < 900 && $("#sub-menu__container").hide();
});

$(document).ready(function () {
  const regex = new RegExp("programm");

  var submenuHeight = 40;
  $("#sub-menu__container").css("display", "block");

  if ($(window).width() > 900) {
    $("#sub-menu__container").height(
      regex.test(window.location.pathname) ? submenuHeight : 5
    );
  } else {
    $("#sub-menu__container").height(0);
  }

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

  $("#marquee-landing-wrapper--desktop").marquee({
    duration: 10000,
    delayBeforeStart: 0,
    direction: "up",
  });

  $("#marquee-landing-wrapper--mobile").marquee({
    duration: 10000,
    delayBeforeStart: 0,
    direction: "up",
  });

  $("#hamburger--open").click((event) => {
    event.preventDefault();
    $("#hamburger--close").toggle();
    $("#top-menu--mobile").toggleClass("hidden").toggleClass("flex");
    $("html, body").css("overflowY", "hidden");
    $(event.currentTarget).toggle();
  });

  $("#hamburger--close").click((event) => {
    event.preventDefault();
    $("#hamburger--open").toggle();
    $("#top-menu--mobile").toggleClass("hidden").toggleClass("flex");
    $("html, body").css("overflowY", "auto");
    $(event.currentTarget).toggle();
  });

  $(".readmore-button").each((index, value) => {
    $(value).click(() => {
      $(value).parent().siblings().toggle();
      $(value).html($(value).parent().siblings().css('display') === "none" ? "Mehr lesen" : "Weniger lesen")
    });
  })
});
