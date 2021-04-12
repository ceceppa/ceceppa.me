<?php get_template_part( 'template-parts/mobile', 'menu' ); ?>

<footer class="footer">
	<div class="container footer__container flex flex--center mobile-flex--columns">

		<?php get_template_part( 'template-parts/footer', 'credits' ); ?>

		<?php get_template_part( 'template-parts/footer', 'menu' ); ?>

	</div>


	<?php get_template_part( 'template-parts/social', 'bar' ); ?>

<div style="display: none">
	<?php require get_template_directory() . '/dist/symbol/svg/sprite.symbol.svg'; ?>
</div>

</footer>

<?php wp_footer(); ?>
</body>

</html>
