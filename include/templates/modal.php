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
                echo '<div class="car_tax_items"> Brand: ';
                foreach ( $carBrands as $carBrand ):
                    echo '<span>' . $carBrand->name . '</span>';
                endforeach;
                echo "</div>";
            endif;
            ?>

            <?php 

                $modelNames = wp_get_post_terms($post->ID, \MRKCarShop\Classes\PostTypeClass::$carModelName );
                if( count($modelNames) ):
                    echo '<div class="car_tax_items"> Model: ';
                    foreach ( $modelNames as $modelName ):
                        echo '<span>' . $modelName->name . '</span>';
                    endforeach;
                    echo "</div>";
                endif;
            ?>

            <div class="car_item_content">
                <?php echo do_shortcode($post->post_content); ?>
            </div>
        </div>
      <?php do_action('car_shop_after_modal_content', $post); ?>



        <div class="car_inner_content">
           
            <div class="car_inner_Col-6"> 
                <div class="mainInfoContent">
                    <h1 class="car_inner_title">
                        <?php _e( 'Details', 'mrk_car_shop_textdomain' ); ?>
                    </h1>
                    <div class="car_main_info_lists">
                        <ul class="main_info">
                            <?php if($reg_year):?>
                                <li>
                                    <span class="mainInfo_label">
                                        <strong> Registration Year</strong>
                                    </span>:
                                    <span class="mainInfo_value"><?php echo $reg_year; ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($insurance_date): ?>
                                <li>  
                                    <span class="mainInfo_label">
                                        <strong> Insurance Date</strong>
                                    </span>:
                                    <span class="mainInfo_value"><?php echo $insurance_date; ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($fuel_type): ?>
                                <li>
                                    <span class="mainInfo_label">
                                        <strong> Fuel Type </strong>
                                    </span>:
                                    <span class="mainInfo_value"><?php echo $fuel_type; ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($condition): ?>
                                <li>
                                    <span class="mainInfo_label">
                                        <strong> Condition </strong>
                                    </span>:
                                    <span class="mainInfo_value"><?php echo $condition; ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($transmission !='Select Transmission') : ?>
                                <li>
                                    <span class="mainInfo_label">
                                        <strong> Transmission </strong>
                                    </span>:
                                    <span class="mainInfo_value"><?php echo $transmission; ?></span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            <?php if ( $optional_items ) : ?>
            <div class="car_inner_Col-6">
                <div class="car_inner_optional_content">
                    <h4 class="car_inner_optional_title">
                        <?php _e( 'Optional Information', 'mrk_car_shop_textdomain' ); ?>
                    </h4>
                    <div class="car_optional_list">
                        <ul> 
                            <?php foreach($optional_items as $optional_label => $optional_value) : ?>
                            <li>
                                <span class="optional_label">
                                    <strong> <?php echo $optional_label; ?> </strong>
                                </span>:
                                <span class="optional_value"><?php echo $optional_value; ?></span>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
          <?php endif; ?>
        </div>

        <?php if($more_informations): ?>
            <div class="car_inner_content">
                <h4 class="car_inner_title">
                    <?php _e( 'More Informations', 'mrk_car_shop_textdomain' ); ?>
                </h4>
                <div class="car_optional_list">
                    <?php echo do_shortcode($more_informations); ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>