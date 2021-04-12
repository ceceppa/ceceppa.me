<div class="footer__menu">
<?php
wp_nav_menu(
	[
		'theme_location' => 'footer',
		'menu_class'     => 'footer__menu--ul mobile-flex--columns',
		'container'      => 'ul',
	]
);
?>
</div>
