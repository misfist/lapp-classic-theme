<?php
/**
 * Title: Featured Post List - Topic
 * Slug: lapp/featured-list-topic
 * Description: Featured posts for Topic
 * Categories: page-query, topic
 * Keywords: topics
 * Inserter: true
 * Block Types: core/query
 * Template Types: taxonomy-topic
 */
$queried_obj = get_queried_object_id();

if ( function_exists( 'newspack_get_all_sponsors' ) ) {
	$all_sponsors    = newspack_get_all_sponsors( $queried_obj );
	$native_sponsors = newspack_get_native_sponsors( $all_sponsors );
}

$featured_meta  = get_term_meta( (int) $queried_obj, 'featured_posts', true ) ?? array();
$featured_posts = implode( ',', $featured_meta );
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Featured Posts"},"align":"full","backgroundColor":"base-2","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-base-2-background-color has-background">
	<!-- wp:newspack-blocks/homepage-articles {
		"showExcerpt": false,
		"showAvatar": false,
		"postLayout":"grid",
		"columns":2,
		"mediaPosition":"left",
		"customTaxonomies": [
			{
				"slug": "topic",
				"terms": [<?php echo $queried_obj; ?>]
			}
		],
		"specificPosts": [<?php echo $featured_posts; ?>],
		"sectionHeader": "Featured Posts",
		"specificMode": true,
		"align": "wide"
	} /-->
</section>
<!-- /wp:group -->