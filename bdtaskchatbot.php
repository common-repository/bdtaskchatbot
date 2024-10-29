<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.bdtask.com
 * @since             1.0.0
 * @package           Bdtaskchatbot
 *
 * @wordpress-plugin
 * Plugin Name:       Bdtaskchatbot
 * Plugin URI:        http://soft6.bdtask.com/chatbot/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            bdtask
 * Author URI:        www.bdtask.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bdtaskchatbot
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BDTASKCHATBOT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bdtaskchatbot-activator.php
 */
function bdtaskchatbot_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bdtaskchatbot-activator.php';
	Bdtaskchatbot_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bdtaskchatbot-deactivator.php
 */
function bdtaskchatbot_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bdtaskchatbot-deactivator.php';
	Bdtaskchatbot_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'bdtaskchatbot_activate' );
register_deactivation_hook( __FILE__, 'bdtaskchatbot_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bdtaskchatbot.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function bdtaskchatbot_run() {

	$plugin = new Bdtaskchatbot();
	$plugin->run();

}
bdtaskchatbot_run();
