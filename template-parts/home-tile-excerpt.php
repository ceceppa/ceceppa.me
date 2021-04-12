<?php
use function Semplice\SVG\the_svg;
?>
<div class="tile-excerpt">
	<?php the_excerpt(); ?>
	<a href="<?php the_permalink(); ?>"
		class="--button"
		title="<?php echo esc_attr( sprintf( __( 'Continue reading %s', 'ceceppa' ), get_the_title() ) ); ?>"
	>
		<?php _e( 'Continue reading', 'ceceppa' ); ?>
		<?php the_svg( 'right-arrow', '--button-icon' ); ?>
	</a>
</div>
