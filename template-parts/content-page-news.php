<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Demo_Theme
 */

?>

<article data-aos="fade-up" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="entry-meta">
			<span>Posted on
				<a href="<?php echo get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('d')); ?>">
					<?php echo get_the_date(); ?>
				</a>
			</span>
			<span> by
				<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
					<?php the_author(); ?>
				</a>
			</span>

		</div>

	</header><!-- .entry-header -->




	<div class="entry-content">
		<?php

		if (has_post_thumbnail()) {
			echo '<a href="' . get_the_permalink() . '">';
			the_post_thumbnail();
			echo '</a>';
		}
		the_excerpt();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php school_demo_theme_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->