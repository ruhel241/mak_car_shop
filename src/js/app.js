const carShopMainApp = {

	addLoader(){
		let car = {
			loader: jQuery('<div/>',{
				class: 'car_loader'
			})
		};
		jQuery('body').append(car.loader);
	},

	removeLoader(){
		jQuery('body').find(".car_loader").remove();
	},


	fetchItem(itemId){
		this.addLoader();
		jQuery.get(car_shop_vars.get_car_item_url, {
			item_id: itemId
		})
		.then((response) => {
			var carModalHolder = jQuery('<div/>', {
				class: 'car-modal-holder',
				html:response
			}); console.log(response);
			jQuery('body')
				.hide()
				.append(carModalHolder)
				.fadeIn(100);
		})

		.fail((error) => {
			alert('Something is wrong when loading the content. Please try again');
		})

		.always(() => {
			this.removeLoader();
		});
	},

 	removeModal(){
		jQuery('.car-modal-holder').fadeOut('200', function() {
 			jQuery(this).remove();
 			jQuery('html,body').removeClass('car_has_modal');
 			jQuery(document).off('keyup.car_esc_key');
 		});
	},

	initModalClick(){
		var that = this;
		jQuery('.car_item_modal').on('click',function (e) {
			e.preventDefault();
			jQuery('html,body').addClass('car_has_modal');
			let itemId = jQuery(this).attr('data-car_item_id');
			if(itemId){
				that.fetchItem(itemId);
				jQuery(document).on('keyup.car_esc_key',(function (e) {
					if(e.keycode == 27){
						that.removeModal();
					}
				}));
			}
		});

		jQuery(document).on("click", '.car_close', function() {
            that.removeModal();
        });
	},

	documentReady(){
		jQuery(document).ready(() => {
		 this.initModalClick();
	   });
	}


};

carShopMainApp.documentReady();










