<div class="car_shop_group car_shop_<?php echo $display?>" >
	<?php foreach ($cars as $car): ?>
		<?php setup_postdata( $car ); ?>
		<div class="car_shop car-item car_item_modal" data-car_item_id="<?php echo $car->ID; ?>">
			<div class="car_image">
				<?php echo get_the_post_thumbnail( $car, 'medium' );?>
			</div>
			<div class="car_content">
				<h4><?php echo $car->post_title; ?></h4>
				<p> 
					<?php 
						 echo carShopWordExcerpt($car, $excerptLength, 'default' ); 
                   	?> 
				</p>
			</div>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php endforeach; ?>

</div>




