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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ 4:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(5);


/***/ }),

/***/ 5:
/***/ (function(module, exports) {

(function () {
    var CarShopModalApp = {
        insertDom: function insertDom() {
            jQuery('body').append('\n            <div style="display: none;" class="car_shop_shortcode_builder_pop_up" id="car_shop_pop_up">\n                <div class="car_shop_pop_shadow"></div>\n                \n                    <div id="car_shop_moon" class="car_shop_pop_container">\n                        <div class="car_shop_header">\n                            Insert Car Shop Shortcode\n                            <span class="car_shop_pop_close">X</span>\n                        </div>\n                    </div>\n\n\n                </div>\n            </div>\n        ');
        },
        showModal: function showModal(editor) {
            window.currentFnEditor = editor;
            jQuery('#car_shop_pop_up').show();
        },
        closeModal: function closeModal() {
            jQuery('#car_shop_pop_up').hide();
        },
        initShortCodeBuilder: function initShortCodeBuilder() {
            var mainApp = this;
            window.moonApp2 = new Moon({
                el: "#carShop_moon",
                data: {
                    fn_displays: window.fn_MceVars.fndisplayTypes,
                    fn_categories: window.fn_MceVars.fnCategories,
                    fn_tags: window.fn_MceVars.fnTags,
                    myData: [1, 2],
                    shortCode: {
                        fn_display: 'default',
                        per_grid: 2,
                        all_faq_cats: true,
                        selectedFaqCats: [],
                        all_faq_tags: true,
                        selectedFaqTags: []
                    }
                },

                computed: {},

                methods: {
                    changeData: function changeData(key, type) {
                        var prevalues = this.get('shortCode')[type];
                        if (prevalues.indexOf(key) == -1) {
                            prevalues.push(key);
                        } else {
                            prevalues.splice(prevalues.indexOf(key), 1);
                        }
                    },
                    fn_insertSortCode: function fn_insertSortCode() {
                        var shortCode = this.get('shortCode');
                        var shortCodeParts = ['mrk_carshop', "display='" + shortCode.fn_display + "'"];

                        if (shortCode.fn_display == 'grid') {
                            shortCodeParts.push('per_grid=' + shortCode.per_grid);
                        }

                        if (!shortCode.all_faq_cats && shortCode.selectedFaqCats.length) {
                            shortCodeParts.push("faq_cat='" + shortCode.selectedFaqCats.toLocaleString() + "'");
                        }
                        if (!shortCode.all_faq_tags && shortCode.selectedFaqTags.length) {
                            shortCodeParts.push("faq_tag='" + shortCode.selectedFaqTags.toLocaleString() + "'");
                        }

                        var shortcodeString = '[' + shortCodeParts.join(' ') + ']';
                        currentFnEditor.insertContent(shortcodeString);
                        mainApp.closeModal();
                    }
                }

            });
        },
        initTinyMce: function initTinyMce() {
            var mainApp = this;
            tinymce.PluginManager.add('car_shop_mce_class', function (editor, url) {
                // Add Button to Visual Editor Toolbar
                editor.addButton('car_shop_mce_class', {
                    title: 'Insert Car Shop Shortcode',
                    cmd: 'car_shop_mce_command'
                });
                editor.addCommand('car_shop_mce_command', function () {
                    mainApp.showModal(editor);
                    // alert("Opened");
                });
                jQuery('.car_shop_pop_close, .car_shop_pop_shadow').on('click', function () {
                    mainApp.closeModal();
                });
            });
        },
        init: function init() {
            this.insertDom();
            this.initTinyMce();
            this.initShortCodeBuilder();
        }
    };
    CarShopModalApp.init();
})();

/***/ })

/******/ });