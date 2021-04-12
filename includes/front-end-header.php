<?php
namespace Semplice\Header;

function get_post_header_categories( $separator = ', ') {
	$post_id = get_the_ID();
	$cached_categories = get_post_meta( $post_id, '_cached_categories', true );

	if ($cached_categories == null) {
		$cached_categories = generate_hml( $post_id );

		update_post_meta( $post_id, '_cached_categories', $cached_categories );
	}

	echo join($separator, $cached_categories );
}

function generate_hml( int $post_id ) {
	$post_type = get_post_type_name( $post_id );
	$categories = get_post_categories( $post_id );
	$all = array_merge_recursive([$post_type], $categories);
	$return = [];

	foreach ($all as $item) {
		$return[] = sprintf(
			"<span><a href='%s' rel='category tag'>%s</a></span>",
			$item['link'],
			$item['label']
		);
	}

	return $return;
}

function get_post_type_name( int $post_id ) {
	$post_type = \get_post_type();
	$post_type_object = \get_post_type_object( $post_type );

	return [
		'label' => $post_type_object->label,
		'link' => \home_url( $post_type )
	];
}

function get_post_categories( int $post_id ) {
	$all_categories = wp_get_post_categories( $post_id );
	$return = [];


	foreach ( $all_categories as $category_id ) {
		$category = get_category( $category_id );

		array_push($return, [
			'label' => $category->name,
			'link' => get_term_link( $category_id )
		]);
	}

	return $return;
}
