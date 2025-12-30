<?php
/**
 * Title: Resources/Data
 * Slug: lapp/links-topic
 * Description: Related resources and data.
 * Categories: topic
 * Keywords: topics
 * Inserter: true
 * Template Types: taxonomy-topic
 */
use function Lapp_Classic\get_repeater_values;
$queried_obj   = get_queried_object_id();
$has_resources = get_term_meta( (int) $queried_obj, 'resources', true ) ?? false;
if ( ! $has_resources ) {
	return;
}
$resources = get_repeater_values( $queried_obj, 'term', 'resources', 'resource' );

?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Resources"},"align":"wide","className":"is-style-border","backgroundColor":"accent-4","layout":{"type":"constrained","wideSize":"1200px"}} -->
<section class="wp-block-group alignwide is-style-border has-accent-4-background-color has-background">

	<!-- wp:heading {"align":"wide"} -->
	<h2 class="wp-block-heading alignwide"><?php esc_html_e( 'Resources', 'lapp' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:list {"className":"no-bullets alignwide"} -->
	<ul class="wp-block-list no-bullets alignwide">

		<?php
		foreach( $resources as $resource ) :
			?>
			<!-- wp:list-item -->
			<?php 
			printf( '<li><a href="%s"%s>%s</a></li>',
				esc_url( $resource['resource']['url'] ),
				( $resource['resource']['target'] ) ? ' target="' . esc_attr( $resource['resource']['target'] ) . '"' : '',
				esc_html( $resource['resource']['title'] )
			);
			?>

			<!-- /wp:list-item -->
			<?php
		endforeach;
	?>

	</ul>
	<!-- /wp:list -->

</section>
<!-- /wp:group -->