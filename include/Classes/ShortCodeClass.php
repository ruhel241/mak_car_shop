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
			'per_grid'  => 2,
			'excerpt_length' => null
		));

		$attributes = shortcode_atts($defaults, $atts);

		$attributes['view_file']     = self::getViewNameByDisplay( $attributes['display'] );
		$attributes['excerptLength'] = self::getExcerptLength( $attributes );
		$attributes                  = apply_filters( 'car_shop_shortcode_atts', $attributes );
		
		return carShopRenderItems( $attributes );
	}



	private static function getViewNameByDisplay( $display ) {
		$displayArray = array(
			'simple'         => 'simple_items',
			'center'		 => 'center_items',
			'grid'           => 'grid_items'
		);
		$return       = 'default';
		if ( isset( $displayArray[ $display ] ) ) {
			$return = $displayArray[ $display ];
		}

		return apply_filters( 'car_shop_get_view_name_by_display', $return, $display );
	}


	public static function getExcerptLength( $attributes ) {
		if ( $attributes['excerpt_length'] ) {
			return intval( $attributes['excerpt_length'] );
		}
		if ( $attributes['display'] == 'grid' ) {
			return 90 / $attributes['per_grid'];
		}

		return 90;
	}


	public static function saveFlagOnShortCode( $post_id ) {
		if ( isset( $_POST['post_content'] ) ) {
			$post_content = $_POST['post_content'];
		} else {
			$post         = get_post( $post_id );
			$post_content = $post->post_content;
		}
		if ( has_shortcode( $post_content, 'mrk_carshop' ) ) {
			update_post_meta( $post_id, '_has_mrk_carshop_shortcode', 1 );
		} else if ( get_post_meta( $post_id, '_has_mrk_carshop_shortcode', true ) ) {
			update_post_meta( $post_id, '_has_mrk_carshop_shortcode', 0 );
		}
	}






	
}



