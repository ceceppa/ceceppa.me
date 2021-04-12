<?php
	$blog_name = get_bloginfo( 'name' );
?>

<div class="main-header__logo" style="display: inherit">
	<div style="display: inline-block">
		<a
			href="<?php echo esc_html( home_url() ); ?>"
			class="main-header__title --header flex flex--center"
			title="<?php echo get_bloginfo( 'description' ); ?>"
		>
			<img 
				class="main-header__image"
				src="<?php echo get_template_directory_uri(); ?>/images/ceceppa.png"
				alt="<?php echo esc_attr( $blog_name ); ?>"
			>
			<span><?php echo $blog_name; ?></span>
		</a>
	</div>
</div>
