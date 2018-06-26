<?php

$mediaSize = 'medium';
if($per_grid < 3 ){
	$mediaSize = 'large';
}

?> 
<div class="car_shop_group car_shop_<?php echo $display?>">
	<?php foreach ($cars as $car): ?>
		<div class="car_shop car_shop_grid_<?php echo $per_grid; ?>">
			<div class="car_grid_item"> 
				<div class="grid_image">
					<?php echo get_the_post_thumbnail($car, $mediaSize); ?>
				</div>
				<div class="grid_content">
					<h4> <?php echo $car->post_title; ?></h4>
					<div class="price">$5.00 lac</div>
					<div class="car_details_btn"> Details </div>
					<!-- <span> Read More</span> -->
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>