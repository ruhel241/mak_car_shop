(function () { 
    const CarShopModalApp = {
        insertDom() { 
            jQuery('body').append(`
            <div style="display: none;" class="car_shop_shortcode_builder_pop_up" id="car_shop_pop_up">
                <div class="car_shop_pop_shadow"></div>
                
                    <div id="car_shop_moon" class="car_shop_pop_container">
                        <div class="car_shop_header">
                            Insert Car Shop Shortcode
                            <span class="car_shop_pop_close">X</span>
                        </div>

                        <div class="car_shop_pop_body"> 

                            <div class="car_options_group">
                                <div class="car_form_group">
                                    <label> Car Shop Display Type </label>
                                    <div class="car_inline_form_items">
                                        <label m-for="car_display, car_displaykey in car_displays">
                                            <input name="display_type" m-model="shortCode.display" m-literal:value="car_displaykey" type="radio"> {{ car_display.label }}
                                        </label>
                                    </div>
                                </div>
                                <div class="car_form_group">
                                    <label m-if="shortCode.display == 'grid'">
                                        Item Per Grid
                                        <input type="number" max="3" min="1" m-model="shortCode.per_grid" />
                                    </label>
                                </div>
                            </div> 

                            <div class="car_options_group">
                                <div class="car_form_group">
                                    <label> Car Brand Type </label>
                                    <div class="car_inline_form_items">
                                          <label>
                                            <input m-model="shortCode.all_car_brand" m-literal:value="true" name="car_shop_brand_type"  type="radio"> All 
                                          </label>
                                          <label>
                                             <input m-model="shortCode.all_car_brand" m-literal:value="false" name="car_shop_brand_type"  type="radio"> Selected Brands
                                          </label>
                                    </div>
                                </div>
                                <div m-if="shortCode.all_car_brand == false" class="car_form_group">
                                    <label> Select Brand Types that you want to show</label>
                                    <div class="car_inline_form_items">
                                        <label m-for="car_brand, car_brandKey in car_brands">
                                            <input name="car_shop_brand_type" m-on:change="changeData(car_brandKey, 'selectedCarBrand')"  type="checkbox"> {{ car_brand }} 
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="car_options_group">
                                <div class="car_form_group">
                                    <label> Car Model Type </label>
                                    <div class="car_inline_form_items">
                                          <label>
                                            <input m-model="shortCode.all_car_model" m-literal:value="true" name="car_shop_model_type"  type="radio"> All 
                                          </label>
                                          <label>
                                             <input m-model="shortCode.all_car_model" m-literal:value="false" name="car_shop_model_type"  type="radio"> Selected Models 
                                          </label>
                                    </div>
                                </div>
                                <div m-if="shortCode.all_car_model == false" class="car_form_group">
                                    <label> Select Models Types that you want to show</label>
                                    <div class="car_inline_form_items">
                                        <label m-for="car_model, car_modelKey in car_models">
                                            <input name="car_shop_model_type" m-on:change="changeData(car_modelKey, 'selectedCarModel')"  type="checkbox"> {{ car_model }} 
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="car_options_group">
                                <div class="car_form_group">
                                    <label> Car Made Type </label>
                                    <div class="car_inline_form_items">
                                          <label>
                                            <input m-model="shortCode.all_car_made" m-literal:value="true" name="car_shop_made_type"  type="radio"> All 
                                          </label>
                                          <label>
                                             <input m-model="shortCode.all_car_made" m-literal:value="false" name="car_shop_made_type"  type="radio"> Selected Mades 
                                          </label>
                                    </div>
                                </div>
                                <div m-if="shortCode.all_car_made == false" class="car_form_group">
                                    <label> Select Mades Types that you want to show</label>
                                    <div class="car_inline_form_items">
                                        <label m-for="car_made, car_madeKey in car_mades">
                                            <input name="car_shop_made_type" m-on:change="changeData(car_madeKey, 'selectedCarMade')"  type="checkbox"> {{ car_made }} 
                                        </label>
                                    </div>
                                </div>
                            </div>

                         </div>
                        
                        <div class="car_pop_footer">
                            <button m-on:click="car_insertSortCode"  class="car_insert_button" id=""> Insert Shortcode </button>
                        </div>

                    </div>
                </div>
            </div>
        `);
        },
        showModal(editor) {
            window.currentCarEditor = editor;
            jQuery('#car_shop_pop_up').show();
        },
        closeModal() {
            jQuery('#car_shop_pop_up').hide();
        },

        initShortCodeBuilder() {
            let mainApp = this;
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
                        selectedCarMade: [],
                    },
                },
                

                created() {
                    
                },

                methods: { 
                    changeData(key, type) {
                        let prevalues = this.get('shortCode')[type];
                        if (prevalues.indexOf(key) == -1) {
                            prevalues.push(key);
                        } else {
                            prevalues.splice(prevalues.indexOf(key), 1);
                        }
                    },

                    car_insertSortCode() {
                        let shortCode = this.get('shortCode');
                        let shortCodeParts = [
                            'mrk_carshop',
                            "display='" + shortCode.display + "'"
                        ];
                        
                        if(shortCode.display == 'grid') {
                            shortCodeParts.push('per_grid='+shortCode.per_grid);
                        }
                        
                        if(!shortCode.all_car_brand && shortCode.selectedCarBrand.length) {
                            shortCodeParts.push( "brand='"+ shortCode.selectedCarBrand.toLocaleString()+"'");
                        }
                        if(!shortCode.all_car_model && shortCode.selectedCarModel.length) {
                            shortCodeParts.push( "model='"+ shortCode.selectedCarModel.toLocaleString()+"'");
                        }

                        if(!shortCode.all_car_made && shortCode.selectedCarMade.length) {
                            shortCodeParts.push( "made='"+ shortCode.selectedCarMade.toLocaleString()+"'");
                        }
                        
                        let shortcodeString = '['+shortCodeParts.join(' ')+']';
                        currentCarEditor.insertContent(shortcodeString);
                        mainApp.closeModal();
                    }

                }

            })
        },


        initTinyMce() {
            let mainApp = this;
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
        init() {
            this.insertDom();
            this.initTinyMce();
            this.initShortCodeBuilder();
        }
    };
    CarShopModalApp.init();
})();