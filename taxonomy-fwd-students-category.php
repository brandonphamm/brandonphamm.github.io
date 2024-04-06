<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Demo_Theme
 */

get_header();

?>


	<main id="primary" class="site-main-students">

		<?php if ( have_posts() ) : ?>

			<header class="page-header-students">
				<?php
				$archive_title = get_the_archive_title();
				$modified_title =  $archive_title . ' Student';
				echo '<h1 class="page-title">' . $modified_title . '</h1>';
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
?>
				
	<div class="entry-content">
	<article>
            <a href="<?php the_permalink(); ?>">
                <h2><?php the_title(); ?></h2></a>
                <?php the_post_thumbnail('portrait-blog-tax'); ?>
        </article>
		<?php

		
		
		the_content(
			sprintf(
				wp_kses(
					
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Read more about the student…<span class="screen-reader-text"> "%s"</span>', 'school-demo-theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'school-demo-theme' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

<?php
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->



<?php

get_footer();
