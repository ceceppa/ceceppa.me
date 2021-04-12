<?php

namespace Meno\Test;

use Meno\GetImageInfo;

use function Meno\FullSize\is_bigger_than_1mb;
use function Meno\Test\get_upload_path;
use function Meno\Test\simulate_upload_process;

require_once __DIR__ . '/../../../includes/handle-big-image.php';

class Test_Meno_FullSize extends \WP_UnitTestCase {
	/**
	 * phpunit-pretty-print doesn't like number or uppercases :')
	 *
	 * So this function name will not be printed correctly:
	 *
	 * test_is_size_bigger_than_1MB
	 */
	function test_is_size_bigger_than_one_mb() {
			$number = pow( 1024, 2 ) + 1;

			$this->assertTrue( is_bigger_than_1mb( $number ) );
	}

	function test_reduce_the_image_size_if_too_big() {
		add_filter(
			'intermediate_image_sizes_advanced',
			'__return_false'
		);

		simulate_upload_process( _TEST_BIG_IMAGE, 'big-image.jpg' );

		$original_size = filesize( _TEST_BIG_IMAGE );

		$big_image           = get_upload_path() . 'big-image.jpg';
		$new_size            = filesize( $big_image );
		$dot_original_file   = get_upload_path() . 'big-image.jpg.original';
		$dot_original_exists = file_exists( $dot_original_file );

		$this->assertLessThan( $original_size, $new_size );
		$this->assertTrue( $dot_original_exists );
	}

}
