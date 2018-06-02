<input type="hidden" name="has_car_meta_info" value="1"/>

<div class="ninja_mrk_car_meta_box">
  
    <div class="mrk_root_meta_field">
        <div class="mrk_meta_label">
            <label for="_ninja_car_sub_header"> <?php _e( 'Sub Header', 'mrk_car_shop_textdomain' ); ?> </label>
        </div>
        <div class="mrk_meta_field">
            <input type="text" name="_ninja_car_sub_header" class="regular-text"
                   id="_ninja_car_sub_header"
                   value="<?php echo @$_ninja_car_sub_header; ?>">
        </div>
    </div>

    <div class="mrk_root_meta_field">
        <div class="mrk_meta_label">
            <label for="_ninja_car_price"> <?php _e('Price','mrk_car_shop_textdomain'); ?> </label>
        </div>
        <div class="mrk_meta_field">
            <input type="text" name="_ninja_car_price" class="regular-text"
                   id="_ninja_car_price"
                   value="<?php echo @$_ninja_car_price; ?>">
        </div>
    </div>
        
    <div class="mrk_root_meta_field">
        <div class="mrk_meta_label">
            <label for="_ninja_car_reg_year"> <?php _e('Registration Year','mrk_car_shop_textdomain'); ?>  </label>
        </div>
        <div class="mrk_meta_field">
            <input type="number" name="_ninja_car_reg_year" class="regular-text"
                   id="_ninja_car_reg_year"
                   value="<?php echo @$_ninja_car_reg_year; ?>">
        </div>
    </div>

    <div class="mrk_root_meta_field">   
        <div class="mrk_meta_label">
            <label for="_ninja_car_insurance_date">  <?php _e('Insurance Date','mrk_car_shop_textdomain'); ?>  </label>
        </div>
        <div class="mrk_meta_field">
            <input type="date" name="_ninja_car_insurance_date" class="regular-text"
                   id="_ninja_car_insurance_date"
                   value="<?php echo @$_ninja_car_insurance_date; ?>">
        </div>
    </div>
       
    <div class="mrk_root_meta_field"> 
        <div class="mrk_meta_label">
            <label for="diesel">  <?php _e('Fuel Type','mrk_car_shop_textdomain'); ?>  </label>
        </div>
        <div class="mrk_meta_field">
             <input type="text" name="_ninja_car_fuel_type" class="regular-text"
                   id="_ninja_car_fuel_type"
                   value="<?php echo @$_ninja_car_fuel_type; ?>" placeholder="Diesel, CNG, Octane, Other" >

            <!-- <label for="diesel"> 
              <input type="checkbox" name="_ninja_car_fuel_type[]" id="diesel" value="diesel" <?php //checked(@$_ninja_car_fuel_type,'diesel') ?> > Diesel 
            </label>
            <label for="petrol"> 
              <input type="checkbox" name="_ninja_car_fuel_type[]" id="petrol" value="petrol"   > Petrol
            </label>
           
            <label for="cng"> 
              <input type="checkbox" name="_ninja_car_fuel_type[]" id="cng" value="cng" <?php //checked(@$_ninja_car_fuel_type,'cng') ?>> CNG
            </label>

            <label for="octane"> 
              <input type="checkbox" name="_ninja_car_fuel_type[]" id="octane" value="octane" <?php //checked(@$_ninja_car_fuel_type,'octane') ?>> Octane
            </label>

            <label for="other"> 
              <input type="checkbox" name="_ninja_car_fuel_type[]" id="other" value="other" <?php //checked(@$_ninja_car_fuel_type,'other') ?>> Other
            </label> -->
    
        </div>
    </div>


    <div class="mrk_root_meta_field">
        <div class="mrk_meta_label">
            <label for="_ninja_car_condition">  <?php _e('Condition','mrk_car_shop_textdomain'); ?>  </label>
        </div>
        <div class="mrk_meta_field">
            <label for="new"> 
              <input type="radio" name="_ninja_car_condition" id="new" value="new" <?php checked(@$_ninja_car_condition,'new') ?>> New 
            </label>
            <label for="used"> 
              <input type="radio" name="_ninja_car_condition" id="used" value="used" <?php checked(@$_ninja_car_condition,'used') ?>> Used
            </label>
            <label for="recondition"> 
              <input type="radio" name="_ninja_car_condition" id="recondition" value="recondition" <?php checked(@$_ninja_car_condition,'recondition') ?>> Recondition
            </label>
         </div>
    </div>

    <div class="mrk_root_meta_field">
        <div class="mrk_meta_label">
            <label for="_ninja_car_transmission"> <?php _e('Transmission','mrk_car_shop_textdomain'); ?> </label>
        </div>
        <div class="mrk_meta_field">
            <select name="_ninja_car_transmission" class="regular-text" required> 
                <option> Select Transmission </option>
                <option value="manual" <?php selected(@$_ninja_car_transmission,'manual') ?> > Manual </option>
                <option value="automatic" <?php selected(@$_ninja_car_transmission,'automatic') ?> >Automatic</option>
                <option value="other_transmission" <?php selected(@$_ninja_car_transmission,'other_transmission') ?>>Other Transmission</option>
            </select>
        </div>
    </div>


</div>





