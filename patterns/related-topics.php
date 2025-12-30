<?php
/**
 * Title: Related Topics
 * Slug: lapp/related-topics
 * Description: Topics designated as related to current
 * Categories: topic
 * Keywords: topics
 * Inserter: true
 * Template Types: taxonomy-topic
 */
$queried_obj   = get_queried_object_id();
$related_terms = get_term_meta( (int) $queried_obj, 'related_terms', true ) ?? array();
if ( empty( $related_terms ) ) {
	return;
}
$related_term_ids = implode(
	',',
	array_map( 'absint', $related_terms )
);
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Related Terms"},"backgroundColor":"base-2","align":"full","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-base-2-background-color has-background">
	
	<!-- wp:terms-query {
		"termQuery": {
			"perPage": 10,
			"taxonomy": "topic",
			"order": "asc",
			"orderBy": "name",
			"include": [
				<?php echo $related_term_ids; ?>
			],
			"hideEmpty": true,
			"showNested": false,
			"inherit": false
		},
		"align":"wide"
	} -->
	<div class="wp-block-terms-query alignwide">
		<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php esc_html_e( 'Related Topics', 'lapp' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:term-template -->
			<!-- wp:term-name {"isLink":true} /-->
		<!-- /wp:term-template -->
	</div>
	<!-- /wp:terms-query -->

</section>
<!-- /wp:group -->