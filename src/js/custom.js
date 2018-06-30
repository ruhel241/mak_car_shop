// jQuery(document).ready(() => {
// 	var serial = 0, imageHeight = 0, Imgheight;

// 	jQuery('.car_grid_item').each(function() {
//         var height;
//         height = jQuery(this).find('.grid_title').outerHeight();
//         if( height > serial ) {
//             serial = height;
//     	}
//     });

//     jQuery('.car_grid_item').each(function() {
//         Imgheight = jQuery(document).find('.grid_image > .grid_image_item').innerHeight();
//         if( Imgheight > imageHeight ) {
//             imageHeight = Imgheight;
            
// 		}

//     });

//     imageHeight = 100;

//     console.log(imageHeight);

//     jQuery(document).find('.grid_image .grid_image_item').css('height', imageHeight);
// 	jQuery(document).find('.grid_title').css('height', serial);
	
// });