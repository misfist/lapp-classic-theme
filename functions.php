<?php
/**
 * LA Public Press - Classic Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lapp-classic-theme
 */

/**
 * Enqueue styles
 *
 * @return void
 */
function lapp_parent_enqueue_styles(): void {
	wp_register_style( 'newspack-style', get_template_directory_uri() . '/style.css' );

	wp_enqueue_style(
		'lapp-classic-theme-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'newspack-style' ),
		'0.1.0'
	);
}
add_action( 'wp_enqueue_scripts', 'lapp_parent_enqueue_styles' );


/**
 * Get all the include files for the theme.
 *
 * @author WebDevStudios
 */
function lapp_include_inc_files() {
	$files = array(
		'inc/blocks/',
		'inc/functions/',
		'inc/hooks/',
		'inc/setup/',
	);

	foreach ( $files as $include ) {
		$include = trailingslashit( get_stylesheet_directory() ) . $include;

		// Allows inclusion of individual files or all .php files in a directory.
		if ( is_dir( $include ) ) {
			foreach ( glob( $include . '*.php' ) as $file ) {
				require $file;
			}
		} else {
			require $include;
		}
	}
}

lapp_include_inc_files();
