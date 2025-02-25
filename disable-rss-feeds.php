<?php
/*
Plugin Name: Disable RSS Feeds
Plugin URI: https://sysninja.net/
Description: This plugin disables all RSS feeds on your WordPress site and provides a settings page to toggle the feature.
Version: 1.0
Author: Khalequzzaman
Author URI: https://sysninja.net/
License: GPL2
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Add settings page to the admin menu
function drf_add_settings_page() {
    add_options_page(
        'Disable RSS Feeds Settings', // Page title
        'Disable RSS Feeds',         // Menu title
        'manage_options',            // Capability required
        'disable-rss-feeds',         // Menu slug
        'drf_render_settings_page'   // Callback function to render the page
    );
}
add_action('admin_menu', 'drf_add_settings_page');

// Render the settings page
function drf_render_settings_page() {
    // Check if the user has the required capability
    if (!current_user_can('manage_options')) {
        return;
    }

    // Save settings if the form is submitted
    if (isset($_POST['drf_nonce'])) {
        if (wp_verify_nonce($_POST['drf_nonce'], 'drf_settings')) {
            // Update the option based on the checkbox value
            update_option('drf_disable_feeds', isset($_POST['drf_disable_feeds']) ? 1 : 0);
            echo '<div class="notice notice-success"><p>Settings saved!</p></div>';
        }
    }

    // Get the current setting value
    $disable_feeds = get_option('drf_disable_feeds', 1);
    ?>
    <div class="wrap">
        <h1>Disable RSS Feeds Settings</h1>
        <form method="post" action="">
            <?php wp_nonce_field('drf_settings', 'drf_nonce'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="drf_disable_feeds">Disable RSS Feeds</label>
                    </th>
                    <td>
                        <input type="checkbox" name="drf_disable_feeds" id="drf_disable_feeds" value="1" <?php checked($disable_feeds, 1); ?> />
                        <p class="description">Check this box to disable all RSS feeds on your site.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button('Save Settings'); ?>
        </form>
    </div>
    <?php
}

// Disable RSS feeds if the option is enabled
function drf_disable_feeds() {
    if (get_option('drf_disable_feeds', 1)) {
        // Redirect all feed requests to the homepage
        wp_redirect(home_url(), 302);
        exit;
    }
}

// Hook into all feed actions
add_action('do_feed', 'drf_disable_feeds', 1);
add_action('do_feed_rdf', 'drf_disable_feeds', 1);
add_action('do_feed_rss', 'drf_disable_feeds', 1);
add_action('do_feed_rss2', 'drf_disable_feeds', 1);
add_action('do_feed_atom', 'drf_disable_feeds', 1);
add_action('do_feed_rss2_comments', 'drf_disable_feeds', 1);
add_action('do_feed_atom_comments', 'drf_disable_feeds', 1);
