<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Farina
 */

use function Meno\Test\clean_up_upload;

define( '_TEST_SVG_IMAGE', __DIR__ . '/test-svg-image.svg' );
define( '_TEST_IMAGE', __DIR__ . '/test-image.png' );
define( '_TEST_BIG_IMAGE', __DIR__ . '/big-image.jpg' );

$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = '/tmp/wordpress-tests-lib';
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';

require __DIR__ . '/tests/utils.php';

clean_up_upload();
