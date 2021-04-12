<?php

use function Semplice\SVG\the_svg;

wp_nav_menu(
	[
		'theme_location' => 'primary',
		'menu_class'     => 'main-header__menu mobile-flex--columns',
		'container'      => 'ul',
	]
);
?>

<label for="show-search" class="main-header__menu-search --header" title="Search">
	<?php the_svg( 'search' ); ?>
</label>
