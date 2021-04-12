<?php
use PostTypes\PostType;

$custom_post_types = [
	[
		'names'=> [
			'name'     => 'articles',
			'singular' => 'Article',
			'plural'   => 'Articles',
			'slug'     => 'articles',
		],
		'icon' => 'dashicons-beer',
		'taxonomy' => 'category',
		'options' => [
			'has_archive' => true,
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		]
	],
	[
		'names'=> [
			'name'     => 'modern-wp-dev',
			'singular' => 'Modern WordPress Development',
			'plural'   => 'Modern WordPress Development',
			'slug'     => 'modern-wp-dev',
		],
		'icon' => 'dashicons-beer',
		'taxonomy' => 'category',
		'options' => [
			'has_archive' => true,
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		]
	],
	[
		'names'=> [
			'name'     => '3dprint-adventures',
			'singular' => 'My 3D Printing Adventures',
			'plural'   => 'My 3D Printing Adventures',
			'slug'     => '3dprint-adventures',
			'has_archive' => true,
		],
		'icon' => 'dashicons-printer',
		'taxonomy' => 'category',
		'options' => [
			'has_archive' => true,
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		]
	],
	[
		'names'=> [
			'name'     => 'archive-pages',
			'singular' => 'Archive page',
			'plural'   => 'Archive pages',
			'slug'     => 'archive-pages',
		],
		'icon' => 'dashicons-archive',
		'options' => [
			'public' => false,
			'exclude_from_search' => true,
			'publicly_queryable' => false,
			'show_ui' => true,
		]
	]
];

foreach ( $custom_post_types as $custom_post_type ) {
	$cpt = new PostType( $custom_post_type['names'], $custom_post_type['options'] ?? [] );

	if (array_key_exists('taxonomy', $custom_post_type)) {
		$cpt->taxonomy($custom_post_type['taxonomy']);
	}

	$cpt->icon($custom_post_type['icon']);

	$cpt->register();
}
