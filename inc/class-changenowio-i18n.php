<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 */

class Changenowio_i18n {

	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'changenowio',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/lang/'
		);
	}

}
