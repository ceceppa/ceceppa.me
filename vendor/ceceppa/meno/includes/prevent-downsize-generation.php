<?php

declare(strict_types=1);

namespace Meno\Prevent;

function prevent_generation() : void {
	add_filter(
		'intermediate_image_sizes_advanced',
		__NAMESPACE__ . '\no_downsize_generation'
	);
}

// Don't generate the intermediate versions at all!
function no_downsize_generation() : bool {
	return false;
}
