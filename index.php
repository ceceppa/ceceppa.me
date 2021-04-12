<?php
/**
 * Homepage template
 */

use function Semplice\FrontEnd\pagination;

get_header(); ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/styles/home.css?ver=<?php SEMPLICE_THEME_VERSION; ?>">

	<main id="content" role="main" class="home container">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/home', 'tile' );
				endwhile;

		} else {
				get_template_part( 'template-parts/notfound' );
		}
		?>
		<?php pagination(); ?>
	</main>


<?php
get_footer();
