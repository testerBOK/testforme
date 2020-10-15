<?php

/**
 * Register all actions and filters for the plugin
 */
class Changenowio_Loader {

	/**
	 */
	protected $actions;
	/**
	 */
	protected $filters;
	/**
	 */
	protected $shortcodes;

	/**
	 */
	public function __construct() {
		$this->actions    = array();
		$this->filters    = array();
		$this->shortcodes = array(
			array( 'changenowio_exchange_widget', 'changenowio_exchange_widget' ),
		);
	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string $hook             wp action name
	 * @param    object $component        ref to the instance of the object with defined action
	 * @param    string $callback         fn name on the $component.
	 * @param    int    $priority         (opt) fn priority whan it should be fired. Default is 10.
	 * @param    int    $accepted_args    (opt) number of arguments that should be passed to the $callback. Default is 1.
	 */
	public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string $hook             The name of the WordPress filter that is being registered.
	 * @param    object $component        A reference to the instance of the object on which the filter is defined.
	 * @param    string $callback         The name of the function definition on the $component.
	 * @param    int    $priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int    $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1
	 */
	public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single
	 * collection.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param    array  $hooks            The collection of hooks that is being registered (that is, actions or filters).
	 * @param    string $hook             The name of the WordPress filter that is being registered.
	 * @param    object $component        A reference to the instance of the object on which the filter is defined.
	 * @param    string $callback         The name of the function definition on the $component.
	 * @param    int    $priority         The priority at which the function should be fired.
	 * @param    int    $accepted_args    The number of arguments that should be passed to the $callback.
	 * @return   array     The collection of actions and filters registered with WordPress.
	 */
	private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {
		$hooks[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args,
		);
		return $hooks;
	}

	/**
	 * Changenow.io exchange widget
	 */
	public function changenowio_exchange_widget( $attr ) {
		// extract(
		// 	shortcode_atts(
		// 		array(
		// 			'active' => 1,
		// 			'num'    => 3,
		// 		),
		// 		$attr
		// 	)
		// );
		ob_start();
		include plugin_dir_path( dirname( __FILE__ ) ) . 'inc/shortcodes/exchange-widget.php';
		$out = ob_get_contents();
		ob_end_clean();
		return $out;
	}

	/**
	 *
	 */
	public function add_script( $tag, $fname, $afterJquery = array( 'jquery' ) ) {
		wp_register_script(
			$tag,
			CHANGENOWIO_URL . 'public/js/' . $fname,
			$afterJquery,
			CHANGENOWIO_VERSION,
			true
		);
		wp_enqueue_script( $tag );
	}

	/**
	 * add our js
	 */
	public function my_scripts() {
		$this->add_script( 'changenowiowidget', 'index.js' );
	}

	/**
	 * Add a link to the settings on the Plugins screen
	 */
	public static function add_settings_link( $links, $file ) {
		if ( $file === 'changenowio-widget/changenow.php' && current_user_can( 'manage_options' ) ) {
			$url = admin_url( 'options-general.php?page=changenowio-widget' );
			// Prevent warnings in PHP 7.0+ when a plugin uses this filter incorrectly.
			$links   = (array) $links;
			$links[] = sprintf( '<a href="%s">%s</a>', $url, __( 'Settings', 'changenowio' ) );
		}
		return $links;
	}

	public function add_options_link( $links ) {
		$links[] = '<a href="' . admin_url( 'options-general.php?page=changenowio-widget' ) . '">' . __( 'Settings', 'changenowio' ) . '</a>';
		return $links;
	}

	function register_changenowio_widget() {
		register_widget( 'ChangenowIoWidget' );
	}

	/**
	 * Register the filters and actions
	 */
	public function run() {
		foreach ( $this->filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->shortcodes as $shortcode ) {
			add_shortcode( $shortcode[0], array( $this, $shortcode[1] ) );
		}

		add_action( 'wp_enqueue_scripts', array( $this, 'my_scripts' ), 1000 );

		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'add_options_link' );

		add_filter( 'plugin_action_links', array( __CLASS__, 'add_settings_link' ), 10, 2 );
		add_filter( 'network_admin_plugin_action_links', array( __CLASS__, 'add_settings_link' ), 10, 2 );

		add_action( 'widgets_init', array( $this, 'register_changenowio_widget' ) );

		// require_once CHANGENOWIO_DIR . 'inc/changenowio-tv-cron-activate.php';
	}

}
