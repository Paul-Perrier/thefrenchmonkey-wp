<?php

function about_function(){

    $post_type = "about";
    $labels = array(
            'name'               => 'About',
            'singular_name'      => 'About',
            'all_items'          => 'All the about',
            'add_new'            => 'Add a about',
            'add_new_item'       => 'Add a about',
            'edit_item'          => "Edit about",
            'new_item'           => 'New about',
            'view_item'          => "View about",
            'search_items'       => 'Find a about',
            'not_found'          => 'No result',
            'not_found_in_trash' => 'No result',
            'parent_item_colon'  => 'Parent about:',
            'menu_name'          => 'about',
        );

        $args = array(
            'labels'              => $labels,
            'hierarchical'        => false,
            'supports'            => array( 'title','thumbnail','editor', 'excerpt' ),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-slides',
            'show_in_nav_menus'   => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => false,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => array( 'slug' => $post_type )
        );

        register_post_type($post_type, $args );


}

add_action('init', 'about_function');
