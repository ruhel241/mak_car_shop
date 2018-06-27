<?php
/*
Plugin Name: Car Shop 
Plugin URI:  https://developer.wordpress.org/rl-car-shop/the-basics/
Description: Car shop plugin for a seller.
Version:     0.1
Author:      Md.Ruhel Khan
Author URI:  https://ruhel.it
Text Domain: mrk_car_shop_textdomain
Domain Path: /languages
License:     GPL2
 
Restaurant Menu is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Restaurant Menu is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Restaurant Menu. If not, see {License URI}.
*/

defined( 'ABSPATH' ) or die();


define( 'MRK_Car_Shop_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'MRK_Car_Shop_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'MRK_Car_Shop_PLUGIN_VERSION', '1.0.0' );

include 'load.php';

class RLCarShop
{
	
	public function boot()
	{
		$this->commonHooks();
		$this->adminHooks();
	}

	public function publicHooks()
	{
		
	}



	public function commonHooks()
	{	
		$registerPostType = new MRKCarShop\Classes\PostTypeClass();
		add_action('init', array($registerPostType, 'initRegisterCarCPT') );
		
	   $shortCodeClass = new MRKCarShop\Classes\ShortCodeClass();
	   add_shortcode('mrk_carshop', array($shortCodeClass, 'register') );

	    add_action( 'widgets_init', function(){
			register_widget( 'MRKCarShop\Classes\WidgetClass' );
		});

	    $modalContentClass = new \MRKCarShop\Classes\ModalContentClass();
		add_action( 'init', function () use ( $modalContentClass ) {
			if ( isset( $_GET['car_get_item'] ) && $_GET['car_get_item'] ) {
				$modalContentClass->getItemModal();
				die();
			}
		});

		add_filter( 'the_content', array( $modalContentClass, 'filterSingleItemContent' ) );
		add_action( 'wp_enqueue_scripts', array($this, 'enqueueScripts') );
	}


	public function adminHooks()
	{	
		$postTypeName = \MRKCarShop\Classes\PostTypeClass::$postTypeName;
		$car_add_meta = new MRKCarShop\Classes\MetaBoxClass();
		add_action('add_meta_boxes_'.$postTypeName, array($car_add_meta, 'addMetaBoxes') );
		add_action('save_post_'.$postTypeName, array($car_add_meta,'saveMeta') );

		add_action( 'current_screen', function ( $current_screen ) use ( $postTypeName ) {
			if ( $current_screen->post_type != $postTypeName ) {
				\MRKCarShop\Classes\TinyMceClass::registerButton();
			}
		} );

	}



	public function enqueueScripts()
	{	global $post; 
		$postTypeName = \MRKCarShop\Classes\PostTypeClass::$postTypeName;

		wp_register_style('car_shop_style', MRK_Car_Shop_PLUGIN_URL.'assets/style.css', array(), MRK_Car_Shop_PLUGIN_VERSION);
		wp_enqueue_style('car_shop_style');
		

		wp_register_script('car_shop_js', MRK_Car_Shop_PLUGIN_URL .'assets/app.js', array('jquery'), MRK_Car_Shop_PLUGIN_VERSION );
		wp_localize_script('car_shop_js','car_shop_vars', 
			array(
				'get_car_item_url' => site_url( '?car_get_item=1' )
			) 
		);
		wp_enqueue_script('car_shop_js');

	}



}


add_action('plugins_loaded', function(){
	$car_shop = new RLCarShop();
	$car_shop->boot();
});













