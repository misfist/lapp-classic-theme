<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lapp-classic-theme
 */
get_header();

if ( function_exists( 'newspack_get_all_sponsors' ) ) {
	$all_sponsors    = newspack_get_all_sponsors( get_queried_object_id() );
	$native_sponsors = newspack_get_native_sponsors( $all_sponsors );
}
$args = ( $all_sponsors ) ? array( 'all_sponsors' => $all_sponsors ) : array();
?>

	<section id="primary" class="content-area">

		<?php get_template_part( 'template-parts/header/entry-header', 'topic' ); ?>

		<?php do_action( 'before_archive_posts' ); ?>

		<main id="main" class="site-main">

			<?php
			get_template_part(
				'template-parts/content/content-taxonomy',
				'topic',
				array(
					'template_type' => $template_type,
				)
			);
			?>
			
		</main><!-- #main -->
		<?php
		$archive_layout = get_theme_mod( 'archive_layout', 'default' );
		if ( 'default' === $archive_layout ) {
			get_sidebar();
		}
		?>
	</section><!-- #primary -->

<?php
get_footer();
