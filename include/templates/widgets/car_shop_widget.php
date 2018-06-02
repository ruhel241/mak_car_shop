<div class="car_widget_item"> 
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"> <?php esc_attr_e( 'Title:', 'mrk_car_textdomain' ); ?> </label> 
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo $title ; ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
</div>


<div class="car_widget_item">
<label for="<?php echo esc_attr( $this->get_field_id( '_car_display_widget' ) ); ?>"> <?php esc_attr_e( 'Display:', 'mrk_car_textdomain' ); ?> </label>
	<select name="<?php echo esc_attr( $this->get_field_name( '_car_display_widget' ) ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( '_car_display_widget' ) ); ?>">
		<?php foreach ($displayTypes as $display_key => $display): ?>
            <option value="<?php echo $display_key; ?>" <?php selected($_car_display_widget,$display_key); ?>> <?php echo $display['label']; ?> </option>
        <?php endforeach; ?>
	</select>
</div>

<div class="car_widget_item">
	<h4> <?php esc_attr_e( 'Brand:', 'mrk_car_textdomain' ); ?> </h4>
<p><small><?php esc_attr_e( 'Don\'t select any if you want to show all brand', 'mrk_car_textdomain' );?></small></p>
	<?php foreach ($brandTypes as $brandTypeKey => $brandTypeItem ) : ?>
		<label>
            <input class="checkbox" name="<?php echo $this->get_field_name("_car_brand_widget");?>[]" type="checkbox" value="<?php echo $brandTypeKey;?>" <?php checked(in_array($brandTypeKey, $_car_brand_widget)) ; ?> >
            <?php echo $brandTypeItem; ?> 
        </label>
	<?php endforeach; ?>
</div>


<div class="car_widget_item">
	<h4> <?php esc_attr_e( 'Model:', 'mrk_car_textdomain' ); ?> </h4>
<p><small><?php esc_attr_e( 'Don\'t select any if you want to show all brand', 'mrk_car_textdomain' );?></small></p>
	<?php foreach ($modelTypes as $modelTypeKey => $modelTypeItem ) : ?>
		<label>
            <input class="checkbox" name="<?php echo $this->get_field_name("_car_model_widget");?>[]" type="checkbox" value="<?php echo $modelTypeKey;?>" <?php checked(in_array($modelTypeKey, $_car_model_widget)) ; ?> >
            <?php echo $modelTypeItem; ?> 
        </label>
	<?php endforeach; ?>
</div>

<div class="car_widget_item">
	<h4> <?php esc_attr_e( 'Made:', 'mrk_car_textdomain' ); ?> </h4>
<p><small><?php esc_attr_e( 'Don\'t select any if you want to show all brand', 'mrk_car_textdomain' );?></small></p>
	<?php foreach ($madeTypes as $madeTypeKey => $madeTypeItem ) : ?>
		<label>
            <input class="checkbox" name="<?php echo $this->get_field_name("_car_made_widget");?>[]" type="checkbox" value="<?php echo $madeTypeKey;?>" <?php checked(in_array($madeTypeKey, $_car_made_widget)) ; ?> >
            <?php echo $madeTypeItem; ?> 
        </label>
	<?php endforeach; ?>
</div>


<div class="car_widget_item">
	<label>
        <?php esc_attr_e( 'Number of posts to show:', 'mrk_car_textdomain' ); ?> 
    </label> 
	<input type="number" name="<?php echo esc_attr( $this->get_field_name( '_car_limit_widget' ) ); ?>" class="tiny-text" step="1" min="1" size="3" value="<?php echo esc_attr( $_car_limit_widget ); ?>">
</div>

<div class="car_widget_item">
	<label>
        <input type="checkbox" name="<?php echo esc_attr( $this->get_field_name( '_car_disable_modal_widget' ) ); ?>"  value="1" <?php checked( $_car_disable_modal_widget, 1 ); ?> id="<?php echo esc_attr( $this->get_field_id( '_car_disable_modal_widget' ) ); ?>">
        <?php esc_attr_e( 'Disable Modal', 'mrk_car_textdomain' ); ?>
    </label>
</div>


<div class="car_widget_item">
    <label>
        <input type="checkbox" name="<?php echo esc_attr( $this->get_field_name( '_car_hide_price' ) ); ?>"  value="1" <?php checked( $_car_hide_price, 1 ); ?> id="<?php echo esc_attr( $this->get_field_id( '_car_hide_price' ) ); ?>">
		<?php esc_attr_e( 'Hide Price', 'mrk_car_textdomain' ); ?>
    </label>
</div>










