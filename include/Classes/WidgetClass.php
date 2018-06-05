<?php

namespace MRKCarShop\Classes;

class WidgetClass extends \WP_Widget
{
	
	public function __construct()
	{
		
		parent::__construct( 'car_shop_widget',
			esc_html__( 'Car Shop', 'mrk_car_shop_textdomain' ),
			array(
				'description' => esc_html__( 'Car shop, You can add your website', 'mrk_car_shop_textdomain' )
			)
		);
	}


	public function widget($args, $instance)
	{
		$title = apply_filters('car_widget_title', $instance['title'] );
		echo $args['before_widget'];
		if( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$_car_disable_modal_widget = ! empty( $instance['_car_disable_modal_widget'] );
		$_car_hide_price = ! empty( $instance['_car_hide_price'] );
		$shortcode = "[mrk_carshop excerpt_length = 20  display= " .$instance['_car_display_widget']. 
			         "hide_price=".$_car_hide_price.
			         "limit=".$instance['_car_limit_widget'].
			         "disable_modal=".$_car_disable_modal_widget.
			         "brand=". implode( ',', $instance['_car_brand_widget'] ).
			         "model=".implode( ',', $instance['_car_model_widget'] ).
			         "made=".implode( ',', $instance['_car_made_widget'] )."]";

		echo do_shortcode( $shortcode );
		echo $args['after_widget'];
	}


	public function form($instance)
	{

		$title                 = ! empty( $instance['title'] ) ? $instance['title'] : "";
		$_car_display_widget   = ! empty( $instance['_car_display_widget'] ) ? $instance['_car_display_widget'] : "";
		$_car_brand_widget 	   = ! empty( $instance['_car_brand_widget'] ) ? $instance['_car_brand_widget'] : [];
		$_car_model_widget 	   = ! empty( $instance['_car_model_widget'] ) ? $instance['_car_model_widget'] : [];
		$_car_made_widget  	   = ! empty( $instance['_car_made_widget'] ) ? $instance['_car_made_widget'] : [];
		$_car_limit_widget     = ! empty( $instance['_car_limit_widget'] ) ? $instance['_car_limit_widget'] : "5";
		$_car_disable_modal_widget = ! empty( $instance['_car_disable_modal_widget'] );
		$_car_hide_price           = ! empty( $instance['_car_hide_price'] );

		$displayTypes = HelperClass::getCarDisplayTypes(); 
		$brandTypes    = HelperClass::getCarTermsFormatted( array(
			'taxonomy'   => PostTypeClass::$carBrandName,
			'hide_empty' => false,
		) );
		$modelTypes    = HelperClass::getCarTermsFormatted( array(
			'taxonomy'   => PostTypeClass::$carModelName,
			'hide_empty' => false,
		) );
		$madeTypes    = HelperClass::getCarTermsFormatted( array(
			'taxonomy'   => PostTypeClass::$carMadeName,
			'hide_empty' => false,
		) );

	include MRK_Car_Shop_PLUGIN_DIR_PATH . "include/templates/widgets/car_shop_widget.php";

	}





}

