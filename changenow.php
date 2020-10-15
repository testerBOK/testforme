<?php
/**
 * Plugin Name:       ChangeNow.io Widget
 * Description:       Limitless cryptocurrency exchange (Bitcoin, Ethereum and many others).
 * Author:            ChangeNow.io
 * Author URI:        https://changenow.io
 * Plugin URI:        https://changenow.io
 * Text Domain:       changenowio
 * Domain Path:       /lang
 * Version:           1.0.3
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'CHANGENOWIO_VERSION', '1.0.3' );
define( 'CHANGENOWIO_URL', plugin_dir_url( __FILE__ ) );
define( 'CHANGENOWIO_DIR', plugin_dir_path( __FILE__ ) );

define( 'CHANGENOWIO_CRON_NAME', 'changenowio_cron' );

/**
 */
function activate_changenowio() {
	require_once CHANGENOWIO_DIR . 'inc/class-changenowio-activator.php';
	CHANGENOWIO_Activator::activate();
}

/**
 */
function deactivate_changenowio() {
	require_once CHANGENOWIO_DIR . 'inc/class-changenowio-deactivator.php';
	CHANGENOWIO_Deactivator::deactivate();
}

/**
 */
function run_changenowio() {
	$plugin = new changenowio();
	$plugin->run();
}

/**
 * Go!
 */

// register_activation_hook( __FILE__, 'activate_changenowio' );
// register_deactivation_hook( __FILE__, 'deactivate_changenowio' );

require CHANGENOWIO_DIR . 'inc/class-changenowio.php';

run_changenowio();
