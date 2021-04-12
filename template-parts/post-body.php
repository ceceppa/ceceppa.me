<div class="post-body" itemprop="articleBody">
	<div class="post-body__entry">
		<?php the_content(); ?>

		<?php
		if ( is_singular( 'post' ) ) {
			get_template_part( 'template-parts/form' );
		}
		?>
	</div>
</div>
