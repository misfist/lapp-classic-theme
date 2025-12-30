<?php
/**
 * Displays the post header
 *
 * @package lapp-classic-theme
 */
use function Lapp_Classic\render_block_pattern_content;

$term_id       = get_queried_object_id();
$template_type = get_term_meta( $term_id, 'template_type', true );
?>

<header class="page-header">
	<h2><?php echo ucfirst( $template_type ); ?></h2>
	<?php render_block_pattern_content( 'lapp/hero-topic' ); ?>
</header><!-- .page-header -->