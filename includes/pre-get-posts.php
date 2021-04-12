<?php
namespace Semplice\PreGetPosts;

add_action( 'pre_get_posts', __NAMESPACE__ . '\sort_by_publish_date', 10, 2 );

function sort_by_publish_date( $query ) {
	if ( ! $query->is_main_query() ) {
		return;
	}

	if ( is_user_logged_in() ) {
		$query->set( 'post_status', [ 'publish', 'future' ] );
	}

	if (is_home()) {
		$query->set('post_type', ['post', 'articles', 'modern-wp-dev', '3dprint-adventures']);
	}

	$query->set( 'orderby', 'date' );
	$query->set( 'order', 'DESC' );
}
