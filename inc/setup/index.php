<?php
/**
 * Setup
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lapp-classic-theme
 */
namespace Lapp_Classic;

/**
 * https://developer.wordpress.org/reference/functions/add_theme_support/
 */
\add_theme_support( 'block-templates' );

\add_theme_support( 'block-template-parts' );

/**
 * Load Block Editor Styles
 *
 * @return void
 */
function setup_editor_styles(): void {
	\add_editor_style( 'build/editor-style.css' );
}
\add_action( 'after_setup_theme', __NAMESPACE__ . '\setup_editor_styles' );
