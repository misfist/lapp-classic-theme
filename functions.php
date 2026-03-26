<?php
/**
 * LA Public Press - Classic Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lapp-classic-theme
 */


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
