<?php

defined( 'ABSPATH' ) or die();

class Changenowio_AJAX {

	protected static $instance = null;

	public function __construct() {
		// // Backend AJAX calls
		// if (current_user_can('manage_options')) {
		// add_action('wp_ajax_admin_backend_call', array($this, 'ajax_backend_call'));
		// }
		// // Frontend AJAX calls
		// add_action('wp_ajax_admin_frontend_call', array($this, 'ajax_frontend_call'));
		// add_action('wp_ajax_nopriv_frontend_call', array($this, 'ajax_frontend_call'));
	}

	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Handle AJAX: Backend
	 */
	public function ajax_backend_call() {
		// Security check
		check_ajax_referer( 'referer_id', 'nonce' );
		$response = 'OK';
		wp_send_json_success( $response );
		die();
	}

	/**
	 * Handle AJAX: Frontend Example
	 */
	public function ajax_frontend_call() {
		// Security check
		check_ajax_referer( 'referer_id', 'nonce' );
		$response = 'OK';
		wp_send_json_success( $response );
		die();
	}

}
