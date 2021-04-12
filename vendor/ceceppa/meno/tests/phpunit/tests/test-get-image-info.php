<?php
namespace Meno\Test;

use Meno\GetImageInfo;

require_once __DIR__ . '/../../../includes/get-image-info.php';

class Test_Meno_GetImageInfo extends \WP_UnitTestCase {
	function test_get_image_path() {
		$image_info = new GetImageInfo( _TEST_IMAGE );
		$image_path = $image_info->get_path();

		$this->assertEquals( $image_path, _TEST_IMAGE );
	}

	function test_get_the_mime_type() {
		$image_info = new GetImageInfo( _TEST_IMAGE );
		$mime_type  = $image_info->get_mime_type();

		$this->assertEquals( $mime_type, 'image/png' );
	}

	function test_get_width() {
		$image_info = new GetImageInfo( _TEST_IMAGE );
		$width      = $image_info->get_width();

		$this->assertEquals( $width, 1320 );
	}

	function test_get_height() {
		$image_info = new GetImageInfo( _TEST_IMAGE );
		$height     = $image_info->get_height();

		$this->assertEquals( $height, 596 );
	}

	function test_get_ratio() {
		$image_info = new GetImageInfo( _TEST_IMAGE );
		$ratio      = $image_info->get_ratio();

		$this->assertEquals( $ratio, 2.21 );
	}

	/**
	 * If the max width is less than the original one must keep the aspect ratio
	 */
	function test_get_new_size_when_max_width_is_less_than_width() {
		$image_info                     = new GetImageInfo( _TEST_IMAGE );
		list( $new_width, $new_height ) = $image_info->get_new_size( 1000, 600 );

		$original_ratio = round( $image_info->get_ratio(), 2 );
		$resized_ratio  = round( $new_width / $new_height, 2 );

		$this->assertEquals( $new_width, 1000 );
		$this->assertEquals( $original_ratio, $resized_ratio );
	}

	/**
	 * If the max height is less than the original one must keep the aspect ratio
	 */
	function test_get_new_size_when_max_height__is_less_than_height() {
		$image_info                     = new GetImageInfo( _TEST_IMAGE );
		list( $new_width, $new_height ) = $image_info->get_new_size( 1400, 200 );

		$original_ratio = round( $image_info->get_ratio(), 2 );
		$resized_ratio  = round( $new_width / $new_height, 2 );

		$this->assertEquals( $new_height, 200 );
		$this->assertEquals( $original_ratio, $resized_ratio );
	}
}
