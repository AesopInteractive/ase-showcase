<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   ASE_Showcase
 * @author    Nick Haskins <nick@aesopinteractive.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2014 Aesopinteractive L.L.C.
 *
 * @wordpress-plugin
 * Plugin Name:       ASE Showcase
 * Plugin URI:        http://aesopstoryengine.com/showcase
 * Description:       Showcases awesome sites using Aesop Story Engine
 * Version:           1.0.0
 * Author:            Aesopinteractive L.L.C.
 * Author URI:        http://aesopinteractive.com
 * Text Domain:       ase-showcase
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/aesopinteractive/ase-showcase
 * WordPress-Plugin-Boilerplate: v2.6.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

// Set some constants
define('ASE_SHOWCASE_VERSION', '1.0.5');
define('ASE_SHOWCASE_DIR', plugin_dir_path( __FILE__ ));
define('ASE_SHOWCASE_URL', plugins_url( '', __FILE__ ));

require_once( plugin_dir_path( __FILE__ ) . 'public/class-ase-showcase.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 */
register_activation_hook( __FILE__, array( 'ASE_Showcase', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'ASE_Showcase', 'deactivate' ) );


add_action( 'plugins_loaded', array( 'ASE_Showcase', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-ase-showcase-admin.php' );
	add_action( 'plugins_loaded', array( 'ASE_Showcase_Admin', 'get_instance' ) );

}
