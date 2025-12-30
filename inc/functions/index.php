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

/**
 * Get repeater field values
 *
 * @param  int                      $post_id
 * @param  string                   $field_name
 * @param  mixed string || string[] $subfield_names
 * @return array
 */
function get_repeater_values(
	$object_id = null,
	string $object_type = 'post',
	string $field_name,
	$subfield_names
): array {

	if ( 'term' === $object_type ) {
		$repeater_value = get_term_meta( $object_id, $field_name, true );
	} else {
		global $post;
		$object_id      = ( $object_id ) ? (int) $object_id : get_the_ID();
		$repeater_value = get_post_meta( $object_id, $field_name, true );
	}

	$array = array();
	if ( $repeater_value ) {
		for ( $i = 0; $i < $repeater_value; $i++ ) {
			if ( 'array' === gettype( $subfield_names ) ) {
				foreach ( $subfield_names as $subfield_name ) {
					$sub_field_value               = get_repeater_value( $object_id, $object_type, $field_name, $subfield_name, $i );
					$array[ $i ][ $subfield_name ] = $sub_field_value;
				}
			} elseif ( 'string' === gettype( $subfield_names ) ) {
				$sub_field_value                = get_repeater_value( $object_id, $object_type, $field_name, $subfield_names, $i );
				$array[ $i ][ $subfield_names ] = $sub_field_value;
			}
		}
	}
	return $array;
}

/**
 * Get repeater field value
 *
 * @param  integer $object_id
 * @param string  $object_type
 * @param  string  $field_name
 * @param  string  $subfield_name
 * @param  integer $index
 * @return void
 */
function get_repeater_value(
	int $object_id,
	string $object_type = 'post',
	string $field_name,
	string $subfield_name,
	int $index
) {
	$meta_key = "{$field_name}_{$index}_{$subfield_name}";

	if ( 'term' === $object_type ) {
		$sub_field_value = get_term_meta( $object_id, $meta_key, true );
	} else {
		global $post;
		$object_id       = ( $object_id ) ? (int) $object_id : get_the_ID();
		$sub_field_value = get_post_meta( $object_id, $meta_key, true );
	}

	return $sub_field_value;
}
