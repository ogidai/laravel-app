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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/_sass/style.scss":
/*!************************************!*\
  !*** ./resources/_sass/style.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

// require('./bootstrap');
// <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
// spハンバーガーメニューのクリックイベント
$(function () {
  $('.js-navBtnActive').click(function () {
    $('.gnav').addClass('active');
    $('.overlay').addClass('active');
    $('body').css('overflow', 'hidden');
  });
  $('.js-navBtnBack').click(function () {
    $('.gnav').removeClass('active');
    $('.overlay').removeClass('active');
    $('body').css('overflow', 'auto');
  });
  $('.overlay').click(function () {
    $('.gnav').removeClass('active');
    $('.overlay').removeClass('active');
    $('body').css('overflow', 'auto');
  });
});
$(function () {
  // logout modal
  $('.js-showLogoutModal').click(function () {
    $('.js-logoutModal').addClass('active');
    $('.overlay').addClass('active');
    $('body').css('overflow', 'hidden');
  });
  $('.overlay').click(function () {
    $('.js-logoutModal').removeClass('active');
    $('.overlay').removeClass('active');
    $('body').css('overflow', 'auto');
  });
  $('.js-logoutModalBack').click(function () {
    $('.js-logoutModal').removeClass('active');
    $('.overlay').removeClass('active');
    $('body').css('overflow', 'auto');
  }); // delete an account modal

  $('.js-showDeleteAccountModal').click(function () {
    $('.js-deleteAccountModal').addClass('active');
    $('.overlay').addClass('active');
    $('body').css('overflow', 'hidden');
  });
  $('.overlay').click(function () {
    $('.js-deleteAccountModal').removeClass('active');
    $('.overlay').removeClass('active');
    $('body').css('overflow', 'auto');
  });
  $('.js-deleteAccountModalBack').click(function () {
    $('.js-deleteAccountModal').removeClass('active');
    $('.overlay').removeClass('active');
    $('body').css('overflow', 'auto');
  }); // delete post modal

  $('.js-showDeletePostModal').click(function () {
    $('.js-deletePostModal').addClass('active');
    $('.overlay').addClass('active');
    $('body').css('overflow', 'hidden');
  });
  $('.overlay').click(function () {
    $('.js-deletePostModal').removeClass('active');
    $('.overlay').removeClass('active');
    $('body').css('overflow', 'auto');
  });
  $('.js-deletePostModalBack').click(function () {
    $('.js-deletePostModal').removeClass('active');
    $('.overlay').removeClass('active');
    $('body').css('overflow', 'auto');
  });
});
$(function () {
  $('#term_check').attr('disabled', 'disabled');
  $('form input:required').change(function () {
    //必須項目が空かどうかフラグ
    var flag = true; //必須項目をひとつずつチェック

    $('form input:required').each(function (e) {
      //もし必須項目が空なら
      if ($('form input:required').eq(e).val() === "") {
        flag = false;
      }
    }); //全て埋まっていたら

    if (flag) {
      //送信ボタンを復活
      $('#term_check').removeAttr('disabled');
    } else {
      //送信ボタンを閉じる
      $('#term_check').attr('disabled', 'disabled');
    }
  });
}); // 新規登録のフォームが全て入力されていたらsubmitできるようにする

$(function () {
  $('#register_submit').attr('disabled', 'disabled');
  $('#term_check').click(function () {
    if ($(this).prop('checked') == false) {
      $('#register_submit').attr('disabled', 'disabled');
    } else {
      $('#register_submit').removeAttr('disabled');
    }
  });
}); // コンテンツの高さがない時にフッターを下に固定する

$(function () {
  var winHeight = $(window).height();
  var containerHeight = $('.container').height();
  var contentHeight = winHeight - containerHeight;

  if (contentHeight > 0) {
    $('footer').css({
      'position': 'fixed',
      'bottom': '0',
      'left': '0'
    });
  }
}); // 画像の追加

$(function () {
  $('#addImages02, #addImages03').attr('disabled', 'disabled');
  $('#addImages01').on('change', function () {
    if ($(this).prop('')) {
      $('#addImages02').attr('disabled', 'disabled');
    } else {
      $('#addImages02').removeAttr('disabled');
    }
  });
  $('#addImages02').on('change', function () {
    if ($(this).prop('')) {
      $('#addImages03').attr('disabled', 'disabled');
    } else {
      $('#addImages03').removeAttr('disabled');
      $('#delete01').removeClass('-hidden');
    }
  });
  $('#addImages03').on('change', function () {
    if ($(this).prop('')) {
      $('#delete01').removeClass('-hidden');
      $('#delete02').addClass('-hidden');
    } else {
      // $('#delete01').addClass('-hidden');
      $('#delete02').removeClass('-hidden');
    }
  });
  $('#addImages01').on('change', function (e) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#showImages01").attr('src', e.target.result);
    };

    reader.readAsDataURL(e.target.files[0]);
  });
  $('#addImages02').on('change', function (e) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#showImages02").attr('src', e.target.result);
    };

    reader.readAsDataURL(e.target.files[0]);
  });
  $('#addImages03').on('change', function (e) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#showImages03").attr('src', e.target.result);
    };

    reader.readAsDataURL(e.target.files[0]);
  });
  $('#delete01').click(function () {
    $("#showImages02").attr('src', '');
    $('#addImages03').attr('disabled', 'disabled');
    $('#delete01').addClass('-hidden');
  });
  $('#delete02').click(function () {
    $("#showImages03").attr('src', '');
    $('#delete02').addClass('-hidden');
  });
});
$(function () {
  $('.question').on('click', function () {
    $(this).next('.answer').slideToggle();
  });
});
$(function () {
  $('.js-arrow').on('click', function () {
    if ($('.pro_img_2').hasClass('active')) {
      $('.pro_img_2').removeClass('active');
    } else {
      $('.pro_img_2').addClass('active');
    }
  });
  $('.js-arrowTransP').on('click', function () {
    $('.pro_img_3').removeClass('transform_none');
    $('.pro_img_3').removeClass('transform');
  });
  $('.js-arrowTransN').on('click', function () {
    $('.pro_img_3').addClass('transform_none');
    $('.pro_img_3').removeClass('transform');
  });
  $('.js-arrowTransM').on('click', function () {
    $('.pro_img_3').removeClass('transform_none');
    $('.pro_img_3').addClass('transform');
  });
});

/***/ }),

/***/ 0:
/*!****************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/_sass/style.scss ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /work/backend/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /work/backend/resources/_sass/style.scss */"./resources/_sass/style.scss");


/***/ })

/******/ });