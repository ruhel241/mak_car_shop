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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
__webpack_require__(2);
module.exports = __webpack_require__(3);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

var carShopMainApp = {
	addLoader: function addLoader() {
		var car = {
			loader: jQuery('<div/>', {
				class: 'car_loader'
			})
		};
		jQuery('body').append(car.loader);
	},
	removeLoader: function removeLoader() {
		jQuery('body').find(".car_loader").remove();
	},
	fetchItem: function fetchItem(itemId) {
		var _this = this;

		this.addLoader();
		jQuery.get(car_shop_vars.get_car_item_url, {
			item_id: itemId
		}).then(function (response) {
			var carModalHolder = jQuery('<div/>', {
				class: 'car-modal-holder',
				html: response
			});console.log(response);
			jQuery('body').hide().append(carModalHolder).fadeIn(100);
		}).fail(function (error) {
			alert('Something is wrong when loading the content. Please try again');
		}).always(function () {
			_this.removeLoader();
		});
	},
	removeModal: function removeModal() {
		jQuery('.car-modal-holder').fadeOut('200', function () {
			jQuery(this).remove();
			jQuery('html,body').removeClass('car_has_modal');
			jQuery(document).off('keyup.car_esc_key');
		});
	},
	initModalClick: function initModalClick() {
		var that = this;
		jQuery('.car_item_modal').on('click', function (e) {
			e.preventDefault();
			jQuery('html,body').addClass('car_has_modal');
			var itemId = jQuery(this).attr('data-car_item_id');
			if (itemId) {
				that.fetchItem(itemId);
				jQuery(document).on('keyup.car_esc_key', function (e) {
					if (e.keycode == 27) {
						that.removeModal();
					}
				});
			}
		});

		jQuery(document).on("click", '.car_close', function () {
			that.removeModal();
		});
	},
	documentReady: function documentReady() {
		var _this2 = this;

		jQuery(document).ready(function () {
			_this2.initModalClick();
		});
	}
};

carShopMainApp.documentReady();

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 3 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);