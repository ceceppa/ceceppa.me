<nav class="post-related" role="navigation">
	<?php
	global $post;

	$original_post = $post;
	$post = get_previous_post();

	if ( $post ) :
		?>
	<div class="nav-previous post-related__nav">
		<?php get_template_part( 'template-parts/home-tile-header' ); ?>
	</div>
	<?php endif; ?>

	<?php
	$post = $original_post;
	$post = get_next_post();

	if ( $post ) :
		?>
	<div class="nav-next post-related__nav">
		<?php get_template_part( 'template-parts/home-tile-header' ); ?>
	</div>
	<?php endif; ?>
</nav><!-- #nav-below -->

<?php
$post = $original_post;
