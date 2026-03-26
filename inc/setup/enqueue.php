<?php
/**
 * Enqueue scripts and styles.
 *
 * @package lapp-classic-theme
 */

namespace Lapp_Classic;

/**
 * Enqueue front-end styles.
 *
 * @return void
 */
function enqueue_styles(): void {
	// Re-register parent theme stylesheet so child `style.css` can depend on it.
	\wp_register_style( 'newspack-style', \get_template_directory_uri() . '/style.css' );

	\wp_enqueue_style(
		'lapp-classic-theme-style',
		\get_stylesheet_directory_uri() . '/style.css',
		array( 'newspack-style' ),
		'0.1.0'
	);

	$asset_file = \get_stylesheet_directory() . '/build/style.asset.php';
	$asset      = file_exists( $asset_file ) ? require $asset_file : array( 'version' => '0.1.0' );

	\wp_enqueue_style(
		'lapp-classic-theme-build',
		\get_stylesheet_directory_uri() . '/build/style.css',
		array( 'lapp-classic-theme-style' ),
		$asset['version']
	);
}
\add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_styles' );

/**
 * Enqueue block editor styles.
 *
 * @return void
 */
function enqueue_editor_styles(): void {
	$asset_file = \get_stylesheet_directory() . '/build/editor-style.asset.php';
	$asset      = file_exists( $asset_file ) ? require $asset_file : array( 'version' => '0.1.0' );

	\wp_enqueue_style(
		'lapp-classic-theme-editor',
		\get_stylesheet_directory_uri() . '/build/editor-style.css',
		array(),
		$asset['version']
	);
}
\add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_editor_styles' );
