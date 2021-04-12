<?php

use function Semplice\SVG\the_svg;

?>
<aside class="post-content__sidebar post-sidebar">
	<div class="post-sidebar__grid">
		<?php the_svg( 'time', '--small' ); ?>
		<?php echo do_shortcode( '[rt_reading_time postfix="min read"]' ); ?>

		<?php the_svg( 'tag', '--small' ); ?>
		<span><?php \Semplice\Header\get_post_header_categories(); ?></span>

		<?php the_svg( 'twitter', '--small' ); ?>
		<span>
			<a 
				href="https://twitter.com/intent/tweet?text=<?php echo esc_attr( get_the_title() ); ?>&url=<?php echo esc_url( get_the_permalink() ); ?>?via=ceceppame"
			>
				Share on Twitter
			</a>
		</span>
	</div>
</aside>
