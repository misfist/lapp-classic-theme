<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newspack
 */
get_header();

$feature_latest_post = get_theme_mod( 'archive_feature_latest_post', true );
$show_excerpt        = get_theme_mod( 'archive_show_excerpt', false );
?>

	<section id="primary" class="content-area">

		<header class="page-header">
			<span>

				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>

				<?php do_action( 'newspack_theme_below_archive_title' ); ?>

				<div class="taxonomy-description">
					<?php echo wp_kses_post( wpautop( get_the_archive_description() ) ); ?>
				</div>

			</span>

		</header><!-- .page-header -->

		<?php do_action( 'before_archive_posts' ); ?>

		<main id="main" class="site-main">

		<?php
		get_template_part( 'template-parts/content/content-taxonomy', 'topic' );
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
