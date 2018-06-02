<?php

/**
*  @package  Car Shop
*/
namespace MRKCarShop\Classes;

class MetaBoxClass  
{
	public static function addMetaBoxes()
	{
		add_meta_box('ninja_car_shop_main_info_meta', __('Main Information','mrk_car_shop_textdomain'),
		 array(self::class, 'mainInfoMetaBox') );

		add_meta_box('ninja_car_shop_optional_info_meta', __('Optional Information','mrk_car_shop_textdomain'),
		 array(self::class, 'optionalInfoMetaBox') );
		
		add_meta_box('ninja_car_shop_more_info_meta', __('More Informations','mrk_car_shop_textdomain'),
		 array(self::class, 'moreInfoMetaBox') );
	}

	public static function mainInfoMetaBox($post)
	{
		wp_enqueue_style( 'ninja_car_shop_admin_style', MRK_Car_Shop_PLUGIN_URL . 'assets/admin.css' );

		$data = array(
			'_ninja_car_sub_header'  	=>  get_post_meta($post->ID, '_ninja_car_sub_header', true ),
			'_ninja_car_price'  	 	=>  get_post_meta($post->ID, '_ninja_car_price', true ),
			'_ninja_car_reg_year' 		=>  get_post_meta($post->ID, '_ninja_car_reg_year', true ),
			'_ninja_car_insurance_date' =>  get_post_meta($post->ID, '_ninja_car_insurance_date', true ),
			'_ninja_car_fuel_type'   	=>  get_post_meta($post->ID, '_ninja_car_fuel_type', true ),
			'_ninja_car_condition'  	=>  get_post_meta($post->ID, '_ninja_car_condition', true ),
			'_ninja_car_transmission'	=>  get_post_meta($post->ID, '_ninja_car_transmission', true ),
			
		);
		HelperClass::renderView('metaboxes.main_informations', $data);

	}



	public static function optionalInfoMetaBox($post)
	{
		$data = array(
			'boxes' => HelperClass::getOptionInfoItems(),
			'optional_items'  =>  get_post_meta($post->ID, '_ninja_car_optional_items', true ),
		);

		HelperClass::renderView('metaboxes.optional_informations', $data);

	}



	public static function moreInfoMetaBox($post)
	{
		$data = array(
			'moreInfomations' => get_post_meta($post->ID, '_ninja_car_shop_more_info', true), 
		);

		HelperClass::renderView('metaboxes.more_informations', $data);
	}


	public static function saveMeta($post_ID)
	{
		if(! isset($_REQUEST['has_car_meta_info'])){
			return;
		}
			// main informations
		$metaData = array(
			'_ninja_car_sub_header'	    => sanitize_text_field( $_REQUEST['_ninja_car_sub_header'] ),
			'_ninja_car_price'			=> sanitize_text_field($_REQUEST['_ninja_car_price']),
			'_ninja_car_reg_year' 		=> sanitize_text_field($_REQUEST['_ninja_car_reg_year']),
			'_ninja_car_insurance_date' => sanitize_text_field($_REQUEST['_ninja_car_insurance_date']),
			'_ninja_car_fuel_type'		=> sanitize_text_field($_REQUEST['_ninja_car_fuel_type']),
			'_ninja_car_condition' 		=> sanitize_text_field($_REQUEST['_ninja_car_condition']),
			'_ninja_car_transmission' 	=> sanitize_text_field($_REQUEST['_ninja_car_transmission']),
			'_ninja_car_shop_more_info' => wp_kses_post( $_REQUEST['_ninja_car_shop_more_info'] ),
		);

		// car optional informations
		$carOptionalsInfo          = $_REQUEST['_ninja_car_optional_items'];
		$formatedCarShopOptionalInfos = array();
		foreach ( $carOptionalsInfo as $carOptionalIndex => $value ) {
			$formatedCarShopOptionalInfos[ $carOptionalIndex ] = sanitize_text_field( $value );
		}
		$metaData['_ninja_car_optional_items'] = $formatedCarShopOptionalInfos;

		
		foreach ($metaData as $meta_key => $meta_value) {
			update_post_meta($post_ID, $meta_key, $meta_value);
		}
		return; 
	}
	
	
}