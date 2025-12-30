<?php
/**
 * Block
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_type/
 *
 * @package lapp-classic-theme
 */
namespace Lapp_Classic;

define(
	'NEWSPACK_FSE_BLOCKS_ALLOWED',
	array(
		'core/query',
		// 'core/post-title', Temporarily allow this block. Ref. https://github.com/woocommerce/woocommerce/pull/52209
		'core/post-featured-image',
		'core/post-excerpt',
		'core/post-content',
		'core/post-terms',
		'core/post-date',
		'core/post-author',
		'core/post-author-name',
		'core/post-navigation-link',
		'core/read-more',
		'core/avatar',
		'core/post-author-biography',
		'core/query-title',
		'core/term-description',
	)
);

/**
 * Filter block context
 *
 * @param mixed  $allowed_block_types
 * @param object $editor_context
 *
 * @return mixed
 */
function allowed_block_types( $allowed_block_types, $editor_context ) {
	$allowed_post_types = array(
		'post',
		'wp_block',
		'wp_template',
		'wp_template_part',
	);
	$hidden_block       = 'lapp/sponsor';

	if (
		! is_array( $allowed_block_types )
		|| empty( $editor_context->post )
		|| in_array( $editor_context->post->post_type, $allowed_post_types, true )
		|| ! in_array( $hidden_block, $allowed_block_types, true )
	) {
		return $allowed_block_types;
	}

	$allowed_block_types = array_values(
		array_diff( $allowed_block_types, array( $hidden_block ) )
	);

	return $allowed_block_types;
}
add_filter( 'allowed_block_types_all', __NAMESPACE__ . '\\allowed_block_types', 10, 2 );
