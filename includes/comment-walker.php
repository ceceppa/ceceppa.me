<?php

namespace Semplice\Comments;

use function Semplice\SVG\get_svg;

class Comment_Walker extends \Walker_Comment {
	var $tree_type = 'comment';
	var $db_fields = array(
		'parent' => 'comment_parent',
		'id'     => 'comment_ID',
	);

	// constructor – wrapper for the comments list
	function __construct() { ?>
			<section class="post-comments__list">
		<?php
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2;
		?>
			<section class="post-comments__list post-comments__child depth-<?php echo $depth + 1; ?>">
		<?php
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2;
		?>
			</section>
		<?php
	}

	function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment']       = $comment;
		$parent_class             = ( empty( $args['has_children'] ) ? '' : 'parent' );

		if ( 'article' == $args['style'] ) {
			$tag       = 'article';
			$add_below = 'comment';
		} else {
			$tag       = 'article';
			$add_below = 'comment';
		}
		?>

			<article <?php comment_class( empty( $args['has_children'] ) ? 'post-comments__comment' : 'post-comments__comment parent' ); ?> 
				id="comment-<?php comment_ID(); ?>"
				itemprop="comment"
				itemscope
				itemtype="http://schema.org/Comment"
			>
				<div class="post-comments__avatar">
					<?php echo get_avatar( $comment, 32, 'https://secure.gravatar.com/avatar/6365f4814b149950263256f18cd6ebed?s=32&d=mm&r=g', 'Author’s gravatar' ); ?>
				</div>

				<div class="post-comments__meta" role="complementary">
					<a class="--bold post-comments__author" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a>
					<strong>wrote</strong>
					&mdash;
					<time class="post-comments__time" datetime="<?php comment_date( 'Y-m-d' ); ?>T<?php comment_time( 'H:iP' ); ?>" 
					itemprop="datePublished">
						<?php comment_date( 'jS F Y' ); ?>,
						<a href="#comment-<?php comment_ID(); ?>" itemprop="url">
							<?php comment_time(); ?>
						</a>
					</time>

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="comment-meta-item">Your comment is awaiting moderation.</p>
					<?php endif; ?>
				</div>

				<div class="post-comments__content" itemprop="text">
					<?php comment_text(); ?>

					<?php
					comment_reply_link(
						array_merge(
							$args,
							array(
								'add_below'  => $add_below,
								'depth'      => $depth,
								'max_depth'  => $args['max_depth'],
								'reply_text' => 'Reply' . get_svg( 'right-arrow', '--button-icon' ),
							)
						)
					);
					?>
				</div>
		<?php
	}

	function end_el( &$output, $comment, $depth = 0, $args = array() ) {
		?>
			</article>
		<?php
	}

	function __destruct() {
		?>
			</section>
		<?php
	}
}
