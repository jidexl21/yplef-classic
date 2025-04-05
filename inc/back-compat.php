<?php
/**
 * Yplef Classic back compat functionality
 *
 * Prevents Yplef Classic from running on WordPress versions prior to 4.1,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.1.
 *
 * @package WordPress
 * @subpackage Yplef_Classic
 * @since Yplef Classic 1.0
 */

/**
 * Prevent switching to Yplef Classic on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Yplef Classic 1.0
 */
function yplefclassic_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'yplefclassic_upgrade_notice' );
}
add_action( 'after_switch_theme', 'yplefclassic_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Yplef Classic on WordPress versions prior to 4.1.
 *
 * @since Yplef Classic 1.0
 */
function yplefclassic_upgrade_notice() {
	printf(
		'<div class="error"><p>%s</p></div>',
		sprintf(
			/* translators: %s: WordPress version. */
			__( 'Yplef Classic requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'yplefclassic' ),
			$GLOBALS['wp_version']
		)
	);
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
 *
 * @since Yplef Classic 1.0
 */
function yplefclassic_customize() {
	wp_die(
		sprintf(
			/* translators: %s: WordPress version. */
			__( 'Yplef Classic requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'yplefclassic' ),
			$GLOBALS['wp_version']
		),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'yplefclassic_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
 *
 * @since Yplef Classic 1.0
 */
function yplefclassic_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die(
			sprintf(
				/* translators: %s: WordPress version. */
				__( 'Yplef Classic requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'yplefclassic' ),
				$GLOBALS['wp_version']
			)
		);
	}
}
add_action( 'template_redirect', 'yplefclassic_preview' );
