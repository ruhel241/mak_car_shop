<div class="ninja_mrk_car_meta_box">
  <?php  foreach ($boxes as $box_key => $box): ?>
   <div class="mrk_root_meta_field">
         <div class="mrk_meta_label">
            <label for="_ninja_car_<?php echo $box_key;?>"> <?php echo @$box['label']; ?> </label>
        </div>
        <div class="mrk_meta_field">
            <input type="<?php echo @$box['type']; ?>" name="_ninja_car_optional_items[<?php echo $box_key; ?>]" class="regular-text"
                   id="_ninja_car_<?php echo $box_key;?>"
                   value="<?php echo @$optional_items[ $box_key ]; ?>">
                   
        </div>
    </div>
  <?php endforeach; ?> 
</div>




