(function () {
    const carShopModalApp = {
        insertDom() { 
            jQuery('body').append(`<div style="display: none;" class="car_shop_shortcode_builder_pop_up" id="car_shop_pop_up"> 

            </div>`);
        },
        showModal(editor) {
            window.currentCarEditor = editor;
            jQuery('#car_shop_pop_up').show();
        },
        closeModal() {
            jQuery('#car_shop_pop_up').hide();
        },

        initShortCodeBuilder() {
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
                jQuery('.car_pop_close').on('click', function () {
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
    carShopModalApp.init();
})();