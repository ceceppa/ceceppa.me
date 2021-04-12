<article class="post">
	<?php get_template_part( 'template-parts/post-header' ); ?>
	<?php get_template_part( 'template-parts/post-sidebar' ); ?>

	<?php get_template_part( 'template-parts/post-body' ); ?>

	<?php get_template_part( 'template-parts/post-comments' ); ?>
</article>

<?php
wp_enqueue_script( 'comment-reply' );
