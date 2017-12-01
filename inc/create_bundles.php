<?php

function bundles_function(){

    $post_type = "bundles";
    $labels = array(
            'name'               => 'Bundles',
            'singular_name'      => 'Bundle',
            'all_items'          => 'All the bundles',
            'add_new'            => 'Add a bundle',
            'add_new_item'       => 'Add a bundle',
            'edit_item'          => "Edit bundle",
            'new_item'           => 'New bundle',
            'view_item'          => "View bundle",
            'search_items'       => 'Find a bundle',
            'not_found'          => 'No result',
            'not_found_in_trash' => 'No result',
            'parent_item_colon'  => 'Parent bundle:',
            'menu_name'          => 'bundles',
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

    $taxonomy="bundle-content";
    $object_type = array("bundles");
    $args = array(
        'label' => __( 'Bundle Content' ),
        'rewrite' => array( 'slug' => 'bundle-content' ),
        'hierarchical' => true,
    );
    register_taxonomy( $taxonomy, $object_type, $args );

}

add_action('init', 'bundles_function');
