<?php


function carShopRenderItems($attributes)
{
	extract($attributes);

	$taxonomies = array(
		\MRKCarShop\Classes\PostTypeClass::$carBrandName => ( $brand ) ? explode( ',', $brand ) : array(),
		\MRKCarShop\Classes\PostTypeClass::$carModelName => ( $model ) ? explode(',', $model ) : array(),
		\MRKCarShop\Classes\PostTypeClass::$carMadeName  => ( $made ) ? explode(',', $made ) : array()
	);
	
	$carItems = carShopGetItems( $taxonomies, $limit, $relation, $attributes );


	if(!$display){
		$display = 'default';
	}

	return \MRKCarShop\Classes\HelperClass::makeView($view_file, array(
		'cars' => $carItems, 
		'display' => $display,
	));


}




function carShopGetItems( $taxonomies, $limit = -1, $tax_relation = 'AND', $attributes )
{
		$taxQuery = array(
			'relation' => $tax_relation,
		);

		foreach ($taxonomies as $tax_name => $cat_taxonomies) {
			if($cat_taxonomies){
				$taxQuery[] = array(
					'taxonomy' => $tax_name,
					'field'  => 'slug',
					'terms'  => $cat_taxonomies,
				);
			}			
		}

		$queryArgs = array(
			'posts_per_page' => $limit,
			'post_type' => \MRKCarShop\Classes\PostTypeClass::$postTypeName,
			'offset' => intval($attributes['offset'])
		);

		if(count($taxQuery) > 1) {
			$queryArgs['tax_query'] = $taxQuery;
		}
	
		$queryArgs = apply_filters('car_shop_post_query_args', $queryArgs, $attributes);
		$cars =  get_posts($queryArgs);

		return $cars;

}








