<?php

function portfolio_register_custom_post_types()
{

    $labels = array(
        'name'               => _x('Work', 'post type general name'),
        'singular_name'      => _x('Work', 'post type singular name'),
        'menu_name'          => _x('Work', 'admin menu'),
        'name_admin_bar'     => _x('Work', 'add new on admin bar'),
        'add_new'            => _x('Add New', 'work'),
        'add_new_item'       => __('Add New Work'),
        'new_item'           => __('New Work'),
        'edit_item'          => __('Edit Work'),
        'view_item'          => __('View Work'),
        'all_items'          => __('All Works'),
        'search_items'       => __('Search Works'),
        'parent_item_colon'  => __('Parent Work:'),
        'not_found'          => __('No works found.'),
        'not_found_in_trash' => __('No works found in Trash.'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'work'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-hammer',
        'supports'           => array('title', 'custom-fields'),

    );

    register_post_type('projects-work', $args);
}
add_action('init', 'portfolio_register_custom_post_types');

function portfolio_register_taxonomies()
{
    // Add Work Language taxonomy
    $labels = array(
        'name'              => _x('Work Languages', 'taxonomy general name'),
        'singular_name'     => _x('Work Language', 'taxonomy singular name'),
        'search_items'      => __('Search Work Languages'),
        'all_items'         => __('All Work Language'),
        'parent_item'       => __('Parent Work Language'),
        'parent_item_colon' => __('Parent Work Language:'),
        'edit_item'         => __('Edit Work Language'),
        'view_item'         => __('Vview Work Language'),
        'update_item'       => __('Update Work Language'),
        'add_new_item'      => __('Add New Work Language'),
        'new_item_name'     => __('New Work Language Name'),
        'menu_name'         => __('Work Language'),
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
        'rewrite'           => array('slug' => 'work-languages'),
    );
    register_taxonomy('work-languages', array('projects-work'), $args);
}
add_action('init', 'portfolio_register_taxonomies');
