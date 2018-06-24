<?php

/**
 * @package Car Shop
 */
namespace MRKCarShop\Classes;

class HelperClass
{
	
	public static function makeView($file, $data = array())
	{
		$file = sanitize_file_name($file);
		$file = str_replace('.', DIRECTORY_SEPARATOR, $file);

		extract($data);
		$filePath = MRK_Car_Shop_PLUGIN_DIR_PATH . 'include/templates/' .$file. '.php';
		if(!file_exists($filePath)){
			return '';
		}
		ob_start();
		include $filePath;
		return ob_get_clean();

	}

	public static function renderView($file, $data)
	{
		echo self::makeView($file, $data);
	}


	public static function getOptionInfoItems() {
		$items = array(
			'body_type' => array(
				'label' => __('Body Type', 'mrk_car_shop_textdomain'),
				'type' => 'text'
			),

			'engine_capacity' => array(
				'label' => __('Engine Capacity', 'mrk_car_shop_textdomain'),
				'type' => 'text'
			),

			'kilometers_run' => array(
				'label' => __('Kilometers Run', 'mrk_car_shop_textdomain'),
				'type' => 'text'
			),
			
			'exterior_color' => array(
				'label' => __('Exterior Color', 'mrk_car_shop_textdomain'),
				'type' => 'text'
			),
		);
		return apply_filters('ninja_car_shop_option_info', $items);
	}




	public static function getCarTermsFormatted($args = array()) {
		$terms = get_terms( $args );
		$formatted = array();
		if(is_wp_error($terms)) {
			return $formatted;
		}
		foreach ($terms as $term) {
			$formatted[$term->slug] = $term->name;
		}
		return $formatted;
	}




	public static function getCarDisplayTypes() {
		return array(
			'default'        => array(
				'label' => 'Default'
			),
			'center' => array(
				'label' => 'Center Dispaly'
			),
			'simple'         => array(
				'label' => 'Simple Dispaly'
			),
			'grid'           => array(
				'label' => 'Grid Styled'
			)
		);
	}



}




