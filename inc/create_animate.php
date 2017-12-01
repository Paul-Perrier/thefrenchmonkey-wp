<?php

function animate_function(){

    $post_type = "animate";
    $labels = array(
            'name'               => 'Animations',
            'singular_name'      => 'Animate',
            'all_items'          => 'All the animations',
            'add_new'            => 'Add a animate',
            'add_new_item'       => 'Add a animate',
            'edit_item'          => "Edit animate",
            'new_item'           => 'New animate',
            'view_item'          => "View animate",
            'search_items'       => 'Find a animate',
            'not_found'          => 'No result',
            'not_found_in_trash' => 'No result',
            'parent_item_colon'  => 'Parent animate:',
            'menu_name'          => 'animations',
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

        $taxonomy = "format";
        $object_type = array("animate");

        $args = array(
            'label' => __( 'Format' ),
            'rewrite' => array( 'slug' => 'format' ),
            'hierarchical' => true,

        );
        register_taxonomy( $taxonomy, $object_type, $args );

}

add_action('init', 'animate_function');
