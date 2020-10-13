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

$(window).on('load', function () {
  $('#body_hidden').fadeIn(1000);
  $('#loading').fadeOut(1000); // ページを常にトップから表示する

  if ($('.container').hasClass('scrollTop')) {
    $('html, body').animate({
      scrollTop: 0
    }, 'fast');
  }

  $('a, input[type=submit]').on('click', function () {
    $('#body_hidden').addClass('-hidden').delay(3000).removeClass('-hidden');
    $('#loading').fadeIn(0).delay(3000).fadeOut(0);
  }); // spハンバーガーメニューのクリックイベント

  $('.js-navBtnActive').click(function () {
    $('#gnav').addClass('active');
    $('.overlay').addClass('active');
    $('body').css('overflow', 'hidden');
  });
  $('.js-navBtnBack, .overlay').click(function () {
    $('#gnav').removeClass('active');
    $('.overlay').removeClass('active');
    $('body').css('overflow', 'auto');
  }); // 画像のクリックイベント、ズームする

  $('.img_zoom').on('click', function () {
    $('img_zoomed').removeClass('active');
    $('.overlay').addClass('active');
    $('body').css('overflow', 'hidden');

    if ($(this).hasClass('img_01')) {
      $('.img_zoomed_01').addClass('active');
    }

    if ($(this).hasClass('img_02')) {
      $('.img_zoomed_02').addClass('active');
    }

    if ($(this).hasClass('img_03')) {
      $('.img_zoomed_03').addClass('active');
    }

    $('.overlay, .delete').on('click', function () {
      $('.img_zoomed').removeClass('active');
      $('.overlay').removeClass('active');
      $('body').css('overflow', 'auto');
    });
  }); // logout modal

  $('.js-showLogoutModal').click(function () {
    $('.js-logoutModal').addClass('active');
    $('.overlay').addClass('active');
    $('body').css('overflow', 'hidden');
  });
  $('.overlay, .js-logoutModal').click(function () {
    $('.js-logoutModal').removeClass('active');
    $('.overlay').removeClass('active');
    $('body').css('overflow', 'auto');
  }); // delete an account modal

  $('.js-showDeleteAccountModal').click(function () {
    $('.js-deleteAccountModal').addClass('active');
    $('.overlay').addClass('active');
    $('body').css('overflow', 'hidden');
  });
  $('.overlay, .js-deleteAccountModalBack').click(function () {
    $('.js-deleteAccountModal').removeClass('active');
    $('.overlay').removeClass('active');
    $('body').css('overflow', 'auto');
  }); // delete post modal

  $('.js-showDeletePostModal').click(function () {
    $('.js-deletePostModal').addClass('active');
    $('.overlay').addClass('active');
    $('body').css('overflow', 'hidden');
  });
  $('.overlay, .js-deletePostModalBack').click(function () {
    $('.js-deletePostModal').removeClass('active');
    $('.overlay').removeClass('active');
    $('body').css('overflow', 'auto');
  });
  $('#term_check').prop('disabled', true);
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
      $('#term_check').prop('disabled', false);
    } else {
      //送信ボタンを閉じる
      $('#term_check').prop('disabled', true);
    }
  }); // 新規登録のフォームが全て入力されていたらsubmitできるようにする

  $('#register_submit').prop('disabled', true);
  $('#term_check').click(function () {
    if ($(this).prop('checked') == false) {
      $('#register_submit').prop('disabled', true);
    } else {
      $('#register_submit').prop('disabled', false);
    }
  }); // コンテンツの高さがない時にフッターを下に固定する

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

  ; // 画像の追加

  $('#add_images_create').hide();
  $('#addImage').on('click', function () {
    $('.add_images_wrap').slideDown();
    $('.post_form').attr('action', 'store');
  });
  $('#noImage').on('click', function () {
    $('.add_images_wrap').slideUp();
    $('.post_form').attr('action', 'noImageStore');
  });
  $('#updateImage').on('click', function () {
    $('.add_images_wrap').slideDown();
    $('#submit').val('submit');
  });
  $('#updateNoImage').on('click', function () {
    $('.add_images_wrap').slideUp();
    $('#submit').val('noImage');
  });
  $(document).on('change', '#addImages01', function (e) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#showImages01").attr('src', e.target.result);
    };

    reader.readAsDataURL(e.target.files[0]);
  });
  $(document).on('change', '#addImages02', function (e) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#showImages02").attr('src', e.target.result);
    };

    reader.readAsDataURL(e.target.files[0]);
    $("#submit").addClass('img_changed_02');
    $("#delete01").removeClass('-hidden');
  });
  $(document).on('change', '#addImages03', function (e) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#showImages03").attr('src', e.target.result);
    };

    reader.readAsDataURL(e.target.files[0]);
    $("#submit").addClass('img_changed_03');
    $("#delete02").removeClass('-hidden');
  });
  $(document).on('click', '#delete01', function () {
    $("#addImages02").addClass('delete_input_02');
    $("#showImages02").addClass('delete_img_02');
    $("#addImages02").after('<input type="file" name="image_02" class="-secondary" id="addImages02" accept="image/*">');
    $("#showImages02").after('<img src="" alt="" id="showImages02">');
    $('.delete_input_02').remove();
    $('.delete_img_02').remove();
    $("#submit").addClass('img_changed_02');
    $("#delete01").addClass('-hidden');
  });
  $(document).on('click', '#delete02', function () {
    $("#addImages03").addClass('delete_input_03');
    $("#showImages03").addClass('delete_img_03');
    $("#addImages03").after('<input type="file" name="image_03" class="-secondary" id="addImages03" accept="image/*">');
    $("#showImages03").after('<img src="" alt="" id="showImages03">');
    $('.delete_input_03').remove();
    $('.delete_img_03').remove();
    $("#submit").addClass('img_changed_03');
    $("#delete02").addClass('-hidden');
  });
  $(document).on('click', '#submit', function () {
    if ($(this).hasClass('img_changed_02')) {
      $(this).val('img_changed_02');
    }

    if ($(this).hasClass('img_changed_03')) {
      $(this).val('img_changed_03');
    }

    if ($(this).hasClass('img_changed_02') && $(this).hasClass('img_changed_03')) {
      $(this).val('img_changed');
    }
  });

  if ($("#showImages02").attr('src') == '') {
    $("#delete01").addClass('-hidden');
  } else {
    $("#delete01").removeClass('-hidden');
  }

  if ($("#showImages03").attr('src') == '') {
    $("#delete02").addClass('-hidden');
  } else {
    $("#delete02").removeClass('-hidden');
  }

  ;
  $('#addImages01').on('change', function () {
    $('#addImages02, #addImages03').prop('disabled', false);
  }); //faq

  $('.question').on('click', function () {
    $(this).next('.answer').slideToggle();
  }); // 画像のスライダー

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
  }); // radioのスター

  $('#taste_check_01, #cost_check_01, #recomend_check_01, #melt_check_01, #foam_check_01').on('click', function () {
    $(this).parent('.radio_wrap').addClass('star_icon_1');
    $(this).parent('.radio_wrap').removeClass('star_icon_2 star_icon_3 star_icon_4 star_icon_5');
  });
  $('#taste_check_02, #cost_check_02, #recomend_check_02, #melt_check_02, #foam_check_02').on('click', function () {
    $(this).parent('.radio_wrap').addClass('star_icon_2');
    $(this).parent('.radio_wrap').removeClass('star_icon_1 star_icon_3 star_icon_4 star_icon_5');
  });
  $('#taste_check_03, #cost_check_03, #recomend_check_03, #melt_check_03, #foam_check_03').on('click', function () {
    $(this).parent('.radio_wrap').addClass('star_icon_3');
    $(this).parent('.radio_wrap').removeClass('star_icon_2 star_icon_1 star_icon_4 star_icon_5');
  });
  $('#taste_check_04, #cost_check_04, #recomend_check_04, #melt_check_04, #foam_check_04').on('click', function () {
    $(this).parent('.radio_wrap').addClass('star_icon_4');
    $(this).parent('.radio_wrap').removeClass('star_icon_2 star_icon_3 star_icon_1 star_icon_5');
  });
  $('#taste_check_05, #cost_check_05, #recomend_check_05, #melt_check_05, #foam_check_05').on('click', function () {
    $(this).parent('.radio_wrap').addClass('star_icon_5');
    $(this).parent('.radio_wrap').removeClass('star_icon_2 star_icon_3 star_icon_4 star_icon_1');
  }); // tab

  $('.options_item').on('click', function () {
    if ($(this).hasClass('active')) {
      $(this).removeClass('active');
      $('.option_form_wrap').removeClass('active');
    } else {
      $('.options_item').removeClass('active');
      $('.option_form_wrap').removeClass('active');
      $(this).addClass('active');
      var index = $(this).index();
      $('.option_form_wrap').eq(index).addClass('active');
    }
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