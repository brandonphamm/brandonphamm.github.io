<?php

function fwd_register_custom_post_types()
{

    // Register Students
    $labels = array(
        'name'                  => _x('Students', 'post type general name'),
        'singular_name'         => _x('Student', 'post type singular name'),
        'menu_name'             => _x('Students', 'admin menu'),
        'name_admin_bar'        => _x('Student', 'add new on admin bar'),
        'add_new'               => _x('Add New', 'Student'),
        'add_new_item'          => __('Add New Student'),
        'new_item'              => __('New Student'),
        'edit_item'             => __('Edit Student'),
        'view_item'             => __('View Student'),
        'all_items'             => __('All Students'),
        'search_items'          => __('Search Students'),
        'parent_item_colon'     => __('Parent Students:'),
        'not_found'             => __('No Students found.'),
        'not_found_in_trash'    => __('No Students found in Trash.'),
        'archives'              => __('Student Archives'),
        'insert_into_item'      => __('Insert into Student'),
        'uploaded_to_this_item' => __('Uploaded to this Student'),
        'filter_item_list'      => __('Filter Students list'),
        'items_list_navigation' => __('Students list navigation'),
        'items_list'            => __('Students list'),
        'featured_image'        => __('Student featured image'),
        'set_featured_image'    => __('Set Student featured image'),
        'remove_featured_image' => __('Remove Student featured image'),
        'use_featured_image'    => __('Use as featured image'),

    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'students'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array('title', 'thumbnail', 'editor'),
        'template'           => array(
            array('core/paragraph'),
            array('core/button'),

        ),


        'template_lock' => 'all',

    );

    register_post_type('fwd-students', $args);
}
add_action('init', 'fwd_register_custom_post_types');

function fwd_register_staff_post_types()
{

    $labels = array(
        'name'                  => _x('Staffs', 'post type general name'),
        'singular_name'         => _x('Staff', 'post type singular name'),
        'menu_name'             => _x('Staffs', 'admin menu'),
        'name_admin_bar'        => _x('Staff', 'add new on admin bar'),
        'add_new'               => _x('Add New', 'Staff'),
        'add_new_item'          => __('Add New Staff'),
        'new_item'              => __('New Staff'),
        'edit_item'             => __('Edit Staff'),
        'view_item'             => __('View Staff'),
        'all_items'             => __('All Staffs'),
        'search_items'          => __('Search Staffs'),
        'parent_item_colon'     => __('Parent Staffs:'),
        'not_found'             => __('No Staffs found.'),
        'not_found_in_trash'    => __('No Staffs found in Trash.'),
        'archives'              => __('Staff Archives'),
        'insert_into_item'      => __('Insert into Staff'),
        'uploaded_to_this_item' => __('Uploaded to this Staff'),
        'filter_item_list'      => __('Filter Staffs list'),
        'items_list_navigation' => __('Staffs list navigation'),
        'items_list'            => __('Staffs list'),
        'featured_image'        => __('Staff featured image'),
        'set_featured_image'    => __('Set Staff featured image'),
        'remove_featured_image' => __('Remove Staff featured image'),
        'use_featured_image'    => __('Use as featured image'),

    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'staffs'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array('title', 'thumbnail', 'editor'),
        'template'           => array(
            array('core/paragraph'),
        ),


    );

    register_post_type('fwd-staff', $args);
}
add_action('init', 'fwd_register_staff_post_types');

function fwd_register_taxonomies_staff()
{
    $labels = array(
        'name'              => _x('Staff Categories', 'taxonomy general name'),
        'singular_name'     => _x('Staff Category', 'taxonomy singular name'),
        'search_items'      => __('Search Staff Categories'),
        'all_items'         => __('All Staff Category'),
        'parent_item'       => __('Parent Staff Category'),
        'parent_item_colon' => __('Parent Staff Category:'),
        'edit_item'         => __('Edit Staff Category'),
        'view_item'         => __('View Staff Category'),
        'update_item'       => __('Update Staff Category'),
        'add_new_item'      => __('Add New Staff Category'),
        'new_item_name'     => __('New Staff Category Name'),
        'menu_name'         => __('Staff Category'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'staff-categories'),
    );
    register_taxonomy('fwd-staff-category', array('fwd-staff'), $args);
}
add_action('init', 'fwd_register_taxonomies_staff');


// Custom categories for designer and developer
function fwd_register_taxonomies()
{
    // Add Students Category taxonomy
    $labels = array(
        'name'              => _x('Students Categories', 'taxonomy general name'),
        'singular_name'     => _x('Students Category', 'taxonomy singular name'),
        'search_items'      => __('Search Students Categories'),
        'all_items'         => __('All Students Category'),
        'parent_item'       => __('Parent Students Category'),
        'parent_item_colon' => __('Parent Students Category:'),
        'edit_item'         => __('Edit Students Category'),
        'view_item'         => __('View Students Category'),
        'update_item'       => __('Update Students Category'),
        'add_new_item'      => __('Add New Students Category'),
        'new_item_name'     => __('New Students Category Name'),
        'menu_name'         => __('Students Category'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'students-categories'),
    );
    register_taxonomy('fwd-students-category', array('fwd-students'), $args);
}
add_action('init', 'fwd_register_taxonomies');





// This is for changing the place holder.
// Source used, https://developer.wordpress.org/reference/hooks/enter_title_here/
if (is_admin()) {
    add_filter('enter_title_here', function ($input) {
        if ('projects' === get_post_type()) {
            return __('Enter Project Name', 'textdomain');
        } else if ('fwd-students' === get_post_type()) {
            return __('Add Student Name', 'textdomain');
        } else {
            return $input;
        }
    });
}

// To flush permalinks
function fwd_rewrite_flush()
{
    fwd_register_custom_post_types();
    flush_rewrite_rules();
    fwd_register_taxonomies();
}
add_action('after_switch_theme', 'fwd_rewrite_flush');
