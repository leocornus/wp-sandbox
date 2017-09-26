<?php
/**
 * handle the form submit.
 */
if (isset($_POST['wpbox_settings_form_submit']) &&
    $_POST['wpbox_settings_form_submit'] == 'Y') {

    $title = $_POST['wpbox_post_title'];
    $content = $_POST['wpbox_post_content'];

    // TODO: process title and content.

    // get the the post attributes array
    $my_post = array(
        'post_title' => $title,
        'post_content' => $content,
        // we have to use the IDs of categories to set the categories.
        'post_category' => array(
            159, 15692, 7
        ),
        // set the post status to publish
        'post_status' => 'publish'
    );

    $post_id = wp_insert_post($my_post);

    // show the message.
    echo '<div class="updated"><p><strong>Created Post: ' . $post_id . 
         '</strong></p></div>';
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
  <p>General settings for WordPress Sandbox. Try create post!</p>

  <form name="wpbox_settings_form" method="post">
    <input type="hidden" name="wpbox_settings_form_submit" value="Y"/>
    <table class="form-table"><tbody>
      <tr>
        <th>Post Title: </th>
        <td><input type="text" id="wpbox_post_title" 
                   name="wpbox_post_title" 
                   value="Daily Report - [DATE_FULL]" size="88"/>
        </td>
      </tr>
      <tr>
        <th>Post Content: </th>
        <td><input type="text" id="wpbox_post_content" 
                   name="wpbox_post_content" 
                   value="[daily-traffic date='[DATE]']" size="88"/>
        </td>
      </tr>
      <tr>
        <th scope="row"><input type="submit" name="createpost" class="button-primary" 
            value="Create Post" />
        </th>
        <td></td>
      </tr>
    </tbody></table>
  </form>
</div>
