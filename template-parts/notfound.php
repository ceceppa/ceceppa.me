<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/styles/404.css?ver=<?php SEMPLICE_THEME_VERSION; ?>">

<div class="error404">
	<header class="error404__content">
		<h1 class="error404__title">
			<?php _e( 'Not Found', 'verbosa' ); ?>
		</h1>
		<p>
			<?php if ( is_search() ) : ?>
				<p><?php printf( __( 'No search results for: %s', 'verbosa' ), '<strong>' . get_search_query() . '</strong>' ); ?></p>
			<?php else :
				_e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'verbosa' );
				endif;
			?>
		</p>
		<?php get_search_form(); ?>
	</header>
</div>
