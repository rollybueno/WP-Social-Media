<?php
/**
 * Plugin Name: WP Social Media
 * Plugin URI: https://www.rollybueno.com/wp-social-media/
 * Description: WP Social Media is a WordPress plugin that aims to display your public social media content on your website through the use of slideshow. We currently support Instagram and will be expanded into other social media platforms as we grow this plugin.
 * Version: 1.0.0
 * Author: Rolly G. Bueno Jr.
 * Author URI: http://www.rollybueno.com
 * Text Domain: wp-social-media
 * Domain Path: /languages
 * License: GPL v2.0.
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Requires at least: 4.9
 * Tested up to: 5.8
 * Requires PHP: 5.2.4
 * Copyright 2012 Rolly G. Bueno Jr.
 */

DEFINE( 'wp_social_media_version', '1.0.0' );
DEFINE( 'wp_social_media_path', plugin_dir_path( __FILE__ ) );
DEFINE( 'wp_social_media_path_plugin_url', get_option( 'siteurl' ) . '/wp-content/plugins/wp-social-media/' );

/**
 * The code that runs during plugin activation.
 * This action is documented in activator class
 */
function activate_wp_social_media() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/activator.php';
	WP_Social_Media_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in deactivator
 */
function deactivate_wp_social_media() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/deactivator.php';
	WP_Social_Media_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_social_media' );
register_deactivation_hook( __FILE__, 'deactivate_wp_social_media' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/wp-social-media.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function wp_social_media_init() {

	$plugin = new WP_Social_Media();
	$plugin->run();

}
wp_social_media_init();
