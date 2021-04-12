<?php
namespace Semplice\SEO;

if ( is_single() && get_the_author_meta( 'user_url', $post->post_author ) ) {
	echo '<link rel="author" href="' . get_the_author_meta( 'user_url', $post->post_author ) . '">';
}

add_filter(
	'get_shortlink',
	function( $shortlink ) {
		return $shortlink;
	}
);
