<?php

if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'getopt_' ) ) {
	function getopt_( $opts, $name ) {
		return isset( $opts[ $name ] ) ? $opts[ $name ] : '';
	}
}
if ( ! function_exists( 'getopt_c_' ) ) {
	function getopt_c_( $opts, $name, $valname = 'color' ) {
		return isset( $opts[ $name ] ) ? (
			$opts[ $name ]['use'] == 'yes'
				? ( isset( $opts[ $name ][ $valname ] ) ? $opts[ $name ][ $valname ] : false )
				: false
		) : false;
	}
}

$options      = get_option( 'changenowio-widget' );
$per_page     = array();
$use_per_page = ( isset( $options['show_on_pages'] ) ? $options['show_on_pages'] : '' ) == 'yes';
if ( $use_per_page ) {
	$pp = isset( $options['per_page'] ) ? $options['per_page'] : array();
	foreach ( $pp as $p ) {
		$setcur = $p['set_currencies'] == 'yes';
		$set    = array( 'set' => $setcur );
		if ( $setcur ) {
			$set['from'] = $p['currency_from'];
			$set['to']   = $p['currency_to'];
		}
		$per_page[ $p['selected_page'] ] = $set;
	}
}
$def_from   = getopt_( $options, 'currency_from_default' );
$def_to     = getopt_( $options, 'currency_to_default' );
$sl         = getopt_( $options, 'showlogo' ) == '';
$use_colors = getopt_( $options, 'custom_colors' ) == 'yes';

$OPT = array(
	'apikey'          => getopt_( $options, 'apikey' ),
	'logo_show'       => getopt_( $options, 'showlogo' ) == 'yes' || $sl,
	'logo_custom'     => trim( getopt_( $options, 'custom_image' ) ),
	'use_custom_logo' => getopt_( $options, 'logo_or_custom' ) == 2,
	'def_from'        => $def_from == '' ? 'btc' : $def_from,
	'def_to'          => $def_to == '' ? 'eth' : $def_to,
	'per_page'        => $per_page,
	'use_per_page'    => $use_per_page,
	'font'            => getopt_c_( $options, 'custom_font', 'font' ),
	'use_font_size'   => getopt_( $options, 'custom_font_size' ) == 'yes',
	'use_colors'      => $use_colors,
	'colors'          => array(
		'text'           => getopt_c_( $options, 'color_text' ),
		'bg'             => getopt_c_( $options, 'color_bg' ),
		'link'           => getopt_c_( $options, 'color_link_text' ),
		'link_hover'     => getopt_c_( $options, 'color_link_hover_text' ),
		'input'          => getopt_c_( $options, 'color_input_text' ),
		'input_bg'       => getopt_c_( $options, 'color_input_bg' ),
		'button'         => getopt_c_( $options, 'color_button_text' ),
		'button_bg'      => getopt_c_( $options, 'color_button_bg' ),
		'button_type'    => getopt_c_( $options, 'color_button_type_text' ),
		'button_type_bg' => getopt_c_( $options, 'color_button_type_bg' ),
		'button_act'     => getopt_c_( $options, 'color_button_action_text' ),
		'button_act_bg'  => getopt_c_( $options, 'color_button_action_bg' ),
	),
);

$cur_from = $OPT['def_from'];
$cur_to   = $OPT['def_to'];

if ( $OPT['use_per_page'] ) {
	global $post;
	$pid  = $post->ID;
	$per_ = $OPT['per_page'];
	if ( ! isset( $per_[ $pid ] ) ) {
		return;
	}
	$per = $per_[ $pid ];
	if ( $per['set'] ) {
		$cur_from = $per['from'];
		$cur_to   = $per['to'];
	}
}

$cur_from_u = strtoupper( $cur_from );
$cur_to_u   = strtoupper( $cur_to );

?>

<div class="changenowiow-wrap">

<div class="exchange-widget">

	<div class="exchange-widget--main-form exchange-form-widget">

		<div class="widget-form-header">
			<?php if ( $OPT['logo_show'] ) : ?>
				<div class="exchange-widget--icon">
					<?php if ( $OPT['use_custom_logo'] && ( $OPT['logo_custom'] !== '' ) ) : ?>
						<div class="logotype--custom" style="background-image:url('<?php echo $OPT['logo_custom']; ?>')"></div>
					<?php else : ?>
						<div class="logotype--main"></div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="tabs">
				<div class="tabs-label active"><?php _e( 'Exchange now', 'changenowio' ); ?></div>
				<div class="tabs-label fix"><?php _e( 'Fixed Rate', 'changenowio' ); ?></div>
			</div>
		</div>

		<form>
			<input class="api-key-input API_KEY" type="hidden" value="<?php echo str_replace( '"', '', $OPT['apikey'] ); ?>" />
			<div class="exchange-widget--form-wrapper">
				<div class="exchange-input currency-from">
					<div class="exchange-input-title input-from-title"><?php _e( 'You send', 'changenowio' ); ?></div>
					<input type="text" value="" class="fromInputId" autocomplete="off">
					<div class="exchange-input-search input-search-from">
						<span class='currency-coin-ticker coin-ticker-from' data-curr_from='<?php echo $cur_from; ?>'><?php echo $cur_from_u; ?></span>
						<div class="currencies-container currencies-from-container"></div>
					</div>
				</div>
				<div class="exchange-input currency-to">
					<div class="exchange-input-title"><?php _e( 'You get', 'changenowio' ); ?></div>
					<div class="loader form-loader hide"></div>
					<input type="text" value="-" disabled class="toInputId" autocomplete="off">
					<div class="exchange-input-search input-search-to">
						<span class='currency-coin-ticker coin-ticker-to' data-curr_to='<?php echo $cur_to; ?>'><?php echo $cur_to_u; ?></span>
						<div class="currencies-container currencies-to-container"></div>
					</div>
				</div>
				<div class="exchange-widget--rate"><span class="exchange-rate-board">1 <?php echo $cur_from_u; ?> ~ <?php echo $cur_to_u; ?></span><a class="exchange-widget--faq-link" href="https://changenow.io/faq/what-is-the-expected-exchange-rate" target="_blank"><?php _e( 'Expected rate', 'changenowio' ); ?></a></div>
				<button class="button exchange-from--button"><?php _e( 'Exchange', 'changenowio' ); ?></button>
			</div>
		</form>
	</div>
	<div class="stepper-modal--wrapper">
		<div class="stepper-modal">
			<div class="stepper-modal-header">
				<div class="header-line"></div>
				<div class="step-number">1</div>
				<div class="step-title"><?php _e( 'Pre step', 'changenowio' ); ?></div>
			</div>
			<div class="stepper-modal-body">
				<div class="stepper-modal--close"></div>
				<div class="stepper-modal--arrow-back"></div>
				<div class="step step-one">
					<div class="step-body">
						<div class="exchange-widget--main-form exchange-form-stepper">
							<div class="tabs">
								<div class="tabs-label active"><?php _e( 'Exchange now', 'changenowio' ); ?> </div>
								<div class="tabs-label fix"><?php _e( 'Fixed Rate', 'changenowio' ); ?></div>
							</div>
							<form>
								<div class="exchange-widget--form-wrapper">
									<div class="exchange-input currency-from">
										<div class="exchange-input-title input-from-title"><?php _e( 'You send', 'changenowio' ); ?></div>
										<input type="text" value="" class="fromInputId" autocomplete="off">
										<div class="exchange-input-search input-search-from"><span class='currency-coin-ticker coin-ticker-from' data-curr_from='<?php echo $cur_from; ?>'><?php echo $cur_from_u; ?></span>
											<div class="currencies-container currencies-from-container"></div>
										</div>
									</div>
									<div class="exchange-input currency-to">
										<div class="exchange-input-title"><?php _e( 'You get', 'changenowio' ); ?></div>
										<div class="loader form-loader hide"></div>
										<input type="text" value="-" disabled class="toInputId" autocomplete="off">
										<div class="exchange-input-search input-search-to"><span class='currency-coin-ticker coin-ticker-to' data-curr_from='<?php echo $cur_to; ?>'><?php echo $cur_to_u; ?></span>
											<div class="currencies-container currencies-to-container"></div>
										</div>
									</div>
									<div class="exchange-widget--rate"><span class="exchange-rate-board">1 <?php echo $cur_from_u; ?> ~ <?php echo $cur_to_u; ?></span><a class="exchange-widget--faq-link" href="https://changenow.io/faq/what-is-the-expected-exchange-rate" target="_blank"><?php _e( 'Expected rate', 'changenowio' ); ?></a></div>
								</div>
							</form>
						</div>
						<div class="notify-error step-one-notify-error"></div>
						<div class="notify">
							<div class="notify-icon"><img src="<?php echo CHANGENOWIO_URL; ?>/public/images/warning.svg"></div>
							<p class="notify-message"><?php _e( 'Please be careful not to provide a smart contract as your', 'changenowio' ); ?> <span class="recipientCurrency"></span> <?php _e( 'payout address', 'changenowio' ); ?></p>
						</div>
						<div class="input-address recipient-address">
							<div class="input-address--header">
								<h4 class="input-title"><?php _e( 'Enter the recipient’s', 'changenowio' ); ?> <span class="recipientCurrency"><span> <?php _e( 'address', 'changenowio' ); ?></h4>
								<div class="input-tooltips refund-buttons"><span class="refund-address-btn refund-address-add"><?php _e( '+ Add refund address', 'changenowio' ); ?></span><span class="refund-address-btn refund-address-remove"><?php _e( 'Remove refund address', 'changenowio' ); ?></span></div>
							</div>
							<div class="input-address--body">
								<input type="text" id="recipientAddress" class="recipientAddress">
								<div class="success-valid-icon recipient-success"><img src="<?php echo CHANGENOWIO_URL; ?>/public/images/succes.svg"></div>
							</div>
							<div class="notify-error recipient-address-error"></div>
						</div>
						<div class="input-address payment-id">
							<div class="input-address--header">
								<h4 class="input-title"><?php _e( 'Payment ID', 'changenowio' ); ?> <?php _e( '(optional)', 'changenowio' ); ?></h4>
							</div>
							<div class="input-address--body">
								<input type="text" id="payment-id">
								<div class="success-valid-icon payment-id-success"><img src="<?php echo CHANGENOWIO_URL; ?>/public/images/succes.svg"></div>
							</div>
						</div>
						<div class="input-address refund-address">
							<div class="input-address--header">
								<h4 class="input-title"><?php _e( 'Enter', 'changenowio' ); ?> <span class="refundCurrency"></span> <?php _e( 'refund address', 'changenowio' ); ?> <span class='required'></span></h4>
							</div>
							<div class="input-address--body">
								<input type="text" id="refundAddress">
								<div class="success-valid-icon refund-success"><img src="<?php echo CHANGENOWIO_URL; ?>/public/images/succes.svg"></div>
							</div>
						</div>
						<div class="notify refund-notify">
							<div class="notify-icon"><img src="<?php echo CHANGENOWIO_URL; ?>/public/images/warning.svg"></div>
							<p class="notify-message"><?php _e( 'In case something goes wrong during the exchange, we might need a refund address so we can return your coins back to you', 'changenowio' ); ?></p>
						</div>
						<button class="button step-one-btn" disabled="disabled"><?php _e( 'Next', 'changenowio' ); ?></button>
					</div>
				</div>
				<div class="step step-two">
					<div class="payment-deatils">
						<div class="payment-send"><span class="payment-title sand-title"><?php _e( 'You send', 'changenowio' ); ?></span>
							<div class="send-details"><span class="send-amount">1</span><span class="send-currency text">btc</span></div><span class="payment-exchange-rate">1 BTC ≈ 53.201195 ETH</span>
						</div>
						<div class="payment-direction">
							<div class="payment-arrow"><img src="<?php echo CHANGENOWIO_URL; ?>/public/images/dark-arrow.svg"></div>
						</div>
						<div class="payment-get"><span class="payment-title get-title"><?php _e( 'You get', 'changenowio' ); ?></span>
							<div class="get-details">≈<span class="get-amount"> </span><span class="get-currency"> </span></div><span class="payment-exchange-address">0xcC12d027dCe8E5AB896ac64b7811b267</span>
						</div>
					</div>

					<div class="columns">
						<div class="col_">
							<div class="payment-arrival"><span class="payment-title arrival-title"><?php _e( 'estimated arrival', 'changenowio' ); ?></span><span class="arrival-time">≈ <span class="time"></span> <?php _e( 'minutes', 'changenowio' ); ?></span></div>
						</div>
						<div class="col_ details-refund">
							<div class="payment-title title"><?php _e( 'refund address', 'changenowio' ); ?></div>
							<div class="text"></div>
						</div>
						<div class="col_ details-dest">
							<div class="payment-title title"><?php _e( 'destination tag', 'changenowio' ); ?></div>
							<div class="text"></div>
						</div>
					</div>
					<div class="payment-confirm">
						<label class="confirm-text confirm">
							<input type="checkbox" id="confirmCheckbox" /><span class="confirm-checkbox--body"></span>
							<span>
								<?php _e( "I've read and agree to", 'changenowio' ); ?> <a href='https://changenow.io/terms-of-use' target='_blank'><?php _e( 'Terms of Use', 'changenowio' ); ?></a> <?php _e( "and", 'changenowio' ); ?> <a href='https://changenow.io/privacy-policy' target='_blank'><?php _e( "Privacy Policy", 'changenowio' ); ?></a>
							</span>
						</label>
					</div>

					<button class="button step-two-btn">
						<?php _e( 'Confirm', 'changenowio' ); ?>
						<div class="loader-wrapper"><div class="loader"></div></div>
					</button>

				</div>
				<div class="step step-three">
					<div class="step-body">
						<div class="send-info-status">
							<div class="send-info-container">
								<div class="text-info"><span class="payment-title"><?php _e( 'You send', 'changenowio' ); ?></span>
									<div class="send-deatils"><span class="send-amount"> </span><span class="send-currency text"></span></div>
									<span class="payment-title"><?php _e( 'to address', 'changenowio' ); ?></span>
									<div class="send-address mb-20"> </div>
								</div>
								<div class="qr-code-image"><img src="<?php echo CHANGENOWIO_URL; ?>/public/images/qr-ex.png"></div>
							</div>
							<div class="time-info time-info" style="display: none">
								<div class="timer"> </div>
								<div class="payment-timer-info"><span class="info-part timer-message"></span><span class="info-part send-info"> </span></div>
							</div>
						</div>
						<div class="get-info-status">
							<div class="text-info">
								<div class="transaction-info">
									<div class="trainsaction-id">
										<span class="payment-title"><?php _e( 'tx id', 'changenowio' ); ?></span>
										<div class="get-deatils"><a class="exchange-id" href="#" target="_blank"></a>
									</div>
									</div>
									<div class="transaction-payment"><span class="payment-title">
										<?php _e( 'You get', 'changenowio' ); ?>
										<div class="get-deatils"><span class="get-rate"></span><span class="get-currency text"></span></div></span>
									</div>
								</div>

								<div class="columns">
									<div class="col_">
										<span class="payment-title"><?php _e( 'to address', 'changenowio' ); ?></span>
										<div class="get-deatils"><span class="get-address"></span></div>
									</div>
									<div class="col_ details-dest">
										<div class="payment-title title"><?php _e( 'destination tag', 'changenowio' ); ?></div>
										<div class="text"></div>
									</div>
								</div>

							</div>
							<div class="status-stage">
								<div class="stage stage-payment">
									<div class="stage-icon"><img src="<?php echo CHANGENOWIO_URL; ?>/public/images/time.svg"></div>
									<div class="stage-message"><?php _e( 'Awaiting payment', 'changenowio' ); ?></div>
								</div>
								<div class="stage stage-exchage">
									<div class="stage-icon"><img src="<?php echo CHANGENOWIO_URL; ?>/public/images/time.svg"></div>
									<div class="stage-message"><?php _e( 'Waiting for exchange', 'changenowio' ); ?></div>
								</div>
								<div class="stage stage-sent">
									<div class="stage-icon"><img src="<?php echo CHANGENOWIO_URL; ?>/public/images/time.svg"></div>
									<div class="stage-message"><?php _e( 'Sent to your wallet', 'changenowio' ); ?></div>
								</div>
							</div>
							<div class="error-block notify-error exchange-refund" style="display:none"><?php _e( 'Error during exchange.', 'changenowio' ); ?> <br /><?php _e( "Funds for this transaction will be returned to the sender's address or the specified refund address.", 'changenowio' ); ?></div>
							<div class="error-block notify-error exchange-failed" style="display:none"><?php _e( 'Error during exchange.', 'changenowio' ); ?> <br /><?php _e( 'Please contact support.', 'changenowio' ); ?></div>
							<div class="success-block notify-success exchange-finished" style="display:none"><?php _e( 'Exchange completed.', 'changenowio' ); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>

<?php

$font = $OPT['font'];
if ( $font ) {
	$href       = '//fonts.googleapis.com/css?family=' . str_replace( ' ', '+', $font['family'] ) . ":{$font['variant']}&display=swap&subset=cyrillic";
	$font_style = "font-family:'{$font['family']}', sans-serif;";
	// if ($OPT['use_font_size']) {
	// $font_style .= "font-size:{$href}px;";
	// }
	$font_import = "@import url('$href');";
	echo <<<CSS
<style>
{$font_import}
.changenowiow-wrap * { {$font_style} }
</style>
CSS;
}
if ( $OPT['use_colors'] ) {
	$c = $OPT['colors'];

	$c_text    = $c['text'] ? 'color: ' . $c['text'] . ';' : '';
	$c_bg      = $c['bg'] ? 'background-color: ' . $c['bg'] . ';' : '';

	$c_link       = $c['link'] ? 'color: ' . $c['link'] . ';' : '';
	$c_link_hover = $c['link_hover'] ? 'color: ' . $c['link_hover'] . ';' : '';

	$c_input      = $c['input'] ? 'color: ' . $c['input'] . ';' : '';
	$c_input_bg   = $c['input_bg'] ? 'background-color: ' . $c['input_bg'] . ';' : '';
	$c_input_bord = $c['input_bg'] ? 'border: 0;' : '';

	$c_button      = $c['button'] ? 'color: ' . $c['button'] . ';' : '';
	$c_button_bg   = $c['button_bg'] ? 'background-color: ' . $c['button_bg'] . ';' : '';
	$c_button_bord = $c['button_bg'] ? 'border: 0 ;' : '';
	$c_button_re   = $c['button'] ? 'color: ' . $c['button_bg'] . ';' : '';

	$c_button_type      = $c['button_type'] ? 'color: ' . $c['button_type'] . ';' : '';
	$c_button_type_bg   = $c['button_type_bg'] ? 'background-color: ' . $c['button_type_bg'] . ';' : '';
	$c_button_type_bord = $c['button_type_bg'] ? 'border-color: ' . $c['button_type_bg'] . ' ; ' : '';

	$c_button_act    = $c['button_act'] ? 'color: ' . $c['button_act'] . ';' : '';
	$c_button_act_bg = $c['button_act_bg'] ? 'background-color: ' . $c['button_act_bg'] . '!important;' : '';
	$c_button_act_bord = $c['button_act_bg'] ? 'border: 0; ' : '';

	echo <<<CSS
<style>
.changenowiow-wrap,
.changenowiow-wrap p,
.changenowiow-wrap h1,
.changenowiow-wrap h2,
.changenowiow-wrap h3,
.changenowiow-wrap h4,
.changenowiow-wrap .step-one .input-address .input-address--header .input-title,
.changenowiow-wrap .payment-title,
.changenowiow-wrap .step-two .payment-title,
.changenowiow-wrap .step-two .payment-exchange-rate,
.changenowiow-wrap .step-two .payment-exchange-address,
.changenowiow-wrap .text-info,
.changenowiow-wrap .transaction-info,
.changenowiow-wrap .step-three .step-body .payment-title,
.changenowiow-wrap .step-three .step-body .status-stage .stage,
.changenowiow-wrap .step-two .payment-deatils .payment-exchange-rate,
.changenowiow-wrap .step-two .payment-deatils .payment-exchange-address,
.changenowiow-wrap .step-two .payment-arrival .arrival-time,
.changenowiow-wrap .step-two .paymant-confirm .confirm-text,
.changenowiow-wrap .exchange-widget,
.changenowiow-wrap .stepper-modal-body {
	{$c_text}
	{$c_bg}
}
.changenowiow-wrap .exchange-widget--faq-link,
.changenowiow-wrap .exchange-widget--faq-link:hover,
.changenowiow-wrap .exchange-widget--faq-link:active,
.changenowiow-wrap .exchange-widget--rate {
	{$c_text}
	background-color: transparent;
}
.changenowiow-wrap .currency-coin-ticker {
	{$c_text}
}
.changenowiow-wrap .stepper-modal .currency-coin-ticker,
.changenowiow-wrap .stepper-modal .exchange-widget--faq-link,
.changenowiow-wrap .stepper-modal .exchange-widget--faq-link:hover,
.changenowiow-wrap .stepper-modal .exchange-widget--faq-link:active,
.changenowiow-wrap .stepper-modal .exchange-widget--rate {
	color: #3a3a3a;
}
.changenowiow-wrap .exchange-widget .exchange-input-title,
.changenowiow-wrap .stepper-modal .currency-coin-ticker,
.changenowiow-wrap .stepper-modal .exchange-widget--faq-link,
.changenowiow-wrap .stepper-modal .exchange-widget--faq-link:hover,
.changenowiow-wrap .stepper-modal .exchange-widget--faq-link:active,
.changenowiow-wrap .stepper-modal .exchange-widget--rate {
	{$c_input}
}
.changenowiow-wrap .step-one .input-address .input-address--body>input[type="text"],
.changenowiow-wrap .exchange-select .exchange-list .exchange-list-item:hover,
.changenowiow-wrap .exchange-form-widget .exchange-select .exchange-select--search,
.changenowiow-wrap .exchange-form-widget .exchange-input-search,
.changenowiow-wrap .exchange-widget .exchange-input>input[type="text"] {
	{$c_input}
	{$c_input_bg}
}
.changenowiow-wrap .exchange-form-widget .exchange-input,
.changenowiow-wrap .exchange-form-widget .exchange-input-title,
.changenowiow-wrap .exchange-form-widget select,
.changenowiow-wrap .exchange-form-widget input[type=text] {
	{$c_input}
	{$c_input_bg}
	{$c_input_bord}
}
.changenowiow-wrap .exchange-widget .exchange-input-search,
.changenowiow-wrap .exchange-select .exchange-list .exchange-list-item:hover,
.changenowiow-wrap .exchange-form-widget  .exchange-select .exchange-select--search,
.changenowiow-wrap .exchange-form-widget .exchange-input-search {
	background-color: transparent !important;
}
.changenowiow-wrap .exchange-form-widget .exchange-select input,
.changenowiow-wrap .exchange-form-widget .exchange-list-container,
.changenowiow-wrap .exchange-form-widget .exchange-list-item {
	color: #111 !important;
}

.changenowiow-wrap .exchange-form-widget .tabs .tabs-label {
	{$c_button_type}
}
.changenowiow-wrap .stepper-modal-header .header-line {
	{$c_button_type_bg}
}
.changenowiow-wrap .stepper-modal-header .step-number {
	{$c_button_type_bord}
}
.changenowiow-wrap .exchange-widget .tabs .tabs-label,
.changenowiow-wrap .exchange-form-widget .tabs .tabs-label,
.changenowiow-wrap .exchange-form-widget button,
.changenowiow-wrap .exchange-form-widget input[type=button],
.changenowiow-wrap .exchange-form-widget input[type=submit] {
	{$c_button_type}
	{$c_button_type_bord}
	opacity: 1;
}
.changenowiow-wrap .exchange-widget .tabs .tabs-label.active,
.changenowiow-wrap .exchange-form-widget .tabs .tabs-label.active {
	{$c_button_type}
	{$c_button_type_bg}
}

.changenowiow-wrap .button,
.changenowiow-wrap .exchange-form-widget button {
	{$c_button_act}
	{$c_button_act_bg}
}

.changenowiow-wrap .exchange-form-widget .exchange-select .search-icon {
	top: 5px !important;
}
.changenowiow-wrap .exchange-form-widget .currencies-container .exchange-select .exchange-list-container::-webkit-scrollbar-thumb {
	background-color: #111 !important;
}
.changenowiow-wrap .exchange-form-widget .currencies-container .exchange-select .exchange-list-item:hover {
	background-color: #eee !important;
}

.changenowiow-wrap .step-one .input-address .input-address--header .input-tooltips,
.changenowiow-wrap .exchange-widget .exchange-widget--faq-link,
.changenowiow-wrap a {
	{$c_link}
}
.changenowiow-wrap .step-one .input-address .input-address--header .input-tooltips :hover,
.changenowiow-wrap .exchange-widget .exchange-widget--faq-link:hover,
.changenowiow-wrap .exchange-widget .exchange-widget--faq-link:active,
.changenowiow-wrap a:active,
.changenowiow-wrap a:hover {
	{$c_link_hover}
}
</style>
CSS;
}
