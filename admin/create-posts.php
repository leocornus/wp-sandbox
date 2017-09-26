<?php
/**
 * handle the form submit.
 */
if (isset($_POST['wpbox_create_posts_form_submit']) &&
    $_POST['wpbox_create_posts_form_submit'] == 'Y') {

    $dates = explode(':', $_POST['wpbox_post_dates']);
    // using the DatePeriod class to get date ranges.
    // it is a new class since PHP 5.3.0
    $daterange = new DatePeriod(
        // the start date
        // NOTE: the start date is included.
        new DateTime($dates[0]),
        new DateInterval('P1D'),
        // the end date, NOTE: end date is excluded
        new DateTime($dates[1])
    );

    $title = $_POST['wpbox_post_title'];
    $content = $_POST['wpbox_post_content'];

    $excerpt = $_POST['wpbox_post_excerpt'];
    // the category should be a array of integer
    //'post_category' => array(
    //    159, 15692, 7
    //),
    $category = array_map('intval', 
                          // this will only give us an array of strings
                          explode(",", $_POST['wpbox_post_category']));

    foreach($daterange as $a_date) {

        // TODO: process title and content.
        $the_date = $a_date->format('Y-m-d');
        $full_date = $a_date->format('F d, Y');

        // get the the post attributes array
        $my_post = array(
            'post_title' => str_replace('%full_date%', $full_date, $title),
            // this the actually the publish date.
            // date format is like 2017-09-01
            'post_date' => $the_date,
            'post_modified' => $the_date,
            // post Excerpt
            'post_excerpt' => $excerpt,
            // post content.
            'post_content' => str_replace('%the_date%', $the_date, $content),
            // we have to use the IDs of categories to set the categories.
            'post_category' => $category,
            // set the post status to publish
            'post_status' => 'publish'
        );

        $post_id = wp_insert_post($my_post);
    }

    // show the message.
    echo '<div class="updated"><p><strong>Created Post: ' . $post_id . 
         '</strong></p></div>';
}

/**
 * the form to provide inputs for posts to create.
 */
?>

<div class="wrap">
  <h2>WP Sandbox - Create Posts Playground</h2>
  <p>WordPress Sandbox: Try have fun to create posts!</p>

  <form name="wpbox_create_posts_form" method="post">
    <input type="hidden" name="wpbox_create_posts_form_submit" value="Y"/>
    <table class="form-table"><tbody>
      <tr>
        <th>Post Dates (for example: 2017-09-01:2017-09-02) 
            The end date is EXCLUDED:
        </th>
        <td><input type="text" id="wpbox_post_dates" 
                   name="wpbox_post_dates" 
                   value="2017-08-01:2017-08-12" size="88"/>
        </td>
      </tr>
      <tr>
        <th>Post Title: </th>
        <td><input type="text" id="wpbox_post_title" 
                   name="wpbox_post_title" 
                   value="Daily Report - %full_date%" size="88"/>
        </td>
      </tr>
      <tr>
        <th>Post Excerpt: </th>
        <td><input type="text" id="wpbox_post_excerpt" 
                   name="wpbox_post_excerpt" 
                   value="" size="88"/>
        </td>
      </tr>
      <tr>
        <th>Post Content: </th>
        <td><input type="text" id="wpbox_post_content" 
                   name="wpbox_post_content" 
                   value='[daily-traffic date="%the_date%"]' size="88"/>
        </td>
      </tr>
      <tr>
        <th>Post Category (a list of category id separated by comma):</th>
        <td><input type="text" id="wpbox_post_category" 
                   name="wpbox_post_category" 
                   value="7,159" size="88"/>
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
