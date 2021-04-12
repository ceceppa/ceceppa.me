<?php

declare(strict_types=1);

/**
 * WordPress by default generates too many files for each image,
 * even if you never use different sizes.
 * This is a big waste of space, especially when working with
 * big websites.
 * So, in this file we do prevent WP from generating them and
 * provide functions that do generate the size wanted only
 * when required.
 */

namespace Meno;

/**
 * TODO: Is there a better way to do this?
 *
 * To allow meno to be used as a library I have to define
 * the "autoload" -> "files" property, and so far nothing strange.
 * But after doing a composer dumpautoload or composer require
 * running `composer run test` or `composer run phpinsights`
 *
 * PHP Fatal error:  Uncaught Error:
 * Call to undefined function Meno\FullSize\add_filter() in
 * /home/ceceppa/Progetti/Composer/meno/includes/handle-fullsize-size.php:9
 *
 * So, in order to avoid that I'm going to check if add_filter exists, and
 * if not "ignore" the composer request.
 * This because the function will be available when using this library
 * in plugins or themes, is just when doing unittest that cannot be
 * loaded straight away.
 */
if ( ! function_exists( 'add_filter' ) ) {
	return;
}

require_once __DIR__ . '/includes/prevent-downsize-generation.php';
require_once __DIR__ . '/includes/handle-big-images.php';
require_once __DIR__ . '/includes/get-downsize-image-info.php';
require_once __DIR__ . '/includes/get-downsize-image.php';
require_once __DIR__ . '/includes/get-image-info.php';

