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
            jQuery('body').append('\n            <div style="display: none;" class="car_shop_shortcode_builder_pop_up" id="car_shop_pop_up">\n                <div class="car_shop_pop_shadow"></div>\n                \n                    <div id="car_shop_moon" class="car_shop_pop_container">\n                        <div class="car_shop_header">\n                            Insert Car Shop Shortcode\n                            <span class="car_shop_pop_close">X</span>\n                        </div>\n\n                        <div class="car_shop_pop_body"> \n\n                            <div class="car_options_group">\n                                <div class="car_form_group">\n                                    <label> Car Shop Display Type </label>\n                                    <div class="car_inline_form_items">\n                                        <label m-for="car_display, car_displaykey in car_displays">\n                                            <input name="display_type" m-model="shortCode.display" m-literal:value="car_displaykey" type="radio"> {{ car_display.label }}\n                                        </label>\n                                    </div>\n                                </div>\n                                <div class="car_form_group">\n                                    <label m-if="shortCode.display == \'grid\'">\n                                        Item Per Grid\n                                        <input type="number" max="3" min="1" m-model="shortCode.per_grid" />\n                                    </label>\n                                </div>\n                            </div> \n\n                            <div class="car_options_group">\n                                <div class="car_form_group">\n                                    <label> Car Brand Type </label>\n                                    <div class="car_inline_form_items">\n                                          <label>\n                                            <input m-model="shortCode.all_car_brand" m-literal:value="true" name="car_shop_brand_type"  type="radio"> All \n                                          </label>\n                                          <label>\n                                             <input m-model="shortCode.all_car_brand" m-literal:value="false" name="car_shop_brand_type"  type="radio"> Selected Brands\n                                          </label>\n                                    </div>\n                                </div>\n                                <div m-if="shortCode.all_car_brand == false" class="car_form_group">\n                                    <label> Select Brand Types that you want to show</label>\n                                    <div class="car_inline_form_items">\n                                        <label m-for="car_brand, car_brandKey in car_brands">\n                                            <input name="car_shop_brand_type" m-on:change="changeData(car_brandKey, \'selectedCarBrand\')"  type="checkbox"> {{ car_brand }} \n                                        </label>\n                                    </div>\n                                </div>\n                            </div>\n\n                            <div class="car_options_group">\n                                <div class="car_form_group">\n                                    <label> Car Model Type </label>\n                                    <div class="car_inline_form_items">\n                                          <label>\n                                            <input m-model="shortCode.all_car_model" m-literal:value="true" name="car_shop_model_type"  type="radio"> All \n                                          </label>\n                                          <label>\n                                             <input m-model="shortCode.all_car_model" m-literal:value="false" name="car_shop_model_type"  type="radio"> Selected Models \n                                          </label>\n                                    </div>\n                                </div>\n                                <div m-if="shortCode.all_car_model == false" class="car_form_group">\n                                    <label> Select Models Types that you want to show</label>\n                                    <div class="car_inline_form_items">\n                                        <label m-for="car_model, car_modelKey in car_models">\n                                            <input name="car_shop_model_type" m-on:change="changeData(car_modelKey, \'selectedCarModel\')"  type="checkbox"> {{ car_model }} \n                                        </label>\n                                    </div>\n                                </div>\n                            </div>\n\n                            <div class="car_options_group">\n                                <div class="car_form_group">\n                                    <label> Car Made Type </label>\n                                    <div class="car_inline_form_items">\n                                          <label>\n                                            <input m-model="shortCode.all_car_made" m-literal:value="true" name="car_shop_made_type"  type="radio"> All \n                                          </label>\n                                          <label>\n                                             <input m-model="shortCode.all_car_made" m-literal:value="false" name="car_shop_made_type"  type="radio"> Selected Mades \n                                          </label>\n                                    </div>\n                                </div>\n                                <div m-if="shortCode.all_car_made == false" class="car_form_group">\n                                    <label> Select Mades Types that you want to show</label>\n                                    <div class="car_inline_form_items">\n                                        <label m-for="car_made, car_madeKey in car_mades">\n                                            <input name="car_shop_made_type" m-on:change="changeData(car_madeKey, \'selectedCarMade\')"  type="checkbox"> {{ car_made }} \n                                        </label>\n                                    </div>\n                                </div>\n                            </div>\n\n                         </div>\n                        \n                        <div class="car_pop_footer">\n                            <button m-on:click="car_insertSortCode"  class="car_insert_button" id=""> Insert Shortcode </button>\n                        </div>\n\n                    </div>\n                </div>\n            </div>\n        ');
        },
        showModal: function showModal(editor) {
            window.currentCarEditor = editor;
            jQuery('#car_shop_pop_up').show();
        },
        closeModal: function closeModal() {
            jQuery('#car_shop_pop_up').hide();
        },
        initShortCodeBuilder: function initShortCodeBuilder() {
            var mainApp = this;
            window.moonApp2 = new Moon({
                el: "#car_shop_moon",
                data: {
                    car_displays: window.car_ShopMceVars.displayTypes,
                    car_brands: window.car_ShopMceVars.brandTypes,
                    car_models: window.car_ShopMceVars.modelTypes,
                    car_mades: window.car_ShopMceVars.madeTypes,
                    myData: [1, 2],
                    shortCode: {
                        display: 'default',
                        per_grid: 2,
                        all_car_brand: true,
                        selectedCarBrand: [],
                        all_car_model: true,
                        selectedCarModel: [],
                        all_car_made: true,
                        selectedCarMade: []
                    }
                },

                created: function created() {},


                methods: {
                    changeData: function changeData(key, type) {
                        var prevalues = this.get('shortCode')[type];
                        if (prevalues.indexOf(key) == -1) {
                            prevalues.push(key);
                        } else {
                            prevalues.splice(prevalues.indexOf(key), 1);
                        }
                    },
                    car_insertSortCode: function car_insertSortCode() {
                        var shortCode = this.get('shortCode');
                        var shortCodeParts = ['mrk_carshop', "display='" + shortCode.display + "'"];

                        if (shortCode.display == 'grid') {
                            shortCodeParts.push('per_grid=' + shortCode.per_grid);
                        }

                        if (!shortCode.all_car_brand && shortCode.selectedCarBrand.length) {
                            shortCodeParts.push("brand='" + shortCode.selectedCarBrand.toLocaleString() + "'");
                        }
                        if (!shortCode.all_car_model && shortCode.selectedCarModel.length) {
                            shortCodeParts.push("model='" + shortCode.selectedCarModel.toLocaleString() + "'");
                        }

                        if (!shortCode.all_car_made && shortCode.selectedCarMade.length) {
                            shortCodeParts.push("made='" + shortCode.selectedCarMade.toLocaleString() + "'");
                        }

                        var shortcodeString = '[' + shortCodeParts.join(' ') + ']';
                        currentCarEditor.insertContent(shortcodeString);
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