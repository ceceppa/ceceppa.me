<?php
use function Semplice\Categories\get_post_primary_category;
use function Semplice\SVG\the_svg;

?>
<header class="tile-header">
	<?php
	$primary_category = get_post_primary_category();

	if ( ! empty( $primary_category ) && ! is_wp_error( $primary_category ) ) :
		$primary_category_name = get_post_primary_category()->name;
		$primary_category_link = get_term_link( $primary_category );
		?>
	<div class="tile-header__date flex flex--center">
		<?php the_svg( 'tag' ); ?>
		<a href="<?php echo esc_url( $primary_category_link ); ?>">
			<?php echo esc_html( $primary_category_name ); ?>
		</a>
		<div class="tile-header__separator">&bull;</div>
		<?php the_svg( 'calendar' ); ?>
		<?php echo get_the_date(); ?>
	</div>
	<?php endif; ?>
	<h2 class="tile-header__title">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h2>
</header>
