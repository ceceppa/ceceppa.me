<?php

declare(strict_types=1);

/**
 * I'm using a class here for readability reason, as I don't
 * want to create functions that handles several parameters
 * or return an array of values to be splitted across different
 * variables, example:
 *
 * list( $is_png, $src_image, $source_width, $source_height )
 *  = get_source_image( $full_size_src );
 */

namespace Meno;

final class GetImageInfo {
	/**
	 * @var $image_info string the image path
	 */
	private $image_path = null;

	/**
	 * @var $image_info array containing the output of getimagesize.
	 */
	private $image_info = null;

	public function __construct( string $image_path ) {
		$this->image_path = $image_path;
		$this->image_info = getimagesize( $image_path );
	}

	public function get_path() : string {
		return $this->image_path;
	}

	public function get_mime_type() : string {
		return $this->image_info['mime'];
	}

	public function get_width() : int {
		return $this->image_info[0];
	}

	public function get_height() : int {
		return $this->image_info[1];
	}

	public function get_ratio() : float {
		$ratio = $this->get_width() / $this->get_height();

		return round( $ratio, 2 );
	}

	public function get_new_size( int $max_width, int $max_height ) {
		$new_width = $this->get_width();
		$new_height = $this->get_height();
		$ratio = $this->get_ratio();

		if ( $new_width > $max_width ) {
			$new_width = $max_width;
			$new_height = intval( $new_width / $ratio );
		} elseif ( $new_height > $max_height ) {
			$new_height = $max_height;
			$new_width = intval( $new_height * $ratio );
		}

		return [ $new_width, $new_height ];
	}
}
