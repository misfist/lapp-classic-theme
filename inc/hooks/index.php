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
 * Modify archive title
 *
 * @param string $title
 *
 * @return string
 */
function archive_title( string $title ): string {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}

	return $title;
}
add_filter( 'get_the_archive_title', __NAMESPACE__ . '\archive_title' );

/**
 * Filter body class
 *
 * @param array $classes
 *
 * @return array
 */
function body_class( array $classes ): array {
	if ( is_tax( 'topic' ) ) {
		$term_id       = get_queried_object_id();
		$template_type = get_term_meta( $term_id, 'template_type', true );
		$classes[]     = $template_type . '-page';
	}

	return $classes;
}
\add_filter( 'body_class', __NAMESPACE__ . '\body_class' );
