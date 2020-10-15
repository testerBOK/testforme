<?php

/**
 */
class Changenowio {

	/**
	 */
	protected $loader;
	/**
	 */
	protected $plugin_name;
	/**
	 */
	protected $version;

	/**
	 */
	function __construct() {
		$this->version     = defined( 'CHANGENOWIO_VERSION' ) ? CHANGENOWIO_VERSION : '1.0.0';
		$this->plugin_name = 'changenowio-widget';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 */
	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class-changenowio-widget.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class-changenowio-loader.php'; // actions and filters
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class-changenowio-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-changenowio-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-changenowio-public.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/exopite-simple-options/exopite-simple-options-framework-class.php';
		$this->loader = new Changenowio_Loader();
	}

	/**
	 */
	private function set_locale() {
		$plugin_i18n = new Changenowio_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	/**
	 */
	private function define_admin_hooks() {
		$plugin_admin = new Changenowio_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'init', $plugin_admin, 'create_menu', 999 );
	}

	/**
	 */
	private function define_public_hooks() {
		$plugin_public = new Changenowio_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}

	/**
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 */
	public function get_version() {
		return $this->version;
	}

}
