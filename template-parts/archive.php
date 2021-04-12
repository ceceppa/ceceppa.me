<article class="home-tile">
	<?php
	if ( has_post_thumbnail() ) :?>
	<a href="<?php the_permalink(); ?>" class="archive-image" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
		<?php the_post_thumbnail( 'home-tile' ); ?>
	</a>
	<?php endif; ?>

	<?php get_template_part( 'template-parts/archive-tile-header' ); ?>
	<?php get_template_part( 'template-parts/home-tile-excerpt' ); ?>
</article>
