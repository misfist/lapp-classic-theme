<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newspack
 */
$term_object = get_queried_object();
$term_id     = get_queried_object_id();
$template_type   = get_term_meta( $term_id, 'template_type', true );
$term_meta   = get_term_meta( $term_id );
var_dump( $term_meta );
?>

<?php
get_template_part( 'template-parts/content/content-taxonomy-topic', $template_type );
