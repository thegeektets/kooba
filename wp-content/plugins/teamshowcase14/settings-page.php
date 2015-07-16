<?php  
  
//admin enque scrips
function tshowcase_enqueue_settings_js() {
	
	wp_enqueue_script( 'jquery-ui-tabs' );
	wp_deregister_style( 'tshowcase-settings-style' );
	wp_register_style( 'tshowcase-settings-style', plugins_url( 'css/settings.css', __FILE__ ),array(),false,false);
	wp_enqueue_style( 'tshowcase-settings-style' );		
}
  
  
//options page build 
function tshowcase_settings_page () { 

global $ts_labels;

//tshowcase_enqueue_settings_js();



			
?>




 <div class="wrap">
<h2>Settings</h2>
    <?php 
	if(isset($_GET['settings-updated']) && $_GET['settings-updated']=="true") { 
    $msg = "Settings Updated";
    tshowcase_message($msg);
    } ?>
	<form method="post" action="options.php" id="dsform">
    <?php 
	  
    settings_fields( 'tshowcase-plugin-settings' ); 
    $options = get_option('tshowcase-settings'); 

	?>
    
<div id="tabs-left">

<div>
<table cellpadding="5" cellspacing="5">
  <tr>
    <td align="right" style="background-color:#f5f5f5;"><strong >Image Sizes</strong></td>
    <td nowrap>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="150" align="right">Main Image Size</td>
    <td nowrap>Width: 
      <input name="tshowcase-settings[tshowcase_thumb_width]" type="text" value="<?php echo $options['tshowcase_thumb_width']; ?>" size="3" />
      Height:
      <input name="tshowcase-settings[tshowcase_thumb_height]" type="text" value="<?php echo $options['tshowcase_thumb_height']; ?>" size="3" />
      Crop: 
      <select name="tshowcase-settings[tshowcase_thumb_crop]">
        <option value="true" <?php selected($options['tshowcase_thumb_crop'], 'true' ); ?>>Yes</option>
        <option value="false" <?php selected($options['tshowcase_thumb_crop'], 'false' ); ?>>No</option>
        </select></td>
    <td><span class="howto">This will be the size of the Images. When they are uploaded they will follow this settings. If you change this settings after the image is uploaded they will show scaled.</span></td>
  </tr>
  <tr>
    <td width="150" align="right">Thumbnails Pager</td>
    <td nowrap>Width: 
      <input name="tshowcase-settings[tshowcase_tpimg_width]" type="text" value="<?php if(isset($options['tshowcase_tpimg_width'])):echo $options['tshowcase_tpimg_width']; endif; ?>" size="3" /> 
      Height: 
      <input name="tshowcase-settings[tshowcase_tpimg_height]" type="text" value="<?php if(isset($options['tshowcase_tpimg_height'])):echo $options['tshowcase_tpimg_height']; endif; ?>" size="3" /></td>
    <td><span class="howto">This will be the size of the thumbnail images in the 'Thumbnails Pager' layout. Smaller value will prevail, if image doesn't match the size.</span></td>
  </tr>
  <tr>
    <td width="150" align="right">Table Image Size</td>
    <td nowrap>Width: 
      <input name="tshowcase-settings[tshowcase_timg_width]" type="text" value="<?php if(isset($options['tshowcase_timg_width'])):echo $options['tshowcase_timg_width']; endif; ?>" size="3" />
      Height: 
      <input name="tshowcase-settings[tshowcase_timg_height]" type="text" value="<?php if(isset($options['tshowcase_timg_height'])):echo $options['tshowcase_timg_height']; endif; ?>" size="3" /></td>
    <td><span class="howto">This will be the size of the thumbnail images in the 'Table' layout. Smaller value will prevail, if image doesn't match the size.</span></td>
  </tr>
  <tr>
    <td align="right">Social Icons</td>
    <td nowrap><select name="tshowcase-settings[tshowcase_single_social_icons]">
      <option value="font"  <?php selected($options['tshowcase_single_social_icons'], 'font' ); ?> >Vector Font Icons</option>
       <option value="font-gray"  <?php selected($options['tshowcase_single_social_icons'], 'font-gray' ); ?> >Vector Font Icons (Gray Initial State)</option>
      <option value="round-32"  <?php selected($options['tshowcase_single_social_icons'], 'round-32' ); ?> >Round 32x32</option>
      <option value="round-24"  <?php selected($options['tshowcase_single_social_icons'], 'round-24' ); ?> >Round 24x24</option>
      <option value="round-20"  <?php selected($options['tshowcase_single_social_icons'], 'round-20' ); ?> >Round 20x20</option>
      <option value="round-16"  <?php selected($options['tshowcase_single_social_icons'], 'round-16' ); ?> >Round 16x16</option>
      <option value="square-32"  <?php selected($options['tshowcase_single_social_icons'], 'square-32' ); ?> >Square 32x32</option>
      <option value="square-24"  <?php selected($options['tshowcase_single_social_icons'], 'square-24' ); ?> >Square 24x24</option>
      <option value="square-20"  <?php selected($options['tshowcase_single_social_icons'], 'square-20' ); ?> >Square 20x20</option>
      <option value="square-16"  <?php selected($options['tshowcase_single_social_icons'], 'square-16' ); ?> >Square 16x16</option>
      </select></td>
    <td><span class="howto">What Social Icons do you want to display?</span></td>
  </tr>
  
  <tr>
    <td width="150" align="right" style="background-color:#f5f5f5;"><strong><?php echo __('Linking Settings','tshowcase'); ?></strong></td>
    <td nowrap>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="150" align="right">mailto:active</td>
    <td nowrap><input name="tshowcase-settings[tshowcase_mailto]" type="checkbox" id="tshowcase-settings[tshowcase_mailto]" value="1" <?php if(isset($options['tshowcase_mailto'])) { echo 'checked="checked"';}  ?>></td>
    <td><span class="howto">When active, emails will display as a link in the mailto:email format. </span></td>
    </tr>
 
<tr>
    <td width="150" align="right">tel:active</td>
    <td nowrap><input name="tshowcase-settings[tshowcase_tellink]" type="checkbox" id="tshowcase-settings[tshowcase_tellink]" value="1" <?php if(isset($options['tshowcase_tellink'])) { echo 'checked="checked"';}  ?>></td>
    <td><span class="howto">When active, telephone entries will display linked with the tel: protocol. </span></td>
    </tr>

    <tr>
    <td width="150" align="right" style="background-color:#f5f5f5;"><strong>Search Settings</strong></td>
    <td nowrap>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="150" align="right">Exclude From General Search</td>
    <td nowrap><input name="tshowcase-settings[tshowcase_exclude_from_search]" type="checkbox" id="tshowcase-settings[tshowcase_exclude_from_search]" value="1" <?php if(isset($options['tshowcase_exclude_from_search'])) { echo 'checked="checked"';}  ?>></td>
    <td><span class="howto">If active it will exclude the Team Showcase entries from the General Search Results (General Search Form). <br /> You can place a Search Form specific for Team Showcase entries using the widget option available or placing the following shortcode in your page:<br /> 
      <code>[show-team-search filter="" url =""]</code> Where filter = true or false and url = link to a page where you have placed a Team Showcase shortcode (you can leave it blank and it will default to the theme search results page).
    </span></td>
    </tr>
  
  
  <tr>
    <td width="150" align="right" style="background-color:#f5f5f5;"><strong>Single Page Settings</strong></td>
    <td nowrap>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td align="right">Active:</td>
    <td nowrap><select name="tshowcase-settings[tshowcase_single_page]">
      <option value="true" <?php selected($options['tshowcase_single_page'], 'true' ); ?>>Yes</option>
      <option value="false" <?php selected($options['tshowcase_single_page'], 'false' ); ?>>No</option>
    </select></td>
    <td><span class="howto">If active, single pages for each entry will be available.  <strong> If your single pages are not working and you get a 404 Page not Found error, try resaving your <a href='<?php echo get_admin_url(); ?>options-permalink.php'>permalink options</a>.</strong></span></td>
  </tr>
  <tr>
    <td align="right">Page Template:<br><span class="howto">This will be theme dependent</span></td>
    <?php $options['tshowcase_single_page_template'] = isset($options['tshowcase_single_page_template']) ? $options['tshowcase_single_page_template'] : 'post'; ?>
    <td nowrap><select name="tshowcase-settings[tshowcase_single_page_template]">
      <option value="post" <?php selected($options['tshowcase_single_page_template'], 'post' ); ?>>Post</option>
      <option value="page" <?php selected($options['tshowcase_single_page_template'], 'page' ); ?>>Page</option>
      <?php
      if (function_exists('get_page_templates')) { 

        $templates = get_page_templates();
         foreach ( $templates as $template_name => $template_filename ) { ?>
             <option value="<?php echo $template_filename; ?>" <?php selected($options['tshowcase_single_page_template'], $template_filename ); ?>><?php echo $template_name; ?></option>
         <?php }

      }
     
   ?>


    </select></td>
    <td><span class="howto">This option will depend on your theme. Many themes display extra meta information on post pages such as 'posted by' or 'post date' information, which may not be desired. Usually, page templates contain the essential information. If you choose 'Pages' then the team members will be shown using your theme default page template. <storng>Be aware that some themes will not work with this option</strong>, if so (or you want to make a custom page), you can create a file named <code>single-tshowcase.php</code> <a href="http://codex.wordpress.org/Post_Types#Template_Files">as shown on the wordpress codex</a>, and leave this set to Posts.</span></td>
  </tr>
  <tr>
    <td align="right">Layout:</td>
    <td nowrap><select name="tshowcase-settings[tshowcase_single_page_style]">
      <option value="none" <?php selected($options['tshowcase_single_page_style'], 'none' ); ?>>None</option>
      <option value="responsive" <?php selected($options['tshowcase_single_page_style'], 'responsive' ); ?>>Columns</option>
      <option value="vcard" <?php selected($options['tshowcase_single_page_style'], 'vcard' ); ?>>Information Card</option>
      </select></td>
    <td><span class="howto">Choose the layout type for the single page.</span></td>
  </tr>
  <tr>
    <td align="right" nowrap><label for="tshowcase-settings[tshowcase_single_show_posts]">Show Latest Posts</label></td>
    <td nowrap><input name="tshowcase-settings[tshowcase_single_show_posts]" type="checkbox" id="tshowcase-settings[tshowcase_single_show_posts]" value="1"  <?php if(isset($options['tshowcase_single_show_posts'])) { echo 'checked="checked"';}  ?>>
      <input type="text" name="tshowcase-settings[tshowcase_latest_title]" id="tshowcase-settings[tshowcase_latest_title]" value="<?php if(isset($options['tshowcase_latest_title'])) { echo $options['tshowcase_latest_title'];}  ?>"></td>
    <td><span class="howto">When active, if there is a user associated with with the entry, it will display his latest posts, if available.</span></td>
  </tr>
  <tr>
    <td align="right" valign="top" nowrap>Display:</td>
    <td nowrap><table border="0" cellspacing="5" cellpadding="5">
      <tr>
        <td nowrap><input name="tshowcase-settings[tshowcase_single_show_title]" type="checkbox" id="tshowcase-settings[tshowcase_single_show_title]" value="1" <?php if(isset($options['tshowcase_single_show_title'])) { echo 'checked="checked"';}  ?>>
          </td>
        <td nowrap><?php echo $ts_labels['name']['label']; ?></td>
      </tr>
      <tr>
        <td nowrap><input name="tshowcase-settings[tshowcase_single_show_social]" type="checkbox" id="tshowcase-settings[tshowcase_single_show_social]" value="1" <?php if(isset($options['tshowcase_single_show_social'])) { echo 'checked="checked"';}  ?>>
          </td>
        <td nowrap><?php echo $ts_labels['socialicons']['label']; ?></td>
      </tr>
      <tr>
        <td nowrap><input name="tshowcase-settings[tshowcase_single_show_smallicons]" type="checkbox" id="tshowcase-settings[tshowcase_single_show_smallicons]" value="1" <?php if(isset($options['tshowcase_single_show_smallicons'])) { echo 'checked="checked"';}  ?>>
         </td>
        <td nowrap><?php echo $ts_labels['smallicons']['label']; ?></td>
      </tr>
      <tr>
        <td nowrap><input name="tshowcase-settings[tshowcase_single_show_photo]" type="checkbox" id="tshowcase-settings[tshowcase_single_show_photo]" value="1" <?php if(isset($options['tshowcase_single_show_photo'])) { echo 'checked="checked"';}  ?>></td>
        <td nowrap><?php echo $ts_labels['photo']['label']; ?></td>
      </tr>
      <tr>
        <td nowrap><input name="tshowcase-settings[tshowcase_single_show_freehtml]" type="checkbox" id="tshowcase-settings[tshowcase_single_show_freehtml]" value="1" <?php if(isset($options['tshowcase_single_show_freehtml'])) { echo 'checked="checked"';}  ?>></td>
        <td nowrap><?php echo $ts_labels['html']['label']; ?></td>
        </tr>
      <tr>
        <td nowrap><input name="tshowcase-settings[tshowcase_single_show_position]" type="checkbox" id="tshowcase-settings[tshowcase_single_show_position]" value="1" <?php if(isset($options['tshowcase_single_show_position'])) { echo 'checked="checked"';}  ?>></td>
        <td nowrap><?php echo $ts_labels['position']['label']; ?></td>
        </tr>
      <tr>
        <td nowrap><input name="tshowcase-settings[tshowcase_single_show_email]" type="checkbox" id="tshowcase-settings[tshowcase_single_show_email]" value="1" <?php if(isset($options['tshowcase_single_show_email'])) { echo 'checked="checked"';}  ?>></td>
        <td nowrap><?php echo $ts_labels['email']['label']; ?></td>
        </tr>
      <tr>
        <td nowrap><input name="tshowcase-settings[tshowcase_single_show_telephone]" type="checkbox" id="tshowcase-settings[tshowcase_single_show_telephone]" value="1" <?php if(isset($options['tshowcase_single_show_telephone'])) { echo 'checked="checked"';}  ?>></td>
        <td nowrap><?php echo $ts_labels['telephone']['label']; ?></td>
        </tr>
      <tr>
        <td nowrap><input name="tshowcase-settings[tshowcase_single_show_location]" type="checkbox" id="tshowcase-settings[tshowcase_single_show_location]" value="1" <?php if(isset($options['tshowcase_single_show_location'])) { echo 'checked="checked"';}  ?>></td>
        <td nowrap><?php echo $ts_labels['location']['label']; ?></td>
        </tr>
      <tr>
        <td nowrap><input name="tshowcase-settings[tshowcase_single_show_website]" type="checkbox" id="tshowcase-settings[tshowcase_single_show_website]" value="1" <?php if(isset($options['tshowcase_single_show_website'])) { echo 'checked="checked"';}  ?>></td>
        <td nowrap><?php echo $ts_labels['website']['label']; ?></td>
        </tr>
      </table></td>
    <td valign="top"><span class="howto">Set of options to display in the single page.</span> </td>
  </tr>
  <tr>
    <td align="right" style="background-color:#f5f5f5;"><strong>Feature Names</strong></td>
    <td nowrap>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Singular Name:</td>
    <td nowrap><input type="text" name="tshowcase-settings[tshowcase_name_singular]" value="<?php echo $options['tshowcase_name_singular']; ?>" /></td>
    <td><span class="howto">These will be the labels for your features.</span></td>
  </tr>
  <tr>
    <td align="right">Plural Name:</td>
    <td nowrap><input type="text" name="tshowcase-settings[tshowcase_name_plural]" value="<?php echo $options['tshowcase_name_plural']; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Category:</td>
    <td nowrap><input type="text" name="tshowcase-settings[tshowcase_name_category]" value="<?php echo $options['tshowcase_name_category']; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Slug:</td>
    <td nowrap><input type="text" name="tshowcase-settings[tshowcase_name_slug]" value="<?php echo $options['tshowcase_name_slug']; ?>" /></td>
    <td><strong><span class="howto">If you change this option, you might have to update/save the 'permalink' settings again. The slug value should be unique. There can't be any other page or post with the same slug as this.</span></strong></td>
  

  </tr>

   </tr>


  <tr>
    <td align="right" style="background-color:#f5f5f5;"><strong>Custom Styles</strong></td>
    <td nowrap>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="top">Custom CSS:</td>
    <td nowrap><textarea rows="6" columns="10" name="tshowcase-settings[tshowcase_custom_css]"><?php if(isset($options['tshowcase_custom_css'])) { echo $options['tshowcase_custom_css']; } ?></textarea></td>
    <td><span class="howto">Place here any custom CSS you want to display together with the Team Showcase layout.</span></td>
  </tr>




  </table>
</div>

<div id="single"></div>

<div id="names"></div>
</div>
    
	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</form>

<?php }


/* Advanced Settings Page */

function tshowcase_advanced_settings_page () { 


echo "Advanced Settings Page";


}

?>