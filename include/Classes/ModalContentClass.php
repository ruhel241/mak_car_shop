<?php namespace MRKCarShop\Classes;

/**
 * @package Car Shop
 */

class ModalContentClass
{
	public function handleAjax()
	{
		$route          = sanitize_text_field( $_REQUEST['route'] );
		$validEndpoints = array(
			'get_item' => 'getItemModal'
		);

		if ( isset( $validEndpoints[ $route ] ) ) {
			$this->{$validEndpoints[ $route ]}();
			exit();
		}
		
	}



	public function getItemModal()
	{	sleep(1);

		$postId = intval( $_REQUEST['item_id'] );
		$post =  get_post( $postId );
		$itemData =  array(
			'postID' => $postId, 
			'post'	 => $post, 
			'price'  => get_post_meta($postId, '_ninja_car_price', true), 
			'subheader' 	=>  get_post_meta($postId, '_ninja_car_sub_header', true),
			'reg_year' 		=>  get_post_meta($postId, '_ninja_car_reg_year', true ),
			'insurance_date'=>  get_post_meta($postId, '_ninja_car_insurance_date', true ),
			'fuel_type'   	=>  get_post_meta($postId, '_ninja_car_fuel_type', true ),
			'condition'  	=>  get_post_meta($postId, '_ninja_car_condition', true ),
			'transmission'	=>  get_post_meta($postId, '_ninja_car_transmission', true ),
			'optional_items'=>  HelperClass::getItemOptions($postId),
			'more_informations'	=>  get_post_meta($postId, '_ninja_car_shop_more_info', true )
		);
		HelperClass::renderView('modal', $itemData);

	}


	public function filterSingleItemContent($content)
	{
		if ( ! is_singular( array( PostTypeClass::$postTypeName ) ) ) {
			return $content;
		}
	}



	// public function filterSingleMenuContent( $content ) {
	// 	if ( ! is_singular( array( PostTypeClass::$postTypeName ) ) ) {
	// 		return $content;
	// 	}

	// 	$postId   = get_the_ID();
	// 	$price    = HelperClass::formatPrice( get_post_meta( $postId, '_ninja_restaurant_item_price', true ) );
	// 	$currency = HelperClass::getCurrency();
	// 	$data     = array(
	// 		'price'       => $price,
	// 		'post_id'     => get_the_ID(),
	// 		'currency'    => $currency,
	// 		'nutrition'   => HelperClass::getItemNutrition( $postId ),
	// 		'ingredients' => get_post_meta( $postId, '_ninja_restaurant_ingredients', true )
	// 	);

	// 	$extraContent = HelperClass::makeView( 'single_menu_content', $data );

	// 	return $content . $extraContent;
	// }





	
}