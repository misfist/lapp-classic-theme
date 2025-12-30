<?php
/**
 * Title: Recent Posts - Topic
 * Slug: lapp/recent-posts-topic
 * Description: Recent posts for Topic
 * Categories: page-query, topic
 * Keywords: topics
 * Inserter: true
 * Block Types: core/query
 * Template Types: taxonomy-topic
 */
$queried_obj = get_queried_object_id();
$featured_meta  = get_term_meta( (int) $queried_obj, 'featured_posts', true ) ?? array();
if( ! empty( $featured_meta ) ) {
    $featured_posts = implode( ',', $featured_meta );
}
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Featured Posts"},"backgroundColor":"base","align":"full","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-base-background-color has-background">
	<!-- wp:newspack-blocks/homepage-articles {
		"showExcerpt": false,
		"showAvatar": false,
		"postLayout": "grid",
		"customTaxonomies": [
			{
				"slug": "topic",
				"terms": [<?php echo $queried_obj; ?>]
			}
		],
		"specificPosts": [],
        "excludeIds": [<?php echo $featured_posts ?? ''; ?>],
        "postsToShow": 9,
		"sectionHeader": "Latest Posts",
		"specificMode": true,
        "moreButton":true,
		"align": "wide"
	} /-->
</section>
<!-- /wp:group -->