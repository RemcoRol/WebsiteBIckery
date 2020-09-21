/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/clients/main-client.js":
/*!*********************************************!*\
  !*** ./resources/js/clients/main-client.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Menu
var animateCSS = function animateCSS(element, animation) {
  var prefix = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'animate__';
  return (// We create a Promise and return it
    new Promise(function (resolve, reject) {
      var animationName = "".concat(prefix).concat(animation);
      var node = document.querySelector(element);
      node.classList.add("animate__delay-0.5s");
      node.style.visibility = "visible";
      node.classList.add("".concat(prefix, "animated"), animationName);
    })
  );
};

function getCurrentPage() {
  var path = window.location.pathname;
  return path.split("/").pop();
}

document.addEventListener('DOMContentLoaded', function () {
  $('#brandCarousel').carousel({
    interval: 10000
  });
  $('.carousel .carousel-item').each(function () {
    var minPerSlide = 3;
    var next = $(this).next();

    if (!next.length) {
      next = $(this).siblings(':first');
    }

    next.children(':first-child').clone().appendTo($(this));

    for (var i = 0; i < minPerSlide; i++) {
      next = next.next();

      if (!next.length) {
        next = $(this).siblings(':first');
      }

      next.children(':first-child').clone().appendTo($(this));
    }
  });
  $('.navbar .navbar-nav > li.dropdown').hover(function () {
    $('ul.dropdown-menu', this).stop(true, true).slideDown('fast');
    $(this).addClass('show');
  }, function () {
    $('ul.dropdown-menu', this).stop(true, true).slideUp('fast');
    $(this).removeClass('show');
  });

  if (getCurrentPage() === 'home') {
    $(window).scroll(function (event) {
      var st = $(this).scrollTop();
      var lastScrollTop = 0;

      if (st > lastScrollTop) {
        var homeNewsSection = document.getElementById('news-section').getBoundingClientRect();
        var homeBrochureSection = document.getElementById('brochure-section').getBoundingClientRect();

        if (homeNewsSection.top >= 0 && homeNewsSection.left >= 0 && homeNewsSection.right <= window.innerWidth && homeNewsSection.bottom <= window.innerHeight) {
          animateCSS('#news-section', 'fadeInUp');
        } else if (homeBrochureSection.top >= 0 && homeBrochureSection.left >= 0 && homeBrochureSection.right <= window.innerWidth && homeBrochureSection.bottom <= window.innerHeight) {
          animateCSS('#brochure-section', 'fadeInUp');
        }
      }
    });
  } else if (getCurrentPage() === 'over-ons') {
    $(window).scroll(function (event) {
      var st = $(this).scrollTop();
      var lastScrollTop = 0;

      if (st > lastScrollTop) {
        var brandBuilderBounding = document.getElementById('card-brandbuilder').getBoundingClientRect();
        var specializationBounding = document.getElementById('card-specialization').getBoundingClientRect();
        var distributionBounding = document.getElementById('card-distributionchannel').getBoundingClientRect();
        var partnerBuilderBounding = document.getElementById('card-partner').getBoundingClientRect();

        if (brandBuilderBounding.top >= 0 && brandBuilderBounding.left >= 0 && brandBuilderBounding.right <= window.innerWidth && brandBuilderBounding.bottom <= window.innerHeight) {
          animateCSS('#card-brandbuilder', 'fadeInUp');
        } else if (specializationBounding.top >= 0 && specializationBounding.left >= 0 && specializationBounding.right <= window.innerWidth && specializationBounding.bottom <= window.innerHeight) {
          animateCSS('#card-specialization', 'fadeInUp');
        } else if (distributionBounding.top >= 0 && distributionBounding.left >= 0 && distributionBounding.right <= window.innerWidth && distributionBounding.bottom <= window.innerHeight) {
          animateCSS('#card-distributionchannel', 'fadeInLeft');
        } else if (partnerBuilderBounding.top >= 0 && partnerBuilderBounding.left >= 0 && partnerBuilderBounding.right <= window.innerWidth && partnerBuilderBounding.bottom <= window.innerHeight) {
          animateCSS('#card-partner', 'fadeInRight');
        }
      }

      lastScrollTop = st;
    });
  }
}, false);

/***/ }),

/***/ 1:
/*!***************************************************!*\
  !*** multi ./resources/js/clients/main-client.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\wampp\www\BickerySite\site\resources\js\clients\main-client.js */"./resources/js/clients/main-client.js");


/***/ })

/******/ });