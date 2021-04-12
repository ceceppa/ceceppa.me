<?php use function Semplice\SVG\the_svg; ?>

<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="s">
		<?php echo _e( 'Search for:', 'semplice' ); ?>
	</label>
	<input 
		type="search"
		class="searchform__input"
		placeholder="<?php echo esc_attr_e( 'Search', 'semplice' ); ?>"
		value="<?php echo get_search_query(); ?>"
		name="s"
		id="s"
	/>

	<button type="submit" class="searchform__submit flip-and-zoom --no-padding">
		<span class="screen-reader-text"><?php echo _e( 'Search', 'semplice' ); ?></span>
		<?php the_svg( 'search', 'searchform__icon' ); ?>
	</button>
</form>
