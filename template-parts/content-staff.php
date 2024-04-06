<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Demo_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
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


        if ('post' === get_post_type()) :
        ?>
            <div class="entry-meta">
                <?php
                school_demo_theme_posted_on();
                school_demo_theme_posted_by();
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php school_demo_theme_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'school-demo-theme'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            )
        );

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'school-demo-theme'),
                'after'  => '</div>',
            )
        );
        ?>

        <div class="flex-col">
            <?php
            if (function_exists('get_field')) {
                if (get_field('staff_biography')) {
                    the_field('staff_biography');
                };
                if (get_field('course')) {

            ?>
                    <p>Course: <?php the_field('course'); ?></p>
                <?php
                };
                if (get_field('website')) {
                ?>
                    <a href='<?php the_field('website'); ?>'>Instructor Website</a>
            <?php
                };
            }
            ?>
        </div>

    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php school_demo_theme_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->