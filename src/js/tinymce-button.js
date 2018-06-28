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
                    </div>


                </div>
            </div>
        `);
        },
        showModal(editor) {
            window.currentFnEditor = editor;
            jQuery('#car_shop_pop_up').show();
        },
        closeModal() {
            jQuery('#car_shop_pop_up').hide();
        },

        initShortCodeBuilder() {
            let mainApp = this;
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
                        selectedFaqTags: [],
                    }
                },
                

                computed: {
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

                    fn_insertSortCode() {
                        let shortCode = this.get('shortCode');
                        let shortCodeParts = [
                            'mrk_carshop',
                            "display='" + shortCode.fn_display + "'"
                        ];
                        
                        if(shortCode.fn_display == 'grid') {
                            shortCodeParts.push('per_grid='+shortCode.per_grid);
                        }
                        
                        if(!shortCode.all_faq_cats && shortCode.selectedFaqCats.length) {
                            shortCodeParts.push( "faq_cat='"+ shortCode.selectedFaqCats.toLocaleString()+"'");
                        }
                        if(!shortCode.all_faq_tags && shortCode.selectedFaqTags.length) {
                            shortCodeParts.push( "faq_tag='"+ shortCode.selectedFaqTags.toLocaleString()+"'");
                        }
                        
                        let shortcodeString = '['+shortCodeParts.join(' ')+']';
                        currentFnEditor.insertContent(shortcodeString);
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