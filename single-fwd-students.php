<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package School_Demo_Theme
 */

get_header();
?>

	<main id="primary" class="site-main-students-single">

		<?php
		while ( have_posts() ) :
			the_post();


			// this is looking for content-fwd-student.php
			get_template_part( 'template-parts/content', get_post_type() );

		


		endwhile; // End of the loop.
		?>

<?php
// Get the current post's terms in the taxonomy
$taxonomy = 'fwd-students-category'; 
$terms = get_the_terms(get_the_ID(), $taxonomy);

if ($terms && !is_wp_error($terms)) {
    // Extract term IDs
    $term_ids = wp_list_pluck($terms, 'term_id');
    
    // Query other posts in the same terms excluding the current post
    $related_args = array(
        'post_type' => 'fwd-students', // Change to your custom post type name
        'posts_per_page' => -1,
        'post__not_in' => array(get_the_ID()), // Exclude the current post
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'id',
                'terms' => $term_ids,
            ),
        ),
    );

    $related_query = new WP_Query($related_args);

    if ($related_query->have_posts()) {
        echo '<div class ="student-p"><p>Meet other Designer students:</p><ul>';
        while ($related_query->have_posts()) {
            $related_query->the_post();
            echo '<li><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></li>';
        }
        echo '</ul></div>';
        wp_reset_postdata();
    }
}
?>

	</main><!-- #main -->



	

<?php

get_footer();
