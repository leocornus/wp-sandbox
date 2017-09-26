<?php
/**
 * handle the form submit.
 */
if (isset($_POST['wpbox_settings_form_submit']) &&
    $_POST['wpbox_settings_form_submit'] == 'Y') {

}

/**
 * Some questions and design ideas:
 *
 *  * what's the metadata for a message? here is a list:
 *    title, url, excerpt, feature image url?
 *  * Where to store those message? site option?
 *  * How to get the messages? This depends on where we store 
 *    those messages.
 */
?>

<div class="wrap">
  <h2>WP Sandbox - General Settings</h2>
  <p>General settings for WordPress Sandbox.</p>

  <form name="wpbox_settings_form" method="post">
    <input type="hidden" name="wpbox_settings_form_submit" value="Y"/>
    <table class="form-table"><tbody>
      <tr>
        <th>Enable Animation: </th>
        <td>
          <input type="radio" name="wpbox_enable_animation" 
                 value="true"
            <?php echo (get_site_option('wpbox_enable_animation',
                                        'false') == 'true') ?
                'checked' : '';?>
          > true
          <input type="radio" name="wpbox_enable_animation" 
                 value="false"
            <?php echo (get_site_option('wpbox_enable_animation',
                                        'false') == 'false') ?
                'checked' : '';?>
          > false
        </td>
      </tr>
      <tr>
        <th>Message Title: </th>
        <td><input type="text" id="wpbox_message_title" 
                   name="wpbox_message_title" 
                   value="<?php echo get_site_option('wpbox_message_title'); ?>" size="88"/>
        </td>
      </tr>
      <tr>
        <th>Message URL: </th>
        <td><input type="text" id="wpbox_message_url" 
                   name="wpbox_message_url" 
                   value="<?php echo get_site_option('wpbox_message_url'); ?>" size="88"/>
        </td>
      </tr>
      <!-- tr>
        <th>Message Excerpt: </th>
        <td><textarea id="wpbox_message_excerpt" rows="2" cols="60"
                   name="wpbox_message_excerpt"
            ><?php echo get_site_option('wpbox_message_excerpt'); ?></textarea>
        </td>
      </tr -->
      <tr>
        <th>Message One Title: </th>
        <td><input type="text" id="wpbox_message1_title" 
                   name="wpbox_message1_title" 
                   value="<?php echo get_site_option('wpbox_message1_title'); ?>" size="88"/>
        </td>
      </tr>
      <tr>
        <th>Message One URL: </th>
        <td><input type="text" id="wpbox_message1_url" 
                   name="wpbox_message1_url" 
                   value="<?php echo get_site_option('wpbox_message1_url'); ?>" size="88"/>
        </td>
      </tr>
      <tr>
        <th>Message Two Title: </th>
        <td><input type="text" id="wpbox_message2_title" 
                   name="wpbox_message2_title" 
                   value="<?php echo get_site_option('wpbox_message2_title'); ?>" size="88"/>
        </td>
      </tr>
      <tr>
        <th>Message Two URL: </th>
        <td><input type="text" id="wpbox_message2_url" 
                   name="wpbox_message2_url" 
                   value="<?php echo get_site_option('wpbox_message2_url'); ?>" size="88"/>
        </td>
      </tr>
      <tr>
        <th>Message Three Title: </th>
        <td><input type="text" id="wpbox_message3_title" 
                   name="wpbox_message3_title" 
                   value="<?php echo get_site_option('wpbox_message3_title'); ?>" size="88"/>
        </td>
      </tr>
      <tr>
        <th>Message Three URL: </th>
        <td><input type="text" id="wpbox_message3_url" 
                   name="wpbox_message3_url" 
                   value="<?php echo get_site_option('wpbox_message3_url'); ?>" size="88"/>
        </td>
      </tr>
      <tr>
        <th scope="row"><input type="submit" name="saveSetting" class="button-primary" value="Save Settings" />
        </th>
        <td></td>
      </tr>
    </tbody></table>
  </form>
</div>
