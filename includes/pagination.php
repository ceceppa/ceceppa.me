<?php

namespace Semplice\FrontEnd;

function pagination( $show_ends = true ) {
	global $wp_query, $wp;

	$total_pages = $wp_query->max_num_pages;
	if ( $total_pages < 2 ) {
		return;
	}

	$current_page = max( 1, get_query_var( 'paged' ) );
	$custom_params = count( $_GET ) > 0 ? '?' . http_build_query( $_GET ) : '';
	$base_url = explode( '?', get_pagenum_link( 1 ) )[0];
	$first_page = $base_url . $custom_params;
	$last_page  = $base_url . 'page/' . $total_pages . $custom_params;

	$args = [
		'base'      => $base_url . '%_%' . $custom_params,
		'format'    => 'page/%#%',
		'current'   => $current_page,
		'total'     => $total_pages,
		'prev_text' => '<span class="nav-inline-dash">&lsaquo;</span>',
		'next_text' => '<span class="nav-inline-dash">&rsaquo;</span>',
	];

	include locate_template( 'template-parts/pagination.php' );
}
