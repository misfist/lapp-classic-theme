<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lapp-classic-theme
 */
use function Lapp_Classic\render_block_pattern_content;

$term_object   = get_queried_object();
$term_id       = get_queried_object_id();
$template_type = get_term_meta( $term_id, 'template_type', true );
?>

<div class="entry-container">

	<?php
	if ( 'hub' === $template_type ) :
		?>
		<?php render_block_pattern_content( 'lapp/featured-topic' ); ?>
		<?php
	endif;
	?>

	<?php render_block_pattern_content( 'lapp/recent-posts-topic' ); ?>

</div>