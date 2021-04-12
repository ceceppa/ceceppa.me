<?php use function Semplice\SVG\the_svg; ?>
<div class="social-bar">
<?php
	$social_links = [
		'github'   => 'https://github.com/ceceppa',
		'gitlab'   => 'https://gitlab.com/ceceppa',
		'twitter'  => 'https://twitter.com/ceceppa',
		'linkedin' => 'https://www.linkedin.com/in/alessandrosenese/',
		'flickr'   => 'https://flickr.com/photos/7628218@N06/',
		'contact'  => 'mailto:contact@ceceppa.me',
	];

	foreach ( $social_links as $social => $link ) :
		?>

		<a class="social-bar__link --social --white tooltip"
			href="<?php echo $link; ?>"
			aria-label="<?php printf( __( 'My %s account', 'ceceppa' ), $social ); ?>"
			data-tooltip="<?php echo ucfirst( $social ); ?>"
		>
			<?php the_svg( sanitize_title( $social ) ); ?>
		</a>

		<?php endforeach; ?>

</div>
