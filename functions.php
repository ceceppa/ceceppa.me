<?php
namespace Semplice;

use function Meno\Prevent\prevent_generation;

define( 'SEMPLICE_THEME_VERSION', '1603646032' );

require __DIR__ . '/vendor/autoload.php';

$includes_path = __DIR__ . '/includes/';
require $includes_path . 'admin.php';
require $includes_path . 'fix-wp-templates-path.php';
require $includes_path . 'custom-post-types.php';
require $includes_path . 'category-utils.php';
require $includes_path . 'theme-support.php';
require $includes_path . 'menus.php';
require $includes_path . 'image-sizes.php';
require $includes_path . 'localization.php';
require $includes_path . 'sidebars.php';
require $includes_path . 'styles.php';
require $includes_path . 'scripts.php';
require $includes_path . 'svg.php';
require $includes_path . 'seo.php';
require $includes_path . 'comment-walker.php';
require $includes_path . 'front-end-date.php';
require $includes_path . 'front-end-header.php';
require $includes_path . 'pagination.php';
require $includes_path . 'pre-get-posts.php';

prevent_generation();
