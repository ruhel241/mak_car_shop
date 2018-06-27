<div id="car_shopModal_<?php echo $postID; ?>" class="car_modal_dialog">

    <div class="modal_item">
        <a title="Close" class="car_close">x</a>

        <?php $featuredImage = get_the_post_thumbnail_url($post, 'large'); ?>
        <?php do_action('car_shop_before_modal_header', $post); ?>
        <?php if ( $featuredImage ): ?>
            <div style="background-image: url('<?php echo $featuredImage; ?>')" class="car_header_holder">
                <div class="car_header_section">
                    <h3><?php echo $post->post_title; ?></h3>
                    <?php if ( $price ): ?>
                        <p class="price">$<?php echo $price; ?></p>
                    <?php endif; ?>
                    <?php do_action('car_shop_after_modal_header_inner', $post); ?>
                </div>
            </div>
        <?php endif;?>



        <div class="car_modal_content">
            <?php do_action('car_shop_at_modal_content_start', $post); ?>
            <?php if ( ! $featuredImage ): ?>
                <h2 class="car_inner_title"><?php echo $post->post_title; ?></h2>
            <?php endif; ?>

            <?php if($subheader): ?>
                <h4 class="car_sub_header"><?php echo $subheader; ?></h4>
            <?php endif; ?>

            <?php
            $carBrands = wp_get_post_terms( $post->ID, \MRKCarShop\Classes\PostTypeClass::$carBrandName );
            if ( count( $carBrands ) ):
                echo '<div class="car_tax_items">';
                foreach ( $carBrands as $carBrand ):
                    echo '<span>' . $carBrand->name . '</span>';
                endforeach;
                echo "</div>";
            endif;
            ?>
            <div class="car_item_content">
                <?php echo do_shortcode($post->post_content); ?>
            </div>
        </div>
      <?php do_action('car_shop_after_modal_content', $post); ?>





    </div>
</div>