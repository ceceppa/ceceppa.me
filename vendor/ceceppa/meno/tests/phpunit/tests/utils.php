<?php
/**
 * Simulate the Upload process done via the back-end
 */
namespace Meno\Test;

// add some image size needed for testing purpose.
add_image_size( 'salva', 500, 300, false );
add_image_size( 'spazio', 400 );

$test_id = wp_insert_post(
	[
		'post_type'  => 'post',
		'post_title' => 'test',
	]
);

function simulate_upload_process( $image_path, $output_filename ) {
	$content     = file_get_contents( $image_path );
	$upload_file = wp_upload_bits( $output_filename, null, $content );

	$attachment_id = insert_attachment( $output_filename, $upload_file );
	update_attachment_metadata( $attachment_id, $upload_file );

	return $attachment_id;
}

function insert_attachment( $filename, $upload_file ) {
	$wp_filetype = wp_check_filetype( $filename, null );

	$attachment = array(
		'post_mime_type' => $wp_filetype['type'],
		'post_parent'    => 0,
		'post_title'     => preg_replace( '/\.[^.]+$/', '', $filename ),
		'post_content'   => '',
		'post_status'    => 'inherit',
	);

	return wp_insert_attachment( $attachment, $upload_file['file'], 0 );
}

function update_attachment_metadata( $attachment_id, $upload_file ) {
	$attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
	wp_update_attachment_metadata( $attachment_id, $attachment_data );
}

function get_upload_path() {
	$upload_dir = wp_upload_dir();

	return trailingslashit( $upload_dir['path'] );
}

function count_all_image_sizes() {
	$sizes = get_intermediate_image_sizes();

	return count( $sizes ) + 1; // 1 is needed for the full size image
}

/**
 * Clean the upload folder to prevent wp from adding -#
 * for each test.
 */
function clean_up_upload() {
	$upload_dir = get_upload_path();
	$files      = glob( $upload_dir . '*.*' );
	foreach ( $files as $file ) {
		unlink( $file );
	}
}

function count_generated_images( string $filename, string $extension = '*.*' ) :int {
	$upload_path = get_upload_path();
	$files       = glob( $upload_path . $filename . $extension );

	return count( $files );
}
