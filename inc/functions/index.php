<?php
/**
 * Hooks
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lapp-classic-theme
 */
namespace Lapp_Classic;

/**
 * Get an array of the names of all registered block patterns
 *
 * @return array $pattern_names
 */
function get_block_pattern_names_list() {
	$patterns      = \WP_Block_Patterns_Registry::get_instance()->get_all_registered();
	$pattern_names = array_map(
		function ( array $pattern ) {
			return $pattern['name'];
		},
		$patterns
	);
	return $pattern_names;
}


/**
 * Get pattern content
 *
 * @return array $pattern_names
 */
function get_block_pattern_content( string $name ) {
	$registry = \WP_Block_Patterns_Registry::get_instance();

	if ( ! $registry->is_registered( $name ) ) {
		return null;
	}

	$pattern = $registry->get_registered( $name );

	return isset( $pattern['content'] ) ? $pattern['content'] : null;
}

/**
 * Render block pattern
 *
 * @param string $name
 *
 * @return void
 */
function render_block_pattern_content( string $name ): void {
	$content = get_block_pattern_content( $name );
	if ( ! $content ) {
		return;
	}
	echo do_blocks( $content );
}
