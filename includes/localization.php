<?php
namespace Semplice\Setup;

add_action( 'after_setup_theme', __NAMESPACE__ . '\setup_localization' );

function setup_localization() {
	load_theme_textdomain( 'ceceppa', get_template_directory() . '/languages' );
	load_textdomain( 'ceceppa', '' );
}
