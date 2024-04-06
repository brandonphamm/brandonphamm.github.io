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

<main id="primary" class="site-main-students-archive">

    <header class="page-header">
        <h1>The Class</h1>

        <?php
        // the_archive_title( '<h1 class="page-title">', '</h1>' );
        // the_archive_description( '<div class="archive-description">', '</div>' );
        ?>
    </header><!-- .page-header -->

<section class = 'student-wrapper'>


    <?php
    $args = array(
        'post_type'      => 'fwd-students',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC', // setting the order to go to alphabetical order.
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
    ?>
            <article>
                <a href="<?php the_permalink(); ?>">
                    <h2><?php the_title(); ?></h2>
                </a>
                <?php the_post_thumbnail('portrait-blog'); ?>
            
                <?php the_excerpt(); ?>

                <p>
                        Specialty:
                        <?php
                        $taxonomy = 'fwd-students-category';
                        $terms = get_the_terms(get_the_ID(), $taxonomy);

                        if ($terms && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                echo '<a href="' . get_term_link($term->term_id, $taxonomy) . '">' . $term->name . '</a>';
                            }
                        }
                        ?>
                    </p>



            </article>

    <?php


        }
        wp_reset_postdata();
    }
    ?>





</main><!-- #main -->
</section>

<?php

get_footer();
