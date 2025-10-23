<?php
/**
 * Plugin Name: My Custom Elementor Addon
 * Description: A custom Elementor Addon Plugin by Muhammad Anees.
 * Version: 1.0.0
 * Author: Muhammad Anees
 * Text Domain: my-custom-plugin
 */

if ( ! defined( 'ABSPATH' ) ) exit;

final class My_Custom_Elementor_Addon {

    public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    public function init() {
        // Check if Elementor is active
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_elementor' ] );
            return;
        }

   public function init() {
    if ( ! did_action( 'elementor/loaded' ) ) {
        add_action( 'admin_notices', [ $this, 'admin_notice_missing_elementor' ] );
        return;
    }

    // Register widgets and categories after Elementor loads
    add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
    add_action( 'elementor/elements/categories_registered', [ $this, 'add_category' ] );

    // Enqueue styles
    add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
}

  public function register_widgets( $widgets_manager ) {
    // Load widget file only when Elementor is ready
    require_once( __DIR__ . '/widgets/info-box-custom.php' );

    // Register the widget class
    $widgets_manager->register( new \Info_Box_Custom() );
}

    public function register_widgets( $widgets_manager ) {
        $widgets_manager->register( new \Info_Box_Custom() );
    }

    public function add_category( $elements_manager ) {
        $elements_manager->add_category(
            'my-custom-category',
            [
                'title' => __( 'My Custom Addons', 'my-custom-plugin' ),
                'icon'  => 'fa fa-plug',
            ]
        );
    }

    public function enqueue_styles() {
        wp_enqueue_style( 'my-custom-addon-style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
    }

    public function admin_notice_missing_elementor() {
        echo '<div class="notice notice-warning"><p>';
        esc_html_e( 'Please install Elementor to use My Custom Elementor Addon.', 'my-custom-plugin' );
        echo '</p></div>';
    }
}

new My_Custom_Elementor_Addon();
