<?php

declare(strict_types=1);

namespace Meno\BigSize;

use Meno\GetImageInfo;

add_filter( 'wp_handle_upload', [ __NAMESPACE__ . '\BigImagesHandler', 'check_fullsize_size' ] );

final class BigImagesHandler {
	/**
	 * @param array $args the array of values got from the WordPress hook.
	 *
	 * @return array
	 */
	static public function check_fullsize_size( array $args ) : array {
		$filename  = $args['file'];
		$file_size = filesize( $filename );

		$is_too_big = self::is_bigger_than_1mb( $file_size );

		if ( $is_too_big ) {
			self::try_to_reduce_size( $filename );
		}

		return $args;
	}

	static public function is_bigger_than_1mb( float $file_size ) : bool {
		$one_mb = pow( 1024, 2 );

		return $file_size >= $one_mb;
	}

	/**
	 * The default max size is 1920x1080, but it can be "override"
	 * by defining:
	 *
	 * define( 'MENO_MAX_WIDTH', '###' );
	 * define( 'MENO_MAX_HEIGHT', '###' );
	 */
	static private function try_to_reduce_size( string $filename ) : void {
		$image_info = new GetImageInfo( $filename );

		$width  = $image_info->get_width();
		$height = $image_info->get_height();

		$max_width  = defined( 'MENO_MAX_WIDTH' ) ? MENO_MAX_WIDTH : 1920;
		$max_height = defined( 'MENO_MAX_HEIGHT' ) ? MENO_MAX_HEIGHT : 1080;

		if ( $width > $max_width || $height > $max_height ) {
			self::resize_image( $image_info, $max_width, $max_height );
		}
	}

	static private function resize_image( \Meno\GetImageInfo $image_info, int $max_width, int $max_height ) : void {
		[ $width, $height ] = $image_info->get_new_size( $max_width, $max_height );

		self::do_resize( $image_info, $width, $height );
	}

	static private function do_resize( \Meno\GetImageInfo $image_info, int $new_width, int $new_height ) : void {
		$image_content = file_get_contents( $image_info->get_path() );
		$image         = imagecreatefromstring( $image_content );

		$resized = imagecreatetruecolor( $new_width, $new_height );
		imagecopyresampled(
			$resized,
			$image,
			0,
			0,
			0,
			0,
			$new_width,
			$new_height,
			$image_info->get_width(),
			$image_info->get_height()
		);

		if ( $resized ) {
			self::save_resize_image( $image_info, $resized );
		}
	}

	/**
	 * @param GetImageInfo $original_image_info the image resource to be saved as file.
	 * @param resource $new_image the image resource to be saved as file.
	 */
	static private function save_resize_image( \Meno\GetImageInfo $original_image_info, &$new_image ) : void {
		$mime_type = $original_image_info->get_mime_type();

		$filename = $original_image_info->get_path();

		// Keep the original, we don't want to destroy it.
		rename( $filename, $filename . '.original' );

		if ( $mime_type === 'image/png' ) {
			imagepng( $new_image, $filename );
		} else {
			imagejpeg( $new_image, $filename, 9 );
		}

		imagedestroy( $new_image );
	}
}