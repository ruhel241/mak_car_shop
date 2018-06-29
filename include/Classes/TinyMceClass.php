<?php 

namespace MRKCarShop\Classes;

class TinyMceClass
{
	
	public static function registerButton()
	{
		
		// Check if the logged in WordPress User can edit Posts or Pages
		// If not, don't register our TinyMCE plugin
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}
		// Check if the logged in WordPress User has the Visual Editor enabled
		// If not, don't register our TinyMCE plugin
		if ( get_user_option( 'rich_editing' ) !== 'true' ) {
			return;
		}
		
		// Load the TinyMCE plugin : editor_plugin.js 
		add_filter( 'mce_external_plugins', array( self::class, 'addTinymcePlugin' ) );
		// add new buttons
		add_filter( 'mce_buttons', array( self::class, 'addToolbarButton')  );

	}




	public static function addTinymcePlugin($plugin_array)
	{
		
		wp_enqueue_style( 'car_shop_mce_css', MRK_Car_Shop_PLUGIN_URL . 'assets/tinymce-button.css' );
		wp_enqueue_script( 'car_moon_js', MRK_Car_Shop_PLUGIN_URL . 'assets/libs/moon.min.js', array( 'jquery' ),'0.11.0' );

		$plugin_array['car_shop_mce_class'] = MRK_Car_Shop_PLUGIN_URL . 'assets/tinymce-button.js';
		add_action( 'admin_footer', array( self::class, 'localizeVars' ) );
		return $plugin_array;
	}



	public static function addToolbarButton($buttons)
	{
		array_push( $buttons, 'car_shop_mce_class' );
		return $buttons;
	}



	public static function localizeVars() {
	
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


		?>
        <script type="text/javascript">
            var car_ShopMceVars = {
                displayTypes: <?php echo json_encode( $displayTypes ); ?>,
                brandTypes: <?php echo json_encode($brandTypes); ?>,
                modelTypes: <?php echo json_encode($modelTypes); ?>,
                madeTypes: <?php echo json_encode($madeTypes); ?>
            }
        </script>
		<?php
	}











}