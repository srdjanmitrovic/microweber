
    <label><?php _e("First Name"); ?> </label>
    <input name="cc_first_name"  type="text" value="" />

  
    <label><?php _e("Last Name"); ?></label>
    <input name="cc_last_name"  type="text" value="" />
  

    <label><?php _e("Credit Card"); ?></label>
    <select name="cc_type">
        <option value="Visa" selected>Visa</option>
        <option value="MasterCard">MasterCard</option>
        <option value="Discover">Discover</option>
        <option value="Amex">American Express</option>
      </select>


    <label><?php _e("Credit Card Number"); ?></label>
    <input name="cc_number"  type="text" value="" />

  
    <label><?php _e("Expiration Date"); ?></label>
    <input name="cc_month" class="input-mini" placeholder="Month" style="margin-right:10px;"  type="text" value="" />
    <input name="cc_year" class="input-mini" placeholder="Year"  type="text" value="" />

    <label><?php _e("Verification Code"); ?></label>
    <input name="cc_verification_value"  type="text" value="" />
<div class="cc_process_error"></div>







