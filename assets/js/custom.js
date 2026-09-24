/**
 * Basketball front-end behaviour, without jQuery.
 *
 * The plugin calls keep the options they always had; ColorlibUI provides
 * drop-in versions of Owl Carousel, Magnific Popup and Masonry that build the
 * same markup, so the theme's stylesheets apply unchanged.
 */
(function () {
  'use strict';

  var UI = window.ColorlibUI;
  if (!UI) return;

  // The old script initialised .player_info_item a second time further down
  // (nav: true, navText images at img/icon/*.svg); Owl ignores a second init,
  // so only these options ever applied.
  UI.owl('.player_info_item', {
    items: 1,
    loop: true,
    dots: false,
    autoplay: true,
    margin: 40,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: false,
    navText: [],
    responsive: {
      0: {
        margin: 15
      },
      600: {
        margin: 10
      },
      1000: {
        margin: 10
      }
    }
  });

  UI.magnific('.popup-youtube, .popup-vimeo', {
    // disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  // menu fixed js code
  UI.ready(function () {
    var menus = UI.toElements('.main_menu');
    if (!menus.length) return;
    window.addEventListener('scroll', function () {
      var windowTop = window.pageYOffset + 1;
      menus.forEach(function (menu) {
        if (windowTop > 50) {
          menu.classList.add('menu_fixed', 'animated', 'fadeInDown');
        } else {
          menu.classList.remove('menu_fixed', 'animated', 'fadeInDown');
        }
      });
    }, { passive: true });
  });

  UI.ready(function () {
    if (document.getElementById('default-select')) {
      UI.enhanceSelects('select');
    }
  });

  UI.masonry('.grid', {
    itemSelector: '.grid-item',
    columnWidth: '.grid-sizer',
    percentPosition: true
  });

  UI.magnific('.img-gal', {
    type: 'image',
    gallery: {
      enabled: true
    }
  });
}());
