<?php

$mediaSize = 'medium';
if($per_grid < 3 ){
	$mediaSize = 'large';
}

?> 
<div class="car_shop_group car_shop_<?php echo $display?>">
	<?php foreach ($cars as $car): ?>
		<div class="car_grid_item">
			<div class="grid_image">
				<?php echo get_the_post_thumbnail($car, $mediaSize); ?>
			</div>
			<div class="grid_content">
				<h4> <?php echo $car->post_title; ?></h4>
				<span>$5.00 lac</span>
				<span> Read More</span>
			</div>
		</div>
	<?php endforeach; ?>
</div>