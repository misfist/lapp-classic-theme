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
 * Registers the block using a `blocks-manifest.php` file, which improves the performance of block type registration.
 * Behind the scenes, it also registers all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://make.wordpress.org/core/2025/03/13/more-efficient-block-type-registration-in-6-8/
 * @see https://make.wordpress.org/core/2024/10/17/new-block-type-registration-apis-to-improve-performance-in-wordpress-6-7/
 */
function block_init() {
	/**
	 * Registers the block(s) metadata from the `blocks-manifest.php` and registers the block type(s)
	 * based on the registered block metadata.
	 * Added in WordPress 6.8 to simplify the block metadata registration process added in WordPress 6.7.
	 *
	 * @see https://make.wordpress.org/core/2025/03/13/more-efficient-block-type-registration-in-6-8/
	 */
	if ( function_exists( 'wp_register_block_types_from_metadata_collection' ) ) {
		wp_register_block_types_from_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
		return;
	}

	/**
	 * Registers the block(s) metadata from the `blocks-manifest.php` file.
	 * Added to WordPress 6.7 to improve the performance of block type registration.
	 *
	 * @see https://make.wordpress.org/core/2024/10/17/new-block-type-registration-apis-to-improve-performance-in-wordpress-6-7/
	 */
	if ( function_exists( 'wp_register_block_metadata_collection' ) ) {
		wp_register_block_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
	}
	/**
	 * Registers the block type(s) in the `blocks-manifest.php` file.
	 *
	 * @see https://developer.wordpress.org/reference/functions/register_block_type/
	 */
	$manifest_data = require __DIR__ . '/build/blocks-manifest.php';
	foreach ( array_keys( $manifest_data ) as $block_type ) {
		register_block_type( __DIR__ . "/build/{$block_type}" );
	}
}
add_action( 'init', __NAMESPACE__ . '\\block_init' );

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

/**
 * Get sponsors block.
 *
 * @param array  $attributes Block attributes.
 * @param string $content    Block content.
 * @param object $block      Block instance.
 * @return string
 */
function get_sponsors_block( array $attributes, string $content, $block ): string {
	if (
		! function_exists( 'newspack_get_all_sponsors' )
		|| ! function_exists( 'newspack_get_native_sponsors' )
		|| ! function_exists( 'newspack_sponsor_logo_list' )
		|| ! function_exists( 'newspack_sponsor_byline' )
	) {
		return '';
	}

	$object_id = ! empty( $attributes['objectId'] ) ? absint( $attributes['objectId'] ) : 0;
	$context   = ! empty( $attributes['objectType'] ) ? sanitize_key( $attributes['objectType'] ) : 'term';

	if ( ! $object_id ) {
		$object_id = ( 'post' === $context ) ? get_the_ID() : get_queried_object_id();
	}

	if ( ! $object_id ) {
		return '';
	}

	$all_sponsors = newspack_get_all_sponsors( $object_id );
	$sponsors     = newspack_get_native_sponsors( $all_sponsors );

	if ( empty( $sponsors ) || ! is_array( $sponsors ) ) {
		return '';
	}

	ob_start();
	?>
	<div class="entry-meta entry-sponsor">
		<?php newspack_sponsor_logo_list( $sponsors ); ?>
		<span class="sponsor-byline"><?php newspack_sponsor_byline( $sponsors ); ?></span>
	</div>
	<?php
	return ob_get_clean();
}

/**
 * Render sponsor block
 *
 * @param array  $attributes Block attributes.
 * @param string $content    Block content.
 * @param object $block      Block instance.
 * @return string
 */
function render_sponsors_block( array $attributes, string $content, $block ): void {
	$html = get_sponsors_block( $attributes, $content, $block );
	echo $html;
}
