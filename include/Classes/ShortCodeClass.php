<?php

/**
 * @package Car Shop
 */

namespace MRKCarShop\Classes;

class ShortCodeClass
{
	
	public static function register( $atts )
	{
		
		$defaults = apply_filters('mrk_car_shortcode_defaults', array(
			'display' 	=> 'default',
			'limit' 	=> -1,
			'brand' 	=> false,
			'model' 	=> false,
			'made' 		=> false,
			'relation'  => 'OR',
			'offset'    => 0,
		));

		$attributes = shortcode_atts($defaults, $atts);

		$attributes['view_file']     = self::getViewNameByDisplay( $attributes['display'] );
		$attributes                  = apply_filters( 'car_shop_shortcode_atts', $attributes );
		
		return carShopRenderItems( $attributes );
	}



	private static function getViewNameByDisplay( $display ) {
		$displayArray = array(
			'simple'         => 'simple_food_menu',
			'center_aligned' => 'center_aligned_menu',
			'grid'           => 'grid_items'
		);
		$return       = 'default';
		if ( isset( $displayArray[ $display ] ) ) {
			$return = $displayArray[ $display ];
		}

		return apply_filters( 'car_shop_get_view_name_by_display', $return, $display );
	}


	
}


