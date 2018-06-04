<div class="car_shop_group">
	<?php foreach ($cars as $car): ?>
		<div class="car-item">
			<div class="car_image">
				<?php echo get_the_post_thumbnail( $car );?>
			</div>

			<div class="car_content">
				<h4><?php echo $car->post_title; ?></h4>
				<p> 
					<?php 
						$post_content = explode(" ", $car->post_content );
				    	$less_content = array_slice($post_content, 0 , 10);
				   		echo implode(" ", $less_content);
					?> 
				</p>
			</div>
		</div>
	<?php endforeach; ?>

</div>




