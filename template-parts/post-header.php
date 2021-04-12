<?php
use function Semplice\SVG\the_svg;
?>

<header class="tile-header post-header flex flex--columns">
	<div class="flex flex--row flex--center tile-header__tags">
		<?php echo \Semplice\Header\get_post_header_categories( '<span class="tile-header__tags__separator"></span>' ); ?>
	</div>

	<h1 class="tile-header__title post-header__title"><?php the_title(); ?></h1>

	<div class="post-header__top flex flex--center">
		<div class="post-header__date">
			<?php the_svg( 'calendar' ); ?>
			<?php echo get_the_date(); ?>
		</div>

		<div class="tile-header__separator post-header__separator">&bull;</div>
		<a href="#comments" class="post-header__comments">
			<?php printf( _n( '%d comment', '%d comments', 'ceceppa' ), get_comments_number() ); ?>
		</a>
	</div>

</header>
