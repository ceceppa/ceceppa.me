<?php
/**
 * I like to show how long ago was the post written in days or month format
 * and up to 3 month max.
 */

namespace Semplice\FrontEnd;

function get_post_date() :string {
	$difference = _get_date_difference();

	if ( $difference->y > 0) {
		return get_the_date();
	}

	if ( $difference->m == 0 ) {
		return sprintf( _n( '%d day ago', '%d days ago', $difference->d, 'ceceppa' ), $difference->d );
	} elseif ( $difference->m < 3 ) {
		return sprintf( _n( '%d month ago', '%d months ago', $difference->m, 'ceceppa' ), $difference->m );
	}

	return get_the_date();
}

function _get_date_difference() {
	$post_date = new \DateTime( '@' . get_the_date( 'U' ) );
	$today = new \DateTime();

	return date_diff( $post_date, $today );
}
