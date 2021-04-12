<?php
/**
 * Testing code for <ajax-form> component & custom ajax
 *
 * @package 93 Starter Theme
 */
namespace Meno\Test;

use function Meno\Downsize\downsize_image;

require_once __DIR__ . '/../../../includes/get-downsize-image.php';

add_image_size( 'test-downsize', 300, 200, true );

class Test_Meno_Get_Downsize_Image extends \WP_UnitTestCase {
	function test_return_the_first_parameter_if_size_is_full() {
		$result = downsize_image( 'test', 123, 'full' );

		$this->assertEquals( $result, 'test' );
	}

	function test_should_generate_the_image() {
		add_filter( 'intermediate_image_sizes_advanced', '__return_false' );

		$attachment_id = simulate_upload_process( _TEST_IMAGE, 'test-downsize.png' );
		downsize_image( false, $attachment_id, 'test-downsize' );

		$exists = count_generated_images( 'test-downsize-300x200' );
		$this->assertEquals( $exists, 1 );
	}

	function test_should_create_symlink() {
		add_image_size( 'different-ratio', 300 );
		add_filter( 'intermediate_image_sizes_advanced', '__return_false' );

		$attachment_id = simulate_upload_process( _TEST_IMAGE, 'test-different-ratio.png' );
		$result        = downsize_image( false, $attachment_id, 'different-ratio' );

		$exists = count_generated_images( 'test-different-ratio-300x0' );
		$this->assertEquals( $exists, 1 );
	}

	function test_should_return_the_link_path() {
		add_image_size( 'different-ratio', 300 );
		add_filter( 'intermediate_image_sizes_advanced', '__return_false' );

		$attachment_id = simulate_upload_process( _TEST_IMAGE, 'test-different-ratio.png' );
		// We need to make sure that the link has been created!
		downsize_image( false, $attachment_id, 'different-ratio' );

		list($path, $width, $height) = downsize_image( false, $attachment_id, 'different-ratio' );

		$this->assertTrue( stripos( $path, '-300x135.png' ) >= 0 );
		$this->assertEquals( $width, 300 );
		$this->assertEquals( $height, 135 );
	}
}
