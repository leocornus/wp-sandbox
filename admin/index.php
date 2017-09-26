<?php
// we need a admin page on dashboard for playing and exploring.
add_action('admin_menu', 'wpbox_admin_init');
// TODO: need check it is network activated for not!
// add to the network admin bar for multisite mode.
//add_action('network_admin_menu', 'wpbox_admin_init');

/**
 * the main function to set up admin page.
 */
function wpbox_admin_init() {

    // add the WP Sandbox section on wp-admin dashboard.
    add_menu_page('WP Sandbox', 'WP Sandbox', 
                  'manage_options', // this is only for administrator
                  // menu slug, slug is like keyword.
                  'wp-sandbox/admin/settings.php', 
                  // the function name leave it empty to use the value in slug.
                  // this will also be the default option page.
                  ''
                 );
    // the general settings page.
    add_submenu_page('wp-sandbox/admin/settings.php', // parent slug.
                     'General Settings', 'General Settings',
                     'manage_options', 
                     'wp-sandbox/admin/settings.php'
                    );

    // the admin page to create posts.
    add_submenu_page('wp-sandbox/admin/settings.php', // parent slug.
                     'Create Posts', 'Create Posts',
                     'manage_options', 
                     'wp-sandbox/admin/create-posts.php'
                    );
}
