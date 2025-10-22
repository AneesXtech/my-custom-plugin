<?php
/**
 * Plugin Name: My Custom Plugin
 * Description: A beginner test plugin.
 * Version: 1.0
 * Author: Your Name
 */

function my_custom_plugin_message() {
    echo "<p style='text-align:center; color:green;'>My custom plugin is active!</p>";
}
add_action('wp_footer', 'my_custom_plugin_message');
