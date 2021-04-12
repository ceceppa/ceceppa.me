<?php
namespace Semplice\Categories;

function get_post_primary_category( $post_id = false, $term = 'category' ) {
	$return = array();
	if ( $post_id === false ) {
		$post_id = get_the_ID();
	}

	if ( class_exists( 'WPSEO_Primary_Term' ) ) {
		$wpseo_primary_term = new \WPSEO_Primary_Term( $term, $post_id );
		$primary_term = get_term( $wpseo_primary_term->get_primary_term() );

		if ( ! is_wp_error( $primary_term ) ) {
			return $primary_term;
		}
	}

	if ( empty( $return['primary_category'] ) ) {
		$categories_list = get_the_terms( $post_id, $term );

		if ( empty( $return['primary_category'] ) && ! empty( $categories_list ) ) {
			return $categories_list[0];  // get the first category
		}
	}

	return '';
}
