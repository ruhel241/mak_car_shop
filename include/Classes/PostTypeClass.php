<?php

/**
* @package  Car Shop
*/

namespace MRKCarShop\Classes;

class PostTypeClass
{	
	public static $postTypeName = "mrk_carshop";
	public static $carBrandName = 'mrk_car_brand';
	public static $carModelName = 'mrk_car_Model';
	public static $carMadeName = 'mrk_car_Made';
	
	public static function initRegisterCarCPT()
	{
		self::registerCarShopCPT();
		self::registerCarBrand();
		self::registerCarModel();
		self::registerCarMade();
	}


	public static function registerCarShopCPT()
	{
		$carSlug = apply_filters('ninja_car_shop_url_slug', 'mrk_car_shop');
		$CarLabels = array(
			'name'               => _x( 'Car Shop', 'post type general name', 'mrk_car_shop_textdomain' ),
			'singular_name'      => _x( 'Car Shop', 'post type singular name', 'mrk_car_shop_textdomain' ),
			'menu_name'          => _x( 'Car Shop', 'admin menu', 'mrk_car_shop_textdomain' ),
			'name_admin_bar'     => _x( 'Car Shop', 'add new on admin bar', 'mrk_car_shop_textdomain' ),
			'add_new'            => _x( 'Add New Car', 'menu', 'mrk_car_shop_textdomain' ),
			'add_new_item'       => __( 'Add New Car', 'mrk_car_shop_textdomain' ),
			'new_item'           => __( 'New Car', 'mrk_car_shop_textdomain' ),
			'edit_item'          => __( 'Edit Car', 'mrk_car_shop_textdomain' ),
			'view_item'          => __( 'View Car', 'mrk_car_shop_textdomain' ),
			'all_items'          => __( 'All Cars', 'mrk_car_shop_textdomain' ),
			'search_items'       => __( 'Search Car', 'mrk_car_shop_textdomain' ),
			'parent_item_colon'  => __( 'Parent Car:', 'mrk_car_shop_textdomain' ),
			'not_found'          => __( 'No car found.', 'mrk_car_shop_textdomain' ),
			'not_found_in_trash' => __( 'No car found in Trash.', 'mrk_car_shop_textdomain' ),
		);
		$carArgs = array(
			'labels'             => $CarLabels,
			'description'        => __( 'Description.', 'mrk_car_shop_textdomain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $carSlug ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 21,
			'menu_icon'          => 'dashicons-smiley',
			'supports'           => array( 'title', 'thumbnail', 'editor' )
		);
		
		register_post_type( self::$postTypeName, $carArgs);

	}



	public static function registerCarBrand()
	{
		
		$carBrandSlug = apply_filters('ninja_car_brand_url_slug', 'mrk_car_brand_type');
		$CarBrandLabels = array(
			'name'              => _x( 'Brands', 'taxonomy general name', 'mrk_car_shop_textdomain' ),
			'singular_name'     => _x( 'Brand', 'taxonomy singular name', 'mrk_car_shop_textdomain' ),
			'search_items'      => __( 'Search Brand', 'mrk_car_shop_textdomain' ),
			'all_items'         => __( 'All Brand', 'mrk_car_shop_textdomain' ),
			'parent_item'       => __( 'Parent Brand', 'mrk_car_shop_textdomain' ),
			'parent_item_colon' => __( 'Parent Brand:', 'mrk_car_shop_textdomain' ),
			'edit_item'         => __( 'Edit Brand', 'mrk_car_shop_textdomain' ),
			'update_item'       => __( 'Update Brand', 'mrk_car_shop_textdomain' ),
			'add_new_item'      => __( 'Add New Brand', 'mrk_car_shop_textdomain' ),
			'new_item_name'     => __( 'New Brand Name', 'mrk_car_shop_textdomain' ),
			'menu_name'         => __( 'Brands', 'mrk_car_shop_textdomain' ),
		);
		$carBrandArgs = array(
			'hierarchical'      => true,
			'labels'            => $CarBrandLabels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => $carBrandSlug ),
		);
		register_taxonomy( self::$carBrandName, array( self::$postTypeName ), $carBrandArgs );


	}
	
	public static function registerCarModel()
	{
		$carModelSlug = apply_filters('ninja_car_model_url_slug', 'mrk_car_model_type');
		$CarModelLabels = array(
			'name'              => _x( 'Models', 'taxonomy general name', 'mrk_car_shop_textdomain' ),
			'singular_name'     => _x( 'Model', 'taxonomy singular name', 'mrk_car_shop_textdomain' ),
			'search_items'      => __( 'Search Model', 'mrk_car_shop_textdomain' ),
			'all_items'         => __( 'All Model', 'mrk_car_shop_textdomain' ),
			'parent_item'       => __( 'Parent Model', 'mrk_car_shop_textdomain' ),
			'parent_item_colon' => __( 'Parent Model:', 'mrk_car_shop_textdomain' ),
			'edit_item'         => __( 'Edit Model', 'mrk_car_shop_textdomain' ),
			'update_item'       => __( 'Update Model', 'mrk_car_shop_textdomain' ),
			'add_new_item'      => __( 'Add New Model', 'mrk_car_shop_textdomain' ),
			'new_item_name'     => __( 'New Model Name', 'mrk_car_shop_textdomain' ),
			'menu_name'         => __( 'Models', 'mrk_car_shop_textdomain' ),
		);
		$carModelArgs = array(
			'hierarchical'      => true,
			'labels'            => $CarModelLabels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => $carModelSlug ),
		);
		register_taxonomy( self::$carModelName, array( self::$postTypeName ), $carModelArgs );

	}

	public static function registerCarMade ()
	{

		$carMadeSlug = apply_filters('ninja_car_Made_url_slug', 'mrk_car_Made_type');
		$CarMadeLabels = array(
			'name'              => _x( 'Made', 'taxonomy general name', 'mrk_car_shop_textdomain' ),
			'singular_name'     => _x( 'Made', 'taxonomy singular name', 'mrk_car_shop_textdomain' ),
			'search_items'      => __( 'Search Made', 'mrk_car_shop_textdomain' ),
			'all_items'         => __( 'All Made', 'mrk_car_shop_textdomain' ),
			'parent_item'       => __( 'Parent Made', 'mrk_car_shop_textdomain' ),
			'parent_item_colon' => __( 'Parent Made:', 'mrk_car_shop_textdomain' ),
			'edit_item'         => __( 'Edit Made', 'mrk_car_shop_textdomain' ),
			'update_item'       => __( 'Update Made', 'mrk_car_shop_textdomain' ),
			'add_new_item'      => __( 'Add New Made', 'mrk_car_shop_textdomain' ),
			'new_item_name'     => __( 'New Made Name', 'mrk_car_shop_textdomain' ),
			'menu_name'         => __( 'Made', 'mrk_car_shop_textdomain' ),
		);
		$carMadeArgs = array(
			'hierarchical'      => true,
			'labels'            => $CarMadeLabels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => $carMadeSlug ),
		);
		register_taxonomy( self::$carMadeName, array( self::$postTypeName ), $carMadeArgs );
	
	}

}




