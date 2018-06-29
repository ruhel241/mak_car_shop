<div class="car_single_content">
   
    <div class="car_inner_Col-6"> 
        <div class="mainInfoContent">
            <h4 class="car_inner_title">
                <?php _e( 'Details', 'mrk_car_shop_textdomain' ); ?>
            </h4>
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


<div class="single_car_More_Informations_content">
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
 
