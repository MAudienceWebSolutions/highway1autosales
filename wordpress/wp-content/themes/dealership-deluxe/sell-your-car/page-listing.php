<?php

/**
 * 
 * Template Name: Sell your Car
 */
?>
<?php get_header(); ?>

            <div id="sidebar-search" > 
		<?php if ( ! dynamic_sidebar( 'Search Module' )) : ?>
				<?php endif; ?>
				</div>
   <div id="content-single">
	   
			<div class="cpsAjaxLoaderSingle"></div>
		<?php cps_ajax_search_results(); ?>
			<div style="border-bottom:none;" class="detail-page-content hideOnSearch">

       
          <div class="blog-post">

           <h1><a href="<?php the_permalink() ?>"><?php the_title();?></a></h1>
           
           <div style="clear:both"></div>

      <!-- Sell your car form -->
      <div class="gorilla-form-wrapper">
        <form id="sell-your-car" name="sell_your_car" method="post" action="" class="gt-form" enctype="multipart/form-data">
          <h3 class="form-title"><?php _e('Your Vehicle Information &raquo;', 'language'); ?></h3>

          <!-- Listing title -->
          <fieldset class="gt-fieldset">
            <label for="gt-title"><?php _e('Your listing title', 'language'); ?></label>
            <input type="text" id="gt-title" value="" tabindex="2" name="title" placeholder="<?php _e('Enter listing title', 'language'); ?>" required/>
          </fieldset>

          <!-- Location -->
          <fieldset class="gt-fieldset">
	          
	          <label for="gt-state"><?php _e('Your State', 'language'); ?></label>
            <?php gt_form_sell_your_car_field_location(3); ?>
            
            
            <label for="gt-city"><?php _e('City', 'language'); ?></label><span class="gt-loading makemodel"></span>
            <select name="city" id="gt-city" tabindex="4" class="gt-select" disabled="disabled" data-value="">
              <option value="" data-value="-1"><?php _e('Select State First', 'language'); ?></option>
            </select>

	          
	          
            <label for="gt-make"><?php _e('Make', 'language'); ?></label>
            <?php gt_form_sell_your_car_field_make(3); ?>

            <label for="gt-model"><?php _e('Model', 'language'); ?></label><span class="gt-loading makemodel"></span>
            <select name="model" id="gt-model" tabindex="4" class="gt-select" disabled="disabled" data-value="">
              <option value="" data-value="-1"><?php _e('Select Make First', 'language'); ?></option>
            </select>

            <label for="gt-year"><?php _e('Year', 'language'); ?></label>
            <?php echo gt_form_sell_your_car_field_year(5); ?>
          </fieldset>

          <!-- Price, Miles -->
          <fieldset class="gt-fieldset">
            <label for="gt-price"><?php _e('Price', 'language'); ?></label>
            <span class="gt-prefix">$</span> <input type="text" id="gt-price" value="" tabindex="6" name="price" placeholder="<?php _e('Enter vehicle price', 'language'); ?>" required number/>

            <label for="gt-miles"><?php _e('Miles', 'language'); ?></label>
            <input type="number" id="gt-miles" min="0" value="" tabindex="7" name="miles" placeholder="<?php _e('Enter vehicle miles', 'language'); ?>" required digits/>
          </fieldset>

          <!-- Colors, Drive -->
          <fieldset class="gt-fieldset">
            <label for="gt-exterior"><?php _e('Exterior', 'language'); ?></label>
            <input type="text" id="gt-exterior" value="" tabindex="8" name="exterior" placeholder="<?php _e('Enter exterior color', 'language'); ?>" required/>

            <label for="gt-interior"><?php _e('Interior', 'language'); ?></label>
            <input type="text" id="gt-interior" value="" tabindex="9" name="interior" placeholder="<?php _e('Enter interior color', 'language'); ?>" required/>

            <label for="gt-drive"><?php _e('Drive', 'language'); ?></label>
            <input type="text" id="gt-drive" value="" tabindex="10" name="drive" placeholder="<?php _e('Enter vehicle drive', 'language'); ?>" />
          </fieldset>

          <!-- VIN, Features -->
          <fieldset class="gt-fieldset">
            <label for="gt-vin"><?php _e('VIN', 'language'); ?></label>
            <input type="text" id="gt-vin" value="" tabindex="11" name="vin" placeholder="<?php _e('Enter VIN number', 'language'); ?>" />

            <label for="gt-features"><?php _e('Features', 'language'); ?></label>
            <input type="text" id="gt-features" value="" tabindex="12" name="features" placeholder="<?php _e('Separate with commas (feature1, feature2, etc)', 'language'); ?>" />
          </fieldset>

          <!-- Transmission, Type -->
          <fieldset class="gt-fieldset">
            <label for="gt-transmission"><?php _e('Transmission', 'language'); ?></label>
            <?php echo gt_form_sell_your_car_field_transmission(13); ?>

            <label for="gt-type"><?php _e('Vehicle Type', 'language'); ?></label>
            <?php echo gt_form_sell_your_car_field_type(14); ?>
          </fieldset>

          <!-- Description -->
          <fieldset class="gt-fieldset">
            <label for="gt-description"><?php _e('Description', 'language'); ?></label>
            <textarea id="gt-description" name="description" tabindex="20" cols="50" rows="10" class="textarea medium"></textarea>
          </fieldset>

          <h3 class="form-subtitle"><?php _e('Vehicle Photos &raquo;', 'language'); ?></h3>

          <!-- Images -->
          <fieldset class="gt-fieldset">
            <input id="fileupload" type="file" name="images[]" class="button round secondary" tabindex="21" multiple>
            <div class="upload-instructions"><?php _e('You may upload up to 12 images and each image may be no larger than 5MB.', 'language') ;?></div>
            <div id="upload-result">
              <table id="uploaded-files">
                <thead>
                  <tr>
                    <th><?php _e('Preview','language');?></th>
                    <th><?php _e('Name','language');?></th>
                    <th><?php _e('Size','language');?></th>
                    <th><?php _e('Status','language');?></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </fieldset>

          <?php if (!is_user_logged_in()): ?>
            <h3 class="form-subtitle"><?php _e('Personal Information &raquo;', 'language'); ?></h3>

            <!-- Name -->
            <fieldset class="gt-fieldset">
              <label for="gt-firstname"><?php _e('First name', 'language'); ?></label>
              <input type="text" id="gt-firstname" value="" tabindex="22" name="firstname" placeholder="<?php _e('Enter your first name', 'language'); ?>" required/>

              <label for="gt-lastname"><?php _e('Last name', 'language'); ?></label>
              <input type="text" id="gt-lastname" value="" tabindex="23" name="lastname" placeholder="<?php _e('Enter your last name', 'language'); ?>" required/>
            </fieldset>

            <!-- Contact -->
            <fieldset class="gt-fieldset">
              <label for="gt-email"><?php _e('Email', 'language'); ?></label>
              <input type="email" id="gt-email" value="" tabindex="24" name="email" placeholder="<?php _e('Enter your e-mail', 'language'); ?>" required/>

              <label for="gt-phone"><?php _e('Phone number', 'language'); ?></label>
              <input type="tel" id="gt-phone" value="" tabindex="25" name="phone" placeholder="<?php _e('Enter your phone number', 'language'); ?>" required/>
            </fieldset>
          <?php endif; ?>

          <!-- Security -->
          <fieldset class="gt-fieldset">
            <div class="securityImage1"><img src="<?php echo get_bloginfo('template_directory'); ?>/includes/captcha/CaptchaSecurityImages3.php?width=100&height=40&characters=5"/></div>
            <label for="security_code3"><?php _e('Security Code', 'language'); ?></label>
            <input id="security_code3" name="security_code3" type="text" required autocomplete="off" tabindex="27" />
            <input type="text" name="referringurl" id="gt-url" />
          </fieldset>

          <!-- Submit -->
          <fieldset class="gt-fieldset">
            <input type="submit" value="<?php _e('Submit & Pay for your listing', 'language'); ?>" tabindex="30" id="gt-submit" name="gt-submit" class="button radius success"/>
            <span class="gt-loading submit"><?php _e($gt_form_waiting_message, 'language') ;?></span>
            
            <input type="reset" value="<?php _e('Clear form', 'language'); ?>" tabindex="31" id="gt-clear" name="gt-clear" class="button radius  secondary"/>
            
             <span class="gt-paypal-img"><img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_SbyPP_mc_vs_dc_ae.jpg" alt"PayPal" /></span>
          </fieldset>

          <?php wp_nonce_field('gt-sell-your-car', 'nonce'); ?>
        </form>

        <!-- Confirmation message -->
        <div style="clear: both"></div>
        <div class="gt-paypal">
          <div data-alert class="gt-message success alert-box radius"><?php _e($gt_form_success_message, 'language') ;?></div>
          <?php echo gt_paypal_form(); ?>
        </div>
      </div>
      <!-- / End sell your car form -->
      <?php //Form ends here. I hope you didn't break anything above! :) ?>

    </div>
    
    </div>

       

	</div>

<div id="sidebar" class="common">				
            <?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
			<?php endif; ?>
		</div>
		
		</div>
    <div class="clearfix"></div>

<?php get_footer(); ?>
