<div class="ninja_mrk_car_meta_box">
   <div class="mrk_root_meta_field">
   		<div class="mrk_meta_label">
	        <label for="_ninja_car_shop_more_info"><?php _e( 'More Informations', 'mrk_car_shop_textdomain' ); ?></label>
	    </div>
	    <div class="mrk_meta_field_more_info">
			<?php
			wp_editor( $moreInfomations, '_ninja_car_shop_more_info',
				$settings = array( 'textarea_name' => '_ninja_car_shop_more_info' ) );
			?>
	    </div>
	</div>
</div>


