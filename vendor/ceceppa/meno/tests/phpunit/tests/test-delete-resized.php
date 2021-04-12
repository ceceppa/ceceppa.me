<?php
/**
 * Testing code for <ajax-form> component & custom ajax
 *
 * @package 93 Starter Theme
 */
namespace Meno\Test;

use function Meno\Prevent\prevent_generation;

require __DIR__ . '/../../../meno.php';

class Test_Meno_Delete_Resized extends \WP_UnitTestCase {

	/**
	 * Whilst all the tests were working fine in isolation,
	 * I did forgot 1 include on the main meno.php file xD.
	 *
	 * So let's make sure that loading meno.php everything
	 * is working fine.
	 */
	function test_make_sure_that_all_the_necessary_files_are_loaded() {
		prevent_generation();

		simulate_upload_process( _TEST_BIG_IMAGE, 'generate-big-one.png' );
		$count = count_generated_images( 'generate-big-one' );

		// The 2nd image is the .original one.
		$this->assertEquals( $count, 2 );
	}

	/**
	 * This test is needed to check that php and php-gd are configured
	 * properly.
	 */
	function test_should_generate_the_images_for_the_custom_sizes() {
		simulate_upload_process( _TEST_IMAGE, 'generate-all.png' );

		$count = count_generated_images( 'generate-all' );

		$this->assertGreaterThan( 1, $count );
	}

	function test_should_not_generate_the_images_for_the_custom_sizes() {
		prevent_generation();

		simulate_upload_process( _TEST_IMAGE, 'generate-none.png' );
		$count = count_generated_images( 'generate-none' );

		$this->assertEquals( $count, 1 ); // only the big size.
	}
}
