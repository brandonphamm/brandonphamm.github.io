<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Demo_Theme
 */

?>

<footer id="colophon" class="site-footer">
	<nav class="footer-logo">
		<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
			<img src="<?php echo home_url('/wp-content/uploads/2024/03/iconmonstr-school-white.png'); ?>" alt="School Logo">
		</a>
	</nav>
	<section class="footer-credits">
		<h2>Credits</h2>
		<p>Created by <strong>Brandon Pham & Brian Pham</strong></p>
	</section>
	<nav class="footer-nav">
		<h2>Links</h2>
		<div class="menu-footer-menu-container">
			<ul id="menu-footer-menu" class="menu">
				<li>
					<a href="<?php echo get_permalink(get_page_by_path('news')); ?>">News</a>
				</li>
				<li>
					<a href="<?php echo get_permalink(get_page_by_path('schedule')); ?>">Schedule</a>
				</li>
			</ul>
		</div>
	</nav>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>