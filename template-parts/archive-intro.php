<?php
global $wpdb, $paged;

if ($paged > 1) {
	return;
}

$post_type = get_post_type();
$post_type_object = get_post_type_object( $post_type );

$query = $wpdb->prepare( "SELECT post_ID FROM $wpdb->postmeta WHERE meta_key = '_archive_page_content' AND meta_value = '%s' LIMIT 1", $post_type );
$intro_id = $wpdb->get_results( $query );

if ($intro_id == null) {
	return;
}

$intro_post_id = $intro_id[0]->post_ID;
?>
<article class="archive-intro">
	<header class="archive-intro__header">
		<h1 class="archive-intro__title"><?php  echo $post_type_object->label; ?></h1>
	</header>
<?php

?>
	<div class="tile-excerpt" itemprop="articleBody">
		<?php echo do_shortcode( get_post_field( 'post_content', $intro_post_id ) ); ?>
	</div>
</article>
