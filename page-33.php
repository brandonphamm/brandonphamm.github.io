<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Demo_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    // The Query
    $args = array(
        'post_type' => 'post', // Change this to your custom post type if needed
        'posts_per_page' => -1, // Show all posts
    );
    $the_query = new WP_Query($args);

    // The Loop
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            get_template_part('template-parts/content', 'page-news');
        }
    } else {
        echo 'No posts found';
    }

    // Restore original Post Data
    wp_reset_postdata();
    ?>


    <aside id="secondary" class="widget-area">
        <?php get_sidebar(); ?>
    </aside>

</main><!-- #main -->

<?php

get_footer();
