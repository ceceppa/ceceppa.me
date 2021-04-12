<?php
/**
 * Testing code for <ajax-form> component & custom ajax
 *
 * @package 93 Starter Theme
 */
namespace Meno\Test;

use Meno\Get\GetDownsizeImageInfo;

require_once __DIR__ . '/../../../includes/get-downsize-image-info.php';

add_image_size( 'test-size', 123, 456, false );

class Test_Meno_Get_Downsize_Image_Path extends \WP_UnitTestCase {
	function test_should_return_the_path_of_the_downsize_image() {
		$class  = new GetDownsizeImageInfo( _TEST_IMAGE, 'test-size' );
		$result = $class->get_path();

		$expected = str_replace( '.png', '-123x456.png', _TEST_IMAGE );
		$this->assertEquals( $result, $expected );
	}

	function test_should_return_the_full_path_for_svgs() {
		$class  = new GetDownsizeImageInfo( _TEST_SVG_IMAGE, 'test-size' );
		$result = $class->get_path();

		$this->assertEquals( $result, _TEST_SVG_IMAGE );
	}

	function test_should_return_the_custom_width() {
		$class = new GetDownsizeImageInfo( _TEST_IMAGE, 'test-size' );
		$width = $class->get_width();

		$this->assertEquals( $width, 123 );
	}

	function test_should_return_the_custom_width_and_height() {
		$class = new GetDownsizeImageInfo( _TEST_IMAGE, 'test-size' );
		$size  = $class->get_height();

		$this->assertEquals( $size, 456 );
	}

	function test_get_crop_should_return_false() {
		$class = new GetDownsizeImageInfo( _TEST_IMAGE, 'test-size' );
		$crop  = $class->get_crop();

		$this->assertEquals( $crop, false );
	}

	function test_set_width() {
		$image_info = new GetDownsizeImageInfo( _TEST_IMAGE, 'test-size' );
		$image_info->set_width( 123 );
		$width = $image_info->get_width();

		$this->assertEquals( $width, 123 );
	}

	function test_set_height() {
		$image_info = new GetDownsizeImageInfo( _TEST_IMAGE, 'test-size' );
		$image_info->set_height( 789 );
		$height = $image_info->get_height();

		$this->assertEquals( $height, 789 );
	}

	function test_get_path_should_use_the_new_size() {
		$image_info = new GetDownsizeImageInfo( _TEST_IMAGE, 'test-size' );
		$image_info->set_width( 987 );
		$image_info->set_height( 789 );
		$path = $image_info->get_path();

		$this->assertTrue( stripos( $path, '-987x789.' ) >= 0 );
	}

}
