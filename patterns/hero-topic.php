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
if ( function_exists( 'newspack_get_all_sponsors' ) ) {
	$all_sponsors    = newspack_get_all_sponsors( get_queried_object_id() );
	$native_sponsors = newspack_get_native_sponsors( $all_sponsors );
}
?>
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"customOverlayColor":"#FFF","isUserOverlayColor":false,"isDark":false,"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light">
    <span aria-hidden="true" class="wp-block-cover__background has-background-dim" style="background-color:#FFF"></span>
    <div class="wp-block-cover__inner-container">
        <?php
        if ( ! empty( $native_sponsors ) ) :
            ?>
            <?php newspack_sponsor_label( $native_sponsors ); ?>
            <?php
        endif;
        ?>
        <!-- wp:group {"metadata":{"name":"Page Title"},"className":"page-title","layout":{"type":"constrained"}} -->
        <div class="wp-block-group page-title">
            <!-- wp:term-name {"level":1,"className":"page-description"} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:term-description {"metadata":{"name":"Term Description"},"className":"taxonomy-description"} /-->

        <!-- wp:site-functionality/sponsor {"objectId":"<?php echo get_queried_object_id() ?>","objectType":"term} /-->
        

    </div>
</div>
<!-- /wp:cover -->