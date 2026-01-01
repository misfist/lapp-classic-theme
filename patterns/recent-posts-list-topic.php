<?php
/**
 * Title: Recent Posts List - Topic
 * Slug: lapp/recent-posts-list-topic
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

	<!-- wp:query {
		"queryId": 1,
		"query": {
			"perPage": 10,
			"pages": 0,
			"offset": 0,
			"postType": "post",
			"order": "desc",
			"orderBy": "date",
			"author": "",
			"search": "",
			"exclude": [],
			"sticky": "",
			"inherit": false,
			"taxQuery": {
				"topic": [
					<?php echo $queried_obj; ?>
				]
			},
			"parents": [],
			"format": [],
			"exclude_posts": [
				<?php echo $featured_posts ?? ''; ?>
			]
		},
		"namespace": "advanced-query-loop",
		"enhancedPagination":true,
		"className":"alignwide"
	} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
			<!-- wp:columns {"className":"is-style-default"} -->
			<div class="wp-block-columns is-style-default">
			<!-- wp:column {"width":"33.33%"} -->
				<div class="wp-block-column" style="flex-basis:33.33%">
					<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","scale":"fill","sizeSlug":"medium","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} /-->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"width":"66.66%"} -->
				<div class="wp-block-column" style="flex-basis:66.66%">
					<!-- wp:post-title {"isLink":true,"className":"entry-title"} /-->

					<!-- wp:group {"metadata":{"name":"Byline"},"fontFamily":"sans","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"},"className":"entry-meta"} -->
					<div class="wp-block-group entry-meta">
						<!-- wp:co-authors-plus/coauthors {"prefix":"by ","className":"byline"} -->
						<div class="wp-block-co-authors-plus-coauthors byline">
							<!-- wp:co-authors-plus/name {"isLink":true} /-->
						</div>
						<!-- /wp:co-authors-plus/coauthors -->

						<!-- wp:post-date {"isLink":true,"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"fontFamily":"sans","fontSize":"sm"} /-->
					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		<!-- /wp:post-template -->

		<!-- wp:query-pagination {"fontFamily":"sans"} -->
			<!-- wp:query-pagination-previous {"fontFamily":"sans"} /-->

			<!-- wp:query-pagination-numbers /-->

			<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
			<p></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</section>
<!-- /wp:group -->
