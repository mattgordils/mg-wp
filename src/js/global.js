'use strict';

var $ = require('jquery');
window.jQuery = window.$ = require("jquery");
var animsition = require('animsition');
// var lazyload = require('jquery-lazyload/jquery.lazyload.js');
var lazysizes = require('lazysizes');

var global = {
  init: function(){
  },

  ready: function(){
    this.pageTransitions();
    lazySizes.init();
    // this.lazyloadImages();
    // this.transitionBackgrounds();
  },
  
  resize:function(){
  },
  
  scroll: function(){
    // this.transitionBackgrounds();
  },

  // lazyloadImages: function () {
  //   console.log('lazy')
  //   $("img.lazy").lazyload({
  //     effect : "fadeIn"
  //   });
  // },

  pageTransitions: function () {
    $(".animsition").animsition({
      inClass: 'fade-in',
      outClass: 'fade-out',
      inDuration: 500,
      outDuration: 400,
      linkElement: '.transition-link',
      // linkElement: 'a:not([target="_blank"]):not([href^="#"]):not([href^="deadlink"])',
      // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
      loading: true,
      loadingParentElement: 'body', //animsition wrapper element
      loadingClass: 'page-loading',
      loadingInner: '', // e.g '<img src="loading.svg" />'
      timeout: true,
      timeoutCountdown: 0,
      onLoadEvent: true,
      browser: [ 'animation-duration', '-webkit-animation-duration'],
      // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
      // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
      overlay : false,
      overlayClass : 'animsition-overlay-slide',
      overlayParentElement : 'body',
      transition: function(url){ window.location.href = url; }
    });
  },

  transitionBackgrounds: function () {
    var scrollTop = $('body').scrollTop();
    var offset = $(window).innerHeight() / 2;
    $('section').each( function() {
      var section = $(this);
      var sectionTop = section.offset().top;
      var sectionHeight = section.innerHeight();
      var sectionBottom = sectionTop + sectionHeight;
      // console.log(sectionBottom);
      if (scrollTop > sectionTop - offset && scrollTop < sectionBottom - offset) {
        if($(this).attr('data-bg')) { 
          var sectionBg = $(this).attr('data-bg') 
        } else { 
          var sectionBg = 'inherit'
        };
        if($(this).attr('data-color')) { 
          var sectionColor = $(this).attr('data-color') 
        } else { 
          var sectionColor = 'inherit'
        };
        $(this).addClass('current-section');
        $('body').css({
          "background" : sectionBg,
          "color" : sectionColor
        });
      } else {
        $(this).removeClass('current-section');
      }
    });
  }

};
module.exports = global;