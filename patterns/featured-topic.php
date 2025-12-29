<?php
/**
 * Title: Featured Posts - Topic
 * Slug: lapp/featured-topic
 * Description: Featured posts for Topic
 * Categories: page-query, topic
 * Keywords: topics
 * Inserter: true
 * Block Types: core/query
 * Template Types: taxonomy-topic
 */
if ( function_exists( 'newspack_get_all_sponsors' ) ) {
	$all_sponsors    = newspack_get_all_sponsors( get_queried_object_id() );
	$native_sponsors = newspack_get_native_sponsors( $all_sponsors );
}
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Featured Posts"},"layout":{"type":"constrained"}} -->
<section class="wp-block-group">
    <!-- wp:newspack-blocks/homepage-articles {
        "showExcerpt": false,
        "showAvatar": false,
        "postLayout": "grid",
        "customTaxonomies": [
            {
                "slug": "topic",
                "terms": [<?php echo get_queried_object_id() ?>]
            }
        ],
        "specificPosts": [],
        "sectionHeader": "Featured Posts",
        "specificMode": true
    } /-->
</section>
<!-- /wp:group -->