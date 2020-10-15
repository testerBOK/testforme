<?php

$config_submenu = array(
	'title'           => 'ChangeNow.io Widget',
	'menu_title'      => 'ChangeNow.io Widget',
	'type'            => 'menu', // menu or metabox
	'submenu'         => true,
	'id'              => $this->plugin_name,
	'capability'      => 'manage_options',
	'plugin_basename' => plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_name . '.php' ),
	'multilang'       => false,
	'tabbed'          => true,
);

$currencies = array(
	'btc'        => 'Bitcoin',
	'eth'        => 'Ethereum',
	'xrp'        => 'Ripple',
	'bch'        => 'Bitcoin Cash',
	'bsv'        => 'Bitcoin SV',
	'ltc'        => 'Litecoin',
	'eos'        => 'EOS',
	'usdt'       => 'Tether (OMNI)',
	'usdterc20'  => 'Tether (ERC-20)',
	'bnb'        => 'Binance Coin (ERC20)',
	'bnbmainnet' => 'Binance Coin Mainnet',
	'xtz'        => 'Tezos',
	'ada'        => 'Cardano',
	'xmr'        => 'Monero',
	'xlm'        => 'Stellar',
	'trx'        => 'TRON',
	'etc'        => 'Ethereum Classic',
	'dash'       => 'Dash',
	'link'       => 'Chainlink',
	'neo'        => 'Neo',
	'ht'         => 'Huobi Token',
	'atom'       => 'Cosmos',
	'iota'       => 'IOTA',
	'cro'        => 'Crypto.Com',
	'zec'        => 'Zcash',
	'ont'        => 'Ontology',
	'xem'        => 'NEM',
	'usdc'       => 'USD Coin',
	'doge'       => 'Dogecoin',
	'vet'        => 'VeChain',
	'bat'        => 'Basic Attention Token',
	'qtum'       => 'QTUM',
	'lsk'        => 'Lisk',
	'dcr'        => 'Decred',
	'icx'        => 'ICON',
	'btg'        => 'Bitcoin Gold',
	'pax'        => 'Paxos Standard Token',
	'rvn'        => 'Ravencoin',
	'rep'        => 'Augur',
	'zrx'        => '0x',
	'bcd'        => 'Bitcoin Diamond',
	'omg'        => 'OmiseGo',
	'tusd'       => 'TrueUSD',
	'hot'        => 'Holo',
	'nano'       => 'Nano',
	'dai'        => 'Dai',
	'waves'      => 'Waves',
	'enj'        => 'Enjin Coin',
	'hc'         => 'HyperCash',
	'nexo'       => 'Nexo',
	'btt'        => 'BitTorrent',
	'zen'        => 'Horizen',
	'dgb'        => 'DigiByte',
	'kmd'        => 'Komodo',
	'mco'        => 'Crypto.Com',
	'sc'         => 'Siacoin',
	'iost'       => 'Internet of Services',
	'dgd'        => 'DigixDAO',
	'xvg'        => 'Verge',
	'zil'        => 'Zilliqa',
	'xzc'        => 'Zcoin',
	'steem'      => 'Steem',
	'ae'         => 'Aeternity',
	'mana'       => 'Decentraland',
	'hbar'       => 'Hedera Hashgraph',
	'knc'        => 'Kyber Network',
	'rlc'        => 'iExec',
	'snt'        => 'Status',
	'ardr'       => 'Ardor',
	'matic'      => 'Matic',
	'elf'        => 'aelf',
	'gnt'        => 'Golem',
	'aion'       => 'Aion',
	'ren'        => 'Ren',
	'npxs'       => 'Pundi X',
	'beam'       => 'BEAM',
	'strat'      => 'Stratis',
	'wtc'        => 'Waltonchain',
	'lrc'        => 'Loopring',
	'lend'       => 'Aave',
	'fet'        => 'Fetch',
	'busd'       => 'Binance USD  (ERC-20)',
	'eng'        => 'Enigma',
	'rcn'        => 'Ripio Credit Network',
	'ark'        => 'Ark',
	'tnt'        => 'Tierion',
	'fun'        => 'FunFair',
	'loom'       => 'Loom Network',
	'ppt'        => 'Populous',
	'powr'       => 'Power Ledger',
	'brd'        => 'Bread',
	'bnt'        => 'BancorNetworkToken',
	'mtl'        => 'Metal',
	'storj'      => 'Storj',
	'cvc'        => 'Civic',
	'go'         => 'GoChain',
	'pivx'       => 'PIVX',
	'sys'        => 'Syscoin',
	'grs'        => 'Groestlcoin',
	'kan'        => 'BitKan',
	'mda'        => 'Moeda Loyalty Points',
	'gas'        => 'Neo Gas',
	'cnd'        => 'Cindicator',
	'poly'       => 'Polymath',
	'cmt'        => 'CyberMiles',
	'perl'       => 'Perlin',
	'wabi'       => 'Tael',
	'storm'      => 'Storm',
	'mft'        => 'Mainframe',
	'adx'        => 'AdEx',
	'pay'        => 'TenXPay',
	'xchf'       => 'CryptoFranc',
	'soc'        => 'All Sports',
	'rdn'        => 'Raiden Network Token',
	'evx'        => 'Everex',
	'bqx'        => 'Ethos',
	'gto'        => 'Gifto',
	'poe'        => 'Po.et',
	'band'       => 'Band Protocol',
	'salt'       => 'Salt',
	'key'        => 'Selfkey',
	'sngls'      => 'SingularDTV',
	'dock'       => 'Dock',
	'snm'        => 'SONM',
	'dnt'        => 'district0x',
	'vib'        => 'Viberate',
	'vibe'       => 'VIBE',
	'dlt'        => 'Agrello',
	'lxt'        => 'Litex',
	'vee'        => 'BLOCKv',
	'srn'        => 'SIRIN LABS Token',
	'ast'        => 'AirSwap',
	'amb'        => 'Ambrosus',
	'lun'        => 'Lunyr',
	'clo'        => 'Callisto Network',
	'ong'        => 'Ontology Gas',
	'husd'       => 'HUSD',
	'node'       => 'Whole Network',
);

$fields[] = array(
	'name'   => 'options',
	'title'  => __( 'General Options', 'changenowio' ),
	'icon'   => 'dashicons-admin-settings',
	'fields' => array(
		array(
			'title' => __( "Partner's API Key", 'changenowio' ),
			'id'    => 'apikey',
			'after' => __( 'Example:', 'changenowio' ) . " <tt>51e76839c82c76056eea7478ec04e828789</tt> <br/> <input type='button' class='button button-primary' value='" . __( 'Delete key', 'changenowio' ) . "' onclick='jQuery(\"input[name*=apikey]\").val(\"\");jQuery(\"form[name=changenowio-widget]\").submit()' />",
			'type'  => 'text',
			'class' => 'text-class',
		),

		array(
			'title'   => '',
			'id'      => 'link',
			'type'    => 'notice',
			'content' => __( 'Get your personal key here:', 'changenowio' ) . " <a target=_blank style='font-size:110%;box-shadow:none' href='//changenow.io/affiliate'>" . __( "Your partner's account on Changenow.io", 'changenowio' ) . " <i class='dashicons-before dashicons-external'></i></a>",
		),

		array(
			'title'      => __( 'Widget shortcode', 'changenowio' ),
			'id'         => 'scw',
			'after'      => sprintf(
				__( 'Copy this shortcode and place anywhere on website: post, page, text or code widget. Or just use the <b>Changenow.io Widget</b> on %s', 'changenowio' ),
				'<a href="/wp-admin/widgets.php">' . __( 'Appearance &rarr; Widgets', 'changenowio' ) . '</a>'
			),
			'default'    => '[changenowio_exchange_widget]',
			'type'       => 'text',
			'attributes' => array( 'readonly' => 'readonly' ),
		),

		array(
			'title'   => __( 'Currency from', 'changenowio' ),
			'after'   => __( 'the selected option will be displayed by default on "You Send" field', 'changenowio' ),
			'id'      => 'currency_from_default',
			'type'    => 'select',
			'options' => $currencies,
			'default' => 'btc',
			'class'   => 'chosen',
		),

		array(
			'title'   => __( 'Currency to', 'changenowio' ),
			'after'   => __( 'the selected option will be displayed by default on "You Get" field', 'changenowio' ),
			'id'      => 'currency_to_default',
			'type'    => 'select',
			'options' => $currencies,
			'default' => 'eth',
			'class'   => 'chosen',
		),

	),
);

$fields[] = array(
	'title'  => __( 'Image', 'changenowio' ),
	'name'   => 'image',
	'icon'   => 'fa fa-picture-o',
	'fields' => array(

		array(
			'title'   => __( 'Show image', 'changenowio' ),
			'id'      => 'showlogo',
			'default' => 'yes',
			'type'    => 'checkbox',
			'style'   => 'fancy',
			'label'   => '',
		),

		array(
			'title'   => '',
			'id'      => 'logo_or_custom',
			'type'    => 'radio',
			'options' => array(
				'1' => __( 'Use Changenow.io logo', 'changenowio' ),
				'2' => __( 'Use custom image', 'changenowio' ),
			),
			'default' => '1',
			'style'   => 'fancy',
		),

		array(
			'title' => __( 'Select custom image', 'changenowio' ),
			'id'    => 'custom_image',
			'type'  => 'image',
		),
	),
);


$fields[] = array(
	'name'   => 'pages',
	'title'  => __( 'Per-page settings', 'changenowio' ),
	'icon'   => 'dashicons-admin-page',
	'fields' => array(

		array(
			'title'   => __( 'Show widget only on selected pages', 'changenowio' ),
			'label'   => __( 'If enabled, the settings below will be applied to the widget', 'changenowio' ),
			'id'      => 'show_on_pages',
			'default' => 'no',
			'type'    => 'checkbox',
			'style'   => 'fancy',
		),

		array(
			'type'        => 'group',
			'id'          => 'per_page',
			'title'       => __( 'Select pages', 'changenowio' ),
			'group_title' => __( 'Settings for page', 'changenowio' ),
			'options'     => array(
				'group_title'  => __( 'Separate settings for selected page', 'changenowio' ),
				'repeater'     => true,
				'accordion'    => true,
				'button_title' => __( 'Add', 'changenowio' ),
				'limit'        => 50,
				'sortable'     => false,
			),
			'fields'      => array(

				array(
					'title'          => __( 'Page', 'changenowio' ),
					'id'             => 'selected_page',
					'type'           => 'select',
					'query'          => array(
						'type' => 'pages',
						'args' => array(
							'orderby' => 'post_date',
							'order'   => 'DESC',
						),
					),
					'default_option' => '',
					'class'          => 'chosen',
				),

				array(
					'title'   => '',
					'label'   => __( 'Use custom defaults:', 'changenowio' ),
					'id'      => 'set_currencies',
					'default' => 'no',
					'type'    => 'checkbox',
					'style'   => 'fancy',
				),

				array(
					'title'   => __( 'Currency from', 'changenowio' ),
					'id'      => 'currency_from',
					'type'    => 'select',
					'options' => $currencies,
					'class'   => 'chosen',
				),

				array(
					'title'   => __( 'Currency to', 'changenowio' ),
					'id'      => 'currency_to',
					'type'    => 'select',
					'options' => $currencies,
					'class'   => 'chosen',
				),

			),
		),
	),
);

$fields[] = array(
	'title'    => __( 'Colors and font', 'changenowio' ),
	'name'     => 'customize',
	'icon'     => 'dashicons-art',
	'sections' => array(

		array(
			'title'  => __( 'Global colors', 'changenowio' ),
			'name'   => 'colors',
			'icon'   => 'dashicons-admin-customizer',
			'fields' => array(

				array(
					'title'   => __( 'Use custom colors', 'changenowio' ),
					'id'      => 'custom_colors',
					'default' => 'no',
					'type'    => 'checkbox',
					'style'   => 'fancy',
					'label'   => ' ',
				),

				array(
					'title'   => __( 'Text', 'changenowio' ),
					'type'    => 'fieldset',
					'id'      => 'color_text',
					'options' => array( 'cols' => 2 ),
					'fields'  => array(
						array(
							'id'      => 'use',
							'title'   => '',
							'default' => 'no',
							'type'    => 'checkbox',
							'style'   => 'fancy',
							'label'   => __( 'Use custom', 'changenowio' ),
						),
						array(
							'id'      => 'color',
							'title'   => '',
							'default' => '#111111',
							'type'    => 'color_wp',
							'rgba'    => true,
						),
					),
				),

				array(
					'title'   => __( 'Background', 'changenowio' ),
					'type'    => 'fieldset',
					'id'      => 'color_bg',
					'options' => array( 'cols' => 2 ),
					'fields'  => array(
						array(
							'id'      => 'use',
							'title'   => '',
							'default' => 'no',
							'type'    => 'checkbox',
							'style'   => 'fancy',
							'label'   => __( 'Use custom', 'changenowio' ),
						),
						array(
							'id'      => 'color',
							'title'   => '',
							'default' => '#ffffff',
							'type'    => 'color_wp',
							'rgba'    => true,
						),
					),
				),

				array(
					'title'   => __( 'Input/select label', 'changenowio' ),
					'type'    => 'fieldset',
					'id'      => 'color_input_text',
					'options' => array( 'cols' => 2 ),
					'fields'  => array(
						array(
							'id'      => 'use',
							'title'   => '',
							'default' => 'no',
							'type'    => 'checkbox',
							'style'   => 'fancy',
							'label'   => __( 'Use custom', 'changenowio' ),
						),
						array(
							'id'      => 'color',
							'title'   => '',
							'default' => '#111111',
							'type'    => 'color_wp',
							'rgba'    => true,
						),
					),
				),

				array(
					'title'   => __( 'Input/select background', 'changenowio' ),
					'type'    => 'fieldset',
					'id'      => 'color_input_bg',
					'options' => array( 'cols' => 2 ),
					'fields'  => array(
						array(
							'id'      => 'use',
							'title'   => '',
							'default' => 'no',
							'type'    => 'checkbox',
							'style'   => 'fancy',
							'label'   => __( 'Use custom', 'changenowio' ),
						),
						array(
							'id'      => 'color',
							'title'   => '',
							'default' => '#ffffff',
							'type'    => 'color_wp',
							'rgba'    => true,
						),
					),
				),

				array(
					'title'   => __( 'Link color', 'changenowio' ),
					'type'    => 'fieldset',
					'id'      => 'color_link_text',
					'options' => array( 'cols' => 2 ),
					'fields'  => array(
						array(
							'id'      => 'use',
							'title'   => '',
							'default' => 'no',
							'type'    => 'checkbox',
							'style'   => 'fancy',
							'label'   => __( 'Use custom', 'changenowio' ),
						),
						array(
							'id'      => 'color',
							'title'   => '',
							'default' => '#627080',
							'type'    => 'color_wp',
							'rgba'    => true,
						),
					),
				),

				array(
					'title'   => __( 'Link hover color', 'changenowio' ),
					'type'    => 'fieldset',
					'id'      => 'color_link_hover_text',
					'options' => array( 'cols' => 2 ),
					'fields'  => array(
						array(
							'id'      => 'use',
							'title'   => '',
							'default' => 'no',
							'type'    => 'checkbox',
							'style'   => 'fancy',
							'label'   => __( 'Use custom', 'changenowio' ),
						),
						array(
							'id'      => 'color',
							'title'   => '',
							'default' => '#3bee81',
							'type'    => 'color_wp',
							'rgba'    => true,
						),
					),
				),

			),
		),

		array(
			'title'  => __( 'Buttons', 'changenowio' ),
			'name'   => 'buttons',
			'icon'   => 'fa fa-mouse-pointer',
			'fields' => array(

				array(
					'title'   => __( 'Use custom colors', 'changenowio' ),
					'id'      => 'custom_colors2',
					'default' => 'no',
					'type'    => 'checkbox',
					'style'   => 'fancy',
					'label'   => ' ',
				),

				array(
					'title'   => '',
					'id'      => 'txt_btns_e',
					'type'    => 'notice',
					'content' => '<b>' . __( 'Exchange type buttons', 'changenowio' ) . '</b>',
				),

				array(
					'title'   => __( 'Button label', 'changenowio' ),
					'type'    => 'fieldset',
					'id'      => 'color_button_type_text',
					'options' => array( 'cols' => 2 ),
					'fields'  => array(
						array(
							'id'      => 'use',
							'title'   => '',
							'default' => 'no',
							'type'    => 'checkbox',
							'style'   => 'fancy',
							'label'   => __( 'Use custom', 'changenowio' ),
						),
						array(
							'id'      => 'color',
							'title'   => '',
							'default' => '#111111',
							'type'    => 'color_wp',
							'rgba'    => true,
						),
					),
				),

				array(
					'title'   => __( 'Button background', 'changenowio' ),
					'type'    => 'fieldset',
					'id'      => 'color_button_type_bg',
					'options' => array( 'cols' => 2 ),
					'fields'  => array(
						array(
							'id'      => 'use',
							'title'   => '',
							'default' => 'no',
							'type'    => 'checkbox',
							'style'   => 'fancy',
							'label'   => __( 'Use custom', 'changenowio' ),
						),
						array(
							'id'      => 'color',
							'title'   => '',
							'default' => '#eeeeee',
							'type'    => 'color_wp',
							'rgba'    => true,
						),
					),
				),

				array(
					'title'   => '',
					'id'      => 'txt_btns_a',
					'type'    => 'notice',
					'content' => '<b>' . __( 'Action buttons', 'changenowio' ) . '</b>',
				),

				array(
					'title'   => __( 'Button label', 'changenowio' ),
					'type'    => 'fieldset',
					'id'      => 'color_button_action_text',
					'options' => array( 'cols' => 2 ),
					'fields'  => array(
						array(
							'id'      => 'use',
							'title'   => '',
							'default' => 'no',
							'type'    => 'checkbox',
							'style'   => 'fancy',
							'label'   => __( 'Use custom', 'changenowio' ),
						),
						array(
							'id'      => 'color',
							'title'   => '',
							'default' => '#111111',
							'type'    => 'color_wp',
							'rgba'    => true,
						),
					),
				),

				array(
					'title'   => __( 'Button background', 'changenowio' ),
					'type'    => 'fieldset',
					'id'      => 'color_button_action_bg',
					'options' => array( 'cols' => 2 ),
					'fields'  => array(
						array(
							'id'      => 'use',
							'title'   => '',
							'default' => 'no',
							'type'    => 'checkbox',
							'style'   => 'fancy',
							'label'   => __( 'Use custom', 'changenowio' ),
						),
						array(
							'id'      => 'color',
							'title'   => '',
							'default' => '#eeeeee',
							'type'    => 'color_wp',
							'rgba'    => true,
						),
					),
				),

			),
		),

		array(
			'title'  => __( 'Font', 'changenowio' ),
			'name'   => 'fonts',
			'icon'   => 'fa fa-font',
			'fields' => array(

				array(
					'title'   => esc_html__( 'Custom font', 'changenowio' ),
					'type'    => 'fieldset',
					'id'      => 'custom_font',
					'options' => array( 'cols' => 1 ),
					'fields'  => array(
						array(
							'id'      => 'use',
							'title'   => '',
							'default' => 'no',
							'type'    => 'checkbox',
							'style'   => 'fancy',
							'label'   => __( 'Use custom font', 'changenowio' ),
						),
						array(
							'id'      => 'font',
							'type'    => 'typography',
							'title'   => '',
							'default' => array(
								'family'  => 'Arial Black',
								'variant' => '600',
								'size'    => 20,
								'height'  => 24,
								'color'   => '#000000',
							),
							'preview' => true,
						),
					),
				),

				// array(
				// 	'title'   => '',
				// 	'label'   => __( 'Use custom font size', 'changenowio' ),
				// 	'id'      => 'custom_font_size',
				// 	'default' => 'no',
				// 	'type'    => 'checkbox',
				// 	'style'   => 'fancy',
				// ),

			),
		),

	),
);

$options_panel = new Exopite_Simple_Options_Framework( $config_submenu, $fields );
