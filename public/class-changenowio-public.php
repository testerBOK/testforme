<?php

class Changenowio_Public {

	/**
	 */
	private $plugin_name;
	/**
	 */
	private $version;

	/**
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 */
	public function preload_our_fonts() {
		// $path = plugin_dir_url(__FILE__) . 'font';
		// echo "<link href='{$path}/inter-Regular.woff2' rel='preload' as='font' type='font/woff2' crossorigin />";
	}

	/**
	 */
	public function enqueue_styles() {
		// add_action("wp_head", [$this, "preload_our_fonts"]); // preload fonts
		$path = plugin_dir_url( __FILE__ ) . 'css/';
		// wp_enqueue_style('daterangepicker', $path . 'daterangepicker.css', [], CHANGENOWIO_VERSION);
		wp_enqueue_style( 'cniow', $path . 'main.css', array(), CHANGENOWIO_VERSION );
	}

	/**
	 */
	public function enqueue_scripts() {
		 // wp_enqueue_script('bs4', CHANGENOWIO_URL . 'public/js/bootstrap.js', ['jquery'], '1.15', true);
		// --> еру rest is class-changenowio-loader/my_scripts
	}
}
