<?php
/**
 * Title: Hero - Topic
 * Slug: lapp/hero-topic
 * Description: Hero section displayed on Topic archive pages
 * Categories: page-elements, topic
 * Keywords: topics
 * Inserter: true
 * Block Types: core/cover, core/post-title
 * Template Types: taxonomy-topic
 */
$queried_obj       = get_queried_object_id();
$featured_image_id = get_term_meta( $queried_obj, 'image', true );
if ( $featured_image_id ) {
	$image_size         = 'newspack-featured-image-large';
	$featured_image_src = wp_get_attachment_image_src( (int) $featured_image_id, $image_size );
	$featured_image_url = $featured_image_src[0];
	$featured_caption   = wp_get_attachment_caption( (int) $featured_image_id );
}

if ( function_exists( 'newspack_get_all_sponsors' ) ) {
	$all_sponsors    = newspack_get_all_sponsors( get_queried_object_id() );
	$native_sponsors = newspack_get_native_sponsors( $all_sponsors );
}
?>

<!-- wp:group {"metadata":{"name":"Featured Image"},"className":"featured-image-behind","layout":{"type":"default"}} -->
<div class="wp-block-group featured-image-behind">
	<?php
	if ( $featured_image_url ) :
		?>
		<!-- wp:image {"id":<?php echo intval( $featured_image_id ); ?>,"sizeSlug":"<?php echo esc_attr( $image_size ); ?>","linkDestination":"none","className":"post-thumbnail"} -->
		<figure class="wp-block-image size-<?php echo esc_attr( $image_size ); ?> post-thumbnail">
			<img src="<?php echo esc_url( $featured_image_url ); ?>" alt="" class="wp-image-<?php echo intval( $featured_image_id ); ?> wp-post-image attachment-<?php echo esc_attr( $image_size ); ?> size-<?php echo esc_attr( $image_size ); ?>" />
		</figure>
		<!-- /wp:image -->

		<?php
	endif;
	?>

	<!-- wp:group {"metadata":{"name":"Wrapper"},"className":"wrapper"} -->
	<div class="wp-block-group wrapper">
		<!-- wp:group {"tagName":"header","metadata":{"name":"Entry Header"},"className":"entry-header"} -->
		<header class="wp-block-group entry-header">
			<!-- wp:post-terms {"term":"topic","prefix":"Posted In ","className":"cat-links"} /-->

			<!-- wp:query-title {"type":"archive","level":1,"showPrefix":false,"className":"entry-title entry-title\u002d\u002dwith-subtitle","fontSize":"xxxxl"} /-->

			<!-- wp:group {"metadata":{"name":"Subtitle"},"className":"newspack-post-subtitle"} -->
			<div class="wp-block-group newspack-post-subtitle">
				<!-- wp:term-description {"metadata":{"name":"Term Description"}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"metadata":{"name":"Entry Subhead"},"className":"entry-subhead"} -->
			<div class="wp-block-group entry-subhead">
				<!-- wp:group {
                    "metadata": {
                        "name": "Entry Meta"
                    },
                    "className": "entry-meta",
                    "layout": {
                        "type": "flex",
                        "flexWrap": "nowrap",
                        "justifyContent": "space-between"
                    }
                } -->
				<div class="wp-block-group entry-meta">
					<!-- wp:site-functionality/sponsor {"objectId":"<?php echo get_queried_object_id(); ?>","objectType":"term} /-->
                     
                    <!-- wp:jetpack/sharing-buttons {
                        "styleType": "icon",
                        "iconColor": "black",
                        "iconColorValue": "var( --wp--preset--color--contrast )",
                        "iconBackgroundColor": "base",
                        "iconBackgroundColorValue": "var( --wp--preset--color--base )",
                        "layout": {
                            "type": "flex",
                            "justifyContent": "space-between"
                        }
                    } -->
                    <ul class="wp-block-jetpack-sharing-buttons has-normal-icon-size jetpack-sharing-buttons__services-list"
                        id="jetpack-sharing-serivces-list">
                        <!-- wp:jetpack/sharing-button {"service":"bluesky","label":"Bluesky"} /-->
                    </ul>
                    <!-- /wp:jetpack/sharing-buttons -->
				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->
		</header>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->


</div>
<!-- /wp:group -->

<?php
if( $featured_caption ) :
    ?>
    <figcaption class="wp-element-caption"><span><?php echo wp_kses_post( $featured_caption ); ?></span></figcaption>
    <?php
endif;
?>