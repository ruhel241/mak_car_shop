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

	return MRKCarShop\Classes\HelperClass::makeView($view_file, array(
		'cars' => $carItems, 
		'display' => $display,
		'per_grid' => $per_grid,
		'excerptLength' => $excerptLength
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

		if($limit == -1) {
			$limit = 9999;
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



function carShopWordExcerpt( $post, $length, $item_type = 'default', $end='....')
{
	if($post->post_exceprt) {
		$string = $post->post_exceprt;
	} else {
		$string = $post->post_content;
	}
	$string = strip_tags($string);
	
	if (strlen($string) > $length) {

		// truncate string
		$stringCut = substr($string, 0, $length);

		// make sure it ends in a word so assassinate doesn't become ass...
		$string = substr($stringCut, 0, strrpos($stringCut, ' ')).$end;
	}
	return apply_filters('car_shop_get_item_except', $string, $post, $item_type);
}





