"use strict";

import Splide from "../../node_modules/@splidejs/splide/dist/js/splide.min.js";

let $ = jQuery;
let scrolled = false;

$(function () {
  handlePageStartAnimation();
  toggleSearchIcon();

  $("button[data-reference], div[class*='floating-button']").on('click', function () {
    let ref = $(this).data("reference");
    let modal = $("body").find(`[data-modal="${ref}"]`)[0];
    if (modal) toggleModal(modal);
  })



  $("main.main").on('click', ".backdrop.--visible", function () {
    let active = $(".modal.--visible")[0];
    toggleModal(active);
  })

  if (window.outerWidth >= 1024 && window.location.pathname === '/') {
    new Splide('.splide', {
      type: 'fade',
      rewind: true,
      autoplay: true,
      interval: 2000,
    }).mount();
  }

  $("#toggler").on('click', function () {
    $('.backdrop').toggleClass("--visible");
  })

  $(".arrow-down").on("click", function () {
    rotateSidebarArrow.call(this);
  });

  $('.search').on('focus', function (e) {
    let wrapper = $(e.target).closest('.search__decorator')[0];
    $(wrapper).toggleClass('--active');
  }).on('blur', function (e) {
    let wrapper = $(e.target).closest('.search__decorator')[0];
    $(wrapper).toggleClass('--active');
  });

  $('.floating-button__back').on('click', function () {
    window.history.back();
  })
});

function toggleModal(el) {
  $(el).toggleClass('--visible');
  $('.backdrop').toggleClass('--visible');
}


function rotateSidebarArrow() {
  let item = $(this).parents().eq(1)[0];
  let subitems = $(item).find("ul.sidebar__subitems")[0];
  let arrow = $(item).find(".arrow-down");
  console.log(subitems);
  $(subitems).toggleClass("--hidden");
  if (!$(subitems).hasClass("--hidden")) {
    $(arrow).rotate(180);
  } else {
    $(arrow).rotate(0);
  }
}

function toggleSearchIcon() {
  let button = $(".floating-button__search");
  let cur = $('html, body').scrollTop();

  $(window).on('scroll', function () {
    cur = $(window).scrollTop();
    if (!$(button).hasClass('--hidden') && cur <= 2) {
      return $(button).addClass('--hidden');
    }
    return $(button).removeClass('--hidden');
  })
}


function handlePageStartAnimation() {
  if (window.outerWidth < 1024 && window.location.pathname === '/') {

    $("html, body").animate(
      {
        scrollTop: 0,
      },
      1100
    );
    let cur = $("html, body").scrollTop();
    let pastPosition = cur;

    $(window).on("scroll", function (e) {
      pastPosition = cur;
      cur = $(window).scrollTop();
      if (cur < 10 && !scrolled && cur > pastPosition) {
        $('main').autoscroll();

        scrolled = true;
        $(".header__arrow--down").css("display", "none");
      }
    });
  }
}

jQuery.fn.rotate = function (degrees) {
  $(this).css({
    "-webkit-transform": "rotate(" + degrees + "deg)",
    "-moz-transform": "rotate(" + degrees + "deg)",
    "-ms-transform": "rotate(" + degrees + "deg)",
    transform: "rotate(" + degrees + "deg)",
  });
  return $(this);
};

jQuery.fn.autoscroll = function () {
  let position = $(this).offset().top;
  $("html, body").animate(
    {
      scrollTop: position,
    },
    2000
  );
  $("html, body").css("overflow", "hidden");
  setTimeout(function () {
    $("html, body").css("overflow", "auto");
  }, 2000);
  return $(this);
};
