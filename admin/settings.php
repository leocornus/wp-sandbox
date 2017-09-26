<?php
/**
 * handle the form submit.
 */
if (isset($_POST['wpbox_settings_form_submit']) &&
    $_POST['wpbox_settings_form_submit'] == 'Y') {

    // show the message.
    echo '<div class="updated"><p><strong>Update Successfully!</strong></p></div>';
}

/**
 * just provide some general information for now.
 */
?>

<div class="wrap">
  <h2>WP Sandbox - General Settings</h2>
  <p>General settings for WordPress Sandbox!</p>

  <form name="wpbox_settings_form" method="post">
    <input type="hidden" name="wpbox_settings_form_submit" value="Y"/>
    <table class="form-table"><tbody>
    </tbody></table>
  </form>

  <h2>This is plugin to explore and learn WordPress functions!</h2>

  <h1>Never use it on Production!!!</h1>
</div>
