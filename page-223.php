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
    function change_default_title($title)
    {
        $screen = get_current_screen();
        if ('staff' == $screen->post_type) {
            $title = 'Add title';
        }
        return $title;
    }
    add_filter('enter_title_here', 'change_default_title');

    if (is_singular()) :
        the_title('<h1 class="entry-title">', '</h1>');
    else :
        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
    endif;
    ?>

    <p>Our dedicated staff is here to help our students succeed. You will find the faculty and administrative staff listed below. Please contact the appropriate individual with any questions. Vestibulum pretium neque leo, nec euismod ex interdum vitae. Etiam viverra, lorem sed lobortis mattis, lectus enim eleifend nisi, non dapibus nulla purus malesuada risus. Donec consectetur neque turpis, vitae varius lectus commodo vel.</p>

    <?php
    echo '<section  class="staff-wrapper">';
    ?>

    <?php
    $term = get_term_by('slug', 'administrative', 'fwd-staff-category');

    if ($term) {
        echo '<h2>' . $term->name . '</h2>';
    }

    $args = array(
        'post_type'      => 'fwd-staff',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC', // setting the order to go to alphabetical order.
        'tax_query'      => array(
            array(
                'taxonomy' => 'fwd-staff-category',
                'field'    => 'slug',
                'terms'    => 'administrative',
            )
        ),
    );

    $query = new WP_Query($args);

    ?>


    <?php
    if ($query->have_posts()) {

        while ($query->have_posts()) {
            $query->the_post();

            // echo '<pre>';
            // print_r($query);
            // echo '</pre>';

    ?>
            <article class="staff-item">
                <?php
                echo '<h3>' . get_the_title() . '</h3>';

                ?>


                <?php

                if (function_exists('get_field')) {
                    if (get_field('staff_biography')) {
                        echo '<p>' . get_field('staff_biography') . '</p>';
                    }
                    if (get_field('course')) {
                        echo '<p>Course: ' . get_field('course') . '</p>';
                    }
                    if (get_field('website')) {
                        echo "<a href='" . get_field('website') . "'>Instructor Website</a>";
                    }
                }
                ?>

            </article>
    <?php
        }
        wp_reset_postdata();
    }
    ?>
    <?php
    echo '</section>';
    ?>

    <?php
    echo '<section  class="staff-wrapper">';
    ?>

    <?php
    $term = get_term_by('slug', 'faculty', 'fwd-staff-category');

    if ($term) {
        echo '<h2>' . $term->name . '</h2>';
    }

    $args = array(
        'post_type'      => 'fwd-staff',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC', // setting the order to go to alphabetical order.
        'tax_query'      => array(
            array(
                'taxonomy' => 'fwd-staff-category',
                'field'    => 'slug',
                'terms'    => 'faculty',
            )
        ),
    );

    $query = new WP_Query($args);

    ?>


    <?php
    if ($query->have_posts()) {

        while ($query->have_posts()) {
            $query->the_post();

            // echo '<pre>';
            // print_r($query);
            // echo '</pre>';

    ?>
            <article class="staff-item">
                <?php
                echo '<h3>' . get_the_title() . '</h3>';
                ?>

                <?php
                if (function_exists('get_field')) {
                    if (get_field('staff_biography')) {
                        echo '<p>' . get_field('staff_biography') . '</p>';
                    }
                    if (get_field('course')) {
                        echo '<p>Course: ' . get_field('course') . '</p>';
                    }
                    if (get_field('website')) {
                        echo "<a href='" . get_field('website') . "'>Instructor Website</a>";
                    }
                }
                ?>


            </article>
    <?php
        }
        wp_reset_postdata();
    }
    ?>
    <?php
    echo '</section>';
    ?>
</main>

<?php
get_footer();
