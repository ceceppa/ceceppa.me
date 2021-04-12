<?php
function archive_page_add_custom_metabox() {
	$screens = [ 'archive-pages' ];

	foreach ( $screens as $screen ) {
		add_meta_box(
			'archive_page',
			'Select CPT',
			'archive_page_box_content',
			$screen
		);
	}
}

function archive_page_box_content() {
	global $post;

	$value = get_post_meta( $post->ID, '_archive_page_content', true );
	$post_types = get_post_types(['_builtin' => false]);
	?>
	<select name="archive_page" id="archive_page" class="postbox">
		<?php foreach ( $post_types as $post_type ) : ?>
			<option value="<?php echo $post_type ?>" <?php echo selected( $value, $post_type ); ?>><?php echo $post_type ?></option>
		<?php endforeach; ?>
	</select>
	<?php
}

function archive_page_postdata( $post_id ) {
	if ( array_key_exists( 'archive_page', $_POST ) ) {
		update_post_meta(
			$post_id,
			'_archive_page_content',
			$_POST['archive_page']
		);
	}

	update_post_meta( $post_id, '_cached_categories', null);
}

add_action('add_meta_boxes', 'archive_page_add_custom_metabox');
add_action( 'save_post', 'archive_page_postdata' );

