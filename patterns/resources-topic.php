<?php
/**
 * Title: Resources Topics
 * Slug: lapp/resources-topic
 * Description: Related Topics and Resources
 * Categories: topic
 * Keywords: topics
 * Inserter: true
 * Template Types: taxonomy-topic
 */
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Featured Posts"},"align":"full","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull">

	<!-- wp:columns {"align":"wide","className":"Additional Resources"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"stretch","backgroundColor":"accent-3"} -->
		<div class="wp-block-column has-accent-3-background-color has-background">
			<!-- wp:pattern {"slug":"lapp/related-topic"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"stretch","backgroundColor":"accent"} -->
		<div class="wp-block-column has-accent-background-color has-background">
			<!-- wp:pattern {"slug":"lapp/links-topic"} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

</section>
<!-- /wp:group -->