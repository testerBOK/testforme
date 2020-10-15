<?php

/**
 * The admin-specific functionality of the plugin.
 */
class Changenowio_Admin {

	/**
	 */
	private $plugin_name;

	/**
	 */
	private $version;

	/**
	 */
	function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 */
	public function enqueue_scripts() {
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/changenowio-admin.js', array('jquery'), $this->version, false);
	}

	/**
	 */
	public function test_sanitize_callback( $val ) {
		return str_replace( 'a', 'b', $val );
	}

	/**
	 */
	public function create_menu() {
		require plugin_dir_path( __FILE__ ) . 'menu.php';
	}
}

/**
 */
function show_admin_tabs( $current = null ) {
	$tabs = array(
		'changenowio' => 'Changenow.io Widget Plugin Settings',
		// 'changenowio-2' => 'two',
	);

	if ( is_null( $current ) ) {
		if ( isset( $_GET['page'] ) ) {
			$current = $_GET['page'];
		}
	}
	$content  = '';
	$content .= '<h2 class="nav-tab-wrapper">';
	foreach ( $tabs as $location => $tabname ) {
		if ( $current == $location ) {
			$class = 'nav-tab-active';
		} else {
			$class = '';
		}
		$content .= '<a class="nav-tab ' . $class . '" href="?page=' . $location . '">' . $tabname . '</a>';
	}
	$content .= '</h2>';
	return $content;
}
